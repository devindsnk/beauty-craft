<?php
class MangDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
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
   public function subLeaveRequests()
   {
      $this->view('manager/mang_subLeaveRequests');
   }
   public function subTakeLeave()
   {
      $this->view('manager/mang_subTakeLeave');
   }
   public function subAnalyticsOverall()
   {
      $this->view('manager/mang_subAnalyticsOverall');
   }
   public function subAnalyticsService()
   {
      $this->view('manager/mang_subAnalyticsService');
   }
   public function subAnalyticsSProvider()
   {
      $this->view('manager/mang_subAnalyticsSProvider');
   }
}
