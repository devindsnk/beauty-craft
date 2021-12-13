<?php

// Session validation is only applied to the constructor
// bcz a dashboard controller 
class MangDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([3]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->staffModel = $this->model('StaffModel');
      $this->leaveModel = $this->model('LeaveModel');
      $this->reservationModel = $this->model('reservationModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->leaveModel = $this->model('LeaveModel');
   }
   public function home()
   {
      redirect('MangDashboard/overview');
   }
   public function overview()
   {
      // Session::validateSession([3]);

      $totalIncome = $this->reservationModel->getTotalIncomeForMangOverview();
      $upcommingReservations = $this->reservationModel->getUpcommingReservationsNoForMangOverview();
      $availableServices = $this->serviceModel->getAvailableServiceCount();
      $availableServiceProviders = $this->serviceModel->getAvailableServiceProvidersCount();
      $activeCustomers = $this->customerModel->getActiveCustomerCount();
      $activeReceptionists = $this->staffModel->getReceptionistCount();
      $activeManagers = $this->staffModel->getManagerCount();
      $pendingLeaveRequests = $this->leaveModel->getPendingLeaveRequestCount();

      $mangOverviewDetails = [
         'totalIncome' => $totalIncome,
         'upcommingReservations' => $upcommingReservations,
         'availableServices' => $availableServices,
         'availableServiceProviders' => $availableServiceProviders,
         'activeCustomers' => $activeCustomers,
         'activeReceptionists' => $activeReceptionists,
         'activeManagers' => $activeManagers,
         'pendingLeaveRequests' => $pendingLeaveRequests
      ];

      $this->view('manager/mang_overview',  $mangOverviewDetails);
   }
   public function reservations()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_reservations');
   }
   public function customers()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_customers');
   }
   public function staffMembers()
   {
      // Session::validateSession([3]);
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('manager/mang_staffMembers', $GetStaffArray);
   }
   public function services()
   {
      // Session::validateSession([3]);
      $sDetails = $this->serviceModel->getServiceDetails();

      // $GetServicesArray = [
      //    'services' => $sDetails
      // ];

      $this->view('manager/mang_services',  $sDetails);
   }
   public function resources()
   {
      // Session::validateSession([3]);
      $resourceDetails = $this->serviceModel->getResourceDetails();

      $data = [
         'resource' => $resourceDetails
      ];
      $this->view('manager/mang_resources', $data);
   }
   public function leaveRequests()
   {
      // Session::validateSession([3]);
      $leaveDetails = $this->leaveModel->getAllLeaveRequests();

      // $GetLeavesArray = [
      //    'leaves' => $leaveDetails
      // ];

      $this->view('manager/mang_subLeaveRequests',  $leaveDetails);
   }
   public function takeLeave()
   {
      // Session::validateSession([3]);
      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves();

      // $GetManagerLeavesArray = [
      //    'leaves' => $managerLeaveDetails
      // ];

      $this->view('manager/mang_subTakeLeave',  $managerLeaveDetails);
   }
   public function analyticsOverall()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_subAnalyticsOverall');
   }
   public function analyticsService()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_subAnalyticsService');
   }
   public function analyticsSProvider()
   {
      // Session::validateSession([3]);
      $this->view('manager/mang_subAnalyticsSProvider');
   }
}
