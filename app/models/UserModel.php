<?php
class UserModel extends Model
{
   // private $db;

   // public function __construct()
   // {
   //    $this->db = new Database;
   // }

   public function registerUser($mobileNo, $password, $userType)
   {
      $this->insert('users', [
         'mobileNo' => $mobileNo,
         'password' => password_hash($password, PASSWORD_DEFAULT),
         'userType' => $userType
      ]);
      // $this->$this->db->query("INSERT INTO users (mobileNo, password, userType) VALUES(:mobileNo, :password, :userType)");

      // $this->db->bind(':mobileNo', $mobileNo);
      // $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));
      // $this->db->bind(':userType', $userType);

      // $this->db->execute();
   }

   public function getUser($mobileNo)
   {
      $results = $this->getSingle("users", "*", ["mobileNo" => $mobileNo]);

      // $this->db->query("SELECT * FROM users WHERE mobileNo = :mobileNo");
      // $this->db->bind(':mobileNo', $mobileNo);
      // $results = $this->db->single();

      return $results;
   }

   public function checkUserExists($mobileNo)
   {
      $results = $this->getRowCount("users", ["mobileNo" => $mobileNo]);
      // $this->db->query("SELECT COUNT(*) FROM users WHERE mobileNo = :mobileNo");
      // $this->db->bind(':mobileNo', $mobileNo);
      // $results = $this->db->single();
      if ($results == 0)
      {
         return false;
      }
      return true;
   }

   // public function updatePassword($mobileNo, $password)
   // {
   //    $this->db->query("UPDATE users SET password = :password WHERE mobileNo = :mobileNo");

   //    $this->db->bind(':mobileNo', $mobileNo);
   //    $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));

   //    $this->db->execute();
   // }
}
