<?php
class pinVerifyHandlerModel
{
   private $db;
   public function __construct()
   {
      $this->db = new Database;
   }

   // mobileVerification = 1
   // passwordReset      = 2

   public function storeVerificationPIN($mobileNo, $PIN, $type)
   {
      $this->db->query(
         "INSERT INTO pinverification (mobileNo, pin, type) VALUES(:mobileNo, :PIN, :type) ON DUPLICATE KEY UPDATE mobileNo = :mobileNo, pin = :PIN, type = :type;"
      );

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':PIN', $PIN);
      $this->db->bind(':type', $type);
      // $this->db->bind(':datetime', $datetime);

      $this->db->execute();
   }

   public function checkPINExists()
   {
      // returns 0 if doesnt exists
      // returns pin
   }

   public function getVerificationPIN($mobileNo, $type)
   {
      $this->db->query("SELECT * FROM pinverification WHERE (mobileNo = :mobileNo) AND (type = :type)");

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':type', $type);

      $results = $this->db->single();

      return $results;
   }

   public function removeUsedPIN($mobileNo, $type)
   {
      $this->db->query("DELETE FROM pinverification WHERE (mobileNo = :mobileNo) AND (type = :type)");

      $this->db->bind(':mobileNo', $mobileNo);
      $this->db->bind(':type', $type);

      $this->db->execute();
   }
}
