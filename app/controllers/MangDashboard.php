<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class MangDashboard extends Controller
{
   public function __construct()
   {
      validateSession([3]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->staffModel = $this->model('StaffModel');
      $this->leaveModel = $this->model('LeaveModel');
   }
   public function home()
   {
      redirect('MangDashboard/overview');
   }
   public function overview()
   {
      // validateSession([3]);
      $this->view('manager/mang_overview');
   }
   public function reservations()
   {
      // validateSession([3]);
      $this->view('manager/mang_reservations');
   }
   public function customers()
   {
      // validateSession([3]);
      $this->view('manager/mang_customers');
   }
   public function staffMembers()
   {
      // validateSession([3]);
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('manager/mang_staffMembers', $GetStaffArray);
   }
   public function services()
   {
      // validateSession([3]);
      $sDetails = $this->serviceModel->getServiceDetails();

      // $GetServicesArray = [
      //    'services' => $sDetails
      // ];

      $this->view('manager/mang_services',  $sDetails);
   }
   public function resources()
   {
      // validateSession([3]);
      $resourceDetails = $this->serviceModel->getResourceDetails();

      $data = [
         'resource' => $resourceDetails
      ];
      $this->view('manager/mang_resources', $data);
   }
   public function leaveRequests()
   {
      // validateSession([3]);
      $leaveDetails = $this->leaveModel->getAllLeaveRequests();

      // $GetLeavesArray = [
      //    'leaves' => $leaveDetails
      // ];

      $this->view('manager/mang_subLeaveRequests',  $leaveDetails);
   }
   public function takeLeave()
   {
      // validateSession([3]);
      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves();

      // $GetManagerLeavesArray = [
      //    'leaves' => $managerLeaveDetails
      // ];

      $this->view('manager/mang_subTakeLeave',  $managerLeaveDetails);
   }
   public function analyticsOverall()
   {
      // validateSession([3]);
      $this->view('manager/mang_subAnalyticsOverall');
   }
   public function analyticsService()
   {
      // validateSession([3]);
      $this->view('manager/mang_subAnalyticsService');
   }
   public function analyticsSProvider()
   {
      // validateSession([3]);
      $this->view('manager/mang_subAnalyticsSProvider');
   }
}
