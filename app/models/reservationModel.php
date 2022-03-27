<?php
class ReservationModel extends Model
{
   public function addReservation($data)
   {
      $daysAhead = DateTimeExtended::getDateDiff($data['date']);
      $status = ($daysAhead > 7) ? 1 : 2;

      $results = $this->insert(
         "reservations",
         [
            "customerID" => $data['customerID'],
            "serviceID" => $data['serviceID'],
            "staffID" => $data['staffID'],
            "date" => $data['date'],
            "startTime" => $data['startTime'],
            "remarks" => $data['remarks'],
            "status" => $status
         ]
      );

      return $results;
   }

   public function editReservation($data)
   {
      $daysAhead = DateTimeExtended::getDateDiff($data['date']);
      $status = ($daysAhead > 7) ? 1 : 2;

      $results = $this->update(
         "reservations",
         [
            "staffID" => $data['staffID'],
            "date" => $data['date'],
            "startTime" => $data['startTime'],
            "remarks" => $data['remarks'],
            "status" => $status
         ],
         ["reservationID" => $data['reservationID']]
      );

      return $results;
   }

   // ************************************************* //
   // ******* Get reservations (by conditions) ******** //

   public function getAllReservationsWithFilters($sType, $sProvider, $status)
   {
      $conditions = array();

      // Extract specially defined conditions to a separate array
      // Note that both tableName and columnName are used as the keys
      if ($sType != "all") $conditions["services.type"] = $sType;
      if ($sProvider != "all") $conditions["reservations.staffID"] = $sProvider;
      if ($status != "all") $conditions["reservations.status"] = $status;

      $preparedConditions = array();
      $dataToBind = array();

      foreach ($conditions as $column => $value)
      {
         $colName = explode(".", $column, 2)[1]; // Only taking the column name for binding (discards tableName)
         array_push($preparedConditions, "$column = :$colName");
         $dataToBind[":$colName"] = $value;
      }
      $conditionsString = implode(" AND ", $preparedConditions); // Joining conditions with AND

      $SQLstatement =
         "SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName, reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID";

      // Appending conditions string
      if (!empty($conditions)) $SQLstatement .= " WHERE $conditionsString";

      $SQLstatement .= " ORDER BY reservations.date DESC, reservations.startTime ASC, reservations.reservationID ASC";

      $results = $this->customQuery($SQLstatement,  $dataToBind);
      return $results;
   }

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

   // Return all reservations excluding cancelled and recalled
   public function getUpcomingReservationsByDate($date)
   {
      $SQLquery =
         "SELECT reservations.reservationID, 
                 customers.fName AS custFName, 
                 customers.lName AS custLName, 
                 customers.mobileNo AS custMobileNo,
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
         WHERE reservations.date = :date AND reservations.status NOT IN (0,5) ;";

      $results = $this->customQuery($SQLquery, [':date' => $date]);
      return $results;
   }

   // Return all reservations of the staffMember excluding cancelled and recalled
   public function getUpcomingReservationsByDateAndStaff($date, $sProvider)
   {
      $SQLquery =
         "SELECT reservations.reservationID, 
                 customers.fName AS custFName, 
                 customers.lName AS custLName, 
                 customers.mobileNo AS custMobileNo,
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
         WHERE reservations.date = :date AND reservations.staffID = :sProvider AND reservations.status NOT IN (0,5) ;";

      $results = $this->customQuery($SQLquery, [':date' => $date, ':sProvider' => $sProvider]);
      return $results;
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

   public function getReservationMoreInfoByID($reservationID)
   {
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName,customers.customerNote 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE reservationID=:reservationID ", [':reservationID' => $reservationID,]);
      // $results[0]['startTime'] = DateTimeExtended::minsToTime($results[0]['startTime']);

      // $r = $reservationData['startTime'];
      return $results[0];
   }
   public function getReservationsByStaffIDForSpRes($staffID, $rDate = 'all', $rService = 'all', $rType = 'all')
   {


      $conditions = array();

      // // Extract specially defined conditions to a separate array
      // // Note that both tableName and columnName are used as the keys
      if ($rDate != "all") $conditions["RES.date"] = $rDate;
      if ($rService != "all") $conditions["services.serviceID"] = $rService;
      if ($rType != "all") $conditions["RES.status"] = $rType;

      $preparedConditions = array();
      $dataToBind = array();

      foreach ($conditions as $column => $value)
      {
         $colName = explode(".", $column, 2)[1]; // Only taking the column name for binding (discards tableName)
         array_push($preparedConditions, "$column = :$colName");
         $dataToBind[":$colName"] = $value;
      }

      $consditionsString = implode(" AND ", $preparedConditions); // Joining conditions with AND

      $SQLstatement =
         "SELECT RES.date, RES.reservationID, RES.startTime, RES.endTime, RES.remarks, RES.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM (SELECT * FROM reservations WHERE staffID = :staffID) AS RES
      INNER JOIN services ON services.serviceID =  RES.serviceID
      INNER JOIN customers ON customers.customerID =  RES.customerID";

      $dataToBind[":staffID"] = $staffID;

      // Appending conditions string
      if (!empty($conditions)) $SQLstatement .= " WHERE $consditionsString";
      $SQLstatement .= " ORDER BY RES.date DESC, RES.startTime ASC, RES.reservationID  ASC";

      $results = $this->customQuery($SQLstatement,  $dataToBind);

      return $results;
   }

   public function getTodayReservationDetailsByID($staffID, $rType = 1)
   {

      date_default_timezone_set("Asia/Colombo");
      $today = date('Y-m-d');
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE staffID=:staffID AND reservations.status IN(1,2,4) AND reservations.date=:date ORDER BY date", [':staffID' => $staffID, ':date' => $today]);
      // print_r($results);
      // die("ruwa");
      return $results;
   }
   public function getReservationCompleteCountByID($staffID)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date("Y-m-d");
      $results = $this->customQuery(
         "SELECT COUNT(*) AS completeCount
         FROM reservations
         WHERE staffID=:staffID AND status=:status AND date=:date",
         [':staffID' => $staffID, ':status' => 4, ':date' => $today]
      );
      // print_r($results[0]->completeCount);
      // die("HI");
      return $results[0]->completeCount;
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

   public function getReservationNamesByStaffID($staffID)
   {
      $results = $this->customQuery("SELECT DISTINCT services.name,services.serviceID FROM reservations INNER JOIN services ON reservations.serviceID =services.serviceID where reservations.staffID=$staffID ");

      return $results;
      // print_r($results);
      // die();
   }
   // ************************************************* //
   // ************************************************* //


   // ************************************************* //
   // ******** Complex reservation process ************ //

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

   public function getAllocatedResourcesOfSlotForEdit($selectedDate, $givenStartTime, $givenEndTime, $reservationID)
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
                 
         FROM ( SELECT * FROM reservations WHERE reservationID <> :resID) AS RES
         INNER JOIN timeslots AS TS
         ON TS.serviceID = RES.serviceID
         INNER JOIN resourceallocation AS RA
         ON RA.serviceID = RES.serviceID AND RA.slotNo = TS.slotNo
         WHERE RES.date = :selectedDate AND RES.status IN(1,2) AND RES.startTime + TS.startingTime < :givenEndTime AND RES.startTime + TS.startingTime + TS.duration > :givenStartTime
         GROUP BY RA.resourceID;";


      $results = $this->customQuery(
         $SQLstatement,
         [
            ':resID' => $reservationID,
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

   public function getOccupiedSProvidersForEdit($selectedDate, $givenStartTime, $givenEndTime, $reservationID)
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
         FROM ( SELECT * FROM reservations WHERE reservationID <> :resID) AS RES
         INNER JOIN timeslots AS TS
         ON TS.serviceID = RES.serviceID
         WHERE RES.date = :selectedDate AND RES.status IN(1, 2) AND RES.startTime + TS.startingTime < :givenEndTime AND RES.startTime + TS.startingTime + TS.duration > :givenStartTime;";


      $results = $this->customQuery(
         $SQLstatement,
         [
            ':resID' => $reservationID,
            ':selectedDate' => $selectedDate,
            ':givenStartTime' => $givenStartTime,
            ':givenEndTime' => $givenEndTime
         ]
      );
      return $results;
   }
   // ************************************************* //
   // ************************************************* //
   //FOR SP overview

   // ************************************************** //
   // *Functions related state changes of reservations * //

   public function markReservationConfirmed($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 2],
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

   public function markReservationCancelled($reservationID)
   {
      $results = $this->update(
         "reservations",
         ["status" => 0],
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
   // ************************************************** //
   // ************************************************** //

   // ************************************************** //
   // ******* Functions related recall requests ******** //

   public function addReservationRecall($resID, $recallReason)
   {
      date_default_timezone_set("Asia/Colombo");
      $today = date("Y-m-d H:i:s");

      if (is_array($resID))
      {
         foreach ($resID as $value)
         {
            $results =  $this->insert('recallrequests', ['reservationID' => $value, 'reason' => $recallReason, 'requestedDate' => $today, 'status' => 0]);
         }
      }
      else
      {
         $results =  $this->insert('recallrequests', ['reservationID' => $resID, 'reason' => $recallReason, 'requestedDate' => $today, 'status' => 0]);
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

   public function getReservationRecallDataByID($reservationID)
   {
      $results = $this->customQuery("SELECT recallrequests.reason AS recallReason,recallrequests.status As recallStatus
      FROM recallrequests 
      WHERE reservationID=:reservationID ", [':reservationID' => $reservationID,]);

      return $results[0];
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

   public function markRecallResponded($reservationID)
   {
      $results = $this->update(
         "recallrequests",
         ["status" => 1],
         ["reservationID" => $reservationID]
      );
      return $results;
   }
   // ************************************************** //
   // ************************************************** //

   public function updateCustomerNote($reservationID, $customerNote)
   {
      $reservationID = $reservationID;
      $custNote = $customerNote;
      $results = $this->customQuery(
         "UPDATE customers SET customerNote=:custNote WHERE customerID=(SELECT customerID FROM reservations WHERE reservationID=:resID )",
         [':custNote' => $custNote, ':resID' => $reservationID]
      );
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
         "SELECT reservationID 
         FROM reservations
         WHERE (status=:status1 OR status=:status2) AND serviceID=:sID AND staffID=:sProvID AND date >= now() ",
         [':status1' => 1, ':status2' => 2, ':sID' => $serviceID, ':sProvID' => $staffID]
      );
      return $results;
   }
   // END FOR MANAGER UPDATE SERVICE

   // START FOR ANALYTICS
   public function getResDetailsForServiceAnalytics($serviceID, $from, $to)
   {
      if ($serviceID != 0)
      {
         $results = $this->customQuery(
            "SELECT reservations.reservationID AS reservationID, 
                    staff.fName AS sFName, 
                    staff.lName AS sLName, 
                    customers.fName AS cFName, 
                    customers.lName AS cLName, 
                    services.price AS price  
            FROM reservations
            INNER JOIN staff ON staff.staffID = reservations.staffID
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN customers ON customers.customerID = reservations.customerID
            WHERE reservations.status = :status AND ( DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to' ) AND services.serviceID =$serviceID 
            ORDER BY DATE_FORMAT(reservations.date, '%Y-%m')",
            [':status' => 4]
         );
      }
      else
      {
         $results = $this->customQuery(
            "SELECT reservations.reservationID AS reservationID, 
                    staff.fName AS sFName, 
                    staff.lName AS sLName, 
                    customers.fName AS cFName, 
                    customers.lName AS cLName, 
                    services.price AS price  
            FROM reservations
            INNER JOIN staff ON staff.staffID = reservations.staffID
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN customers ON customers.customerID = reservations.customerID
            WHERE reservations.status = :status AND ( DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to' ) 
            ORDER BY DATE_FORMAT(reservations.date, '%Y-%m')",
            [':status' => 4]
         );
      }
      return $results;
   }

   public function getResDetailsForServiceProvAnalytics($staffID, $from, $to)
   {
      if ($staffID != 0)
      {
         $results = $this->customQuery(
            "SELECT reservations.reservationID AS reservationID, 
                    services.name AS sName, 
                    customers.fName AS cFName, 
                    customers.lName AS cLName, 
                    services.price AS price  
            FROM reservations
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN customers ON customers.customerID = reservations.customerID
            WHERE reservations.status = :status AND ( DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to' ) AND reservations.staffID =$staffID 
            ORDER BY DATE_FORMAT(reservations.date, '%Y-%m')",
            [':status' => 4]
         );
      }
      else
      {
         $results = $this->customQuery(
            "SELECT reservations.reservationID AS reservationID, services.name AS sName, customers.fName AS cFName, customers.lName AS cLName, services.price AS price  
            FROM reservations
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN customers ON customers.customerID = reservations.customerID
            WHERE reservations.status = :status AND ( DATE_FORMAT(reservations.date, '%Y-%m') BETWEEN '$from' AND '$to' ) 
            ORDER BY DATE_FORMAT(reservations.date, '%Y-%m')",
            [':status' => 4]
         );
      }
      return $results;
   }

   public function getTotalResForOverallOverview()
   {
      $results = $this->customQuery(
         "SELECT COUNT(reservations.reservationID) AS resCount, SUM(services.price) AS totalIncome
         FROM reservations
         INNER JOIN services ON services.serviceID = reservations.serviceID
         WHERE reservations.status=:status",
         [':status' => 4]
      );
      return $results;
   }
   // END FOR ANALYTICS

   public function getPendingReservationsByDate($fromDate, $toDate)
   {
      $SQLquery =
         "SELECT reservations.reservationID, 
              customers.fName AS custFName, 
              customers.lName AS custLName, 
              customers.mobileNo AS custMobileNo,
              staff.fName AS staffFName, 
              staff.lName AS staffLName,
              reservations.date, 
              reservations.startTime, 
              services.name AS serviceName
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID
      WHERE reservations.date > :fromDate AND reservations.date <=  :toDate AND reservations.status = 1 ;";

      $results = $this->customQuery(
         $SQLquery,
         [
            ':fromDate' => $fromDate,
            ':toDate' => $toDate
         ]
      );
      return $results;
   }

   // Function related to recall requests
   public function updateReservationRecalledState($selectedreservation, $status)
   {
      if (is_array($selectedreservation))
      {
         foreach ($selectedreservation as $value)
         {
            $results = $this->update('reservations', ['status' => $status], ['reservationID' => $value]);
         }
      }
      else
      {
         $results = $this->update('reservations', ['status' => $status], ['reservationID' => $selectedreservation]);
      }
   }

   // Provide reservation details on a given date within a limit of service providers
   public function getReservationsByDateForDailyOverview($givenDate, $limit, $offset)
   {
      $SQLquery =
         "SELECT RES.reservationID,
         SV.name AS serviceName,
         RES.startTime AS resStartTime,
         SV.totalDuration,
         TS.slotNo,
         TS.startingTime AS slotStartOffset,
         TS.duration AS slotDuration,
         RES.status,
         S.staffID,
         S.fName,
         S.lName,
         S.imgPath
         FROM
         (SELECT * FROM staff WHERE status IN (1,2) AND staffType = 5 ORDER BY staffID ASC limit :offset,:limit) AS S
         LEFT JOIN reservations AS RES ON RES.staffID = S.staffID AND RES.status IN (1,2,3,4,5) AND RES.date = :givenDate 
         LEFT JOIN services AS SV ON SV.serviceID = RES.serviceID
         LEFT JOIN timeslots AS TS ON TS.serviceID = SV.serviceID;";

      $results = $this->customQuery(
         $SQLquery,
         [
            ':offset' => $offset,
            ':limit' => $limit,
            ':givenDate' => $givenDate
         ]
      );
      return $results;
   }

   public function getReservationDataForEdit($reservationID)
   {
      $SQLquery =
         "SELECT RES.reservationID,
         RES.customerID,
         CUS.fName,
         CUS.lName,
         CUS.mobileNo,
         CUS.imgPath,
         RES.serviceID,
         SER.name,
         SER.totalDuration,
         SER.customerCategory,
         SER.price,
         RES.staffID,
         RES.date,
         RES.startTime,
         RES.remarks
         FROM reservations AS RES
         INNER JOIN services AS SER ON SER.serviceID = RES.serviceID
         INNER JOIN customers AS CUS ON CUS.customerID = RES.customerID
         WHERE RES.reservationID = :reservationID;";

      $results = $this->customQuery(
         $SQLquery,
         [
            ':reservationID' => $reservationID
         ]
      );
      return $results[0];
   }
}
