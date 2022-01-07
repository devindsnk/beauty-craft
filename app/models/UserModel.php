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

   public function checkLoginExists($mobileNo)
   {
      $results = $this->getRowCount("users", ["mobileNo" => $mobileNo]);
      if ($results == 0)
      {
         return false;
      }
      return true;
   }

   public function checkAlreadyRegistered($mobileNo)  // Check already registered AND not removed
   {
      $custExists = $this->checkCustExists($mobileNo);
      var_dump($custExists);
      $staffExists = $this->checkStaffExists($mobileNo);
      var_dump($staffExists);
      return ($custExists || $staffExists);
   }

   public function checkCustExists($mobileNo)
   {
      $SQLstatement = "SELECT * FROM customers WHERE mobileNo = :mobileNo AND status = 1;";
      $results = $this->customQuery($SQLstatement, [":mobileNo" => $mobileNo]);
      var_dump($results);
      if (empty($results))
         return false;
      else
         return true;
   }

   public function checkStaffExists($mobileNo)
   {
      $SQLstatement = "SELECT * FROM staff WHERE mobileNo = :mobileNo AND status IN (1,2);";
      $results = $this->customQuery($SQLstatement, [":mobileNo" => $mobileNo]);

      if (empty($results))
         return false;
      else
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

   //to remove staf user account when disable staff member
   public function removeUserAccount($mobileNo)
   {
      $this->delete("users", ['mobileNo' => $mobileNo ]); 
   }
}
