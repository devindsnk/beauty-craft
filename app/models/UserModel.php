<?php
class UserModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function registerUser($data)
   {
      $this->db->query("INSERT INTO users (mobileNo, password, userType) VALUES(:mobileNo, :password, 'customer')");

      $this->db->bind(':mobileNo', $data['mobileNo']);
      $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));

      $this->db->execute();
   }

   public function getUser($mobileNo)
   {
      $this->db->query("SELECT * FROM users WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);

      $results = $this->db->resultSet();

      // print_r($results);
      return $results;
   }
}
