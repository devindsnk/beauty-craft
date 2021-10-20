<?php
class ReservationModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

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
      $this->db->query("SELECT * FROM reservations");
      $result = $this->db->resultSet();

      return $result;
   }

   public function getReservationsByCustomer($customerID)
   {
      $this->db->query("SELECT * FROM reservations WHERE customerID = :customerID");
      $this->db->bind(':customerID', $customerID);
      $result = $this->db->resultSet();

      return $result;
   }
}
