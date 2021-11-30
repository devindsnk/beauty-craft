<?php
class Leaves extends Controller
{
   public function __construct()
   {
        $this->LeaveModel = $this->model('LeaveModel');
   }

   public function responceForLeaveRequest($staffID, $leaveDate){
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         if ($_POST['action'] == "approve"){
            $responce = 1;
            $this->LeaveModel->addLeaveResponce($responce,$staffID,$leaveDate);
         }elseif ($_POST['action'] == "reject"){
            $responce = 0;
            $this->LeaveModel->addLeaveResponce($responce,$staffID,$leaveDate);
         }
         header('location: ' . URLROOT . '/MangDashboard/leaveRequests');
      }
   }

   public function oneleaveRequest($staffID, $leaveDate)
   {
      // validateSession([6]);
   
      $oneLeaveDetails = $this->LeaveModel->getOneLeaveDetail($staffID, $leaveDate);

      $this->view('manager/mang_leaveRequests',$oneLeaveDetails[0]);
   }
}
