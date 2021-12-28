<?php
class LeaveModel extends Model
{

   public function getLeaveRecordsBystaffID($staffID)
   {
      $results = $this->customQuery("SELECT * FROM generalleaves WHERE staffID =:staffID ORDER BY leaveDate", [':staffID' => $staffID,]);
      return $results;
   }


   public function getLeaveLimit()
   {

      $results = $this->customQuery("SELECT generalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)", []);
      //  print_r($results[0]->{'leaveLimit'}); 
      //  die("Leave limit");  
      return $results[0]->{'generalLeave'};
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
      //  print_r($results[0]->{'COUNT(*)'});
      //  die("hhh");
      return $results[0]->{'COUNT(*)'};
   }

   public function requestleave($data)
   {

      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');
      $results = $this->insert('generalleaves', ['staffID' => $data['staffID'], 'leaveDate' => $data['date'], 'requestedDate' => $today, 'reason' => $data['reason'], 'leaveType' => $data['leavetype']]);
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
      //$staffID='000001';
      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=MONTH(:date) and YEAR(leaveDate)=YEAR(:date)) AND (staffID= :staffID) AND (status=1 OR status=2)");
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':staffID', $data['staffID']);
      $result = $this->db->single();

      //$num2 = ($data['leaveCount']->{'COUNT(*)'});
      // echo $result->{'COUNT(*)'};
      //print_r($result);

      return $result->{'COUNT(*)'};
   }







   public function getLeaveCountOfSelectedMonth($data)
   {
      $staffID = '000001';
      $this->db->query("SELECT COUNT(*)  FROM generalleaves WHERE (MONTH(leaveDate)=:month and YEAR(leaveDate)=:year) AND (staffID=:staffID) AND (status=1 OR status=2)");
      $this->db->bind(':month', $data['month']);
      $this->db->bind(':year', $data['year']);
      $this->db->bind(':staffID', $staffID);
      $result = $this->db->single();

      //$num2 = ($data['leaveCount']->{'COUNT(*)'});
      //echo $result->{'COUNT(*)'};
      //print_r($result);

      return $result->{'COUNT(*)'};
   }
   //////////////////////////////////////////
   public function getAllLeaveRequests()
   {

      $results = $this->customQuery("SELECT * 
                                    FROM generalleaves
                                    WHERE leaveDate >= now() 
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
   public function getRelevantMonthsMedicalLeaveCount($staffID, $leaveDate, $leaveType)
   {

      $results = $this->customQuery(
                        "SELECT COUNT(*) AS leaveCount FROM generalleaves WHERE MONTH(leaveDate)=MONTH(:leaveDate) AND YEAR(leaveDate)=YEAR(:leaveDate) AND (staffID=:staffID) AND (status=1 OR status=2) AND leaveType=:leaveType",
                        [':staffID' => $staffID, ':leaveDate' => $leaveDate, ':leaveType' =>$leaveType]
                     );
      
      return $results[0]->{'leaveCount'};
   }

   public function getLeaveLimitsForManagerApproval()
   {

      $results = $this->customQuery(
                        "SELECT generalLeave,medicalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)", []);
      
      return $results;
   }
   public function addLeaveResponce($responce, $staffID, $leaveDate)
   {

      $ManagerID = Session::getUser("id");

      $results = $this->update('generalleaves', ['respondedStaffID' => $ManagerID, 'status' => $responce,], ['staffID' => $staffID, 'leaveDate' => $leaveDate]);
   }
   ///////////////////////////////////////////

   public function getAllManagerLeaves()
   {

      $ManagerID = Session::getUser("id");
      $results = $this->customQuery("SELECT * 
                                    FROM managerLeaves 
                                    WHERE staffID = :staffID AND leaveDate >= now() OR MONTH(leaveDate) >= MONTH(now())
                                    ORDER BY leaveDate",
                                    [':staffID' => $ManagerID]);

      return $results;
   }
   public function getOneManagerLeave($leaveID, $userID)
   {
      $results = $this->customQuery("SELECT * 
                                    FROM managerLeaves 
                                    WHERE staffID = :staffID AND leaveDate= :leaveDate",
                                    [':staffID' => $userID ,':leaveDate' => $leaveID]);

      return $results;
   }
   public function checkForDateState($date)
   {
      $results = $this->getResultSet('managerLeaves', '*', ['leaveDate' => $date]);

      if (!empty($results))
         return 1;
      else
         return 2;
   }
   public function addMangLeave($data)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');
      $results = $this->insert('managerleaves', ['staffID' => $data['staffID'], 'leaveDate' => $data['date'], 'markedDate' => $today, 'reason' => $data['reason'], 'leaveType' => $data['leavetype']]);
   }
   public function updateMangLeave($data, $staffID, $leaveID)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');
      // print_r($data['date']);
      // print_r($data['leavetype']);
      // print_r($data['reason']);

      // die('mangLeaves');

      // $results = $this->customQuery("UPDATE managerleaves
      //                               SET leaveDate = :leaveDate, markedDate= :markedDate, reason =:reason, leaveType =:leaveType
      //                               WHERE staffID = :staffID",
      //                               [':staffID' => $userID , ':leaveDate' => $data['leaveDate'], ':markedDate' => $today, ':reason' => $data['reason'], ':leaveType' => $data['leavetype']]);

      $results = $this->update('managerleaves',[ 'markedDate' => $today, 'reason' => $data['reason'], 'leaveType' => $data['leavetype']], ['staffID' => $staffID, 'leaveDate' => $leaveID] );

   }
   public function deleteMangLeave($leaveDate, $staffID)
   {
      $results = $this->delete('managerleaves', ['leaveDate' => $leaveDate, 'staffID' => $staffID]);
   }
   // FOR MANAGER OVERVIEW
   public function getPendingLeaveRequestCount()
   {

      $results = $this->getRowCount('generalleaves', ['status' => 2, 'leaveType' => 'casual']);

      return $results;
   }
   // FOR MANAGER OVERVIEW
}
