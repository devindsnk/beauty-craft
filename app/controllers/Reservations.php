<?php
// session_start();

class Reservations extends Controller
{
   public function __construct()
   {
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
   }
   public function newReservationCust()
   {
      $sProvidersList = $this->getAllServiceProviders();
      $servicesList = $this->getAllServices();


      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'customerID' => trim($_POST['customerID']),
            'serviceID' => trim($_POST['serviceID']),
            'staffID' => trim($_POST['staffID']),
            'date' => trim($_POST['date']),
            'startTime' => trim($_POST['startTime']),
            'endTime' => 0,
            'remarks' => trim($_POST['remarks']),
            // 'status' => trim($_POST['mobileNo']),

            'serviceID_error' => trim($_POST['serviceID']),
            'staffID_error' => trim($_POST['staffID']),
            'date_error' => trim($_POST['date']),
            'startTime_error' => trim($_POST['startTime']),
            'remarks_error' => trim($_POST['remarks']),
            'servicesList' => $servicesList
         ];
         $this->reservationModel->addReservation($data);
         redirect('CustDashboard/myReservations');
      }
      else
      {
         $data = [
            'servicesList' => $servicesList
         ];

         $this->view('customer/cust_addNewReservation', $data);
      }
   }

   public function addNewResRecept()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'customerID' => trim($_POST['customerID']),
            'serviceID' => trim($_POST['serviceID']),
            'staffID' => trim($_POST['staffID']),
            'date' => trim($_POST['date']),
            'startTime' => trim($_POST['startTime']),
            'endTime' => trim($_POST['endTime']),
            'remarks' => trim($_POST['remarks']),
            // 'status' => trim($_POST['mobileNo']),

            'serviceID_error' => trim($_POST['serviceID']),
            'staffID_error' => trim($_POST['staffID']),
            'date_error' => trim($_POST['date']),
            'startTime_error' => trim($_POST['startTime']),
            'remarks_error' => trim($_POST['remarks'])
         ];
      }
      else
      {
         $data = [
            'mobileNo' => '',
            'password' => '',
            'mobileNo_error' => '',
            'password_error' => ''
         ];
         $this->view('receptionist/recept_newReservation', $data);
      }
   }

   public function getAllServiceProviders()
   {
      $sProvidersList = $this->serviceModel->getServiceProviderDetails();
      return $sProvidersList;
   }

   public function getAllServices()
   {
      $servicesList = $this->serviceModel->getServiceDetails();
      return $servicesList;
   }

   public function notFound()
   {
      $this->view('404');
   }
}
