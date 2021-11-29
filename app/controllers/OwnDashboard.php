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
      $this->closedDatesModel = $this->model('ClosedDatesModel');
      $this->customerModel = $this->model('CustomerModel');
      
      // $this->customerModel= $this->model('CustomerModel');

   }
   public function home()
   {
      redirect('OwnDashboard/overview');
      // $this->view('owner/own_overview', $getManagerCount);
   }
   public function closeSalon()
   {
      $closeDatesDetails = $this->closedDatesModel->getCloseDatesDetails();
      printf('\n');
      print_r($closeDatesDetails);
      // 'closeDates' => $closeDatesDetails

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'closeDate' => trim($_POST['closeDate']),
            'closeSalonReason' => isset($_POST['closeSalonReason']) ? trim($_POST['closeSalonReason']) : '',
            'closeDate_error' => '',
            'closeSalonReason_error' => '',
            'haveErrors' => 0,
            'closeDates' => $closeDatesDetails
         ];
         // $date_now = new DateTime();
         // $date_selected = $data['closeDate'];
         if ($_POST['action'] == "addCloseDate")
         {
            if (empty($data['closeDate']))
            {
               $data['closeDate_error'] = "Please select a date";
            }
            // else if($date_now > $date_selected){
            //    $data['closeDate_error'] = "Please select a future date";
            // }

            if (empty($data['closeSalonReason']))
            {
               $data['closeSalonReason_error'] = "Please select number of resource";
            }
            if (
               empty($data['closeSalonReason_error']) && empty($data['closeDate_error'])
            )
            {
               $this->closedDatesModel->addCloseDate($data);
               redirect('OwnDashboard/closeSalon');
            }
            else
         {
            $data['haveErrors'] = 1;
            $this->view('owner/own_closeSalon', $data);
         }
            
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            $this->view('owner/own_closeSalon', $data);
         }
      }
      else
      {
         // die('success');
         $data = [
            'closeDate' => '',
            'closeSalonReason' => '',
            'closeDate_error' => '',
            'closeSalonReason_error' => '',
            'haveErrors' => 0,
            'closeDates' => $closeDatesDetails 
         ]; 
         print_r($data['closeDates']); 
         $this->view('owner/own_closeSalon', $data); 
         
      }
   }
   public function customers()
   {
      $CusDetails=$this->customerModel->getAllCustomerDetails();
      // $this->view('owner/own_customers', $cusDetails);      
      $GetCustomerArray = ['customer' => $CusDetails];
      $this->view('owner/own_customers', $GetCustomerArray);
   }
   
   public function overview()
   {
      $this->view('owner/own_overview');
   }
   public function rates()
   {
      // die('success');
      $LeavelimitsDetails = $this->ratesModel->getLeaveLimitsDetails();
      $SalaryRateDetails = $this->ratesModel->getSalaryRateDetails(); 
      $CommsionRateDetails = $this->ratesModel->getCommissionRateDetails(); 
      $MinimumNumberOfManagers = $this->ratesModel->getMinimumNumberOfManagers(); 
      // print_r($SalaryRateDetails); 
      // print_r($CommsionRateDetails);  
      // $GetLeaveLimitsArray = ['leavelimits' => $LeavelimitsDetails];
      // print_r($LeavelimitsDetails);
      // $this->view('owner/own_rates',  $LeavelimitsDetails);
      // $this->view('owner/own_rates',  $LeavelimitsDetails[0]);
      // $this->view('owner/own_rates',  $LeavelimitsDetails[0]);

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // die('success');
        $data = [
            'managerLeaveLimit' => trim($_POST['managerLeaveLimit']),
            'serviceProviderLeaveLimit' => trim($_POST['serviceProviderLeaveLimit']),
            'receptionistLeaveLimit' => trim($_POST['receptionistLeaveLimit']),
            'managerLeaveLimit_error' => '',
            'serviceProviderLeaveLimit_error' => '',
            'receptionistLeaveLimit_error' => '',

            'managerSalaryRate' => trim($_POST['managerSalaryRate']),
            'serviceProviderSalaryRate' => trim($_POST['serviceProviderSalaryRate']),
            'receptionistSalaryRate' => trim($_POST['receptionistSalaryRate']),
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',

            'minimumNumberOfManagers' =>  trim($_POST['minimumNumberOfManagers']),
            'minimumNumberOfManagers_error' => '',

            'commisionRate' =>  trim($_POST['commisionRate']),
            'commisionRate_error' => '',
            
            'leaveLimits' => $LeavelimitsDetails[0],
            'salaryRates' => $SalaryRateDetails[0],
            'commissionRates'=>$CommsionRateDetails[0],
            'minimumNoOfManagers' =>$MinimumNumberOfManagers[0],
         ];
         if ($_POST['action'] == "saveLeaveLimits")
         {
         if (empty($data['managerLeaveLimit']))
         {
            $data['managerLeaveLimit_error'] = "Please insert manager leave limit";
         }
         // Validating fname
         if (empty($data['serviceProviderLeaveLimit']))
        {
         $data['serviceProviderLeaveLimit_error'] = "Please enter service provider leave limit";
        }

        // Validating lname
        if (empty($data['receptionistLeaveLimit']))
        {
         $data['receptionistLeaveLimit_error'] = "Please enter receptionist leave limit";
        }
        if(
            empty($data['managerLeaveLimit_error']) && empty($data['serviceProviderLeaveLimit_error']) && empty($data['receptionistLeaveLimit_error']))
          {
            // die('success');
            // print_r($data);
            $this->ratesModel->updateLeaveLimitDeatils($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }

      if ($_POST['action'] == "saveSalaryRates")
      {
      if (empty($data['managerSalaryRate']))
      {
         $data['managerSalaryRate_error'] = "Please insert manager leave limit";
      }
      // Validating fname
      if (empty($data['serviceProviderSalaryRate']))
     {
      $data['serviceProviderSalaryRate_error'] = "Please enter service provider leave limit";
     }

     // Validating lname
     if (empty($data['receptionistSalaryRate']))
     {
      $data['receptionistSalaryRate_error'] = "Please enter receptionist leave limit";
     }
     if(
         empty($data['managerSalaryRate _error']) && empty($data['serviceProviderSalaryRate_error']) && empty($data['receptionistSalaryRate_error']))
       {
         // die('success');
         // print_r($data);
         $this->ratesModel->updateSalaryRateDetails($data);
         $this->view('owner/own_rates', $data);
      }
      else
      {
         $this->view('owner/own_rates', $data);
      }
   }

   if ($_POST['action'] == "saveCommissionRate")
   {
   if (empty($data['commisionRate']))
   {
      $data['commisionRate_error'] = "Please insert manager leave limit";
   }
  
  if(
      empty($data['commisionRate_error']))
    {
      // die('success');
      // print_r($data);
      $this->ratesModel->updateCommissionRateDetails($data);
      $this->view('owner/own_rates', $data);
   }
   else
   {
      $this->view('owner/own_rates', $data);
   }
}

if ($_POST['action'] == "saveMinimumNumberOfManagers")
   {
   if (empty($data['minimumNumberOfManagers']))
   {
      $data['minimumNumberOfManagers_error'] = "Please insert manager leave limit";
   }
  
  if(
      empty($data['minimumNumberOfManagers_error']))
    {
      // die('success');
      print_r($data);
      $this->ratesModel->updateMinimumNumberOfManagers($data);
      $this->view('owner/own_rates', $data);
   }
   else
   {
      $this->view('owner/own_rates', $data);
   }
}
      
   }
   else
   {
      // die('success');
      $data = [
         'managerLeaveLimit' => '',
         'serviceProviderLeaveLimit' => '',
         'receptionistLeaveLimit' => '',
         'managerLeaveLimit_error' => '',
         'serviceProviderLeaveLimit_error' => '',
         'receptionistLeaveLimit_error' => '',
         'managerSalaryRate' => '',
         'serviceProviderSalaryRate' => '',
         'receptionistSalaryRate' => '',
         'managerSalaryRate_error' => '',
         'serviceProviderSalaryRate_error' => '',
         'receptionistSalaryRate_error' => '',
         'commisionRate' => '',
         'commisionRate_error' => '',
         'minimumNumberOfManagers' =>  '',
         'minimumNumberOfManagers_error' => '',
         'leaveLimits' => $LeavelimitsDetails[0],
         'salaryRates' => $SalaryRateDetails[0],
         'commissionRates'=>$CommsionRateDetails[0],
         'minimumNoOfManagers' =>  $MinimumNumberOfManagers[0],
      ];
      // print_r($data);
      $this->view('owner/own_rates', $data);
   }
 
      
   }

   public function reservations()
   {
      $this->view('owner/own_reservations');
   }
   
public function resources()
{
   $resourceDetails = $this->serviceModel->getResourceDetails();

   if ($_SERVER['REQUEST_METHOD'] == 'POST')
   {
      $data = [
         'resourceName' => trim($_POST['resourceName']),
         'resourceQuantity' => isset($_POST['resourceQuantity']) ? trim($_POST['resourceQuantity']) : '',
         'resourceName_error' => '',
         'resourceQuantity_error' => '',
         'haveErrors' => 0,
         'resource' => $resourceDetails
      ];
      // Validating ResName
      if ($_POST['action'] == "addResource")
      {
         if (empty($data['resourceName']))
         {
            $data['resourceName_error'] = "Please enter Resource Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['resourceName']))
         {
            $data['resourceName_error']  = "Only letters are allowed";
         }

         // Validating 
         if (empty($data['resourceQuantity']))
         {
            $data['resourceQuantity_error'] = "Please select number of resource";
         }
         if (
            empty($data['resourceName_error']) && empty($data['resourceQuantity_error'])
         )
         {
            $this->resourceModel->addResourceDetails($data);
            redirect('OwnDashboard/resources');
         }
         else
         {
            $data['haveErrors'] = 1;
            $this->view('owner/own_resources', $data);
         }
      }
      else if ($_POST['action'] == "cancel")
      {
         $data['haveErrors'] = 0;
         $this->view('owner/own_resources', $data);
      }
   }
   else
   {
      $data = [
         'resourceName' => '',
         'resourceQuantity' => '',
         'resourceName_error' => '',
         'resourceQuantity_error' => '',
         'haveErrors' => 0,
         'resource' => $resourceDetails
      ];
      $this->view('owner/own_resources', $data);
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
      $staffDetails = $this->staffModel->getAllStaffDetails();
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