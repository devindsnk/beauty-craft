<?php
class ReservationModel extends Model
{
   public function addReservation($data)
   {
      $results = $this->insert(
         "reservations",
         [
            "customerID" => $data['customerID'],
            "serviceID" => $data['serviceID'],
            "staffID" => $data['staffID'],
            "date" => $data['date'],
            "startTime" => $data['startTime'],
            "remarks" => $data['remarks'],
            "status" => 1
         ]
      );

      return $results;
   }

   public function getAllReservations()
   {
      $SQLquery =
         "SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID;";

      $results = $this->customQuery($SQLquery, []);

      return $results;
   }

   public function getReservationDetailsByID($reservationID)
   {
      $SQLquery =
         "SELECT reservations.reservationID,
                 reservations.date, 
                 reservations.startTime, 
                 services.name AS serviceName, 
                 services.totalDuration, 
                 services.price,
                 staff.fName AS staffFName, 
                 staff.lName AS staffLName, 
                 reservations.remarks,
                 customers.customerID, 
                 customers.fName AS custFName, 
                 customers.lName AS custLName, 
                 customers.mobileNo, 
                 reservations.status  
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID
         WHERE reservations.reservationID = :reservationID;";
      $results = $this->customQuery($SQLquery, [':reservationID' => $reservationID]);

      return $results[0];
   }

   public function getReservationsByCustomer($customerID)
   {
      $SQLquery =
         "SELECT reservations.reservationID, 
                 customers.fName AS custFName, 
                 customers.lName AS custLName, 
                 staff.fName AS staffFName, 
                 staff.lName AS staffLName,
                 reservations.remarks, 
                 reservations.status, 
                 reservations.date, 
                 reservations.startTime, 
                 services.name AS serviceName
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID
         WHERE reservations.customerID = :customerID;";

      $results = $this->customQuery($SQLquery, [':customerID' => $customerID]);
      return $results;
   }

   // START FOR MANAGER OVERVIEW
   public function getTotalIncomeForMangOverview()
   {

      $results = $this->customQuery(
         "SELECT SUM(services.price) AS totalIncome 
         FROM services 
         INNER JOIN reservations
         ON reservations.serviceID = services.serviceID
         WHERE reservations.status=:status",
         [':status' => 4]
      );

      return $results;
   }

   public function getUpcommingReservationsNoForMangOverview()
   {

      $results = $this->customQuery(
         "SELECT COUNT(*) AS upacommingReservations
         FROM reservations
         WHERE status=:status1 OR status=:status2",
         [':status1' => 1, ':status2' => 2]
      );

      return $results;
   }

   public function getMonthlyIncomeAndTotalReservationsForMangOverviewCharts()
   {
      $results = $this->customQuery(
         "SELECT date_format(reservations.date,'%M') AS Month ,sum(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
         FROM services
         INNER JOIN reservations
         ON reservations.serviceID = services.serviceID
         WHERE reservations.status=:status AND year(reservations.date) = YEAR(CURRENT_DATE())
         GROUP BY year(reservations.date), month(reservations.date)
         ORDER BY year(reservations.date), month(reservations.date)",
         [':status' => 4]
      );
      return $results;
   }

   // END FOR MANAGER OVERVIEW

   // START FOR MANAGER UPDATE SERVICE
   public function getUpcommingReservationsForService($sID)
   {
      // upcomming reservations gnn oni 
      $results = $this->customQuery(
         "SELECT * 
         FROM reservations
         WHERE (status=:status1 OR status=:status2) AND serviceID=:sID  AND date >= now() ",
         [':status1' => 1, ':status2' => 2, ':sID' => $sID]
      );
      return $results;
   }

   public function getUpcommingReservationsForSerProv($staffID, $serviceID)
   {
      $results = $this->customQuery(
         "SELECT * 
         FROM reservations
         WHERE (status=:status1 OR status=:status2) AND serviceID=:sID AND staffID=:sProvID AND date >= now() ",
         [':status1' => 1, ':status2' => 2, ':sID' => $serviceID, ':sProvID' => $staffID]
      );
      return $results;
   }
   // END FOR MANAGER UPDATE SERVICE

   // END FOR ANALYTICS
   public function getResDetailsForServiceAnalytics($serviceID,$from,$to)
   {
      if($serviceID!=0){
         $results = $this->customQuery("SELECT reservations.reservationID AS reservationID, staff.fName AS sFName, staff.lName AS sLName, customers.fName AS cFName, customers.lName AS cLName, services.price AS price  
                                       FROM reservations
                                       INNER JOIN staff ON staff.staffID = reservations.staffID
                                       INNER JOIN services ON services.serviceID = reservations.serviceID
                                       -- INNER JOIN serviceproviders ON serviceproviders.serviceID = reservations.serviceID
                                       INNER JOIN customers ON customers.customerID = reservations.customerID
                                       WHERE reservations.status = :status AND ( reservations.date BETWEEN '$from' AND '$to' ) AND services.serviceID =$serviceID 
                                       -- GROUP BY reservations.date 
                                       ORDER BY reservations.date",
                                       [':status' => 4]
                                       );
      }else{
         $results = $this->customQuery("SELECT reservations.reservationID AS reservationID, staff.fName AS sFName, staff.lName AS sLName, customers.fName AS cFName, customers.lName AS cLName, services.price AS price  
                                    FROM reservations
                                    INNER JOIN staff ON staff.staffID = reservations.staffID
                                    INNER JOIN services ON services.serviceID = reservations.serviceID
                                    -- INNER JOIN serviceproviders ON serviceproviders.serviceID = reservations.serviceID
                                    INNER JOIN customers ON customers.customerID = reservations.customerID
                                    WHERE reservations.status = :status AND ( reservations.date BETWEEN '$from' AND '$to' ) 
                                    -- GROUP BY reservations.date 
                                    ORDER BY reservations.date",
                                    [':status' => 4]
                                    );
      }
      return $results;
   }
   public function getResDetailsForServiceProvAnalytics($staffID,$from,$to)
   {
      if($staffID!=0){
         $results = $this->customQuery("SELECT reservations.reservationID AS reservationID, services.name AS sName, customers.fName AS cFName, customers.lName AS cLName, services.price AS price  
                                       FROM reservations
                                       INNER JOIN services ON services.serviceID = reservations.serviceID
                                       -- INNER JOIN serviceproviders ON serviceproviders.serviceID = reservations.serviceID
                                       INNER JOIN customers ON customers.customerID = reservations.customerID
                                       WHERE reservations.status = :status AND ( reservations.date BETWEEN '$from' AND '$to' ) AND reservations.staffID =$staffID 
                                       -- GROUP BY reservations.date 
                                       ORDER BY reservations.date",
                                       [':status' => 4]
                                       );
      }else{
         $results = $this->customQuery("SELECT reservations.reservationID AS reservationID, services.name AS sName, customers.fName AS cFName, customers.lName AS cLName, services.price AS price  
                                    FROM reservations
                                    INNER JOIN services ON services.serviceID = reservations.serviceID
                                    -- INNER JOIN serviceproviders ON serviceproviders.serviceID = reservations.serviceID
                                    INNER JOIN customers ON customers.customerID = reservations.customerID
                                    WHERE reservations.status = :status AND ( reservations.date BETWEEN '$from' AND '$to' ) 
                                    -- GROUP BY reservations.date 
                                    ORDER BY reservations.date",
                                    [':status' => 4]
                                    );
      }
      return $results;
   }
   public function getTotalResForOverallOverview()
   {
      $results = $this->customQuery("SELECT COUNT(reservations.reservationID) AS resCount, SUM(services.price) AS totalIncome
                                    FROM reservations
                                    INNER JOIN services ON services.serviceID = reservations.serviceID
                                    WHERE reservations.status=:status",
                                    [':status' => 4]
                                    );
      return $results;
   }
   // END FOR ANALYTICS

   //FOR SP overview
   public function getReservationsByStaffID($staffID)
   {
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE staffID=:staffID ORDER BY date", [':staffID' => $staffID,]);
      return $results;
   }

   public function getReservationsByStaffIDandDate($staffID, $date)
   {
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE staffID=:staffID AND date=:date ORDER BY date", [':staffID' => $staffID, ':date' => $date]);
      return $results;
   }



   public function getReservationMoreInfoByID($reservationID)
   {
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName,customers.customerNote 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE reservationID=:reservationID ", [':reservationID' => $reservationID,]);

      return $results[0];
   }
   public function getReservationRecallDataByID($reservationID)
   {
      $results = $this->customQuery("SELECT recallrequests.reason AS recallReason,recallrequests.status As recallStatus
      FROM recallrequests 
      WHERE reservationID=:reservationID ", [':reservationID' => $reservationID,]);

      return $results[0];
   }

   public function updateCustomerNote($reservationID, $customerNote)
   {
      //  print_r($data);
      $reservationID = $reservationID;
      $custNote = $customerNote;
      $results = $this->customQuery(
         "UPDATE customers SET customerNote=:custNote WHERE customerID=(SELECT customerID FROM reservations WHERE reservationID=:resID )",
         [':custNote' => $custNote, ':resID' => $reservationID]
      );
   }

   public function updateReservationRecalledState($selectedreservation, $status)
   {
      foreach ($selectedreservation as $value)
      {
         $results = $this->update('reservations', ['status' => $status], ['reservationID' => $value]);
      }
   }

   public function addReservationRecall($selectedreservation)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date("Y-m-d H:i:s");
      $recallReason = "For update the service";

      foreach ($selectedreservation as $value)
      {
         $results =  $this->insert('recallrequests', ['reservationID' => $value, 'reason' => $recallReason, 'requestedDate' => $today, 'status' => 0]);
      }
   }

   public function getRecallReasonByReservationID($selectedreservation)
   {
      $results = $this->getSingle('recallrequests', ['reason'], ['reservationID' => $selectedreservation]);
      return $results->reason;
   }
   public function getReservationRecallDetailsByID($selectedreservation)
   {
      $results = $this->getSingle('recallrequests', ['status'], ['reservationID' => $selectedreservation]);
      return $results->status;
   }
   public function deleteReservationRecallRequest($reservationID)
   {

      $results = $this->delete('recallrequests', ['reservationID' => $reservationID]);
   }

   public function getAllPendingRecallRequests()
   {
      // TODO: check with data in table
      $SQLstatement =
         "SELECT RECALL.reservationID,
                 SERV.name AS serviceName, 
                 STAFF.fName AS staffFName, 
                 STAFF.lName AS staffLName, 
                 CUST.fName AS custFName, 
                 CUST.lName AS custLName, 
                 CUST.mobileNo, 
                 RECALL.reason, 
                 RES.startTime, 
                 RES.date
         FROM recallrequests AS RECALL
         INNER JOIN reservations AS RES ON RES.reservationID = RECALL.reservationID
         INNER JOIN staff AS STAFF ON STAFF.staffID = RES.staffID
         INNER JOIN customers AS CUST  ON CUST.customerID = RES.customerID
         INNER JOIN services AS SERV ON SERV.serviceID = RES.serviceID
         WHERE RECALL.status = 0;";

      $results = $this->customQuery($SQLstatement);
      return $results;
   }

   // Complex reservation process
   ////////////////////////////////////////////////
   // TODO: Create kinda similar methd for sProviders 
   public function getAllocatedResourcesOfSlot($selectedDate, $givenStartTime, $givenEndTime)
   {
      $SQLstatement =
         "SELECT RA.resourceID,
                 SUM(RA.requiredQuantity) AS quantity
               --   RES.reservationID,
               --   RES.date AS resDate,
               --   RES.serviceID,
               --   TS.slotNo,
               --   RES.startTime + TS.startingTime AS slotStartTime,
               --   RES.startTime + TS.startingTime + TS.duration AS slotEndTime
               --   RES.status AS resStatus
                 
         FROM reservations AS RES
         INNER JOIN timeslots AS TS
         ON TS.serviceID = RES.serviceID
         INNER JOIN resourceallocation AS RA
         ON RA.serviceID = RES.serviceID AND RA.slotNo = TS.slotNo
         WHERE RES.date = :selectedDate AND RES.status IN(1,2) AND RES.startTime + TS.startingTime < :givenEndTime AND RES.startTime + TS.startingTime + TS.duration > :givenStartTime
         GROUP BY RA.resourceID;";


      $results = $this->customQuery(
         $SQLstatement,
         [
            ':selectedDate' => $selectedDate,
            ':givenStartTime' => $givenStartTime,
            ':givenEndTime' => $givenEndTime
         ]
      );
      return $results;
   }

   public function getOccupiedSProviders($selectedDate, $givenStartTime, $givenEndTime)
   {
      $SQLstatement =
         "SELECT RES.staffID
               --   RES.reservationID,
               --   RES.serviceID,
               --   RES.date AS resDate,
               --   TS.slotNo,
               --   RES.startTime + TS.startingTime AS slotStartTime,
               --   RES.startTime + TS.startingTime + TS.duration AS slotEndTime,
               --   RES.status AS resStatus
         FROM reservations AS RES
         INNER JOIN timeslots AS TS
         ON TS.serviceID = RES.serviceID
         WHERE RES.date = :selectedDate AND RES.status IN(1, 2) AND RES.startTime + TS.startingTime < :givenEndTime AND RES.startTime + TS.startingTime + TS.duration > :givenStartTime;";


      $results = $this->customQuery(
         $SQLstatement,
         [
            ':selectedDate' => $selectedDate,
            ':givenStartTime' => $givenStartTime,
            ':givenEndTime' => $givenEndTime
         ]
      );
      return $results;
   }

   ////////////////////////////////////////////////

   public function markRecallResponded($reservationID)
   {
      $results = $this->update(
         "recallrequests",
         ["status" => 1],
         ["reservationID" => $reservationID]
      );
      return $results;
   }

   public function cancelReservation($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 0],
         ["reservationID" => $reservationID]
      );
      return $results;
   }

   public function markReservationConfirmed($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 2],
         ["reservationID" => $reservationID]
      );
      return $results;
   }

   public function markReservationNoShow($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 3],
         ["reservationID" => $reservationID]
      );
      return $results;
   }

   public function markReservationCompleted($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 4],
         ["reservationID" => $reservationID]
      );
      return $results;
   }

   public function storeFeedback($reservationID, $rating, $comment)
   {
      $results = $this->insert(
         "feedback",
         [
            "reservationID" => $reservationID,
            "rating" => $rating,
            "testimonial" => $comment
         ]
      );

      return $results;
   }
}
