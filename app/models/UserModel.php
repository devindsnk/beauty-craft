<?php
class UserModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function registerUser($mobileNo,$password,$userType)
   {
      $this->db->query("INSERT INTO users (mobileNo, password, userType) VALUES(:mobileNo, :password, :userType)");

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
      $this->db->bind(':userType', $userType);

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
