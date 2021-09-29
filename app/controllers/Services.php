<?php
class Services extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function addService()
   {
      $this->view('manager/mang_serviceAdd');
   }
}