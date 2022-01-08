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
      $result = $this->getResultSet('customers', '*', null);
      return ($result);
   }
   // for customer table end


   // for customer view
   public function getCustomerDetailsByCusID($cusID)
   {
      $result = $this->getResultSet('customers', '*',  ["customerID" => $cusID]);
      // print_r($result);
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
      for($i=0 ; $i<$CompletedReservationCount ; $i++){
        $servId = $result[$i]->serviceID;
      //   print_r($servId);
        $servPrice = ($this->getSingle("services", ["price"], ["serviceID" => $servId]))->price;
        $totalSales = $totalSales + (int)$servPrice;
      }
      echo "<br>";
      // print_r($totalSales);
      // die("sales");
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
         "SELECT COUNT(DISTINCT customers.customerID) AS walkInCustCount
                                    FROM customers 
                                    INNER JOIN reservations ON reservations.customerID = customers.customerID 
                                    WHERE customers.customerID = :custID AND( MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH ) AND YEAR(reservations.date) = YEAR( CURRENT_DATE - INTERVAL 1 MONTH ))",
         [':custID' => $cusID]
      );
      $results2 = $this->customQuery(
         "SELECT COUNT(DISTINCT customers.customerID) AS onlineCustCount
                                    FROM customers 
                                    INNER JOIN reservations ON reservations.customerID = customers.customerID 
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
}
