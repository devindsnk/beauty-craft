<?php
class Salary extends Controller
{
   public function __construct()
   {
    //   $this->userModel = $this->model('UserModel');
    //   $this->staffModel = $this->model('StaffModel');
   }

   public function salaryReport()
   {
      $this->view('owner/own_salaryReportView');
   }

}