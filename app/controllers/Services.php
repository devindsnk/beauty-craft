<?php
class Services extends Controller
{
   public function __construct()
   {
      $this->ServiceModel = $this->model('ServiceModel');
      $this->ReservationModel = $this->model('reservationModel');
   }

   public function viewAllServices()
   {
      Session::validateSession([2, 3, 4]);

      $sDetails = $this->ServiceModel->getServiceDetails();

      $GetServicesArray = [
         'services' => $sDetails
      ];

      $this->view('common/allServicesTable',  $GetServicesArray);
   }

   public function addNewService()
   {
      $slotNo = 0;
      $sProvGetArray = $this->getServiceProvider();
      $sTypeGetArray = $this->getServiceType();
      $sResGetArray = $this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'name' => trim($_POST['sName']),

            'customerCategory' => isset($_POST['serviceCusCategory']) ? trim($_POST['serviceCusCategory']) : '',

            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',
            'sNewType' => trim($_POST['sNewType']),
            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            'price' => trim($_POST['sPrice']),

            'slot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',
            'slot2Duration' => isset($_POST['slot2Duration']) ? trim($_POST['slot2Duration']) : '',
            'slot3Duration' => isset($_POST['slot3Duration']) ? trim($_POST['slot3Duration']) : '',
            'interval1Duration' => isset($_POST['interval1Duration']) ? trim($_POST['interval1Duration']) : '',
            'interval2Duration' => isset($_POST['interval2Duration']) ? trim($_POST['interval2Duration']) : '',

            'sSelectedResCount1' => isset($_POST['resourceCount1']) ? ($_POST['resourceCount1']) : [],
            'sSelectedResCount2' => isset($_POST['resourceCount2']) ? ($_POST['resourceCount2']) : [],
            'sSelectedResCount3' => isset($_POST['resourceCount3']) ? ($_POST['resourceCount3']) : [],

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',

         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         if ($_POST['action'] == "addService")
         {

            if (empty($data['name']))
            {
               $data['sName_error'] = "Please enter service name";
            }
            if (empty($data['customerCategory']))
            {
               $data['sSelectedCusCategory_error'] = "Please select customer category";
            }
            if (empty($data['sSelectedType']) && empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please select or enter service type";
            }
            if (!empty($data['sSelectedType']) && !empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please clear one from selected or entered service type";
            }
            if (empty($data['sSelectedProv']))
            {
               $data['sSelectedSProve_error'] = "Please select service provider";
            }
            if (empty($data['price']))
            {
               $data['sPrice_error'] = "Please enter service price";
            }
            elseif (!is_numeric($data['price']))
            {
               $data['sPrice_error'] = "Please enter a numeric value for price";
            }
            if (empty($data['slot1Duration']))
            {
               $data['sSlot1Duration_error'] = "Please enter slot duration";
            }

            if (!empty($data['slot3Duration']) || !empty($data['sSelectedResCount3']) || !empty($data['interval2Duration']))
            {
               for ($i = 2; $i < 4; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }
            elseif (!empty($data['slot2Duration']) || !empty($data['sSelectedResCount2']) || !empty($data['interval1Duration']))
            {
               for ($i = 2; $i < 3; $i++)
               {
                  if (empty($data['slot' . ($i) . 'Duration']))
                  {
                     $data['sSlot' . ($i) . 'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval' . ($i - 1) . 'Duration']))
                  {
                     $data['interval' . ($i - 1) . 'Duration_error'] = "Please enter interval duration";
                  }
               }
            }

            if (empty($data['sName_error']) && empty($data['sSelectedCusCategory_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error']) && empty($data['sSlot2Duration_error']) && empty($data['sSlot3Duration_error']) && empty($data['interval1Duration_error']) && empty($data['interval2Duration_error']))
            {
               if ($data['slot2Duration'] != NULL && $data['slot3Duration'] == NULL)
               {
                  $slotNo = 1;
               }
               elseif ($data['slot2Duration'] != NULL && $data['slot3Duration'] != NULL)
               {
                  $slotNo = 2;
               }

               $this->ServiceModel->addService($data, $slotNo);
               $this->ServiceModel->addServiceProvider($data);
               $this->ServiceModel->addTimeSlot($data, $slotNo);
               $this->ServiceModel->addIntervalTimeSlot($data, $slotNo);
               $this->ServiceModel->addResourcesToService($data, $slotNo);

               redirect('Services/viewAllServices');
            }
            else
            {
               // for ($k = 1; $k < 4; $k++){
               //    $selectesResCount = count($data['sSelectedResCount'.($k)]);

               //    for ($i = 0; $i < $selectesResCount; $i++)
               //    {
               //       if ($data['sSelectedResCount'.($k)][$i] != 0)
               //       {
               //          $data['sSelectedResCount'.($k).'_error'] = "Please enter resource quantity again";
               //       }
               //    }
               // }
               $selectesResCount = count($data['sSelectedResCount1']);

               for ($i = 0; $i < $selectesResCount; $i++)
               {
                  if ($data['sSelectedResCount1'][$i] != 0)
                  {
                     $data['sSelectedResCount1_error'] = "Please enter resource quantity again";
                  }
               }
               $this->view('manager/mang_serviceAdd', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
      }
      else
      {

         $data = [
            'name' => '',
            'customerCategory' => '',
            'sSelectedType' => '',
            'sNewType' => '',
            'price' => '',
            'sSelectedProv' => [],

            'slot1Duration' => '',
            'slot2Duration' => '',
            'slot3Duration' => '',
            'interval1Duration' => '',
            'interval2Duration' => '',

            'sSelectedResourse' => '',
            'sSelectedResCount1' => '',
            'sSelectedResCount2' => '',
            'sSelectedResCount3' => '',

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',
            'sSlot1Duration_error' => '',
            'sSelectedResCount1_error' => '',
         ];


         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         $this->view('manager/mang_serviceAdd', $data);
      }
   }

   public function getServiceProvider()
   {
      $sProv = $this->ServiceModel->getServiceProviderDetails();
      return $sProv;
   }

   public function getServiceProvidersByService($serviceID)
   {
      Session::validateSession([6]);
      $serviceProvidersList = $this->ServiceModel->getServiceProvidersByService($serviceID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceProvidersList));

      // return json_encode($serviceProvidersList, JSON_NUMERIC_CHECK);
   }

   public function getServiceDuration($serviceID)
   {
      Session::validateSession([6]);
      $serviceDuration = $this->ServiceModel->getServiceDuration($serviceID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceDuration));

      // return json_encode($serviceDuration, JSON_NUMERIC_CHECK);
   }

   public function getServiceType()
   {
      $sType = $this->ServiceModel->getServiceTypeDetails();
      return $sType;
   }

   public function getResource()
   {
      $sResource = $this->ServiceModel->getResourceDetails();
      return $sResource;
   }

   public function getResourceForSlots()
   {
      $sResource = $this->ServiceModel->getResourceDetails();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sResource));
   }

   public function passResourcesToSlot($sResGetArray)
   {
      $_SESSION = $sResGetArray;
      $sizeOfSession = sizeof($_SESSION);
      print_r($_SESSION);

      // print_r($_SESSION[0]->quantity);
      print_r($sizeOfSession);

      die("hi");
   }
   public function getReservationListOfCheckedSPRovList($details1,$details2)
   {
      $serProvDetails = $this->ReservationModel->getUpcommingReservationsForSerProv($details1, $details2);
      
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serProvDetails));
   }
   public function getReservationListOfSelectedService($serviceID)
   {
      $serviceDetails = $this->ReservationModel->getUpcommingReservationsForService($serviceID);
      
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceDetails));
   }
   public function viewService($serviceID)
   {
      $sNoofSlots = $this->ServiceModel->getNoofSlots($serviceID);
      $sOneDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $sSprovDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);

      for ($i = 1; $i < 4; $i++){
         $slotNo = $i;
         ${'sSlot'.$i.'Duration'} = $this->ServiceModel->getSlotDuration($serviceID, $slotNo);
         ${'sAllocatedResDetailsSlot'.$i} = $this->ServiceModel->getAllocatedResourceDetailsofSlot($serviceID, $slotNo);
      }
      for ($i = 1; $i < 3; $i++){
         $slotNo = $i+1;
         ${'sInterval'.($i).'Duration'} = $this->ServiceModel->getIntervalDuration($serviceID, $slotNo);
      }

      $GetOneServicesArray = [
         'noofSlots' => $sNoofSlots,
         'services' => $sOneDetails,
         'sProv' => $sSprovDetails,

         'sSlot1Duration' => $sSlot1Duration,
         'sSlot2Duration' => $sSlot2Duration,
         'sSlot3Duration' => $sSlot3Duration,

         'sInterval1Duration' => $sInterval1Duration,
         'sInterval2Duration' => $sInterval2Duration,

         'sResS1' => $sAllocatedResDetailsSlot1,
         'sResS2' => $sAllocatedResDetailsSlot2,
         'sResS3' => $sAllocatedResDetailsSlot3,

      ];

      $this->view('manager/mang_serviceView', $GetOneServicesArray);
   }

   public function updateService($serviceID)
   {
      $serviceDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $serProvDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);
   
      $noofSlots = $this->ServiceModel->getNoofSlots($serviceID);

      for ($i = 1; $i < 4; $i++){
         $slotNo = $i;
         ${'slot'.$i.'Details'} = $this->ServiceModel->getSlotDuration($serviceID, $slotNo);
         ${'resDetailsSlot'.$i} = $this->ServiceModel->getAllocatedResourceDetailsofSlot($serviceID, $slotNo);
      }
      for ($i = 1; $i < 3; $i++){
         $slotNo = $i+1;
         ${'interval'.($i).'Details'} = $this->ServiceModel->getIntervalDuration($serviceID, $slotNo);
      }

      $sProvGetArray = $this->getServiceProvider();
      $sTypeGetArray = $this->getServiceType();
      $sResGetArray = $this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'name' => trim($_POST['sName']),

            'customerCategory' => isset($_POST['serviceCusCategory']) ? trim($_POST['serviceCusCategory']) : '',

            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',
            'sNewType' => trim($_POST['sNewType']),
            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            'price' => trim($_POST['sPrice']),

            'slot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',
            'slot2Duration' => isset($_POST['slot2Duration']) ? trim($_POST['slot2Duration']) : '',
            'slot3Duration' => isset($_POST['slot3Duration']) ? trim($_POST['slot3Duration']) : '',
            'interval1Duration' => isset($_POST['interval1Duration']) ? trim($_POST['interval1Duration']) : '',
            'interval2Duration' => isset($_POST['interval2Duration']) ? trim($_POST['interval2Duration']) : '',

            'sSelectedResCount1' => isset($_POST['resourceCount1']) ? ($_POST['resourceCount1']) : [],
            'sSelectedResCount2' => isset($_POST['resourceCount2']) ? ($_POST['resourceCount2']) : [],
            'sSelectedResCount3' => isset($_POST['resourceCount3']) ? ($_POST['resourceCount3']) : [],

            'serviceDetails' => $serviceDetails[0],
            'serProvDetails' => $serProvDetails,
            'noofSlots' => $noofSlots,
            'slot1Details' => $slot1Details,
            'slot2Details' => $slot2Details,
            'slot3Details' => $slot3Details,
            'interval1Details' => $interval1Details,
            'interval2Details' => $interval2Details,
            'resDetailsSlot1' => $resDetailsSlot1,
            'resDetailsSlot2' => $resDetailsSlot2,
            'resDetailsSlot3' => $resDetailsSlot3,

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',

         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;
       
         if ($_POST['action'] == "updateService")
         {
            if (empty($data['name']))
            {
               $data['sName_error'] = "Please enter service name";
            }
            if (empty($data['customerCategory']))
            {
               $data['sSelectedCusCategory_error'] = "Please select customer category";
            }
            if (empty($data['sSelectedType']) && empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please select or enter service type";
            }
            if (!empty($data['sSelectedType']) && !empty($data['sNewType']))
            {
               $data['sSelectedAllType_error'] = "Please clear one from selected or entered service type";
            }
            if (empty($data['sSelectedProv']))
            {
               $data['sSelectedSProve_error'] = "Please select service provider";
            }
            if (empty($data['price']))
            {
               $data['sPrice_error'] = "Please enter service price";
            }
            elseif (!is_numeric($data['price']))
            {
               $data['sPrice_error'] = "Please enter a numeric value for price";
            }
            if (empty($data['slot1Duration']))
            {
               $data['sSlot1Duration_error'] = "Please enter slot duration";
            }
            
            if(!empty($data['slot3Duration']) || !empty($data['sSelectedResCount3']) || !empty($data['interval2Duration'])){
               for($i = 2; $i < 4; $i++){
                  if (empty($data['slot'.($i).'Duration'])) {
                     $data['sSlot'.($i).'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval'.($i-1).'Duration'])) {
                     $data['interval'.($i-1).'Duration_error'] = "Please enter interval duration";
                  }
               }
            }
            elseif(!empty($data['slot2Duration']) || !empty($data['sSelectedResCount2']) || !empty($data['interval1Duration'])){
               for($i = 2; $i < 3; $i++){
                  if (empty($data['slot'.($i).'Duration'])) {
                     $data['sSlot'.($i).'Duration_error'] = "Please enter slot duration";
                  }
                  if (empty($data['interval'.($i-1).'Duration'])) {
                     $data['interval'.($i-1).'Duration_error'] = "Please enter interval duration";
                  }
               }
            }

            if (empty($data['sName_error']) && empty($data['sSelectedCusCategory_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error']) && empty($data['sSlot2Duration_error']) && empty($data['sSlot3Duration_error']) && empty($data['interval1Duration_error']) && empty($data['interval2Duration_error']))
            {
               if($data['slot2Duration'] != NULL && $data['slot3Duration'] == NULL){
                  $slotNo=1;
               }elseif($data['slot2Duration'] != NULL && $data['slot3Duration'] != NULL){
                  $slotNo=2;
               }
               $this->ServiceModel->changeServiceStatus($serviceID, 0);
               $this->ServiceModel->addService($data,$slotNo);
               $this->ServiceModel->addServiceProvider($data);
               // die('awa');
               $this->ServiceModel->addTimeSlot($data, $slotNo);
               $this->ServiceModel->addIntervalTimeSlot($data, $slotNo);
               $this->ServiceModel->addResourcesToService($data, $slotNo);

               redirect('Services/viewAllServices');
            }
            else
            {
               
               $selectesResCount = count($data['sSelectedResCount1']);

               for ($i = 0; $i < $selectesResCount; $i++)
               {
                  if ($data['sSelectedResCount1'][$i] != 0)
                  {
                     $data['sSelectedResCount1_error'] = "Please enter resource quantity again";
                  }
               }
               $this->view('manager/mang_serviceAdd', $data);
            }

         }
         else
         {
            die("Something went wrong");
         }

      }else{
         
         $data = [
            'name' => '',
            'customerCategory' => '',
            'sSelectedType' => '',
            'sNewType' => '',
            'price' => '',
            'sSelectedProv' => [],

            'slot1Duration' => '',
            'slot2Duration' => '',
            'slot3Duration' => '',
            'interval1Duration' => '',
            'interval2Duration' => '',

            'sSelectedResourse' => '',
            'sSelectedResCount1' => '',
            'sSelectedResCount2' => '',
            'sSelectedResCount3' => '',

            'serviceDetails' => $serviceDetails[0],
            'serProvDetails' => $serProvDetails,
            'noofSlots' => $noofSlots,
            'slot1Details' => $slot1Details,
            'slot2Details' => $slot2Details,
            'slot3Details' => $slot3Details,
            'interval1Details' => $interval1Details,
            'interval2Details' => $interval2Details,
            'resDetailsSlot1' => $resDetailsSlot1,
            'resDetailsSlot2' => $resDetailsSlot2,
            'resDetailsSlot3' => $resDetailsSlot3,

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedCusCategory_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',

            'sSlot1Duration_error' => '',
            'sSlot2Duration_error' => '',
            'sSlot3Duration_error' => '',
            'interval1Duration_error' => '',
            'interval2Duration_error' => '',

            'sSelectedResCount1_error' => '',
            'sSelectedResCount2_error' => '',
            'sSelectedResCount3_error' => '',
         ];

         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         $this->view('manager/mang_serviceUpdate', $data);

      }
   }
   public function deleteService($serviceID)
   {
      $state=0;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      redirect('Services/viewAllServices');
   }
   public function holdService($serviceID)
   {
      $state=2;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      redirect('Services/viewAllServices');
   }
   public function activeService($serviceID)
   {
      $state=1;
      $this->ServiceModel->changeServiceStatus($serviceID, $state);
      redirect('Services/viewAllServices');
   }

   public function serviceReport()
   {
      $serviceList = $this->ServiceModel->getServiceDetails();
      $this->view('common/serviceReport',count($serviceList));
   }

   public function serviceReportJS($smonth)
   {
      $serviceList = $this->ServiceModel->getServiceDetails();

      $sReportDetails =array();
      $dateOld=date_create($smonth);
      
      $year=date_format($dateOld,"Y");
      $month=date_format($dateOld,"m");

      foreach($serviceList as $services)
      {
         $serviceDetails = $this->ServiceModel->getDetailsForServiceReportJS($services->serviceID,$year,$month);
         array_push($sReportDetails, $serviceDetails);
      }
      
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sReportDetails));
   }

   public function serviceProviderReport()
   {
      $serviceProviderList = $this->ServiceModel->getServiceProviderDetails();

      $this->view('common/serviceProviderReport',count($serviceProviderList));
   }

   public function serviceProviderReportJS($smonth)
   {
      $sProvList = $this->ServiceModel->getServiceProviderDetails();

      $sProvReportDetails =array();
      $dateOld=date_create($smonth);
      
      $year=date_format($dateOld,"Y");
      $month=date_format($dateOld,"m");

      foreach($sProvList as $sProv)
      {
         $sProvDetails = $this->ServiceModel->getDetailsForServiceProvReportJS($sProv->staffID,$year,$month);
         array_push($sProvReportDetails, $sProvDetails);
      }
      
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($sProvReportDetails));
   }

   public function analyticsOverall()
   {
      // Session::validateSession([3]);
      $this->view('common/SubAnalyticsOverall');
   }
   public function analyticsService()
   {
      // Session::validateSession([3]);
      $serviceList = $this->ServiceModel->getServiceDetails();
      // $serviceChartDetails = $this->ServiceModel->getServiceAnalyticsDetails();
      // $serviceAnalyticResDetails = $this->ReservationModel->getResDetailsForServiceAnalytics(000006, '2021-10-01', '2021-12-01');
      // print_r($serviceAnalyticResDetails);
      // die('dddd');
      $this->view('common/SubAnalyticsService', $serviceList);
   }
   public function analyticsServiceChartJS($serviceID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceChartDetails = $this->ServiceModel->getServiceAnalyticsDetails($serviceID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceChartDetails));
   }
   public function analyticsServiceResTable($serviceID, $from, $to)
   {
      // Session::validateSession([3]);
      $serviceAnalyticResDetails = $this->ReservationModel->getResDetailsForServiceAnalytics($serviceID, $from, $to);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceAnalyticResDetails));
   }
   
   // public function analyticsServiceCard1($serviceID, $from, $to)
   // {
   //    // Session::validateSession([3]);
   //    $serviceAnalyticCard1Details = $this->ReservationModel->getCard1DetailsForServiceAnalytics($serviceID, $from, $to);

   //    header('Content-Type: application/json; charset=utf-8');
   //    print_r(json_encode($serviceAnalyticCard1Details));
   // }
   // public function analyticsServiceCard2($serviceID, $from, $to)
   // {
   //    // Session::validateSession([3]);
   //    $serviceAnalyticCard2Details = $this->ReservationModel->getCard2DetailsForServiceAnalytics($serviceID, $from, $to);

   //    header('Content-Type: application/json; charset=utf-8');
   //    print_r(json_encode($serviceAnalyticCard2Details));
   // }
   public function analyticsSProvider()
   {
      // Session::validateSession([3]);
      $this->view('common/SubAnalyticsSProvider');
   }
}
