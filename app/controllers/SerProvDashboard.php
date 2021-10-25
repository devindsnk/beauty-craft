<?php class SerProvDashboard extends Controller
{
   public function __construct()
   {
      // validateSession([5]);
      $this->LeaveModel = $this->model('LeaveModel');
   }
   public function home()
   {
      redirect('SerProvDashboard/overview');
   }
   public function overview()
   {
      $this->view('serviceProvider/serProv_overview');
   }

   public function reservations()
   {
      // validateSession([5]);
      $this->view('serviceProvider/serProv_reservation');
   }

   public function leaves()
   {
      // validateSession([5]);
      $leaveData = $this->LeaveModel->getLeaveByID();
      //to get latest leave limit
      $leaveLimit = $this->LeaveModel->getLeaveLimit();
      //to get current month leave count
      $leaveCount = $this->LeaveModel->getLeaveCount();
      $remainingLeaveCount = $leaveLimit - $leaveCount;
      //echo  $remainingLeaveCount;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'date' => trim($_POST['date']),
            'reason' => trim($_POST['reason']),
            'date_error' => '',
            'reason_error' => '',
            'staffID' => '00005',
            'tableData' => $leaveData,
            'haveErrors' => 0,
            'reasonentered' => '',
            'remainingCount' => $remainingLeaveCount,
            'leaveexceed' => 0,

         ];
         //check exsisting dates
         $checkDate = $this->LeaveModel->checkExsistingDate($data['date']);

         $data['reasonentered'] = $data['reason'];
         if ($_POST['action'] == "addleave")
         {
            $today = date('Y-m-d');
            if (empty($data['date']))
            {
               $data['date_error'] = "Please enter date";
            }
            if ((($data['date']) < $today))
            {
               $data['date_error'] = "Please enter valid date";
            }

            if (empty($data['reason']))
            {
               $data['reason_error'] = "Please mention the reason";
            }
            if (!empty($checkDate))
            {
               $data['date_error'] = "Date you entered is already Exist.";
            }

            if (empty($data['date_error']) && empty($data['reason_error']))
            {
               //leave count according to selected date
               //  $month = date("m",strtotime($data['date']));
               $leavesOfSelectedMonth = $this->LeaveModel->checkLeaveDate($data);
               // echo $leavesOfSelectedMonth;

               // echo $data['leaveLimit'];
               if ($leaveLimit <= $leavesOfSelectedMonth)
               {
                  $data['leaveexceed'] = 1;

                  $this->view('serviceProvider/serProv_leaves', $data);

                  echo $_GET['leaveResponse'];
                  // die ('success');
                  //  $leaveResponse=1;
                  $leaveResponse = $_GET['leaveResponse'];

                  // $this->view('serviceProvider/serProv_leaves');
                  if ($leaveResponse == 0)
                  {
                     echo "success";
                     $this->LeaveModel->requestleave($data);
                     //  $this->view('serviceProvider/serProv_leaves');
                  }
                  if ($leaveResponse == 1)
                  {
                     echo "fail";

                     // redirect to this view
                     //  redirect('serProvDashboard/leaves');
                  }
               }
               else
               {
                  $data['leaveexceed'] = 0;
                  $this->LeaveModel->requestleave($data);
                  // redirect to this view
                  redirect('serProvDashboard/leaves');
               }
            }

            else
            {
               $data['haveErrors'] = 1;
               $this->view('serviceProvider/serProv_leaves', $data);
            }
         }
         else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            $this->view('serviceProvider/serProv_leaves', $data);
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
            'date_error' => '',
            'reason_error' => '',
            'tableData' => $leaveData,
            'haveErrors' => 0,
            'reasonentered' => '',
            'remainingCount' => $remainingLeaveCount,
            'leaveexceed' => 0,

         ];

         $this->view('serviceProvider/serProv_leaves', $data);
      }
   }
   public function checkReqMonthLeaveLimit($leaveReqdate)
   {
      // validateSession([5]);
      $month = date("m", strtotime($leaveReqdate));
      $year = date('Y', strtotime($leaveReqdate));
      $data = [
         'month' => $month,
         'year' => $year,

      ];

      $leavesOfSelectedMonth = $this->LeaveModel->getLeaveCountOfSelectedMonth($data);
      $leaveLimit = $this->LeaveModel->getLeaveLimit();

      if ($leaveLimit <= $leavesOfSelectedMonth)
      {
         return true;
      }
      else
      {
         return false;
      }
   }
}
