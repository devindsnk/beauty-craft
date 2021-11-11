<?php
class Leaves extends Controller
{
   public function __construct()
   {
      //   $this->ServiceModel = $this->model('ServiceModel');
      $this->LeaveModel = $this->model('LeaveModel');
   }

   public function leaveRequest()
   {
      // validateSession([6]);
      $this->view('manager/mang_leaveRequests');
   }


   //Service provider and receptionist leaves view
    public function leaves()
   {
      validateSession([4,5]);

      $leaveData = $this->LeaveModel->getLeaveRecordsBystaffID($_SESSION['userID']);
      $leaveLimit = $this->LeaveModel->getLeaveLimit();
      $leaveCount = $this->LeaveModel->getCurrentMonthLeaveCount($_SESSION['userID']);
      $remainingLeaveCount = $leaveLimit - $leaveCount;
      //echo  $remainingLeaveCount;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         
         $data = [
            'date' => trim($_POST['date']),
            'reason' => trim($_POST['reason']),
            'date_error' => '',
            'reason_error' => '',
            'dateValidationError' => '',
            'staffID' => $_SESSION['userID'],
            'tableData' => $leaveData,
            'haveErrors' => 0,
            'remainingCount' => $remainingLeaveCount,
            'leaveexceed' => 0,
            

         ];
         //check exsisting dates
         // $checkDate = $this->LeaveModel->checkExsistingDate($data['date']);

         
         if ($_POST['action'] == "addleave")
         {
               $today = date('Y-m-d');
               $data['date_error']=emptyCheck($data['date']);
               $data['reason_error']=emptyCheck($data['reason']);


               if (empty($data['date_error']) && empty($data['reason_error']))
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

      else {
         $data=[ 'date'=>'',
         'reason'=>'',
         'date_error'=>'',
         'reason_error'=>'',
         'dateValidationError' => '',
         'staffID' => $_SESSION['userID'],
         'tableData'=>$leaveData,
         'haveErrors' => 0,
         'reasonentered'=>'',
         'remainingCount'=> $remainingLeaveCount,
         'leaveexceed'=>'',
         
         ];
$this->provideLeaveRequestReleventView($data);
       //  $this->view('serviceProvider/serProv_leaves', $data);
      }
   }

  
   




   public function provideLeaveRequestReleventView($data){
      validateSession([4,5]);
      if($_SESSION['userType']==4){
         $this->view('receptionist/recept_leaves', $data);
      }

      else if($_SESSION['userType']==5){
         $this->view('serviceProvider/serProv_leaves', $data);
      }
      
   }

   public function leaveRequestDateValidate($date){
   validateSession([4,5]);
   $ExsistingLeaveRequestDay = $this->LeaveModel->checkExsistingLeaveRequestDay($date);
   header('Content-Type: application/json; charset=utf-8');
    $dateValidationError="";
   if($ExsistingLeaveRequestDay==1){
      $dateValidationError= "The date You entered is already exit";  
   }

   print_r(json_encode($dateValidationError));
   }
}