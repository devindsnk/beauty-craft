<?php
class Services extends Controller
{
   public function __construct()
   {
      // $this->ServiceModel = $this->model('ServiceModel');
   }

   // public function addNewService()
   // {
   //    if($_SERVER('REQUEST_METHOD') == 'POST'){
   //       $data = [
   //          'sName' => trim($_POST['sName']),
   //          'sPrice' => trim($_POST['sPrice']),
   //       ];
   //    }else{
   //       $data = [
   //          'sName' => '',
   //          'sType' => '',

   //       ];
   //       $this->view('manager/mang_serviceAdd', $data);
   //    }
   // }
   public function addService2()
   {
      $this->view('manager/mang_serviceAdd2');
   }
   public function viewService()
   {
      $this->view('manager/mang_serviceView');
   }
   public function updateService()
   {
      $this->view('manager/mang_serviceUpdate');
   }
}