<?php

class Reservations extends Controller
{
   public function __construct()
   {
      $this->staffModel = $this->model('StaffModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      $this->closedDatesModel = $this->model('ClosedDatesModel');
   }

   public function viewAllReservations()
   {
      Session::validateSession([2, 3, 4]);
      $serviceProviders = $this->serviceModel->getServiceProviderDetails();
      $serviceTypes = $this->serviceModel->getServiceTypeDetails();
      $reservations = $this->reservationModel->getAllReservations();

      $data = [
         'serviceProvidersList' => $serviceProviders,
         'serviceTypesList' => $serviceTypes,
         'reservationsList' => $reservations
      ];

      $this->view('common/allReservationsTable', $data);
   }

   public function newReservationCust()
   {
      // $sProvidersList = $this->getAllServiceProviders();
      $servicesList = $this->getAllServices();


      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'customerID' => trim($_POST['customerID']),
            'serviceID' => isset($_POST['serviceID']) ? trim($_POST['serviceID']) : '',
            'staffID' => isset($_POST['staffID']) ? trim($_POST['staffID']) : '',
            'date' => trim($_POST['date']),
            'startTime' => isset($_POST['startTime']) ? trim($_POST['startTime']) : '',
            'endTime' => 0,
            'remarks' => trim($_POST['remarks']),
            // 'status' => trim($_POST['mobileNo']),

            'serviceID_error' => '',
            'staffID_error' => '',
            'date_error' => '',
            'startTime_error' => '',
            'remarks_error' => '',

            'servicesList' => $servicesList
         ];

         $data['startTime_error'] = emptyCheck($data['startTime']);
         $data['serviceID_error'] = emptyCheck($data['serviceID']);
         $data['staffID_error'] = emptyCheck($data['staffID']);
         $data['date_error'] = emptyCheck($data['date']);

         if (empty($data['serviceID_error']) && empty($data['staffID_error']) && empty($data['date_error'])  && empty($data['startTime_error']))
         {
            $this->reservationModel->addReservation($data);
            redirect('CustDashboard/myReservations');
         }
         else
         {
            $this->view('customer/cust_addNewReservation', $data);
         }
      }
      else
      {
         $data = [
            'customerID' => '',
            'serviceID' => '',
            'staffID' => '',
            'date' => '',
            'startTime' => '',
            'endTime' => 0,
            'remarks' => '',
            // 'status' => trim($_POST['mobileNo']),

            'serviceID_error' => '',
            'staffID_error' => '',
            'date_error' => '',
            'startTime_error' => '',
            'remarks_error' => '',

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

   public function reservationMoreInfo($reservationID)
   {
      $reservationInfo = $this->reservationModel->getReservationDetailsByID($reservationID);

      $this->view('common/reservationMoreInfo', $reservationInfo);
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


   public function checkIfDatePossible($selectedDate)
   {
      $state = $this->closedDatesModel->checkIfClosed($selectedDate);
      $response = "";
      if ($state)
         $response = "Salon is closed on " . $selectedDate;
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($response));
      // return json_encode($state, JSON_NUMERIC_CHECK);
   }


   public function getAllReservationsOfDate($selectedDate)
   {
   }

   ////////////////////////////////////////

   public function getDataForSProvidersList($date, $serviceID)
   {
   }

   public function getOverlappingReservations()
   {
   }

   ////////////////////////////////////////


   public function notFound()
   {
      $this->view('404');
   }

   public function recallReservationsFromUpdateService($reservationIDs, $reason)
   {
      $selectedreservationList = explode(",", $reservationIDs);

      $this->reservationModel->updateReservationRecalledState($selectedreservationList, 5);
      $this->reservationModel->addReservationRecall($selectedreservationList,$reason);
      // print_r($serviceID);
      // die('fk');
      //  $this->view('manager/mang_serviceUpdate', $data);
   }
}
