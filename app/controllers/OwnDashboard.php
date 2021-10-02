<?php
class OwnDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }
   public function overview()
   {
      $this->view('owner/own_overview');
   }
}
