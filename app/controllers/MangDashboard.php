<?php
class MangDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->serviceModel = $this->model('ServiceModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->staffModel = $this->model('StaffModel');
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
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('manager/mang_staffMembers', $GetStaffArray);
   }
   public function services()
   {
      $sDetails = $this->serviceModel->getServiceDetails();

      $GetServicesArray = [
         'services' => $sDetails
      ];

      $this->view('manager/mang_services',  $GetServicesArray);
   }
   public function resources()
   {
      $resourceDetails = $this->serviceModel->getResourceDetails();

      $data = [
         'resource' => $resourceDetails
      ];
      $this->view('manager/mang_resources', $data);
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
