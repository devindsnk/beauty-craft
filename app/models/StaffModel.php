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
       if (($data['staffimagePath'] == " " ) && ($data['gender'] == "M"))
         {
            $data['staffimagePath'] = "male.jpg";
         }

      if (($data['staffimagePath'] == " " ) && ($data['gender'] == "F"))
         {
            $data['staffimagePath'] = "female.jpg";
         }
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


   public function getAllStaffWithFilters($sType, $status, $sName)
   {
      $conditions = array();

      // Extract specially defined conditions to a separate array 
      // Note that both tableName and columnName are used as the keys 
      if ($sType != "all") $conditions["staff.staffType"] = $sType;
      if ($status != "all") $conditions["staff.status"] = $status;

      // *********************
      // seperate array to store the staff mmber name
      if ($sName != "all") $name["staff.fName"] = $sName;

      $preparedConditions = array();
      $dataToBind = array();

      foreach ($conditions as $column => $value)
      {
         $colName = explode(".", $column, 2)[1]; // Only taking the column name for binding (discards tableName)
         array_push($preparedConditions, "$column = :$colName");
         $dataToBind[":$colName"] = $value;
      }

      $consditionsString = implode(" AND ", $preparedConditions);
      // $consditionsString  = "staff.staffType = :staffType AND staff.fName LIKE :sName% OR staff.lName LIKE :sName% AND staff.status = :status";// Joining conditions with AND and LIKE
      $SQLstatement =
         "SELECT * FROM staff
         INNER JOIN bankdetails ON staff.staffID = bankdetails.staffID WHERE staffType IN (3,4,5)";

      // Remove spaces, otherwise sql query doesnt work
      $string = "'$sName%'";
      $string = str_replace(' ', '', $string);

      // Appending conditions string
      if (!empty($conditions)) $SQLstatement .= " AND $consditionsString";
      // *********************
      if (!empty($name)) $SQLstatement .= " AND staff.fName LIKE $string OR staff.lName LIKE $string ";
      $results = $this->customQuery($SQLstatement,  $dataToBind);
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

   
   // get one staff details to the view 
   public function getStaffMemberCountForCharts()
   {
      $results = $this->customQuery(
         "SELECT staff.staffType AS sType , COUNT(*) AS TotalCount
         FROM staff
         WHERE staff.status= 1 AND staffType IN (3,4,5)
         GROUP BY staffType",
         [':status' => 1]
      );
      return $results;
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
      $currentMobileNo = $data['staffdetails']->mobileNo;

      if ($data['mobileNo'] != $data['staffdetails']->mobileNo)
      {
         $SQLstatement = "UPDATE users SET mobileNo = :newMobileNo  WHERE mobileNo = :currentMobileNo;";
         $results = $this->customQuery($SQLstatement, [":newMobileNo" => $data['mobileNo'], ":currentMobileNo" => $currentMobileNo]);
      }
      $this->update('staff', ['imgPath' =>  $data['imgPath'], 'fName' => $data['fName'], 'lName' => $data['lName'], 'mobileNo' => $data['mobileNo'], 'gender' => $data['gender'], 'address' => $data['address'], 'email' => $data['email'], 'dob' => $data['dob'], 'status' => $data['status']], ['staffID' => $staffID]);
      $this->update('bankdetails', ['staffID' => $staffID, 'accountNo' => $data['accountNo'], 'bankName' => $data['bankName'], 'holdersName' => $data['holdersName'], 'branchName' => $data['branchName']], ['staffID' => $staffID]);
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

   ///////////////////////////////////

   // For owner overview 
   public function getAvailableManagerCount()
   {
      $date = date("Y/m/d"); 
      // $today = date("Y/m/d", strtotime($date));
      print_r($date);
      $SQLstatement =
         "SELECT COUNT(*) AS mangCount
         FROM staff AS S
         INNER JOIN generalleaves AS L 
         ON S.staffID = L.staffID AND S.status = 1 AND S.staffType = 3
         AND L.leaveDate = :date AND L.status IN (0,2) ";
        $results = $this->customQuery($SQLstatement,[":date" => $date]);

      return $results;
   }
   /////////////////////
}
