<?php
class UserModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function registerUser($mobileNo, $password, $userType)
   {
      // $this->db = $con;
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

   public function checkUserExists($mobileNo)
   {
      $this->db->query("SELECT COUNT(*) FROM users WHERE mobileNo = :mobileNo");
      $this->db->bind(':mobileNo', $mobileNo);
      $results = $this->db->single();
      if ($results->{'COUNT(*)'} == 0)
      {
         return false;
      }
      return true;
   }

   public function updatePassword($mobileNo, $password)
   {
      $this->db->query("UPDATE users SET password = :password WHERE mobileNo = :mobileNo");

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));

      $this->db->execute();
   }
}
