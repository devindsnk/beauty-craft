<?php
class CustomerModel extends Model
{
   public function registerCustomer($data)
   {
      $this->insert('customers', [
         'fName' => $data['fName'],
         'lName' => $data['lName'],
         'mobileNo' => $data['mobileNo'],
         'gender' => $data['gender'],
         'status' => 1
      ]);
   }

   public function getCustomerByMobileNo($mobileNo)
   {
      $result = $this->getSingle('customers', '*', ['mobileNo' => $mobileNo]);
      return $result;
   }

   public function checkCustomerExists($mobileNo)
   {
      $result = $this->getRowCount("customers", ['mobileNo' => $mobileNo]);
      return $result;
   }

   public function getCustomerUserData($mobileNo)
   {
      $result = $this->getSingle("customers", ["customerID", "fName", "lName"], ["mobileNo" => $mobileNo, "status" => 1]);
      return [$result->customerID, $result->fName . " " . $result->lName];
   }

   public function removeCustomerDetails($cusID, $mobileNo, $rescount)
   {
      if ($rescount > 0)
      {
         $result = $this->update('reservations', ['status' => 0], ['customerID' => $cusID]);
         $this->update('customers', ['status' => 0], ["customerID" => $cusID]);
         $this->delete("users", ['mobileNo' => $mobileNo]);
      }
      else
      {
         $this->update('customers', ['status' => 0], ["customerID" => $cusID]);
         $this->delete("users", ['mobileNo' => $mobileNo]);
      }
   }

   // for customer table
   public function getAllCustomerDetails()
   {
      // $result = $this->getResultSet('customers', '*', null);
      $result = $this->customQuery("SELECT * FROM customers WHERE customerID != 000001", null);
      return ($result);
   }
   // for customer table end

   public function getAllCustomersWithFilters($cusName,$cusMobileNumber,$status)
   {
      
      $SQLstatement =
      "SELECT * FROM customers  WHERE customerID != 000001";

      // Remove spaces, otherwise sql query doesnt work
      $string1 = "'$cusName%'";
      $string1= str_replace(' ', '', $string1);

      $string2 = "'$cusMobileNumber%'";
      $string2= str_replace(' ', '', $string2);

      if ($cusName != "all") $SQLstatement .= " AND customers.fName LIKE $string1 OR customers.lName LIKE $string1 ";
      if ($cusMobileNumber != "all") $SQLstatement .= " AND customers.mobileNo LIKE $string2 ";
      if ($status != "all") $SQLstatement .= " AND customers.status = $status ";
      $results = $this->customQuery($SQLstatement,  null);
      return $results;


   }

   // added by ravindu
   // for customer view
   public function getCustomerDetailsByCusID($cusID)
   {
      $result = $this->getResultSet('customers', '*',  ["customerID" => $cusID]);
      return ($result);
   }

   public function getAllReservationCountByCusID($cusID)
   {
      $result = $this->getRowCount('reservations', ['customerID' => $cusID, 'status' => 1]);
      return $result;
   }

   public function getAllCompletedReservationSalesByCusID($cusID)
   {
      $result = $this->getResultSet('reservations', '*', ["customerID" => $cusID, 'status' => 4]);
      $CompletedReservationCount = sizeof($result);
      $totalSales = 0;
      for ($i = 0; $i < $CompletedReservationCount; $i++)
      {
         $servId = $result[$i]->serviceID;
         $servPrice = ($this->getSingle("services", ["price"], ["serviceID" => $servId]))->price;
         $totalSales = $totalSales + (int)$servPrice;
      }
      return $totalSales;
   }

   public function getCancelledReservationCountByCusID($cusID)
   {
      $result = $this->getRowCount('reservations', ['customerID' => $cusID, 'status' => 0]);
      return ($result);
   }
   // for customer view end

   // FOR MANAGER OVERVIEW
   public function getActiveCustomerCount()
   {
      $results = $this->getRowCount('customers', ['status' => 1]);
      return $results;
   }
   // FOR MANAGER OVERVIEW

   // FOR ANALYTICS
   public function getWalkInCustomerCount()
   {
      $cusID = 000001;

      $results1 = $this->customQuery(
         "SELECT COUNT(*) AS walkInCustCount
                                    FROM reservations
                                    INNER JOIN customers ON customers.customerID = reservations.customerID 
                                    WHERE customers.customerID = :custID AND( MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH ) AND YEAR(reservations.date) = YEAR( CURRENT_DATE - INTERVAL 1 MONTH ))",
         [':custID' => $cusID]
      );
      $results2 = $this->customQuery(
         "SELECT COUNT(*) AS onlineCustCount
                                    FROM reservations
                                    INNER JOIN customers ON customers.customerID = reservations.customerID 
                                    WHERE customers.customerID <> 000001 AND ( MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH ) AND YEAR(reservations.date) = YEAR( CURRENT_DATE - INTERVAL 1 MONTH ))",
         []
      );
      $results = [
         'results1' => $results1,
         'results2' => $results2,
      ];
      return $results;
   }

   public function getCustomerPopulation()
   {
      $results = $this->customQuery(
         "SELECT FLOOR((DayOfMonth(registeredDate)-1)/7)+1 AS weekNo, COUNT(DISTINCT customerID) AS custCount
                                    FROM customers
                                    WHERE status=:status AND (MONTH(registeredDate) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(registeredDate) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH))
                                    GROUP BY DATE_FORMAT(registeredDate, '%u')
                                    ORDER BY registeredDate;",
         [':status' => 1]
      );
      return $results;
   }

   // FOR ANALYTICS

   public function getUpcomingReservationCountByCusID($cusID)
   {
      $result1 = $this->getRowCount('reservations', ['customerID' => $cusID, 'status' => 1]);
      $result2 = $this->getRowCount('reservations', ['customerID' => $cusID, 'status' => 2]);
      $results = $result1 + $result2;
      return $results;
   }

   public function getAllActiveCustomers()
   {
      $SQLstatement =
         "SELECT customerID, fName, lName, mobileNo 
         FROM customers 
         WHERE status = 1 AND customerID <> '000001'";
      $results = $this->customQuery($SQLstatement);
      return $results;
   }

   //for Customer profile settings
   public function removeCustImg($custID)
   {
      $results = $this->update('customers', ['imgPath' => ''], ['customerID' => $custID]);
      return true;
   }
   public function updateCustomerInfo($data, $custID)
   {
      $results = $this->update('customers', ['imgPath' => $data['imgPath'], 'fName' => $data['fName'], 'lName' => $data['lName'], 'gender' => $data['gender'], 'mobileNo' => $data['mobileNo']], ['customerID' => $custID]);
   }
   public function updateUserTableMobileNo($newNo, $oldNo)
   {
      $results = $this->update('users', ['mobileNo' => $newNo], ['mobileNo' => $oldNo]);
   }
}
