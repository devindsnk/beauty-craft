<?php
class SysAdminDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function systemlog()
   {
      $this->view('systemAdmin/systemAdmin_systemlog');
   }
   public function Staff()
   {
      $this->view('systemAdmin/systemAdmin_staff');
   }
   public function Customer()
   {
      $this->view('systemAdmin/systemAdmin_customer');
   }
 
}
