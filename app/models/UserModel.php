<?php
class UserModel extends Model
{
   public function registerUser($mobileNo, $password, $userType)
   {
      $this->insert('users', [
         'mobileNo' => $mobileNo,
         'password' => password_hash($password, PASSWORD_DEFAULT),
         'userType' => $userType
      ]);
   }

   public function getUser($mobileNo)
   {
      $results = $this->getSingle("users", "*", ["mobileNo" => $mobileNo]);
      return $results;
   }

   public function checkUserExists($mobileNo)
   {
      $results = $this->getRowCount("users", ["mobileNo" => $mobileNo]);
      if ($results == 0)
      {
         return false;
      }
      return true;
   }

   public function updatePassword($mobileNo, $password)
   {
      $this->update("users", ["password" => password_hash($password, PASSWORD_DEFAULT)], ["mobileNo" => $mobileNo]);
      // $this->db->query("UPDATE users SET password = :password WHERE mobileNo = :mobileNo");

      // $this->db->bind(':mobileNo', $mobileNo);
      // $this->db->bind(':password', password_hash($password, PASSWORD_DEFAULT));

      // $this->db->execute();
   }
}
