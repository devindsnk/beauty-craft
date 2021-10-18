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
      $sProvGetArray=$this->getServiceProvider();
      $sTypeGetArray=$this->getServiceType();
      $sResGetArray=$this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){

         $data = [
            'sName' => trim($_POST['sName']),

            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',

            'sNewType' => trim($_POST['sNewType']),

            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            
            'sPrice' => trim($_POST['sPrice']),

            'sSlot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',

            'sSelectedResourse' => isset($_POST['resourceCheckbox']) ? $_POST['resourceCheckbox'] : '',
            
            'sSelectedResCount' => isset($_POST['$resName']) ? trim($_POST['$resName']) : '' ,

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],
            
            'sName_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',
            'sSlot1Duration_error' => '',
            'sSelectedResourse_error' => '',
            'sSelectedResCount_error' => '',
            
         ];
         
         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         if ($_POST['action'] == "addService"){

            if (empty($data['sName'])) {
               $data['sName_error'] = "Please enter service name";
            }
            if (empty($data['sSelectedType']) && empty($data['sNewType'])) {
               $data['sSelectedAllType_error'] = "Please select or enter service type";
            }
            if (!empty($data['sSelectedType']) && !empty($data['sNewType'])) {
               $data['sSelectedAllType_error'] = "Please clear one from selected or entered service type";
            }
            if (empty($data['sSelectedProv'])) {
               $data['sSelectedSProve_error'] = "Please select service provider";
            }
            if (empty($data['sPrice'])) {
               $data['sPrice_error'] = "Please enter service price";
            }elseif(!is_numeric($data['sPrice'])) {
               $data['sPrice_error'] = "Please enter a numeric value for price";
            }
            if (empty($data['sSlot1Duration'])) {
               $data['sSlot1Duration_error'] = "Please enter slot1 duration";
            }
            if (empty($data['sSelectedResourse'])) {
               $data['sSelectedResourse_error'] = "Please checked the check box";
            }
            if (empty($data['sSelectedResCount'])) {
               $data['sSelectedResCount_error'] = "Please select a count";
            }

            if(empty($data['sName_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error'])){
               
               $this->ServiceModel->addService($data);

               $this->ServiceModel->addServiceProvider($data);

               $this->ServiceModel->addTimeSlot($data, $slotNo);

               if(empty($data['sSelectedResourse_error']) ){

                  $this->ServiceModel->addResourcesToService($data, $slotNo);

               }

               header('location: ' . URLROOT . '/MangDashboard/services');
            }else{
               $this->view('manager/mang_serviceAdd', $data);
            }

         }else{
            die("Something went wrong");
         }
         
      }else{
         
         $data = [
            'sName' => '',
            'sSelectedType' => '',
            'sNewType' => '',
            'sPrice' => '',
            'sSelectedProv' => [], 
            'sSlot1Duration' => '',
            'sSelectedResourse' => '',

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],

            'sName_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',
            'sSlot1Duration_error' => '',
            'sSelectedResourse_error' => '',
         ];


         $data['sProvArray'] = $sProvGetArray;
         $data['sTypesArray'] = $sTypeGetArray;
         $data['sResArray'] = $sResGetArray;

         // print_r($data['sProvArray']);
         
         // print_r($data['sTypesArray']);
        
         // print_r($data['sResArray']);

         $this->view('manager/mang_serviceAdd', $data);
      }
     
   }

   public function getServiceProvider(){
      
      $sProv = $this->ServiceModel->getServiceProviderDetails();

      return $sProv;
   }

   public function getServiceType(){
      
      $sType = $this->ServiceModel->getServiceTypeDetails();

      return $sType;
   }

   public function getResource(){
      
      $sResource = $this->ServiceModel->getResourceDetails();

      return $sResource;

   }

   public function viewService($serviceID)
   {
      $sOneDetails = $this->ServiceModel->getOneServiceDetail($serviceID);
      $sSprovDetails = $this->ServiceModel->getOneServicesSProvDetail($serviceID);
      $sAllocatedResDetails = $this->ServiceModel->getAllocatedResourceDetails($serviceID);
      
      $GetOneServicesArray = [
         'services' => $sOneDetails,
         'sProv' => $sSprovDetails,
         'sRes' => $sAllocatedResDetails
      ];
      
      $this->view('manager/mang_serviceView', $GetOneServicesArray);
   }
   
   public function updateService()
   {
      $this->view('manager/mang_serviceUpdate');
   }
}
