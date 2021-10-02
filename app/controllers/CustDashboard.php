<?php
class CustDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function profile()
   {
      $this->view('customer/cust_profile');
   }
   public function changePassword()
   {
      $this->view('customer/cust_changePassword');
   }
   public function myReservation()
   {
      $this->view('customer/cust_myReservation');
   }
   
   
}
