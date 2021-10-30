<?php
class OwnDashboard extends Controller
{
   // Session validation is only applied to the constructor
   // bcz a dashboard controller 
   public function __construct()
   {
      validateSession([2]);
      $this->staffModel = $this->model('StaffModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->resourceModel = $this->model('ResourceModel');
      $this->ratesModel = $this->model('RatesModel');
      // $this->customerModel= $this->model('CustomerModel');

   }
   public function home()
   {
      redirect('OwnDashboard/overview');
   }
   public function closeSalon()
   {
      $this->view('owner/own_closeSalon');
   }
   public function customers()
   {
      $this->view('owner/own_customers');
   }
   public function cusDetailView()
   {
      $this->view('common/customerView');
   }
   public function overview()
   {
      $this->view('owner/own_overview');
   }
   public function rates()
   {
      
      $LeavelimitsDetails = $this->ratesModel->getLeaveLimitsDetails();
      // $GetLeaveLimitsArray = ['leavelimits' => $LeavelimitsDetails];
      // print_r($GetLeaveLimitsArray);
      // $this->view('owner/own_rates',  $LeavelimitsDetails);
      $this->view('owner/own_rates',  $LeavelimitsDetails[0]);

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
        $data = [
            'managerLeaveLimit' => trim($_POST['managerLeaveLimit']),
            'serviceProviderLeaveLimit' => trim($_POST['serviceProviderLeaveLimit']),
            'receptionistLeaveLimit' => trim($_POST['receptionistLeaveLimit']),
            'managerLeaveLimit_error' => '',
            'serviceProviderLeaveLimit_error' => '',
            'receptionistLeaveLimit_error' => '',
         ];

         if (empty($data['managerLeaveLimit']))
         {
            $data['managerLeaveLimit_error'] = "Please insert a image";
         }
         // Validating fname
         if (empty($data['serviceProviderLeaveLimit']))
        {
         $data['serviceProviderLeaveLimit_error'] = "Please enter First Name";
        }

        // Validating lname
        if (empty($data['receptionistLeaveLimit']))
        {
         $data['receptionistLeaveLimit_error'] = "Please enter Last Name";
        }
        if (
            empty($data['managerLeaveLimit_error']) && empty($data['serviceProviderLeaveLimit_error']) && empty($data['receptionistLeaveLimit_error']))
          {

            // print_r($data);
            $this->ratesModel->updateLeaveLimitDeatils($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }
      else
      {

         $data = [
            'managerLeaveLimit' => '',
            'serviceProviderLeaveLimit' => '',
            'receptionistLeaveLimit' => '',
            'managerLeaveLimit_error' => '',
            'serviceProviderLeaveLimit_error' => '',
            'receptionistLeaveLimit_error' => '',
         ];
         $this->view('owner/own_rates', $data);
      }





   }
   public function salaries()
   {
      $this->view('owner/own_salaries');
   }
   public function services()
   {
      $sDetails = $this->serviceModel->getServiceDetails();
      $GetServicesArray = [
         'services' => $sDetails
      ];
      $this->view('owner/own_services', $GetServicesArray);

      
   }
   public function staff()
   {
      $staffDetails = $this->staffModel->getStaffDetails();
      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('owner/own_staff', $GetStaffArray);
   }
   public function analyticsOverall()
   {
      $this->view('owner/own_subAnalyticsOverall');
   }
   public function analyticsService()
   {
      $this->view('owner/own_subAnalyticsService');
   }
   public function analyticsSProvider()
   {
      $this->view('owner/own_subAnalyticsSProvider');
   }
}
