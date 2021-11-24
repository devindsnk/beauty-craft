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
      $SQLquery = "
      SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID;
      ";

      $results = $this->customQuery($SQLquery, []);

      return $results;
   }

   public function getReservationDetailsByID($reservationID)
   {
      $SQLquery = "
      SELECT reservations.date, reservations.startTime, services.name AS serviceName, services.totalDuration, staff.fName AS staffFName, staff.lName AS staffLName, reservations.remarks,customers.customerID, customers.fName AS custFName, customers.lName AS custLName, customers.mobileNo, reservations.status  
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID
      WHERE reservations.reservationID = :reservationID;
      ";
      $results = $this->customQuery($SQLquery, [':reservationID' => $reservationID]);

      return $results;
   }

   public function getReservationsByCustomer($customerID)
   {
      $SQLquery = "
      SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID
      WHERE reservations.customerID = :customerID;
      ";

      $results = $this->customQuery($SQLquery, [':customerID' => $customerID]);

      return $results;
   }
}
