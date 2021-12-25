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
      $result = $this->getSingle("customers", ["customerID", "fName", "lName"], ["mobileNo" => $mobileNo]);
      return [$result->customerID, $result->fName . " " . $result->lName];
   }
   public function removeCustomerDetails($cusID)
   {
      
      $this->delete("customers", ["customerID" => $cusID]);
    
   }
   public function getAllCustomerDetails()
   {
      $result = $this->getResultSet('customers','*', null);
      return ($result);
    
   }
   public function getCustomerDetailsByCusID($cusID)
   {
      $result = $this->getResultSet('customers','*',  ["customerID" => $cusID] );
      // print_r($result);
      return ($result);
   }
   public function getCompletedReservationCountByCusID($cusID)
   {
      // die('sucess');
      $result = $this->getRowCount('reservations', ['customerID ' => $cusID, 'status'=>1]);
      print_r($result);
      return ($result);
   }
   public function getCancelledReservationCountByCusID($cusID)
   {
      // die('sucess');
      $result = $this->getRowCount('reservations', ['customerID ' => $cusID, 'status'=> 1]);
      print_r($result);
      return ($result);
   }

   


  

   // FOR MANAGER OVERVIEW
   public function getActiveCustomerCount(){

      $results = $this->getRowCount('customers', ['status' => 'active']);                               
      
      return $results;
   }
   // FOR MANAGER OVERVIEW

   public function getUpcomingReservationCountByCusID($cusID){

      // print_r($cusID);
      $results = $this->getRowCount('reservations',['customerID'=> $cusID, 'status'=> 1]);                               
      // print_r($results);
      return $results;
   }
   
}
