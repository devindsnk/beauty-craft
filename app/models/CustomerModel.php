<?php
class CustomerModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
      // $this->db = null;
   }

   public function registerCustomer($data)
   {
      $this->db->query("INSERT INTO customers (fName, lName, mobileNo, gender, status) VALUES(:fName, :lName, :mobileNo, :gender, 'active')");

      $this->db->bind(':fName', $data['fName']);
      $this->db->bind(':lName', $data['lName']);
      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':gender', $data['gender']);

      $this->db->execute();
   }

   public function getCustomerData($mobileNo)
   {
      $this->db->query("SELECT * FROM customers WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $results = $this->db->single();

      return $results;
   }

   public function checkCustomerExists($mobileNo)
   {
      $this->db->query("SELECT * FROM customers WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $results = $this->db->rowCount();

      return $results;
   }

   public function getCustomerDataByMobileNo($mobileNo)
   {
      $this->db->query("SELECT * FROM customers WHERE mobileNo =  :mobileNo ");
      $this->db->bind(':mobileNo', $mobileNo);
      $result = $this->db->single();

      return [$result->customerID, $result->fName . " " . $result->lName];
   }
}
