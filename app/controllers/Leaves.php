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
      $leaveLimit = $this->LeaveModel->getLeaveLimit();

      // die ($leaveLimit);
      $leaveCount = $this->LeaveModel->getCurrentMonthLeaveCount(Session::getUser("id"));
      $remainingLeaveCount = $leaveLimit - $leaveCount;
      // print_r($leaveData);
      // die("hi");

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         $data = [
            'date' => trim($_POST['date']),
            'reason' => trim($_POST['reason']),
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
         // check exsisting dates
         // $checkDate = $this->LeaveModel->checkExsistingDate($data['date']);
         // $this->leaveRequestDateValidate($data);


         if ($_POST['action'] == "addleave")
         {
            $today = date('Y-m-d');
            $data['date_error'] = emptyCheck($data['date']);
            $data['reason_error'] = emptyCheck($data['reason']);
            $data['type_error'] = emptyCheck($data['leavetype']);

            if (empty($data['date_error']) && empty($data['reason_error']) && empty($data['type_error']))
            {

               $this->LeaveModel->requestleave($data);
               // redirect to this view
               redirect('Leaves/leaves');
            }


            else
            {
               $data['haveErrors'] = 1;
               $this->provideLeaveRequestReleventView($data);
               // $this->view('serviceProvider/serProv_leaves', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            // $this->view('serviceProvider/serProv_leaves', $data);
            redirect('Leaves/leaves');
         }
         else
         {
            die("something went wrong");
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


      // echo json_encode($dateValidationMsg);
      // exit;
   }
}
