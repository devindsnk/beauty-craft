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
      $this->db->query("INSERT INTO staff(fName, lName, staffType, contactNo, gender, nic, address, email, dob, joinedDate, status) VALUES(:fName, :lName, 'Manager', :contactNo, :gender, :nic, :address, :email, :dob, '2020/12/12', 'active')");
    //   $this->db->bind(':image', $data['image']);
      $this->db->bind(':fName', $data['staffFname']);
      $this->db->bind(':lName', $data['staffLname']);
      $this->db->bind(':staffType', $data['staffType']);
      $this->db->bind(':contactNo', $data['staffContactnum']);
      $this->db->bind(':gender', $data['gender']);
      $this->db->bind(':nic', $data['staffNIC']);
      $this->db->bind(':address', $data['staffHomeAdd']);
      $this->db->bind(':email', $data['staffEmail']);
      $this->db->bind(':dob', $data['staffDOB']);
    //   $this->db->bind(':joinedDate', $data['SELECT CURRENT_DATE();']);
    //   $this->db->bind('SELECT CURRENT_DATE() AS joinedDate; ']);
    //   $this->db->bind(':status', $data['']);

      $this->db->execute();
   }

   public function addBankDetails($data)
   {
      $this->db->query("INSERT INTO bankdetails(accountNo, bankName, holdersName) VALUES(:accountNo, :bankName, :holdersName)");

      $this->db->bind(':accountNo', $data['staffAccNum']);
      $this->db->bind(':bankName', $data['staffAccHold']);
      $this->db->bind(':holdersName', $data['staffAccBank']);

      $this->db->execute();
   }
}
