<?php
class OwnDashboard extends Controller
{
   // Session validation is only applied to the constructor
   // bcz a dashboard controller 
   public function __construct()
   {
      Session::validateSession([2]);
      $this->staffModel = $this->model('StaffModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->resourceModel = $this->model('ResourceModel');
      $this->ratesModel = $this->model('RatesModel');
      $this->closedDatesModel = $this->model('ClosedDatesModel');
      $this->customerModel = $this->model('CustomerModel');
   }

   public function home()
   {
      redirect('OwnDashboard/overview');
      // $this->view('owner/own_overview', $getManagerCount);
   }

   public function closeSalon()
   {
      $closeDatesDetails = $this->closedDatesModel->getCloseDatesDetails();
      $CurrentCloseDateaCount = sizeof($closeDatesDetails);
      $date_now = date("Y-m-d");

      if ($_SERVER['REQUEST_METHOD'] == 'POST')

      {
         $data = [
            'closeDate' => trim($_POST['closeDate']),
            'closeSalonReason' => isset($_POST['closeSalonReason']) ? trim($_POST['closeSalonReason']) : '',
            'closeDate_error' => '',
            'closeSalonReason_error' => '',
            'haveErrors' => 0,
            'closeDates' => $closeDatesDetails,
         ];

         if ($_POST['action'] == "addCloseDate")
         {
            if (empty($data['closeDate']))
            {
               $data['closeDate_error'] = "Please select a date";
            }
            else if ($date_now > $data['closeDate'])
            {
               $data['closeDate_error'] = "Please select a future date";
            }
            else
            {
               for ($x = 0; $x < $CurrentCloseDateaCount; $x++)
               {
                  if ($data['closeDate'] == $closeDatesDetails[$x]->date)
                  {
                     $data['closeDate_error'] = "Date already selected";
                  }
               }
            }

            if (empty($data['closeSalonReason']))
            {
               $data['closeSalonReason_error'] = "Please add a reason";
            }

            if (
               empty($data['closeSalonReason_error']) && empty($data['closeDate_error'])
            )
            {
               $this->closedDatesModel->addCloseDate($data);
               Toast::setToast(1, "Close date added successfully", "");
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
         $data = [
            'closeDate' => '',
            'closeSalonReason' => '',
            'closeDate_error' => '',
            'closeSalonReason_error' => '',
            'haveErrors' => 0,
            'closeDates' => $closeDatesDetails,
         ];
         $this->view('owner/own_closeSalon', $data);
      }
   }

   public function customers()
   {
      $CusDetails = $this->customerModel->getAllCustomerDetails();   
      $GetCustomerArray = ['customer' => $CusDetails];
      $this->view('owner/own_customers', $GetCustomerArray);
   }

   public function overview()
   {
      $this->view('owner/own_overview');
   }

   public function rates()
   {
      $result1 = $this->ratesModel->getLeaveLimitsDetails();
      $result2 = $this->ratesModel->getSalaryRateDetails();
      $result3 = $this->ratesModel->getCommissionRateDetails();
      // $result4 = $this->ratesModel->getMinimumNumberOfManagers();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
// die("rates called");
         $data = [
            'generalLeave' => trim($_POST['generalLeave']),
            'medicalLeave' => trim($_POST['medicalLeave']),
            'managerGeneralLeave' => trim($_POST['managerGeneralLeave']),
            'managerMedicalLeave' => trim($_POST['managerMedicalLeave']),
            'managerDailyLeave' => trim($_POST['managerDailyLeave']),
            'evidenceLimit' => trim($_POST['evidenceLimit']),
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            'managerMedicalLeave_error' => '',
            'managerDailyLeave_error' => '',
            'evidenceLimit_error' => '',

            'managerSalaryRate' => trim($_POST['managerSalaryRate']),
            'serviceProviderSalaryRate' => trim($_POST['serviceProviderSalaryRate']),
            'receptionistSalaryRate' => trim($_POST['receptionistSalaryRate']),
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',

            // 'minimumNumber' =>  trim($_POST['minimumNumber']),
            // 'minimumNumber_error' => '',

            'rate' =>  trim($_POST['rate']),
            'rate_error' => '',

            //is this neeeded to add here 
            // 'leaveLimits' => $result1[0],
            // 'salaryRates' => $result2[0],
            // 'commissionRates' => $result3[0],
            // 'minimumNoOfManagers' => $result4[0],
         ];
         if ($_POST['action'] == "saveLeaveLimits")
         {
            if (empty($data['generalLeave']))
            {
               $data['generalLeave_error'] = "Please insert a value";
            }

            // Validating fname
            if (empty($data['medicalLeave']))
            {
               $data['medicalLeave_error'] =  "Please insert a value";
            }

            // Validating lname
            if (empty($data['managerGeneralLeave']))
            {
               $data['managerGeneralLeave_error'] = "Please insert a value";
            }

            if (empty($data['managerGeneralLeave']))
            {
               $data['managerMedicalLeave_error'] = "Please insert a value";
            }

            if (empty($data['managerMedicalLeave']))
            {
               $data['managerDailyLeave_error'] = "Please insert a value";
            }

            if (empty($data['managerDailyLeave']))
            {
               $data['managerDailyLeave_error'] = "Please insert a value";
            }

            if (empty($data['evidenceLimit']))
            {
               $data['evidenceLimit_error'] = "Please insert a value";
            }

            if (
               empty($data['generalLeave_error']) && empty($data['medicalLeave_error']) && empty($data['managerGeneralLeave_error']) && empty($data['managerMedicalLeave_error']) && empty($data['managerDailyLeave_error']) && empty($data['evidenceLimit_error'])
            )
            {
               $this->ratesModel->updateLeaveLimitDeatils($data);
               Toast::setToast(1, "Leave Limit Successfully Updated!", "");
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
               $data['managerSalaryRate_error'] =  "Please insert a value";
            }
            // Validating fname
            if (empty($data['serviceProviderSalaryRate']))
            {
               $data['serviceProviderSalaryRate_error'] =  "Please insert a value";
            }

            // Validating lname
            if (empty($data['receptionistSalaryRate']))
            {
               $data['receptionistSalaryRate_error'] =  "Please insert a value";
            }
            if (empty($data['managerSalaryRate_error']) && empty($data['serviceProviderSalaryRate_error']) && empty($data['receptionistSalaryRate_error']))
            {
               
               $this->ratesModel->updateSalaryRateDetails($data);
               Toast::setToast(1, "Salary Rate Successfully Updated!", "");
               $this->view('owner/own_rates', $data);
            }
            else
            {
               $this->view('owner/own_rates', $data);
            }
         }

         if ($_POST['action'] == "saveCommissionRate")
         {
            // $data = [
            //    'rate' => trim($_POST['rate']),
            //    'rate_error' => '',
            // ];
            if (empty($data['rate']))
            {
               $data['rate_error'] = "Please insert a image";
            }
            if (empty($data['rate_error']))
            {
               print_r($data);
               // die("if called");
               $this->ratesModel->updateCommissionRateDetails($data);
               Toast::setToast(1, "Commision Rate Successfully Updated!", "");
               $this->view('owner/own_rates', $data);
            }
            else
            {
               // die("else called");
               $this->view('owner/own_rates', $data);
            }
         }

         // if ($_POST['action'] == "saveMinimumNumberOfManagers")
         // {
         //    if (empty($data['minimumNumber']))
         //    {
         //       $data['minimumNumber_error'] = "Please insert a image";
         //    }
         //    if (empty($data['minimumNumber_error']))
         //    {
         //       $this->ratesModel->updateMinimumNumberOfManagers($data);
         //       $this->view('owner/own_rates', $data);
         //    }
         //    else
         //    {
         //       $this->view('owner/own_rates', $data);
         //    }
         // }
      }
      else
      {
         print_r($result1[0]->generalLeave);
         $data = [
            'generalLeave' => $result1[0]->generalLeave,
            'medicalLeave' => $result1[0]->medicalLeave,
            'managerGeneralLeave' =>  $result1[0]->managerGeneralLeave,
            'managerMedicalLeave' =>  $result1[0]->managerMedicalLeave,
            'managerDailyLeave' =>  $result1[0]->managerDailyLeave,
            'evidenceLimit' =>  $result1[0]->evidenceLimit,
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            'managerMedicalLeave_error' => '',
            'managerDailyLeave_error' => '',
            'evidenceLimit_error' => '',

            'managerSalaryRate' => $result2[0]->managerSalaryRate,
            'serviceProviderSalaryRate' => $result2[0]->serviceProviderSalaryRate,
            'receptionistSalaryRate' => $result2[0]->receptionistSalaryRate,
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',

            'rate' => $result3[0]->rate,
            'rate_error' => '',

            // 'minimumNumber' => $result4[0]->minimumNumber,
            // 'minimumNumber_error' => '',
         ];
         $this->view('owner/own_rates', $data);
      }
   }

   public function resources()
   {
      $resourceDetails = $this->serviceModel->getResourceDetails();
      $this->view('owner/own_resources', $resourceDetails);
   }

   public function salaries()
   {
      $this->view('owner/own_salaries');
   }
   
   public function services()
   {
      // $sDetails = $this->serviceModel->getServiceDetails();
      // $GetServicesArray = [
      //    'services' => $sDetails
      // ];
      // $this->view('owner/own_services', $GetServicesArray);
   }

   public function staff()
   {
      $staffDetails = $this->staffModel->getAllStaffDetails();
      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('owner/own_staff', $GetStaffArray);
   }
}
