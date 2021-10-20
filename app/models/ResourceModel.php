<?php
class ResourceModel
{
   private $db;
   public function __construct()
   {
      $this->db = new Database;
   }
   public function addResourceDetails($data)
   {
      // print_r($data);
      $this->db->query("INSERT INTO resources(name, quantity) VALUES(:name,:quantity)");
      $this->db->bind(':name', $data['resourceName']);
      $this->db->bind(':quantity', $data['resourceQuantity']);

      $this->db->execute();
   }  
}