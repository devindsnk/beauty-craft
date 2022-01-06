<?php
class CustomerModel extends Model
{
   public function registerCustomer($data)
   {
      $this->insert('customers', [
         'fName' => $data['fName'],
         'lName' => $data['lName'],
         'mobileNo' => $data['mobileNo'],
         'gender' => $data['gender'],
         'status' => 1
      ]);
   }

   public function getCustomerByMobileNo($mobileNo)
   {
      $result = $this->getSingle('customers', '*', ['mobileNo' => $mobileNo]);
      return $result;
   }

   public function checkCustomerExists($mobileNo)
   {
      $result = $this->getRowCount("customers", ['mobileNo' => $mobileNo]);
      return $result;
   }

   public function getCustomerUserData($mobileNo)
   {
      $result = $this->getSingle("customers", ["customerID", "fName", "lName"], ["mobileNo" => $mobileNo, "status" => 1]);
      return [$result->customerID, $result->fName . " " . $result->lName];
   }

   public function removeCustomerDetails($cusID,$mobileNo,$rescount)
   {
      if($rescount>0){
         $result = $this->update('reservations',['status' => 0 ], ['customerID' => $cusID]);
         $this->update('customers', ['status' => 0 ], ["customerID" => $cusID]); 
         $this->delete("users", ['mobileNo' => $mobileNo ]); 
      }
      else {
      $this->update('customers', ['status' => 0 ], ["customerID" => $cusID]); 
      $this->delete("users", ['mobileNo' => $mobileNo ]); 
      }

    
   }

   public function getAllCustomerDetails()
   {
      $result = $this->getResultSet('customers', '*', null);
      return ($result);
   }

   public function getCustomerDetailsByCusID($cusID)
   {
      $result = $this->getResultSet('customers', '*',  ["customerID" => $cusID]);
      // print_r($result);
      return ($result);
   }

   public function getAllReservationCountByCusID($cusID)
   {
      // die('sucess');
      $result = $this->getRowCount('reservations', ['customerID ' => $cusID, 'status' => 1]);
      print_r($result);
      // die();
      return ($result);
   }

   public function getCancelledReservationCountByCusID($cusID)
   {
      // die('sucess');
      $result = $this->getRowCount('reservations', ['customerID' => $cusID, 'status'=> 0]);
      print_r($result);
      // die();
      return ($result);
   }

   // FOR MANAGER OVERVIEW
   public function getActiveCustomerCount()
   {

      $results = $this->getRowCount('customers', ['status' => 'active']);

      return $results;
   }
   // FOR MANAGER OVERVIEW

   public function getUpcomingReservationCountByCusID($cusID){

      // print_r($cusID);
      $result1 = $this->getRowCount('reservations',['customerID'=> $cusID, 'status'=> 1]);       
      $result2 = $this->getRowCount('reservations',['customerID'=> $cusID, 'status'=> 2]);  
      $results = $result1 + $result2;                         
      print_r($results);
      // die("success");
      return $results;
   }
   
}
