<?php
class CustDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->serviceModel = $this->model('ServiceModel');
      // $this->staffModel = $this->model('StaffModel');
   }
   public function home()
   {
      redirect('CustDashboard/myReservations');
   }

   public function myReservations()
   {
      $this->view('customer/cust_myReservations');
   }
   public function profileSettings()
   {
      $this->view('customer/cust_profileSettings');
   }
   public function newReservation()
   {
      $this->getServiceProvider();
      $this->view('customer/cust_addNewReservation');
   }

   public function getServiceProvider()
   {
      $sProvList = $this->serviceModel->getServiceProviderDetails();
      // die("error");

      print_r($sProvList);

      return $sProvList;
   }
}
