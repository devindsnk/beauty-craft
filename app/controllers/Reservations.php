<?php
class Reservations extends Controller
{
   public function __construct()
   {
      $this->serviceModel = $this->model('ServiceModel');
   }
   public function newReservationCust()
   {
      $sProvidersList = $this->getAllServiceProviders();
      $servicesList = $this->getAllServices();


      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         var_dump($_POST);
         die("yo");
      }
      else
      {
         $data = [
            'sProvidersList' => $sProvidersList,
            'servicesList' => $servicesList
         ];

         $this->view('customer/cust_addNewReservation', $data);
      }
   }

   public function addNewResRecept()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // $data = [
         //    'mobileNo' => trim($_POST['mobileNo']),
         //    'password' => trim($_POST['password']),
         //    'mobileNo_error' => '',
         //    'password_error' => ''
         // ];
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
