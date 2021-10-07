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
      $this->db->query("INSERT INTO customers (fName, lName, mobileNo, gender, status) VALUES(:fName, :lName, :mobileNo, :gender, 'active')");

      $this->db->bind(':fName', $data['fName']);
      $this->db->bind(':lName', $data['lName']);
      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':gender', $data['gender']);

      $this->db->execute();
   }

   public function addVerificationPIN($mobileNo, $PIN)
   {
      $this->db->query("INSERT INTO pinverification (mobileNo, pin) VALUES(:mobileNo, :PIN)");

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':PIN', $PIN);
      // $this->db->bind(':datetime', $datetime);

      $this->db->execute();
   }

   public function getVerificationPIN($mobileNo)
   {
      $this->db->query("SELECT * FROM pinverification WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $results = $this->db->single();

      return $results;
   }

   public function getCustomerData($mobileNo)
   {
      $this->db->query("SELECT * FROM customers WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $results = $this->db->single();

      return $results;
   }

   public function markPINInvalid($mobileNo)
   {
      $this->db->query("UPDATE pinverification SET valid = 0 WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $this->db->execute();
   }
}
