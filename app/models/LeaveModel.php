<?php
class LeaveModel extends Model
{

   public function getLeaveRecordsBystaffID($staffID)
   {
      $results = $this->customQuery("SELECT * FROM generalleaves WHERE staffID =:staffID ORDER BY leaveDate", [':staffID' => $staffID,]);
      return $results;
   }


   public function getGeneralLeaveLimit()
   {

      $results = $this->customQuery("SELECT generalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)", []);
      //  print_r($results[0]->{'leaveLimit'}); 
      //  die("Leave limit");  
      return $results[0]->{'generalLeave'};
   }
   public function getMedicalLeaveLimit()
   {

      $results = $this->customQuery("SELECT medicalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)", []);
      //  print_r($results[0]->{'leaveLimit'}); 
      //  die("Leave limit");  
      return $results[0]->{'medicalLeave'};
   }

   public function cancelLeaveRequest($date, $staffID)
   {
      $results = $this->delete('generalleaves', ['leavedate' => $date, 'staffID' => $staffID]);
   }

   //   leave Approved=1 pending=2 rejected=0 
   public function getCurrentMonthLeaveCount($staffID)
   {

      $results = $this->customQuery(
         "SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=MONTH(now()) and YEAR(leaveDate)=YEAR(now())) AND (staffID=:staffID) AND (status=1 OR status=2)",
         [
            ':staffID' => $staffID,

         ]
      );

      return $results[0]->{'COUNT(*)'};
   }

   public function requestleave($data)
   {

      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');
      $results = $this->insert('generalleaves', ['staffID' => $data['staffID'], 'leaveDate' => $data['date'], 'requestedDate' => $today, 'reason' => $data['reason'], 'status' => 2, 'leaveType' => $data['leavetype']]);
   }



   public function checkExsistingLeaveRequestDay($date)
   {


      // $this->db->query("SELECT * FROM generalleaves WHERE leavedate = :date");
      // $this->db->bind(':date', $date);
      // $result = $this->db->resultSet();

      $results = $this->getResultSet('generalleaves', '*', ['leavedate' => $date]);

      //   print_r($result);
      if (empty($results))
      {
         return 0;
      }
      else
      {
         return 1;
      }
   }




   public function checkLeaveDate($data)
   {

      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=MONTH(:date) and YEAR(leaveDate)=YEAR(:date)) AND (staffID= :staffID) AND (status=1 OR status=2)");
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':staffID', $data['staffID']);
      $result = $this->db->single();


      return $result->{'COUNT(*)'};
   }







   public function getLeaveCountOfSelectedMonth($month, $year, $staffID, $ltype)
   {


      $results = $this->customQuery(

         "SELECT COUNT(*) AS leaveCount FROM generalleaves WHERE (MONTH(leaveDate)=:month and YEAR(leaveDate)=:year) AND (staffID=:staffID) AND leaveType=:ltype AND (status=1 OR status=2 OR status=3)",
         [
            ':month' => $month,
            ':year' => $year,
            ':staffID' => $staffID,
            ':ltype' => $ltype


         ]
      );
      return $results[0]->{'leaveCount'};
      // return 2;
   }

   public function getSelectedLeaveDetails($date, $user)
   {
      $results = $this->getResultSet('generalleaves', ['leaveDate', 'reason', 'leaveType'], ['leaveDate' => $date, 'staffID' => $user]);
      return $results[0];
   }

   public function getAllLeaveRequests()
   {

      $results = $this->customQuery("SELECT * 
                                    FROM generalleaves 
                                    ORDER BY leaveDate", []);

      return $results;
   }

   public function getOneLeaveDetail($staffID, $leaveDate)
   {

      $results = $this->customQuery(
         "SELECT * 
                                    FROM generalleaves 
                                    INNER JOIN staff
                                    ON staff.staffID = generalleaves.staffID
                                    WHERE generalleaves.staffID=:staffID AND leaveDate=:leaveDate",
         [':staffID' => $staffID, ':leaveDate' => $leaveDate]
      );

      return $results;
   }

   public function addLeaveResponce($responce, $staffID, $leaveDate)
   {

      $ManagerID = Session::getUser("id");

      $results = $this->update('generalleaves', ['respondedStaffID' => $ManagerID, 'status' => $responce,], ['staffID' => $staffID, 'leaveDate' => $leaveDate]);
   }

   public function getAllManagerLeaves()
   {

      $ManagerID = Session::getUser("id");
      $results = $this->customQuery("SELECT * 
                                    FROM managerLeaves 
                                    WHERE staffID = :staffID ORDER BY leaveDate", [':staffID' => $ManagerID]);

      return $results;
   }

   // FOR MANAGER OVERVIEW
   public function getPendingLeaveRequestCount()
   {

      $results = $this->getRowCount('generalleaves', ['status' => 2, 'leaveType' => 'casual']);

      return $results;
   }
   // FOR MANAGER OVERVIEW
}
