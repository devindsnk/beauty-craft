<?php
class Staff extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function addStaff()
   {
      $this->view('owner/own_staffAdd');
   }
   public function updateStaff()
   {
      $this->view('owner/own_staffUpdate');
   }
   public function viewStaff()
   {
      $this->view('owner/own_staffView');
   }
   public function salaryReport()
   {
      $this->view('owner/own_Salaries_Salary_Report');
   }

}