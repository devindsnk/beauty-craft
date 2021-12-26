<?php

class Reservations extends Controller
{
   public function __construct()
   {
      $this->staffModel = $this->model('StaffModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      $this->closedDatesModel = $this->model('ClosedDatesModel');
      $this->resourceModel = $this->model('ResourceModel');
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
      $servicesList = $this->serviceModel->getAllAvailableServices();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'customerID' => Session::getUser("id"),
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


   /////////////////////////////////////////////////////////////////////////////////
   //---------------------- -Complex Reservation Process -------------------------//

   // Check if salon is closed on given date
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

   // Provides active service providers list for a particular service with their avilability based on date and time
   public function getUpdatedSProvidersList($selectedServiceID, $selectedDate = null, $selectedTime = null)
   {
      $selectedDate = ($selectedDate == "null") ? null : $selectedDate;
      $selectedTime = ($selectedTime == "null") ? null : $selectedTime;

      $sProvidersList = $this->staffModel->getSProvidersByServiceWithLeaveStatus($selectedServiceID, $selectedDate);

      $sProvidersSummary = array();
      foreach ($sProvidersList as $sProvider)
      {
         $sProvidersSummary[$sProvider->staffID] = [
            "name" => $sProvider->fName . " " . $sProvider->lName,
            "leave" => ($sProvider->leaveStatus > 0 ? true : false),
            "occupied" => false
         ];
      }

      if (!(is_null($selectedDate) || is_null($selectedTime)))
      {
         // Updating occupied status 
         // echo "Ocupied Checked";
         $sProvidersSummary = $this->updateSProvidersOccuppiedStatus($sProvidersSummary, $selectedServiceID, $selectedDate, $selectedTime);
      }

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sProvidersSummary));
   }

   // Check resource availabity for given SERVICE on given DATE at given TIME 
   public function checkResourcesAvailability($serviceID, $selectedDate, $selectedTime)
   {
      header('Content-Type: application/json; charset=utf-8');

      $availResources = $this->resourceModel->getCountsOfAllResources();
      $availResourcesMap = $this->prepareResourcesMap($availResources);
      // echo "Available Resources";
      // print_r($availResourcesMap);

      $slotsSummary = $this->serviceModel->getServiceSlotsSummary($serviceID);
      $slotsSummary = $this->combineSlotsResources($slotsSummary);
      // print_r($slotsSummary);

      foreach ($slotsSummary as $slot)
      {
         $reqResourcesMap = $slot["resources"];
         // echo "Required Resources";
         // print_r($reqResourcesMap);

         for ($i = $slot["startTime"]; $i < $slot["endTime"]; $i += 10)
         {
            $allocResources = $this->reservationModel->getAllocatedResourcesOfSlot($selectedDate, $selectedTime + $i, $selectedTime + $i + 10);
            $allocResourcesMap = $this->prepareResourcesMap($allocResources);
            // echo "Allocted Resources from " . ($selectedTime + $i) . " to " . ($selectedTime + $i + 10);
            // print_r($allocResourcesMap);

            $eligible = $this->checkAvailOfRequiredResources($availResourcesMap, $allocResourcesMap, $reqResourcesMap);
            if ($eligible == false)
            {
               print_r(json_encode("0"));
               return;
            }
         }
      }
      print_r(json_encode("1"));
      return;

      // get resources requirement of the current selected service

      // Structure for required resources array
      // $slots = [
      //    [
      //       "startTime" => 0,
      //       "endTime" => 30,
      //       "resources" => [
      //          "000001" => 1,
      //          "000002" => 2
      //       ]
      //    ],
      //    [
      //       "startTime" => 40,
      //       "endTime" => 50,
      //       "resources" => [
      //          "000001" => 1,
      //          "000004" => 3
      //       ]
      //    ]
      // ];
   }

   private function checkAvailOfRequiredResources($availResourcesMap, $allocResourcesMap, $reqResourcesMap)
   {
      foreach ($reqResourcesMap as $resourceID => $reqQuantity)
      {
         $availQuantity = $availResourcesMap[$resourceID] ?? 0;
         $allocQuantity = $allocResourcesMap[$resourceID] ?? 0;

         if ($availQuantity - $allocQuantity < $reqQuantity)
         {
            // echo $resourceID . "NOT ENOUGH\n";
            return false;
         }
      }
      return true;
   }

   // Prepares a map of [resourceID => quantity]
   private function prepareResourcesMap($resourcesArray)
   {
      $resourceMap = array();
      foreach ($resourcesArray as $resource)
      {
         $resourceMap[$resource->resourceID] =  $resource->quantity;
      }
      return $resourceMap;
   }

   // Combines resources of the same slot into a map
   private function combineSlotsResources($slotsSummary)
   {
      $NewSlotsSummary = array();
      foreach ($slotsSummary as $slot)
      {
         $i = $slot->slotNo - 1;
         if (sizeof($NewSlotsSummary) <= $i)
         {
            array_push(
               $NewSlotsSummary,
               [
                  "startTime" => $slot->givenStartTime,
                  "endTime" => $slot->givenEndTime,
                  "resources" => []
               ]
            );
         }
         $NewSlotsSummary[$i]["resources"] +=
            [$slot->resourceID => $slot->requiredQuantity];

         // array_push(
         //    $NewSlotsSummary[$i]["resources"],
         //    [$slotResource->resourceID => $slotResource->requiredQuantity]
         // );
      }
      return $NewSlotsSummary;
   }

   private function updateSProvidersOccuppiedStatus($sProvidersSummary, $selectedServiceID, $selectedDate, $selectedTime)
   {
      $slotsSummary = $this->serviceModel->getServiceSlotsSummary($selectedServiceID);
      $slotsSummary = $this->combineSlotsResources($slotsSummary);

      foreach ($slotsSummary as $slot)
      {
         $startTime = $selectedTime + $slot["startTime"];
         $endTime = $selectedTime + $slot["endTime"];
         // echo "Checking from " . $startTime . " to " . $endTime;
         $occupiedSProviders = $this->reservationModel->getOccupiedSProviders($selectedDate, $startTime, $endTime);

         foreach ($occupiedSProviders as $sProvider)
         {
            $staffID = $sProvider->staffID;
            if (array_key_exists($staffID, $sProvidersSummary))
            {
               $sProvidersSummary[$staffID]["occupied"] = true;
            }
         }
      }
      return $sProvidersSummary;
   }

   //--------------------End of Complex Reservation Process ----------------------//
   /////////////////////////////////////////////////////////////////////////////////


   public function recallCancelReservation($reservationID)
   {
      $this->reservationModel->beginTransaction();
      $result1 = $this->reservationModel->markRecallResponded($reservationID);
      $result2 = $this->reservationModel->cancelReservation($reservationID);
      $this->reservationModel->commit();

      if ($result1 && $result2)
         Toast::setToast(1, "Reservation recalled successfully", "Reservation has been cancelled.");
      else
         Toast::setToast(0, "Reservation recall failed", "Reservation cancellation failed.");

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result1 && $result2));
   }

   // public function cancelReservation($reservationID)
   // {
   //    $results = $this->reservationModel->cancelReservation($reservationID);

   //    header('Content-Type: application/json; charset=utf-8');
   //    print_r(json_encode($results));
   // }

   public function notFound()
   {
      $this->view('404');
   }

   public function recallReservationsFromUpdateService($serviceID)
   {
      print_r($serviceID);
      die('fk');
   }
}
