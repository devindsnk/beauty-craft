<?php

class CustDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      // $this->staffModel = $this->model('StaffModel');
   }
   public function home()
   {
      redirect('CustDashboard/myReservations');
   }

   public function myReservations()
   {
      $customerID = $_SESSION['userID'];
      $reservationsList = $this->reservationModel->getReservationsByCustomer($customerID);
      $this->view('customer/cust_myReservations', $reservationsList);
   }
   public function profileSettings()
   {
      $this->view('customer/cust_profileSettings');
   }
}
