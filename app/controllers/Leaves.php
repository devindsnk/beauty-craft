<?php
class Leaves extends Controller
{
   public function __construct()
   {

      $this->LeaveModel = $this->model('LeaveModel');
   }

   public function responceForLeaveRequest($staffID, $leaveDate)
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         if ($_POST['action'] == "approve")
         {
            $responce = 1;
            $this->LeaveModel->addLeaveResponce($responce, $staffID, $leaveDate);
         }
         elseif ($_POST['action'] == "reject")
         {
            $responce = 0;
            $this->LeaveModel->addLeaveResponce($responce, $staffID, $leaveDate);
         }
         header('location: ' . URLROOT . '/MangDashboard/leaveRequests');
      }
   }

   public function oneleaveRequest($staffID, $leaveDate)

   {
      // Session::validateSession([6]);

      $oneLeaveDetails = $this->LeaveModel->getOneLeaveDetail($staffID, $leaveDate);

      $this->view('manager/mang_leaveRequests', $oneLeaveDetails[0]);
   }


   //Service provider and receptionist leaves view
   public function leaves()
   {
      Session::validateSession([4, 5]);

      $leaveData = $this->LeaveModel->getLeaveRecordsBystaffID(Session::getUser("id"));
      $leaveLimit = $this->LeaveModel->getGeneralLeaveLimit();

      // die ($leaveLimit);
      $leaveCount = $this->LeaveModel->getCurrentMonthLeaveCount(Session::getUser("id"));
      $remainingLeaveCount = $leaveLimit - $leaveCount;
      // print_r($leaveData);
      // die("hi");
      $data = [
         'date' => '',
         'reason' => '',
         'leavetype' => '',
         'date_error' => '',
         'reason_error' => '',
         'type_error' => '',
         'dateValidationError' => '',
         'staffID' => Session::getUser("id"),
         'tableData' => $leaveData,
         'haveErrors' => 0,
         'reasonentered' => '',
         'remainingCount' => $remainingLeaveCount,
         'leaveexceed' => '',
         'dateValidationMsg' => ''

      ];

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {


         // check exsisting dates
         // $checkDate = $this->LeaveModel->checkExsistingDate($data['date']);
         // $this->leaveRequestDateValidate($data);


         if ($_POST['action'] == "addleave")
         {

            $data = [
               'date' => isset($_POST['leavetype']) ? trim($_POST['date']) : '',
               'reason' => isset($_POST['leavetype']) ? trim($_POST['reason']) : '',
               'leavetype' => isset($_POST['leavetype']) ? trim($_POST['leavetype']) : '',
               'date_error' => '',
               'reason_error' => '',
               'type_error' => '',
               'dateValidationError' => '',
               'staffID' => Session::getUser("id"),
               'tableData' => $leaveData,
               'haveErrors' => 0,
               'remainingCount' => $remainingLeaveCount,
               'leaveexceed' => 0,
               'dateValidationMsg' => ''
            ];


            $today = date('Y-m-d');
            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);

            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {

               if ($data['leavetype'] == 1) //general
               {
                  $this->LeaveModel->requestleave($data);
                  // redirect to this view
                  redirect('Leaves/leaves');
               }
               else if ($data['leavetype'] == 2) //medical
               {
                  $d = date_parse_from_format("Y-m-d", $data['date']);
                  $count = $this->LeaveModel->getLeaveCountOfSelectedMonth($d["month"], $d["year"], Session::getUser("id"), 2);
                  $leaveLimit = $this->LeaveModel->getMedicalLeaveLimit();
                  if ($count >= $leaveLimit)
                  {
                     $data['dateValidationMsg'] = 'Can not send leave request,Medical limit exceeded';
                     $data['haveErrors'] = 1;
                     $this->provideLeaveRequestReleventView($data);
                  }
                  else
                  {
                     $this->LeaveModel->requestleave($data);
                     // redirect to this view
                     redirect('Leaves/leaves');
                  }
               }
            }


            else
            {
               $data['haveErrors'] = 1;
               $this->provideLeaveRequestReleventView($data);
               $this->view('serviceProvider/serProv_leaves', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            redirect('Leaves/leaves');
         }
         else
         {
            redirect('Leaves/leaves');
         }
      }

      else
      {
         $data = [
            'date' => '',
            'reason' => '',
            'leavetype' => '',
            'date_error' => '',
            'reason_error' => '',
            'type_error' => '',
            'dateValidationError' => '',
            'staffID' => Session::getUser("id"),
            'tableData' => $leaveData,
            'haveErrors' => 0,
            'reasonentered' => '',
            'remainingCount' => $remainingLeaveCount,
            'leaveexceed' => '',
            'dateValidationMsg' => ''

         ];
         $this->provideLeaveRequestReleventView($data);
         //  $this->view('serviceProvider/serProv_leaves', $data);
      }
   }

   public function provideLeaveRequestReleventView($data)
   {
      Session::validateSession([4, 5]);
      if (Session::getUser("type") == 4)
      {
         $this->view('receptionist/recept_leaves', $data);
      }

      else if (Session::getUser("type") == 5)
      {
         $this->view('serviceProvider/serProv_leaves', $data);
      }
   }

   public function leaveRequestDateValidate($date)
   {

      // die("ooooo");

      Session::validateSession([4, 5]);
      // $date = file_get_contents('input://php');
      // $date = json_decode($date, true);

      $alreadyRequestedDay = $this->LeaveModel->checkExsistingLeaveRequestDay($date);
      // $alreadyRequestedDay = 0;
      header('Content-Type: application/json; charset=utf-8');

      if ($alreadyRequestedDay == 1)
      {
         $dateValidationMsg = "The date You entered is already exit";
      }
      else
      {
         $dateValidationMsg = "";
      }

      print_r(json_encode($dateValidationMsg));
   }
   public function leaveRequestTypeValidate($date, $leaveType)
   {
      Session::validateSession([4, 5]);

      $d = date_parse_from_format("Y-m-d", $date);
      $data = [
         'month' => $d["month"],
         'year' => $d["year"],
         'user' => Session::getUser("id"),
         'lType' => $leaveType,
      ];
      $count = $this->LeaveModel->getLeaveCountOfSelectedMonth($d["month"], $d["year"], Session::getUser("id"), $leaveType);
      $validationError = '';
      if ($leaveType == 1)
      {
         $leaveLimit = $this->LeaveModel->getgeneralLeaveLimit();
         $lType = 'general';
      }
      else if ($leaveType == 2)
      {
         $leaveLimit = $this->LeaveModel->getMedicalLeaveLimit();
         $lType = 'medical';
      }

      if ($count >= $leaveLimit)
      {
         $validationError = 'Monthly ' . $lType . ' leave limit exceed.' . $leaveLimit;
      }
      else
      {
         $validationError = '';
      }



      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($validationError));
   }

   public function leaveRequestCancel($date)
   {
      Session::validateSession([4, 5]);
      $this->LeaveModel->cancelLeaveRequest($date, Session::getUser("id"));
   }
   public function getSelectedLeaveDetails($date)
   {
      Session::validateSession([4, 5]);
      $ldata = $this->LeaveModel->getSelectedLeaveDetails($date, Session::getUser("id"));
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($ldata));
   }
}
