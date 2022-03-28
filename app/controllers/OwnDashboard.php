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
      $this->reservationModel = $this->model('reservationModel');
   }

   public function home()
   {
      redirect('OwnDashboard/overview');
      // $this->view('owner/own_overview', $getManagerCount);
   }


   public function overview()
   {
      $activeManagers = $this->staffModel->getActiveManagerDetails();
      $availableManagers = 0;
      for ($i = 0; $i < sizeof($activeManagers); $i++)
      {
         $todayLeaveCount =  $this->staffModel->getManagerTodayLeaveCountByStaffID($activeManagers[$i]->staffID);
         if ($todayLeaveCount[0]->leaveCount == 0)
         {
            $availableManagers++;
         }
      }
      $totalIncome = $this->reservationModel->getTotalIncomeForMangOverview();
      $activeCustomers = $this->customerModel->getActiveCustomerCount();
      $ownOverviewDetails = [
         'totalIncome' => $totalIncome,
         'activeCustomers' => $activeCustomers,
         'activeManagers' => $availableManagers
      ];
      $this->view('owner/own_overview', $ownOverviewDetails);
   }

   public function overviewChart1()
   {
      $totalIncomeForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalIncomeForChart));
   }

   public function overviewChart2()
   {
      $totalStaffMembersForChart2 = $this->staffModel->getStaffMemberCountForCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalStaffMembersForChart2));
   }

   public function closeSalon($monthSelected = "all")
   {
      $closeDatesDetails = $this->closedDatesModel->getCloseDatesDetails($monthSelected);
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
            'monthSelected' => $monthSelected
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
            'monthSelected' => $monthSelected
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

   public function rates()
   {
      $result1 = $this->ratesModel->getLeaveLimitsDetails();
      $result2 = $this->ratesModel->getSalaryRateDetails();
      $result3 = $this->ratesModel->getCommissionRateDetails();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'generalLeave' => trim($_POST['generalLeave']),
            'medicalLeave' => trim($_POST['medicalLeave']),
            'managerGeneralLeave' => trim($_POST['managerGeneralLeave']),
            'managerMedicalLeave' => trim($_POST['managerMedicalLeave']),
            'managerDailyLeave' => trim($_POST['managerDailyLeave']),
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            'managerMedicalLeave_error' => '',
            'managerDailyLeave_error' => '',

            'managerSalaryRate' => trim($_POST['managerSalaryRate']),
            'serviceProviderSalaryRate' => trim($_POST['serviceProviderSalaryRate']),
            'receptionistSalaryRate' => trim($_POST['receptionistSalaryRate']),
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',

            'rate' =>  trim($_POST['rate']),
            'rate_error' => '',

         ];
         if ($_POST['action'] == "saveLeaveLimits")
         {
            if (empty($data['generalLeave']))
            {
               $data['generalLeave_error'] = "Please insert a value";
            }
            if ($data['generalLeave'] < 0)
            {
               $data['generalLeave_error'] = "Value must be positive";
            }

            // Validating fname
            if (empty($data['medicalLeave']))
            {
               $data['medicalLeave_error'] =  "Please insert a value";
            }
            if ($data['medicalLeave'] < 0)
            {
               $data['medicalLeave_error'] = "Value must be positive";
            }
            // Validating lname
            if (empty($data['managerGeneralLeave']))
            {
               $data['managerGeneralLeave_error'] = "Please insert a value";
            }
            if ($data['managerGeneralLeave'] < 0)
            {
               $data['managerGeneralLeave_error'] = "Value must be positive";
            }

            if (empty($data['managerMedicalLeave']))
            {
               $data['managerMedicalLeave_error'] = "Please insert a value";
            }
            if ($data['managerMedicalLeave'] < 0)
            {
               $data['managerMedicalLeave_error'] = "Value must be positive";
            }

            if (empty($data['managerDailyLeave']))
            {
               $data['managerDailyLeave_error'] = "Please insert a value";
            }
            if ($data['managerDailyLeave'] < 0)
            {
               $data['managerDailyLeave_error'] = "Value must be positive";
            }

            if (
               empty($data['generalLeave_error']) && empty($data['medicalLeave_error']) && empty($data['managerGeneralLeave_error']) && empty($data['managerMedicalLeave_error']) && empty($data['managerDailyLeave_error'])
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

            if ($data['managerSalaryRate'] < 0)
            {
               $data['managerSalaryRate_error'] =  "Please insert a positive value";
            }
            // Validating fname
            if (empty($data['serviceProviderSalaryRate']))
            {
               $data['serviceProviderSalaryRate_error'] =  "Please insert a value";
            }

            if ($data['serviceProviderSalaryRate']<0)
            {
               $data['serviceProviderSalaryRate_error'] =  "Please insert a positive value";
            }

            // Validating lname
            if (empty($data['receptionistSalaryRate']))
            {
               $data['receptionistSalaryRate_error'] =  "Please insert a value";
            }
            if ($data['receptionistSalaryRate']<0)
            {
               $data['receptionistSalaryRate_error'] =  "Please insert a postive value";
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
            if (empty($data['rate']))
            {
               $data['rate_error'] =  "Please insert a value";
            }
            if ($data['rate'] > 100)
            {
               $data['rate_error'] =  "Please insert a value less than 100 ";
            }
            if ($data['rate'] < 0)
            {
               $data['rate_error'] =  "Please insert a positive value ";
            }
            if (empty($data['rate_error']))
            {
               $this->ratesModel->updateCommissionRateDetails($data);
               Toast::setToast(1, "Commision Rate Successfully Updated!", "");
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
         $data = [
            'generalLeave' => $result1[0]->generalLeave,
            'medicalLeave' => $result1[0]->medicalLeave,
            'managerGeneralLeave' =>  $result1[0]->managerGeneralLeave,
            'managerMedicalLeave' =>  $result1[0]->managerMedicalLeave,
            'managerDailyLeave' =>  $result1[0]->managerDailyLeave,
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            'managerMedicalLeave_error' => '',
            'managerDailyLeave_error' => '',

            'managerSalaryRate' => $result2[0]->managerSalaryRate,
            'serviceProviderSalaryRate' => $result2[0]->serviceProviderSalaryRate,
            'receptionistSalaryRate' => $result2[0]->receptionistSalaryRate,
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',

            'rate' => $result3[0]->rate,
            'rate_error' => '',
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
