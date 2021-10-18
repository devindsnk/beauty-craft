<?php
class CustDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      // $this->serviceModel = $this->model('ServiceModel');
      // $this->staffModel = $this->model('StaffModel');
   }

   public function myReservations()
   {
      $this->view('customer/cust_myReservations');
   }
   public function profileSettings()
   {
      $this->view('customer/cust_profileSettings');
   }
}
