<?php
class LeaveModel
{
   private $db;
   public function __construct()
   {
      $this->db = new Database;
   }

   public function getLeaveRecordsBystaffID($staffID){
      $this->db->query("SELECT * FROM generalleaves WHERE (staffID =:staffID) ORDER BY leaveDate");
      $this->db->bind(':staffID',$staffID );
      $result = $this->db->resultSet();
      //print_r($result);
      return $result;
   }

   public function getLeaveLimit(){
      $this->db->query("SELECT leaveLimit FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)");
   
      $result = $this->db->single();
      return $result->leaveLimit;
   }

   //   leave Approved=1 pending=2 rejected=0 
   public function getCurrentMonthLeaveCount($staffID){

      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=MONTH(now()) and YEAR(leaveDate)=YEAR(now())) AND (staffID=:staffID) AND (status=1 OR status=2)");
      $this->db->bind(':staffID',$staffID);
      $result = $this->db->single();
      return $result->{'COUNT(*)'};
   }













public function checkLeaveDate($data){
 //$staffID='000001';
      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=MONTH(:date) and YEAR(leaveDate)=YEAR(:date)) AND (staffID= :staffID) AND (status=1 OR status=2)");
      $this->db->bind(':date', $data['date']);
       $this->db->bind(':staffID',$data['staffID']);
      $result = $this->db->single();

//$num2 = ($data['leaveCount']->{'COUNT(*)'});
     // echo $result->{'COUNT(*)'};
       //print_r($result);
      
      return $result->{'COUNT(*)'};
}



   public function requestleave($data)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');

      $res = $this->db->query("INSERT INTO generalleaves (staffID, leaveDate, requestedDate, reason) VALUES(:staffID', :date , '{$today}', :reason)");
      $this->db->bind(':staffID',$data['staffID']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':reason', $data['reason']);

      $this->db->execute();

   }


   





 public function checkExsistingDate($data){

      $this->db->query("SELECT * FROM generalleaves WHERE leavedate ='$date'");
    
      $result = $this->db->resultSet();
      //   print_r($result);
      if(!empty($result)){
         return $result;
   
      }
   }


   public function getLeaveCountOfSelectedMonth($data){
 $staffID='000001';
      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=:month and YEAR(leaveDate)=:year) AND (staffID=:staffID) AND (status=1 OR status=2)");
      $this->db->bind(':month', $data['month']);
       $this->db->bind(':year', $data['year']);
       $this->db->bind(':staffID',$staffID);
      $result = $this->db->single();

//$num2 = ($data['leaveCount']->{'COUNT(*)'});
     // echo $result->{'COUNT(*)'};
       //print_r($result);
      
      return $result->{'COUNT(*)'};
}

}