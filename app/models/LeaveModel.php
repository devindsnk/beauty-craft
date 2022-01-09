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
      return $results[0]->{'generalLeave'};
   }

   public function getMedicalLeaveLimit()
   {
      $results = $this->customQuery("SELECT medicalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)", []);
      return $results[0]->{'medicalLeave'};
   }

   public function cancelLeaveRequest($date, $staffID)
   {
      $results = $this->delete('generalleaves', ['leavedate' => $date, 'staffID' => $staffID]);
   }

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
      $results = $this->getResultSet('generalleaves', '*', ['leavedate' => $date]);
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
   }


   public function getSelectedLeaveDetails($date, $user)
   {
      $results = $this->getResultSet('generalleaves', ['leaveDate', 'reason', 'leaveType'], ['leaveDate' => $date, 'staffID' => $user]);
      return $results[0];
   }


   public function checkHaveReservationByDate($date, $user)
   {
      $results = $this->customQuery("SELECT * FROM reservations WHERE date=:date AND staffID=:user AND(status=1 OR status=2)", [
         ':date' => $date,
         ':user' => $user,
      ]);
      if (!empty($results))
         return 1;
      else
         return 2;
   }


   public function checkSalonClosedDates($date)
   {
      $results = $this->getSingle('closeddates', '*', ['date' => $date]);
      if (!empty($results))
         return 1;
      else
         return 2;
   }


   public function getEvidenceLimit()
   {
      $results = $this->customQuery(
         "SELECT evidenceLimit 
                                    FROM leavelimits 
                                    WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)",
         []
      );
      return $results[0]->{'evidenceLimit'};
   }


   public function changeMedicalToCasual($staffID, $leaveDate)
   {
      $responce = 3;
      $leaveType = 1;
      $results = $this->update('generalleaves', ['leaveType' => $leaveType, 'status' => $responce,], ['staffID' => $staffID, 'leaveDate' => $leaveDate]);
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
         "SELECT staff.staffID,staff.fName,staff.staffType, generalleaves.leaveDate,generalleaves.leaveType, generalleaves.reason, generalleaves.status
                                    FROM generalleaves 
                                    INNER JOIN staff
                                    ON staff.staffID = generalleaves.staffID
                                    WHERE generalleaves.staffID=:staffID AND leaveDate=:leaveDate",
         [':staffID' => $staffID, ':leaveDate' => $leaveDate]
      );

      return $results;
   }


   public function getRelevantMonthsLeaveCount($staffID, $leaveDate, $leaveType)
   {

      $results = $this->customQuery(
         "SELECT COUNT(*) AS leaveCount FROM generalleaves WHERE MONTH(leaveDate)=MONTH(:leaveDate) AND YEAR(leaveDate)=YEAR(:leaveDate) AND (staffID=:staffID) AND (status=1 OR status=2 OR status=3) AND leaveType=:leaveType",
         [':staffID' => $staffID, ':leaveDate' => $leaveDate, ':leaveType' => $leaveType]
      );

      return $results[0]->{'leaveCount'};
   }


   public function getLeaveLimitsForManagerApproval()
   {

      $results = $this->customQuery(
         "SELECT generalLeave,medicalLeave FROM leavelimits WHERE changedDate =(SELECT MAX(changedDate)FROM leavelimits)",
         []
      );

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
      $results = $this->customQuery(
         "SELECT * 
                                    FROM managerLeaves 
                                    WHERE staffID = :staffID AND (leaveDate >= now() OR MONTH(leaveDate) >= MONTH(now()))
                                    ORDER BY leaveDate",
         [':staffID' => $ManagerID]
      );

      return $results;
   }


   public function getOneManagerLeave($leaveID, $userID)
   {
      $results = $this->customQuery(
         "SELECT * 
                                    FROM managerLeaves 
                                    WHERE staffID = :staffID AND leaveDate= :leaveDate",
         [':staffID' => $userID, ':leaveDate' => $leaveID]
      );

      return $results;
   }


   public function getmangCasualLeaveLimit()
   {
      $results = $this->customQuery("SELECT managerGeneralLeave 
                                    FROM leavelimits 
                                    WHERE changedDate =(SELECT MAX(changedDate) FROM leavelimits)", []);

      return $results[0]->{'managerGeneralLeave'};
   }


   public function getmangMedicalLeaveLimit()
   {
      $results = $this->customQuery("SELECT managerMedicalLeave 
                                    FROM leavelimits 
                                    WHERE changedDate =(SELECT MAX(changedDate) FROM leavelimits)", []);

      return $results[0]->{'managerMedicalLeave'};
   }


   public function getMangCurrentMonthLeaveCount($userID, $leaveType)
   {
      $results = $this->customQuery(
         "SELECT COUNT(*) AS takenLeaveCount
                                    FROM managerLeaves 
                                    WHERE (MONTH(leaveDate) = MONTH(now()) AND YEAR(leaveDate) = YEAR(now())) AND (staffID=:staffID) AND leaveType = :leaveType",
         [':staffID' => $userID, ':leaveType' => $leaveType]
      );
      return $results[0]->{'takenLeaveCount'};
   }


   public function getMangRelevantMonthLeaveCount($userID, $leaveType, $selectedDate)
   {
      $results = $this->customQuery(
         "SELECT COUNT(*) AS takenLeaveCount
                                    FROM managerLeaves 
                                    WHERE (MONTH(leaveDate) = MONTH(:leaveDate) AND YEAR(leaveDate) = YEAR(:leaveDate)) AND (staffID=:staffID) AND leaveType = :leaveType",
         [':staffID' => $userID, ':leaveType' => $leaveType, ':leaveDate' => $selectedDate]
      );
      return $results[0]->{'takenLeaveCount'};
   }


   public function checkForDateState($date)
   {
      $ManagerID = Session::getUser("id");
      $results = $this->getResultSet('managerLeaves', '*', ['leaveDate' => $date, 'staffID' => $ManagerID]);

      if (!empty($results))
         return 1;
      else
         return 2;
   }


   public function checkForAllLeavesForADate($date)
   {
      $results = $this->getResultSet('managerLeaves', '*', ['leaveDate' => $date]);

      return count($results);
   }


   public function getmangDailyLeaveLimit()
   {
      $results = $this->customQuery("SELECT managerDailyLeave 
                                    FROM leavelimits 
                                    WHERE changedDate =(SELECT MAX(changedDate) FROM leavelimits)", []);

      return $results[0]->{'managerDailyLeave'};
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

      $results = $this->update('managerleaves', ['markedDate' => $today, 'reason' => $data['reason'], 'leaveType' => $data['leavetype']], ['staffID' => $staffID, 'leaveDate' => $leaveID]);
   }


   public function deleteMangLeave($leaveDate, $staffID)
   {
      $results = $this->delete('managerleaves', ['leaveDate' => $leaveDate, 'staffID' => $staffID]);
   }

   public function getPendingLeaveRequestCount()
   {
      $results = $this->customQuery("SELECT * 
                                    FROM generalleaves 
                                    WHERE status = 2 AND (leaveType = 1 OR leaveType = 2)", []);

      return $results;
   }

   public function casualLeaveByStaffID($staffID, $staffType)
   {
      $time = strtotime($dateValue);
      $month = date("F", $time);
      $year = date("Y", $time);

      $results = $this->getResultSet('generalleaves', '*', ['staffID' => $staffID, 'status' => 4, 'leaveType' => 'casual']);
      print_r($results);
      return $results;
   }

   public function managerCasualLeaveByStaffID($staffID, $staffType)
   {
      $results = $this->getResultSet('generalleaves', '*', ['staffID' => $staffID, 'status' => 4, 'leaveType' => 'casual']);
      print_r($results);
      return $results;
   }
}
