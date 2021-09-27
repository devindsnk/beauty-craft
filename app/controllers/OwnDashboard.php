<?php
class OwnDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }
   public function staff()
   {
      $this->view('owner/own_staff');
   }


}