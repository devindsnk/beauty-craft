<?php
class LeaveModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function requestleave($data)
   {

      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');

      $res = $this->db->query("INSERT INTO generalleaves (staffID, leaveDate, requestedDate, reason) VALUES('000001', :date , '{$today}', :reason)");
     

      $this->db->bind(':date', $data['date']);
      $this->db->bind(':reason', $data['reason']);

      $this->db->execute();

   }

   // public function getLeaveByID(){
   //    $this->db->('SELECT * FROM generalleaves WHERE staffID ='000001'');
   //    $this->db->bind(':staffID',$staffID);
   //    $row =$this->db->single();
   //    return $row;
   // }

  
}
