<?php
class ClosedDatesModel
{
   private $db;
   public function __construct()
   {
      $this->db = new Database;
   }
   public function checkIfClosed($date)
   {
      // $date = '2021-11-02';
      $this->db->query("SELECT * FROM closeddates WHERE date = '$date';");
      $result = $this->db->resultSet();
      // print_r($result);
      if ($result)
         return true;
      else
         return false;
   }
}
