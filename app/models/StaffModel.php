<?php
class StaffModel extends Model
{
   public function addStaff($data)
   {
      $this->addStaffDetails($data);
      $this->addBankDetails($data);
   }
   // add staff details to the db
   public function addStaffDetails($data)
   {
      $results =  $this->insert('staff', ['fName' => $data['staffFname'], 'lName' => $data['staffLname'], 'staffType' => $data['staffType'], 'mobileNo' => $data['staffMobileNo'], 'gender' => $data['gender'], 'nic' => $data['staffNIC'], 'address' => $data['staffHomeAdd'], 'email' => $data['staffEmail'], 'dob' => $data['staffDOB'], 'imgPath' =>  $data['staffimagePath']]);
      var_dump($results);
   }

   //  add staff bank details to the db
   public function addBankDetails($data)
   {
      $result = $this->customQuery(
         "SELECT staffID FROM staff WHERE mobileNo = :mobileNo ",
         [
            ':mobileNo' =>  $data['staffMobileNo'],
         ]
      );
      $staffID = $result[0]->staffID;
      $results =  $this->insert('bankdetails', ['staffID' => $staffID, 'accountNo' => $data['staffAccNum'], 'bankName' => $data['staffAccBank'], 'holdersName' => $data['staffAccHold'], 'branchName' => $data['staffAccBranch']]);
      var_dump($results);
   }
   // get one staff details to the table
   public function  getAllStaffDetails()
   {
      $result = $this->customQuery("SELECT * FROM staff WHERE staffType IN (3,4,5)");
      return $result;
   }


   public function getAllStaffWithFilters($sType, $status)
   {
      // die("model called");
      $conditions = array();

      // Extract specially defined conditions to a separate array 
      // Note that both tableName and columnName are used as the keys 
      if ($sType != "all") $conditions["staff.staffType"] = $sType;
      // if ($sName != "all") $conditions["staff.staffname"] = $sName; 
      if ($status != "all") $conditions["staff.status"] = $status;

      $preparedConditions = array();
      $dataToBind = array();

      foreach ($conditions as $column => $value)
      {
         $colName = explode(".", $column, 2)[1]; // Only taking the column name for binding (discards tableName)
         array_push($preparedConditions, "$column = :$colName");
         $dataToBind[":$colName"] = $value;
      }

      $consditionsString = implode(" AND ", $preparedConditions); // Joining conditions with AND

      $SQLstatement =
         "SELECT * FROM staff
         INNER JOIN bankdetails ON staff.staffID = bankdetails.staffID";

      // Appending conditions string
      if (!empty($conditions)) $SQLstatement .= " WHERE $consditionsString";

      $results = $this->customQuery($SQLstatement,  $dataToBind);
      print_r($results);
      return $results;
   }


   // get one staff details to the view 
   public function getStaffDetailsWithBankDetailsByStaffID($staffID)
   {
      $result = $this->customQuery(
         "SELECT * FROM bankdetails 
                        INNER JOIN staff 
                        ON staff.staffID = bankdetails.staffID 
                        WHERE bankdetails.staffID =:staffID",
         [
            ':staffID' => $staffID
         ]
      );
      return $result;
   }

   public function getStaffDetailsByStaffID($staffID)
   {
      $result = $this->getResultSet('staff', '*', ["staffID" => $staffID]);
      return $result;
   }

   public function getStaffBankDetailsByStaffID($staffID)
   {
      $result = $this->getResultSet('bankdetails', '*', ["staffID" => $staffID]);
      return $result;
   }

   public function getStaffDataByMobileNo($mobileNo)
   {
      $this->db->query("SELECT * FROM staff WHERE mobileNo =  :mobileNo ");
      $this->db->bind(':mobileNo', $mobileNo);
      $result = $this->db->single();
      return [$result->staffID, $result->fName . " " . $result->lName];
   }

   public function updateStaff($data, $staffID)
   {
      $this->update('staff', ['image' =>  $data['staffimage'], 'fName' => $data['staffFname'], 'lName' => $data['staffLname'], 'staffType' => $data['staffType'], 'mobileNo' => $data['staffMobileNo'], 'gender' => $data['gender'], 'address' => $data['staffHomeAdd'], 'email' => $data['staffEmail'], 'dob' => $data['staffDOB']], ['staffID' => '$staffID']);
      $this->update('bankdetails', ['staffID' => $staffID, 'accountNo' => $data['staffAccNum'], 'bankName' => $data['staffAccBank'], 'holdersName' => $data['staffAccHold'], 'branchName' => $data['staffAccBranch']], ['staffID' => '$staffID']);
   }

   public function removeStaff($staffID, $staffMobileNo)
   {
      $status = 0;
      $this->update("staff", ["status" => $status], ['staffID' => $staffID]);
      $this->delete("users", ['mobileNo' => $staffMobileNo]);
   }

   public function getStaffUserData($mobileNo)
   {
      $results = $this->getSingle("staff", "*", ['mobileNo' => $mobileNo, 'status' => 1]);

      return [$results->staffID, $results->fName . " " . $results->lName, $results->imgPath];
   }


   public function getReservtaionDetailsByStaffID($staffID)
   {
      $SQLstatement = "SELECT * FROM reservations WHERE staffID = :staffID AND status IN (1,2);";
      $results = $this->customQuery($SQLstatement, [":staffID" => $staffID]);
      return $results;
   }
   public function getServiceslistByStaffID($staffID)

   {
      $results = $this->customQuery(
         "SELECT services.type,services.name
         FROM services 
         INNER JOIN serviceproviders 
         ON serviceproviders.serviceID =services.serviceID
         WHERE serviceproviders.staffID =:staffID",
         [':staffID' => $staffID]
      );
      return $results;
   }
   // public function getAllActiveDisableStaffNICDetails()

   // {
   //    $results =  $this->getResultSet('staff', '*', ['status' => 1 ,'status'=> 2]);
   //    return $results;
   // }


   // FOR MANAGER OVERVIEW
   public function getReceptionistCount()
   {
      $results = $this->getRowCount('staff', ['staffType' => 4, 'status' => 1]);
      return $results;
   }

   public function getManagerCount()
   {
      $results = $this->getRowCount('staff', ['staffType' => 3, 'status' => 1]);
      return $results;
   }
   // FOR MANAGER OVERVIEW

   ///// Methods added by devin ////
   public function getSProvidersWithLeaveStatusByDate($selectedDate)
   {
      $SQLstatement =
         "SELECT STAFF.staffID, STAFF.fName, STAFF.lName, STAFF.mobileNo, STAFF.imgPath, GLEAVES.status AS leaveStatus
         FROM staff AS STAFF 
         LEFT JOIN generalleaves AS GLEAVES 
         ON GLEAVES.staffID = STAFF.staffID AND GLEAVES.leaveDate = :selectedDate AND GLEAVES.status IN (1,2)
         WHERE STAFF.status = 1 ;";

      $results = $this->customQuery(
         $SQLstatement,
         [
            ":selectedDate" => $selectedDate
         ]
      );
      return $results;
   }

   // Returns the data of service providers of a given service with their availability on the give date.
   public function getSProvidersByServiceWithLeaveStatus($serviceID, $selectedDate)
   {
      $SQLstatement =
         "SELECT STAFF.staffID, STAFF.fName, STAFF.lName, GLEAVES.status AS leaveStatus
         FROM serviceproviders AS SP
         INNER JOIN staff AS STAFF 
         ON STAFF.staffID = SP.staffID AND STAFF.status = 1 
         LEFT JOIN generalleaves AS GLEAVES 
         ON GLEAVES.staffID = SP.staffID AND GLEAVES.leaveDate = :selectedDate AND GLEAVES.status IN (1,2)
         WHERE SP.serviceID = :serviceID;";

      $results = $this->customQuery(
         $SQLstatement,
         [
            ":selectedDate" => $selectedDate,
            ":serviceID" => $serviceID
         ]
      );
      return $results;
   }
   /////////////////////////////////
}
