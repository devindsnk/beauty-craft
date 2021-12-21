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
            "endTime" => $data['endTime'],
            "remarks" => $data['remarks'],
            "status" => 1
         ]
      );
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
         "SELECT reservations.date, reservations.startTime, services.name AS serviceName, services.totalDuration, staff.fName AS staffFName, staff.lName AS staffLName, reservations.remarks,customers.customerID, customers.fName AS custFName, customers.lName AS custLName, customers.mobileNo, reservations.status  
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID
         WHERE reservations.reservationID = :reservationID;";
      $results = $this->customQuery($SQLquery, [':reservationID' => $reservationID]);

      return $results;
   }

   public function getReservationsByCustomer($customerID)
   {
      $SQLquery =
         "SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
         FROM reservations
         INNER JOIN customers ON customers.customerID = reservations.customerID
         INNER JOIN staff ON staff.staffID = reservations.staffID
         INNER JOIN services ON services.serviceID = reservations.serviceID
         WHERE reservations.customerID = :customerID;";

      $results = $this->customQuery($SQLquery, [':customerID' => $customerID]);
      return $results;
   }

   // FOR MANAGER OVERVIEW
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


   // FOR MANAGER OVERVIEW

   //FOR SP overview
   public function getReservationsByStaffID($staffID)
   {
      //  die("hii555555");
      $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE staffID=:staffID ORDER BY date", [':staffID' => $staffID,]);
      return $results;
   }

   public function getReservationMoreInfoByID($reservationID){
     
         $results = $this->customQuery("SELECT reservations.date,reservations.reservationID,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName,customers.customerNote 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE reservationID=:reservationID ", [':reservationID' => $reservationID,]);
      // print_r($results);

      // die("ssss");
      return $results;
      

   }

   
   public function updateCustomerNote($data){
   //  print_r($data);
   $reservationID=$data['selectedReservation'];
   $custNote=$data['customerNote'];
      $results =$this ->customQuery("UPDATE customers SET customerNote=:custNote WHERE customerID=(SELECT customerID FROM reservations WHERE reservationID=:resID )",
         [':custNote' => $custNote, ':resID' => $reservationID]
      );  
   }

   public function updateReservationRecalledState($selectedreservation,$status){
 
      $results = $this->update('reservations', ['status' => $status], ['reservationID' => $selectedreservation]); 
       
   }

    public function addReservationRecall($selectedreservation,$recallReason) 
   { 
      date_default_timezone_set("Asia/Colombo");
      $today = date("Y-m-d H:i:s"); 
      // To insert a record tableName and valuesToBeInserted are passed 
      $results =  $this->insert('recallrequests', ['reservationID' => $selectedreservation, 'reason' => $recallReason, 'requestedDate' => $today, 'status' => 0]); 
      
   } 

   public function getRecallReasonByReservationID($selectedreservation) 
   {  $results = $this->getSingle('recallrequests', ['reason'], ['reservationID' => $selectedreservation]);
      return $results->reason;
     
     
   } 



   // Complex reservation process


   ////////////////////////////////////////////////

   public function getOverlappingReservations($date, $slotStartTime, $slotEndTime)
   {
      // Make sure to consider Pending (1) and Confirmed (2) Only
      $SQLquery =
         "SELECT *
         FROM reservations
         WHERE 
            date = :date AND 
            startTime < :slotEndTime AND endTime > :slotStartTime AND
            status IN (1,2) AND ;";

      $results = $this->customQuery(
         $SQLquery,
         [
            ':date' => $date,
            ':slotStartTime' => $slotStartTime,
            ':slotEndTime' => $slotEndTime
         ]
      );
      return $results;
   }


   ////////////////////////////////////////////////


}
