<?php
class pinVerifyHandlerModel extends Model
{
   // private $db;
   // public function __construct()
   // {
   //    $this->db = new Database;
   // }

   // mobileVerification = 1
   // passwordReset      = 2

   public function storeVerificationPIN($mobileNo, $PIN, $type)
   {
      $this->customQuery("INSERT INTO pinverification (mobileNo, pin, type) VALUES($mobileNo, $PIN, $type) ON DUPLICATE KEY UPDATE mobileNo =  $mobileNo, pin = $PIN, type = $type;");
      // $this->db->query(
      //    "INSERT INTO pinverification (mobileNo, pin, type) VALUES(:mobileNo, :PIN, :type) ON DUPLICATE KEY UPDATE mobileNo = :mobileNo, pin = :PIN, type = :type;"
      // );

      // $this->db->bind(':mobileNo', $mobileNo);
      // $this->db->bind(':PIN', $PIN);
      // $this->db->bind(':type', $type);
      // // $this->db->bind(':datetime', $datetime);

      // $this->db->execute();
   }

   public function checkPINExists()
   {
      // returns 0 if doesnt exists
      // returns pin
   }

   public function getVerificationPIN($mobileNo, $type)
   {
      $results = $this->getSingle("pinverification", "*", ["mobileNo" => $mobileNo, "type" => $type]);
      // $this->db->query("SELECT * FROM pinverification WHERE (mobileNo = :mobileNo) AND (type = :type)");

      // $this->db->bind(':mobileNo', $mobileNo);
      // $this->db->bind(':type', $type);

      // $results = $this->db->single();

      return $results;
   }

   public function removeUsedPIN($mobileNo, $type)
   {
      $this->delete("pinverification", ["mobileNo" => $mobileNo, "type" => $type]);
      // $this->db->query("DELETE FROM pinverification WHERE (mobileNo = :mobileNo) AND (type = :type)");

      // $this->db->bind(':mobileNo', $mobileNo);
      // $this->db->bind(':type', $type);

      // $this->db->execute();
   }
}
