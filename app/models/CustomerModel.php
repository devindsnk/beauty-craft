<?php
class CustomerModel extends Model
{
   // private $db;

   // public function __construct()
   // {
   //    $this->db = new Database;
   //    // $this->db = null;
   // }

   public function registerCustomer($data)
   {
      $this->insert('customers', [
         'fName' => $data['fName'],
         'lName' => $data['lName'],
         'mobileNo' => $data['mobileNo'],
         'gender' => $data['gender'],
         'status' => 1
      ]);
      // $this->db->query("INSERT INTO customers (fName, lName, mobileNo, gender, status) VALUES(:fName, :lName, :mobileNo, :gender, 'active')");

      // $this->db->bind(':fName', $data['fName']);
      // $this->db->bind(':lName', $data['lName']);
      // $this->db->bind(':mobileNo', $data['mobileNo']);
      // $this->db->bind(':gender', $data['gender']);

      // $this->db->execute();
   }

   public function getCustomerData($mobileNo)
   {
      $result = $this->getSingle('customers', '*', ['mobileNo' => $mobileNo]);

      // $this->db->query("SELECT * FROM customers WHERE mobileNo = :mobileNo");
      // $this->db->bind(':mobileNo', $mobileNo);
      // $results = $this->db->single();

      return $result;
   }

   public function checkCustomerExists($mobileNo)
   {

      $result = $this->getRowCount("customers", ['mobileNo' => $mobileNo]);
      // $this->db->query("SELECT * FROM customers WHERE mobileNo = :mobileNo");

      // $this->db->bind(':mobileNo', $mobileNo);

      // $results = $this->db->rowCount();

      return $result;
   }

   public function getCustomerDataByMobileNo($mobileNo)
   {
      $result = $this->getSingle("customers", "*", ["mobileNo" => $mobileNo]);
      // $this->db->query("SELECT * FROM customers WHERE mobileNo =  :mobileNo ");
      // $this->db->bind(':mobileNo', $mobileNo);
      // $result = $this->db->single();

      return [$result->customerID, $result->fName . " " . $result->lName];
   }

   // FOR MANAGER OVERVIEW
   public function getActiveCustomerCount(){

      $results = $this->getRowCount('customers', ['status' => 'active']);                               
      
      return $results;
   }
   // FOR MANAGER OVERVIEW
}
