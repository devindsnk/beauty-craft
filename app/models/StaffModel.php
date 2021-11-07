<?php
class StaffModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function addStaff($data)
   {
      $this->addStaffDetails($data);
      $this->addBankDetails($data);
   }
// add staff details to the db
   public function addStaffDetails($data)
   {
      // print_r($data);
      // $this->db->query("INSERT INTO staff(ImageColumn) 
      // SELECT BulkColumn 
      // FROM Openrowset( Bulk 'image..Path..here', Single_Blob) as img
      // ");
      $this->db->query("INSERT INTO staff(image, fName, lName, staffType, mobileNo, gender, nic, address, email, dob, status) VALUES(:image, :fName, :lName, :staffType , :mobileNo, :gender, :nic, :address, :email, :dob , '1')");
      
      $this->db->bind(':image', $data['staffimage']);
      $this->db->bind(':fName', $data['staffFname']);
      $this->db->bind(':lName', $data['staffLname']);
      $this->db->bind(':staffType', $data['staffType']);
      $this->db->bind(':mobileNo', $data['staffMobileNo']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':nic', $data['staffNIC']);
      $this->db->bind(':address', $data['staffHomeAdd']);
      $this->db->bind(':email', $data['staffEmail']);
      $this->db->bind(':dob', $data['staffDOB']);

      $this->db->execute();
   }

//  add staff bank details to the db
   public function addBankDetails($data)
   {
      $this->db->query("SELECT staffID FROM staff WHERE mobileNo =  :mobileNo ");
      $this->db->bind(':mobileNo', $data['staffMobileNo']);
      $result = $this->db->resultSet();
      $staffID = $result[0]->staffID;
      $this->db->query("INSERT INTO bankdetails(staffID, accountNo, bankName, holdersName, branchName) VALUES(:staffID, :accountNo, :bankName, :holdersName, :branchName)");

      $this->db->bind(':staffID', $staffID);
      $this->db->bind(':accountNo', $data['staffAccNum']);
      $this->db->bind(':bankName', $data['staffAccBank']);
      $this->db->bind(':holdersName', $data['staffAccHold']);
      $this->db->bind(':branchName', $data['staffAccBranch']);


      $this->db->execute();
   }
// get one staff details to the table
   public function getAllStaffDetails()
   {
      $this->db->query('SELECT * FROM staff');
      $result = $this->db->resultSet();

      return $result;
   }

  // get one staff details to the view 
   public function getStaffDetailsByStaffID($staffID) 
   {
      $this->db->query("SELECT * FROM bankdetails
                        INNER JOIN staff 
                        ON staff.staffID = bankdetails.staffID
                        WHERE bankdetails.staffID ='$staffID'");
      $result = $this->db->resultSet();
      return $result;
   }


   public function getStaffDataByMobileNo($mobileNo)
   {
      $this->db->query("SELECT * FROM staff WHERE mobileNo =  :mobileNo ");
      $this->db->bind(':mobileNo', $mobileNo);
      $result = $this->db->single();
      return [$result->staffID, $result->fName . " " . $result->lName];
   }



   public function updateStaffDetails($data,$staffID) 
   {
      print_r($data);
      print_r($staffID);

      // $this->db->query("UPDATE staff(fName, lName, staffType, mobileNo, gender, nic, address, email, dob, status) VALUES( :fName, :lName, :staffType , :mobileNo, :gender, :nic, :address, :email, :dob , '1') WHERE staffID ='$staffID'");
      $this->db->query("UPDATE staff SET fName=:fName, lName=:lName, mobileNo=:mobileNo, gender=:gender, nic=:nic, address=:address , email=:email, dob=:dob WHERE staffID ='$staffID'" );
      // $this->db->bind(':image', $data['staffimage']);
      $this->db->bind(':fName', $data['staffFname']);
      $this->db->bind(':lName', $data['staffLname']);
      // $this->db->bind(':staffType', $data['staffType']);
      $this->db->bind(':mobileNo', $data['staffMobileNo']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':nic', $data['staffNIC']);
      $this->db->bind(':address', $data['staffAddress']);
      $this->db->bind(':email', $data['staffEmail']);
      $this->db->bind(':dob', $data['staffDOB']);

      $this->db->execute();
   }
   public function updateBankDetails($data,$staffID) 
   { 
      $this->db->query("SELECT staffID FROM staff WHERE mobileNo =  :mobileNo "); 
      $this->db->bind(':mobileNo', $data['staffMobileNo']); 
      $result = $this->db->resultSet(); 
      $staffID = $result[0]->staffID; 
      // $this->db->query("UPDATE (staffID, accountNo, bankName, holdersName, branchName) VALUES(:staffID, :accountNo, :bankName, :holdersName, :branchName)");
      $this->db->query("UPDATE bankdetails SET staffID=:staffID,accountNo= :accountNo, bankName=:bankName, holdersName=:holdersName, branchName= :branchName WHERE staffID ='$staffID'" );

      $this->db->bind(':staffID', $staffID);
      $this->db->bind(':accountNo', $data['staffAccNum']);
      $this->db->bind(':bankName', $data['staffAccBank']);
      $this->db->bind(':holdersName', $data['staffAccHold']);
      $this->db->bind(':branchName', $data['staffAccBranch']);


      $this->db->execute();
   }
}
