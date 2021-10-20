<?php
class SMSHandlerModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }
}
