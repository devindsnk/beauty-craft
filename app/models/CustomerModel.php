<?php
class CustomerModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function registerCustomer($data)
   {
      $this->db->query("INSERT INTO customers (customerID, fName, lName, mobileNo, gender, status) VALUES('C0002',:fName, :lName, :mobileNo, :gender, 'active')");

      $this->db->bind(':fName', $data['fName']);
      $this->db->bind(':lName', $data['lName']);
      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':gender', $data['gender']);

      $this->db->execute();
   }
}
