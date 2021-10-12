<?php
class Services extends Controller
{
   public function __construct()
   {
      // $this->ServiceModel = $this->model('ServiceModel');
   }

   public function addService()
   {
      // if($_SERVER('REQUEST_METHOD') == 'POST'){

      // }else{
      //    $data = [
      //       'sName' => '',
      //       'sType' => '',

      //       'sPrice' => '',

      //    ]
      $this->view('manager/mang_serviceAdd');
      // $this->view('manager/mang_serviceAdd', $data);
      // }
   }
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
