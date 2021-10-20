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

   public function addStaffDetails($data)
   {
      // print_r($data);
      $this->db->query("INSERT INTO staff(fName, lName, staffType, mobileNo, gender, nic, address, email, dob, status) VALUES(:fName, :lName, :staffType , :mobileNo, :gender, :nic, :address, :email, :dob , '1')");
    //   $this->db->bind(':image', $data['image']);
      $this->db->bind(':fName', $data['staffFname']);
      $this->db->bind(':lName', $data['staffLname']);
      $this->db->bind(':staffType', $data['staffType']);
      $this->db->bind(':mobileNo', $data['staffContactNum']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':nic', $data['staffNIC']);
      $this->db->bind(':address', $data['staffHomeAdd']);
      $this->db->bind(':email', $data['staffEmail']);
      $this->db->bind(':dob', $data['staffDOB']);
    //   $this->db->bind(':joinedDate', $data['SELECT CURRENT_DATE();']);
    //   $this->db->bind('SELECT CURRENT_DATE() AS joinedDate; ']);

      $this->db->execute();
   }


   public function addBankDetails($data)
   {
      // print_r($data);
      $this->db->query("SELECT staffID FROM staff WHERE mobileNo =  :mobileNo ");
      
      $this->db->bind(':mobileNo', $data['staffContactNum']);
      $result = $this->db->resultSet();
      print_r($data);
      $staffID = $result[0]->staffID;
      $this->db->query("INSERT INTO bankdetails(staffID, accountNo, bankName, holdersName, branchName) VALUES(:staffID, :accountNo, :bankName, :holdersName, :branchName)");
      
      $this->db->bind(':staffID', $staffID);
      $this->db->bind(':accountNo', $data['staffAccNum']);
      $this->db->bind(':bankName', $data['staffAccBank']);
      $this->db->bind(':holdersName', $data['staffAccHold']);
      $this->db->bind(':branchName', $data['staffAccBranch']);
     

      $this->db->execute();
   }

   public function getStaffDetails(){
      $this->db->query('SELECT * FROM staff');

      $result= $this->db->resultSet();

      return $result;
   }

   public function getOneStaffDetails($staffID){


      $this->db->query("SELECT * FROM staff
                        WHERE staffID = '$staffID'");

      $result= $this->db->resultSet();
     

      return $result;
   }

   public function getBankDetails($staffID){

      $this->db->query("SELECT * FROM bankdetails
                        INNER JOIN staff 
                        ON staff.staffID = bankdetails.staffID
                        WHERE bankdetails.staffID ='$staffID'");

      $result= $this->db->resultSet();

      return $result;
   }



}
