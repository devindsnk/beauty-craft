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
      // $totalIncomeForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      
      $mangOverviewDetails = [
         'totalIncome' => $totalIncome,
         'upcommingReservations' => $upcommingReservations,
         'availableServices' => $availableServices,
         'availableServiceProviders' => $availableServiceProviders,
         'activeCustomers' => $activeCustomers,
         'activeReceptionists' => $activeReceptionists,
         'activeManagers' => $activeManagers,
         'pendingLeaveRequests' => $pendingLeaveRequests,
         // 'totalIncomeForChart' => $totalIncomeForChart,
      ];
     
      $this->view('manager/mang_overview',  $mangOverviewDetails);
   }
   public function overviewChart1()
   {
      $totalIncomeForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts(); 
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalIncomeForChart));
   }
   public function overviewChart2()
   {
      $totalReservationsForChart = $this->reservationModel->getMonthlyIncomeAndTotalReservationsForMangOverviewCharts();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($totalReservationsForChart));
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
      $staffDetails = $this->staffModel->getAllStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('manager/mang_staffMembers', $GetStaffArray);
   }
   public function services()
   {
      // Session::validateSession([3]);
      // $sDetails = $this->serviceModel->getServiceDetails();

      // $GetServicesArray = [
      //    'services' => $sDetails
      // ];

      // $this->view('manager/mang_services',  $GetServicesArray);
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
      // die('ge');
      // Session::validateSession([3]);
      $mangCasualLeaveLimit = $this->leaveModel->getmangCasualLeaveLimit();
      $mangMedicalLeaveLimit = $this->leaveModel->getmangMedicalLeaveLimit();

      $mangCasualLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 1);
      $mangMedicalLeaveCount = $this->leaveModel->getMangCurrentMonthLeaveCount(Session::getUser("id"), 2);

      $remainingCasual = $mangCasualLeaveLimit - $mangCasualLeaveCount ;
      $remainingMedical = $mangMedicalLeaveLimit - $mangMedicalLeaveCount ;

      // print_r($mangCasualLeaveLimit);
      // print_r($mangMedicalLeaveLimit);
      // print_r($mangCasualLeaveCount);
      // print_r($mangMedicalLeaveCount);
      // die('fff');

      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves();

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => trim($_POST['mangDate']),
            'leavetype' => isset($_POST['mangLeaveType']) ? trim($_POST['mangLeaveType']) : '',
            'reason' => trim($_POST['mangLeaveReason']),
            'date_error' => '',
            // 'date_error2' => $state,
            'type_error' => '',
            'reason_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors' => 0,
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,

         ];
         

         if ($_POST['action'] == "addleave")
         {
            // print_r($data['date_error2']);
            // die('mangLeaves');

            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);
            // print_r($data['reason_error']);
            // die("dd1");
            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {
               // die(" dd");

               $this->leaveModel->addMangLeave($data);
               redirect('MangDashboard/takeLeave');
            }
            else{
               // print_r($data['date_error']);
               // die("dd1");

               $data['haveErrors'] = 1;
               $this->view('manager/mang_subTakeLeave', $data);
            }

         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            redirect('MangDashboard/takeLeave');
         }
         else
         {
            die("something went wrong");
         }

      }
      else
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => '',
            'leavetype' => '',
            'reason' => '',
            'date_error' => '',
            // 'date_error2' => $state,
            'reason_error' => '',
            'type_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors' => 0,
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'typeValidationMsg' => '',
            'remainingCasual' => $remainingCasual,
            'remainingMedical' => $remainingMedical,
         ];
         // print_r($data['remainingCasual']);
         // print_r($data['remainingMedical']);
         
         // die('fff');
         $this->view('manager/mang_subTakeLeave', $data);
      }
   }
   public function getOneMangLeaveDetails($leaveID)
   {
      $userID = Session::getUser("id");

      $managerOneLeaveDetails = $this->leaveModel->getOneManagerLeave($leaveID, $userID);

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($managerOneLeaveDetails));

   }
   public function updateTakenLeave($leaveID)
   {
      // Session::validateSession([3]);
      $userID = Session::getUser("id");

      $managerLeaveDetails = $this->leaveModel->getAllManagerLeaves();
      
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => trim($_POST['mangDate']),
            'leavetype' => isset($_POST['mangLeaveType2']) ? trim($_POST['mangLeaveType2']) : '',
            'reason' => trim($_POST['mangLeaveReason']),
            'date_error' => '',
            'type_error' => '',
            'reason_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors2' => 0,
            'dateValidationMsg' => ''

         ];
         
         if ($_POST['action'] == "updateleave")
         {
            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);
            
            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {
               $this->leaveModel->updateMangLeave($data, $userID, $leaveID);
               redirect('MangDashboard/takeLeave');
            }
            else{
               $data['haveErrors2'] = 1;
               $this->view('manager/mang_subTakeLeave', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors2'] = 0;
            redirect('MangDashboard/takeLeave');
         }
         else
         {
            die("something went wrong");
         }
      }
      else
      {
         $data = [
            'managerLeaveDetails' => $managerLeaveDetails,
            'date' => '',
            'leavetype' => '',
            'reason' => '',
            'date_error' => '',
            'reason_error' => '',
            'type_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'haveErrors2' => 0,
            'dateValidationMsg' => '',
            'typeValidationMsg' => '',

         ];
         $this->view('manager/mang_subTakeLeave', $data);
      }
   }
   public function deleteLeave($leaveDate)
   {
      $staffID=Session::getUser("id");
      $this->leaveModel->deleteMangLeave($leaveDate, $staffID);
      redirect('MangDashboard/takeLeave');

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
