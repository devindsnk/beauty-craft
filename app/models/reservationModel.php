<?php
class ReservationModel extends Model
{
   // private $db;

   // public function __construct()
   // {
   //    $this->db = new Database;
   // }

   public function addReservation($data)
   {
      $this->db->query("INSERT INTO reservations (customerID, serviceID, staffID, date, startTime, endTime, remarks, status) VALUES(:customerID, :serviceID, :staffID, :date, :startTime, :endTime, :remarks, 1)");

      $this->db->bind(':customerID', $data['customerID']);
      $this->db->bind(':serviceID', $data['serviceID']);
      $this->db->bind(':staffID', $data['staffID']);
      $this->db->bind(':date', $data['date']);
      $this->db->bind(':startTime', $data['startTime']);
      $this->db->bind(':endTime', $data['endTime']);
      $this->db->bind(':remarks', $data['remarks']);

      $this->db->execute();
   }

   public function getAllReservations()
   {
      $this->db->query("
      SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID;
      ");
      $result = $this->db->resultSet();

      return $result;
   }

   public function getReservationDetailsByID($reservationID)
   {
      $this->db->query("
      SELECT reservations.date, reservations.startTime, services.name AS serviceName, services.totalDuration, staff.fName AS staffFName, staff.lName AS staffLName, reservations.remarks,customers.customerID, customers.fName AS custFName, customers.lName AS custLName, customers.mobileNo, reservations.status  
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID
      WHERE reservations.reservationID = :reservationID;
      ");
      $this->db->bind(':reservationID', $reservationID);
      $result = $this->db->single();

      return $result;
   }

   public function getReservationsByCustomer($customerID)
   {
      $this->db->query("
      SELECT reservations.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
      FROM reservations
      INNER JOIN customers ON customers.customerID = reservations.customerID
      INNER JOIN staff ON staff.staffID = reservations.staffID
      INNER JOIN services ON services.serviceID = reservations.serviceID
      WHERE reservations.customerID = :customerID;
      ");
      $this->db->bind(':customerID', $customerID);
      $result = $this->db->resultSet();

      return $result;
   }

   // FOR MANAGER OVERVIEW
   public function getTotalIncomeForMangOverview(){

      $results = $this->customQuery("SELECT SUM(services.price) AS totalIncome 
                          FROM services 
                          INNER JOIN reservations
                          ON reservations.serviceID = services.serviceID
                          WHERE reservations.status=:status", [':status' => 4] 
                        );

      return $results;
   }

   public function getUpcommingReservationsNoForMangOverview(){

      $results = $this->customQuery("SELECT COUNT(*) AS upacommingReservations
                          FROM reservations
                          WHERE status=:status1 OR status=:status2", [':status1' => 1, ':status2' => 2] 
                        );
      
      return $results;
   }
   // FOR MANAGER OVERVIEW
}
