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
      $results = $this->update("users", ["password" => password_hash($password, PASSWORD_DEFAULT)], ["mobileNo" => $mobileNo]);
      return $results;
   }

   public function incrementFailedAttempts($mobileNo)
   {
      $SQLstatement = "UPDATE users SET failedAttempts = failedAttempts + 1 WHERE mobileNo = :mobileNo;";
      $results = $this->customQuery($SQLstatement, ["mobileNo" => $mobileNo]);

      return $results;
   }

   public function resetFailedAttempts($mobileNo)
   {
      $results = $this->update("users", ["failedAttempts" => 0], ["mobileNO" => $mobileNo]);
      return $results;
   }

   public function getFailedAttempts($mobileNo)
   {
      $results = $this->getSingle("users", ["failedAttempts"], ["mobileNO" => $mobileNo]);
      return $results->failedAttempts;
   }
}
