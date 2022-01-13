<?php

class CustDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([6]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
   }

   public function home()
   {
      redirect('CustDashboard/myReservations');
   }

   public function myReservations()
   {
      $customerID = Session::getUser("id");
      $reservationsList = $this->reservationModel->getReservationsByCustomer($customerID);
      $this->view('customer/cust_myReservations', $reservationsList);
   }
   public function profileSettings()
   {
      $this->view('customer/cust_profileSettings');
   }
}
