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
      
      $this->db->query("INSERT INTO staff(fName, lName, staffType, mobileNo, gender, nic, address, email, dob, joinedDate, status) VALUES(:fName, :lName, 'Manager', :mobileNo, :gender, :nic, :address, :email, '2020/12/12', '2020/12/12', 'active')");
    //   $this->db->bind(':image', $data['image']);
      $this->db->bind(':fName', $data['staffFname']);
      $this->db->bind(':lName', $data['staffLname']);
    //   $this->db->bind(':staffType', $data['staffType']);
      $this->db->bind(':mobileNo', $data['staffContactNum']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':nic', $data['staffNIC']);
      $this->db->bind(':address', $data['staffHomeAdd']);
      $this->db->bind(':email', $data['staffEmail']);
    //   $this->db->bind(':dob', $data['staffDOB']);
    //   $this->db->bind(':joinedDate', $data['SELECT CURRENT_DATE();']);
    //   $this->db->bind('SELECT CURRENT_DATE() AS joinedDate; ']);
    //   $this->db->bind(':status', $data['']);

      $this->db->execute();
   }


   public function addBankDetails($data)
   {
      $this->db->query("SELECT staffID FROM staff WHERE mobileNo =  :mobileNo ");
      
      $this->db->bind(':mobileNo', $data['staffContactNum']);
      $result = $this->db->resultSet();
      $staffID = $result[0]->staffID;
      $this->db->query("INSERT INTO bankdetails(staffID, accountNo, bankName, holdersName,branchName) VALUES(:staffID, :accountNo, :bankName, :holdersName, :branchName)");
      
      $this->db->bind(':staffID', $staffID);
      $this->db->bind(':accountNo', $data['staffAccNum']);
      $this->db->bind(':bankName', $data['staffAccBank']);
      $this->db->bind(':holdersName', $data['staffAccHold']);
      $this->db->bind(':branchName', $data[' staffAccBranch']);
     

      $this->db->execute();
   }
}
