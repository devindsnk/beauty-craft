<?php
class MangDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }
   public function home()
   {
      redirect('MangDashboard/overview');
   }
   public function overview()
   {
      $this->view('manager/mang_overview');
   }
   public function reservations()
   {
      $this->view('manager/mang_reservations');
   }
   public function customers()
   {
      $this->view('manager/mang_customers');
   }
   public function staffMembers()
   {
      $this->view('manager/mang_staffMembers');
   }
   public function services()
   {
      $this->view('manager/mang_services');
   }
   public function resources()
   {
      $this->view('manager/mang_resources');
   }
   public function leaveRequests()
   {
      $this->view('manager/mang_subLeaveRequests');
   }
   public function takeLeave()
   {
      $this->view('manager/mang_subTakeLeave');
   }
   public function analyticsOverall()
   {
      $this->view('manager/mang_subAnalyticsOverall');
   }
   public function analyticsService()
   {
      $this->view('manager/mang_subAnalyticsService');
   }
   public function analyticsSProvider()
   {
      $this->view('manager/mang_subAnalyticsSProvider');
   }
}
