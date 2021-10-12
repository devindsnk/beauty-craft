<?php
class Services extends Controller
{
   public function __construct()
   {
      $this->ServiceModel = $this->model('ServiceModel');
   }

   public function addNewService()
   {
      $sProvGetArray=$this->getServiceProvider();
      $sTypeGetArray=$this->getServiceType();
      $sResGetArray=$this->getResource();

      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
      // die("error");

         $data = [
            'sName' => trim($_POST['sName']),

            // 'sSelectedType' => trim($_POST['serviceType']),
            'sSelectedType' => isset($_POST['serviceType']) ? trim($_POST['serviceType']) : '',

            'sNewType' => trim($_POST['sNewType']),

            // 'sSelectedProv' => trim($_POST['serProvCheckbox']), 
            'sSelectedProv' => isset($_POST['serProvCheckbox']) ? $_POST['serProvCheckbox'] : '',
            
            'sPrice' => trim($_POST['sPrice']),

            'sSlot1Duration' => isset($_POST['slot1Duration']) ? trim($_POST['slot1Duration']) : '',

            'sSelectedResourse' => isset($_POST['resourceCheckbox']) ? $_POST['resourceCheckbox'] : '',

            'sSelectedResCount' => isset($_POST['serviceResCount']) ? trim($_POST['serviceResCount']) : '',

            'sTypesArray' => [],
            'sProvArray' => [],
            'sResArray' => [],
            
            'sName_error' => '',
            'sSelectedAllType_error' => '',
            'sSelectedSProve_error' => '',
            'sPrice_error' => '',
            'sSlot1Duration_error' => '',
            'sSelectedResourse_error' => '',
            'sSelectedResCount' => '',
            
         ];

         // $data['sSlot1Duration'] = (int)$data['sSlot1Duration'];

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
            }
            if (empty($data['sSlot1Duration'])) {
               $data['sSlot1Duration_error'] = "Please enter slot1 duration";
            }

            if(empty($data['sName_error']) && empty($data['sPrice_error']) && empty($data['sSelectedAllType_error']) && empty($data['sSelectedSProve_error']) && empty($data['sSlot1Duration_error'])){
               
               $this->ServiceModel->addService($data);

               $this->ServiceModel->addServiceProvider($data);

               $this->ServiceModel->addResourcesToService($data);

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
            'sSelectedProv' => '', 
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

         // $data['sProvArray'] = $this->getServiceProvider();
         // $data['sTypesArray'] = $this->getServiceType();
         // $data['sResArray'] = $this->getResource();

         print_r($data['sProvArray']);
         
         print_r($data['sTypesArray']);
        
         print_r($data['sResArray']);
         

         $this->view('manager/mang_serviceAdd', $data);
      }
     
   }

   public function getServiceProvider(){
      
      $sProv = $this->ServiceModel->getServiceProviderDetails();
      // die("error");
      
      // print_r($sProv);

      return $sProv;
   }

   public function getServiceType(){
      
      $sType = $this->ServiceModel->getServiceTypeDetails();

      // print_r($sType);

      return $sType;
   }

   public function getResource(){
      
      $sResource = $this->ServiceModel->getResourceDetails();

      // print_r($sResource);
      
      return $sResource;
   }

   public function addService2()
   {
      $this->view('manager/mang_serviceAdd2');
   }
   public function viewService()
   {
      $this->view('manager/mang_serviceView');
   }
   public function viewService2()
   {
      $this->view('manager/mang_serviceView2');
   }
   public function updateService()
   {
      $this->view('manager/mang_serviceUpdate');
   }
}
