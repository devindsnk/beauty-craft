<?php
class Services extends Controller
{
   public function __construct()
   {
      $this->ServiceModel = $this->model('ServiceModel');
   }

   public function getServiceProvider(){

      $sProv = $this->ServiceModel->getServiceProviderDetails();

      $data = [
         'sProv' => $sProv
      ];

      $this->view('manager/mang_serviceAdd');
   }

   public function getServiceType(){
      
      $sType = $this->ServiceModel->getServiceTypeDetails();

      $data = [
         'sType' => $sType
      ];

      $this->view('manager/mang_serviceAdd');
   }

   public function getResource(){
      
      $sType = $this->ServiceModel->getResourceDetails();

      $data = [
         'sResource' => $sResource
      ];

      $this->view('manager/mang_serviceAdd');
   }

   public function addNewService()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST'){
         $data = [
            'sName' => trim($_POST['sName']),
            'sPrice' => trim($_POST['sPrice']),

            'sName_error' => '',
            'sPrice_error' => '',
         ];

         // Validating sName
         if (empty($data['sName'])) {
            $data['sName_error'] = "Please enter service name";
         }

         // Validating sPrice
         if (empty($data['sPrice'])) {
            $data['sPrice_error'] = "Please enter service price";
         }
         
      }else{
         $data = [
            'sName' => '',
            'sType' => '',

            'sName_error' => '',
            'sPrice_error' => '',
         ];
         $this->view('manager/mang_serviceAdd');
      }
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