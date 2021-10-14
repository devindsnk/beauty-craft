<?php
class OwnDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->staffModel = $this->model('StaffModel');
   }
   public function home()
   {
      redirect('OwnDashboard/overview');
   }
   public function analytics()
   {
      $this->view('owner/own_analytics');
   }
   public function closeSalon()
   {
      $this->view('owner/own_closeSalon');
   }
   public function customers()
   {
      $this->view('owner/own_customers');
   }
   public function overview()
   {
      $this->view('owner/own_overview');
   }
   public function rates()
   {
      $this->view('owner/own_rates');
   }
   public function reservations()
   {
      $this->view('owner/own_reservations');
   }
   public function resources()
   {
      $this->view('owner/own_resources');
   }
   public function salaries()
   {
      $this->view('owner/own_salaries');
   }
   public function services()
   {
      $this->view('owner/own_services');
   }
   public function staff()
   {
      $staffDetails=$this->staffModel->getStaffDetails();

      $GetStaffArray =['staff' => $staffDetails];
      $this->view('owner/own_staff',$GetStaffArray );

   }
}
