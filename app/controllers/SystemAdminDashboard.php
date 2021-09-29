<?php
class MangDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function systemlog()
   {
      $this->view('systemAdmin/systemAdmin_systemlog');
   }
   public function staff()
   {
      $this->view('systemAdmin/systemAdmin_staff');
   }
   public function customer()
   {
      $this->view('systemAdmin/systemAdmin_customer');
   }
 
}
