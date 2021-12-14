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

      $result = $this->getResultSet('staff', '*', null);

      return $result;
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
      var_dump($result);
      return $result;
   }



   public function getStaffDetailsByStaffID($staffID)
   {
      $result = $this->getResultSet('staff', '*', ["staffID" => $staffID]);
      // $this->db->customQuery("SELECT * FROM staff
      //                   WHERE staffID = '$staffID'");
      // $result = $this->db->resultSet();

      return $result;
   }

   public function getStaffDataByMobileNo($mobileNo)
   {
      $this->db->query("SELECT * FROM staff WHERE mobileNo =  :mobileNo ");
      $this->db->bind(':mobileNo', $mobileNo);
      $result = $this->db->single();
      return [$result->staffID, $result->fName . " " . $result->lName];
   }

   public function updateStaffDetails($data, $staffID)
   {

      $results =  $this->update('staff', ['image' =>  $data['staffimage'], 'fName' => $data['staffFname'], 'lName' => $data['staffLname'], 'staffType' => $data['staffType'], 'mobileNo' => $data['staffMobileNo'], 'gender' => $data['gender'], 'address' => $data['staffHomeAdd'], 'email' => $data['staffEmail'], 'dob' => $data['staffDOB']], ['staffID' => '$staffID']);
      var_dump($results);
   }

   public function updateBankDetails($data, $staffID)
   {
      // $result = $this->customQuery(
      //    "SELECT staffID FROM staff WHERE mobileNo = :mobileNo ",
      //    [
      //       ' :mobileNo' =>  $data['staffMobileNo'],
      //    ]
      // );

      // $staffID = $result[0]->staffID;
      // var_dump($result);

      $results =  $this->update('bankdetails', ['staffID' => $staffID, 'accountNo' => $data['staffAccNum'], 'bankName' => $data['staffAccBank'], 'holdersName' => $data['staffAccHold'], 'branchName' => $data['staffAccBranch']], ['staffID' => '$staffID']);
      var_dump($results);
   }

   public function removeStaff($staffID)
   {
      $this->delete("staff", ["staffID" => $staffID]);
   }

   public function getStaffUserData($mobileNo)
   {
      $results = $this->getSingle("staff", "*", ['mobileNo' => $mobileNo]);

      var_dump($results);
      // $this->db->query("SELECT * FROM staff WHERE mobileNo =  :mobileNo ");
      // $this->db->bind(':mobileNo', $mobileNo);
      // $result = $this->db->single();
      // print_r($results);
      // die('hi');

      return [$results->staffID, $results->fName . " " . $results->lName];
   }

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

   // Returns the data of service providers of a given service with their availability on the give date.
   public function getServiceProvidersByServiceWithAvailability($serviceID, $date)
   {
      // should get first name last name and availability
      // Tables to interact: 'staff', 'serviceproviders', 'generalLeaves'

      $SQLquery =
         "SELECT S.staffID, S.fName, S.lName, GL.status
         FROM staff AS S
         INNER JOIN serviceproviders AS SP
            ON S.staffID = SP.staffID
            AND SP.serviceID = :serviceID
         LEFT JOIN generalleaves AS GL 
            ON S.staffID = gl.staffID
            AND GL.leaveDate = :date";

      $results = $this->customQuery(
         $SQLquery,
         [
            ':serviceID' => $serviceID,
            ':date' => $date
         ]
      );

      return $results;

      // SELECT
      // *
      // FROM
      // staff AS S
      // INNER JOIN serviceproviders AS SP
      // ON
      // S.staffID = SP.staffID AND SP.serviceID = '000001'
      // LEFT JOIN generalleaves AS GL
      // ON
      // S.staffID = gl.staffID AND GL.leaveDate = '2021-12-08' AND gl.status = 0
   }

   /////////////////////////////////
}
