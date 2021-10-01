<?php
class CustomerModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function register($data)
   {
      $this->registerCustomer($data);
      $this->registerUser($data);
   }

   private function registerCustomer($data)
   {
      $this->db->query("INSERT INTO customers (customerID, fName, lName, mobileNo, gender, status) VALUES('C0003',:fName, :lName, :mobileNo, :gender, 'active')");

      $this->db->bind(':fName', $data['fName']);
      $this->db->bind(':lName', $data['lName']);
      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':gender', $data['gender']);

      $this->db->execute();
   }

   private function registerUser($data)
   {
      $this->db->query("INSERT INTO users (mobileNo, password, userType) VALUES(:mobileNo, :password, 'customer')");

      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));

      $this->db->execute();
   }
}
