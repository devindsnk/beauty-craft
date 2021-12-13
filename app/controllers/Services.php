<?php
class Services extends Controller
{
   public function __construct()
   {
      $this->ServiceModel = $this->model('ServiceModel');
   }

   public function addNewService()
   {
      $slotNo = 0;
      $sProvGetArray = $this->getServiceProvider();
      $sTypeGetArray = $this->getServiceType();
      $sResGetArray = $this->getResource();

      // $this->passResourcesToSlot($sResGetArray);

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

            'selectedSlotDetails' => [],
            'selectedIntervalDetails' => [],
            'selectedSlotResDetails' => [],

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
         
         for($i = 2; $i < 4; $i++){
            array_push($data['selectedSlotDetails'], $data['slot'.$i.'Duration']);
            array_push($data['selectedIntervalDetails'], $data['interval'.($i-1).'Duration']);
            array_push($data['selectedSlotResDetails'], $data['sSelectedResCount'.$i]);
         }
        
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


            if ($data['selectedSlotDetails'][1] != NULL || $data['selectedIntervalDetails'][1] != NULL || $data['selectedSlotResDetails'][1] != NULL){

               for($i = 0; $i < 2; $i++){
                  if ($data['selectedSlotDetails'][$i] == NULL) {
                     $data['sSlot'.($i+2).'Duration_error'] = "Please enter slot duration";
                  }
                  if ($data['selectedIntervalDetails'][$i] == NULL) {
                     $data['interval'.($i+1).'Duration_error'] = "Please enter interval duration";
                  }
               }


            }elseif ($data['selectedSlotDetails'][0] != NULL || $data['selectedIntervalDetails'][0] != NULL || $data['selectedSlotResDetails'][0] != NULL){

               for($i = 0; $i < 1; $i++){
                  if ($data['selectedSlotDetails'][$i] == NULL) {
                     $data['sSlot'.($i+2).'Duration_error'] = "Please enter slot duration";
                  }
                  if ($data['selectedIntervalDetails'][$i] == NULL) {
                     $data['interval'.($i+1).'Duration_error'] = "Please enter interval duration";
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
               
               $this->ServiceModel->addService($data,$slotNo);
               $this->ServiceModel->addServiceProvider($data);
               $this->ServiceModel->addTimeSlot($data, $slotNo);
               $this->ServiceModel->addIntervalTimeSlot($data, $slotNo);
               $this->ServiceModel->addResourcesToService($data, $slotNo);

               header('location: ' . URLROOT . '/MangDashboard/services');
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

            'selectedSlotDetails' => [],
            'selectedIntervalDetails' => [],
            'selectedSlotResDetails' => [],

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
      validateSession([6]);
      $serviceProvidersList = $this->ServiceModel->getServiceProvidersByService($serviceID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($serviceProvidersList));

      // return json_encode($serviceProvidersList, JSON_NUMERIC_CHECK);
   }

   public function getServiceDuration($serviceID)
   {
      validateSession([6]);
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

   public function viewService($serviceID)
   {
      $sNoofSlots = $this->ServiceModel->getNoofSlots($serviceID);
      $sOneDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $sSprovDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);

      $sSlot1Duration = $this->ServiceModel->getSlot1Duration($serviceID);
      $sSlot2Duration = $this->ServiceModel->getSlot2Duration($serviceID);
      $sSlot3Duration = $this->ServiceModel->getSlot3Duration($serviceID);

      $sInterval1Duration = $this->ServiceModel->getInterval1Duration($serviceID);
      $sInterval2Duration = $this->ServiceModel->getInterval2Duration($serviceID);

      $sAllocatedResDetailsSlot1 = $this->ServiceModel->getAllocatedResourceDetailsofSlot1($serviceID);
      $sAllocatedResDetailsSlot2 = $this->ServiceModel->getAllocatedResourceDetailsofSlot2($serviceID);
      $sAllocatedResDetailsSlot3 = $this->ServiceModel->getAllocatedResourceDetailsofSlot3($serviceID);

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

   public function updateService()
   {
      $this->view('manager/mang_serviceUpdate');
   }
   public function serviceReport()
   {
      $this->view('common/serviceReport');
   }
   public function serviceProviderReport()
   {
      $this->view('common/serviceProviderReport');
   }
}
