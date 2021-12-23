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

   // SRART FOR MANAGER OVERVIEW
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

   public function getMonthlyIncomeAndTotalReservationsForMangOverviewCharts(){

      $results = $this->customQuery("SELECT date_format(reservations.date,'%M') AS Month ,sum(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
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

   // SRART FOR MANAGER UPDATE SERVICE
   public function getUpcommingReservationsForService($sID){
      // upcomming reservations gnn oni 
      $results = $this->customQuery("SELECT * 
                                    FROM reservations
                                    WHERE status=:status AND serviceID=:sID ",
                                    [':status' => 4 , ':sID' => $sID ]
      );
      return $results;
   }

   public function getUpcommingReservationsForSerProv($staffID, $serviceID)
   {
      // upcomming reservations gnn oni 
      $results = $this->customQuery("SELECT * 
                                    FROM reservations
                                    WHERE status=:status AND serviceID=:sID AND staffID=:sProvID OR date >= now() ",
                                    [':status' => 4 , ':sID' => $serviceID , ':sProvID' => $staffID]
      );
      return $results;
   }
   // END FOR MANAGER UPDATE SERVICE

   //FOR SP overview
   public function getReservationsByStaffID($staffID)
   {
      $results = $this->customQuery("SELECT reservations.date,reservations.startTime,reservations.endTime,reservations.remarks,reservations.status,services.name,services.totalDuration,customers.fName,customers.lName 
      FROM reservations 
      INNER JOIN services ON services.serviceID = reservations.serviceID
      INNER JOIN customers ON customers.customerID = reservations.customerID
      WHERE staffID=:staffID ORDER BY date", [':staffID' => $staffID,]);
      return $results;
   }

   // Complex reservation process


   ////////////////////////////////////////////////



   ////////////////////////////////////////////////


}
