<?php
class SalaryModel extends Model
{
   //    public function addStaff($data)
   //    {
   //       $this->addStaffDetails($data);
   //       $this->addBankDetails($data);
   //    }
   // add staff details to the db
   public function getAllSalaryRateDetails()
   {
      $result = $this->getResultSet('salaryrates', '*', null);
      // print_r($result);
      return $result;
   }
   public function getAllLeaveRateDetails()
   {

      $result = $this->getResultSet('leavelimits', '*', null);
      return $result;
   }
   public function getAllCommisionRateDetails()
   {
      $result = $this->getResultSet('commissionrates', '*', null);
      return $result;
   }
   public function getAllStaffSalaryPaymentDetails()
   {
      // $SQLquery =
      // "SELECT salarypayments.reservationID, customers.fName AS custFName, customers.lName AS custLName, staff.fName AS staffFName, staff.lName AS staffLName,reservations.remarks, reservations.status, reservations.date, reservations.startTime, services.name AS serviceName
      // FROM reservations
      // INNER JOIN customers ON customers.customerID = reservations.customerID
      // INNER JOIN staff ON staff.staffID = reservations.staffID
      // INNER JOIN services ON services.serviceID = reservations.serviceID;";

      // $results = $this->customQuery($SQLquery, []);

      $result = $this->getResultSet('salarypayments', '*', null);
      return $result;
   }

   public function getAllStaffSalaryPaymentDetailsByStaffID($staffID)
   {
      $results = $this->getSingle("salarypayments", "*", ['staffID' => $staffID]);
      return $results;
   }
}
