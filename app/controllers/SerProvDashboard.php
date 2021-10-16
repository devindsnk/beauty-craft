<?php class SerProvDashboard extends Controller {
   public function __construct() {
      $this->LeaveModel=$this->model('LeaveModel');
   }
   public function home()
   {
      redirect('SerProvDashboard/overview');
   }
   public function overview()
   {
      $this->view('serviceProvider/serProv_overview');
   }

   public function reservations() {
      $this->view('serviceProvider/serProv_reservation');
   }

   public function leaves() {

      $leaveData=$this->LeaveModel->getLeaveByID();
      $leaveLimit=$this->getLeaveLimit();
     
      $LeaveCount=$this->LeaveModel->getLeaveCount();
      
     
      if ($_SERVER['REQUEST_METHOD']=='POST') {
         

         $data=[ 'date'=>trim($_POST['date']),
         'reason'=>trim($_POST['reason']),
         'date_error'=>'',
         'reason_error'=>'',
         'staffID'=>'00005',
         'tableData'=>$leaveData,
         'haveErrors' => 0,
         'reasonentered'=>'',
         'leaveLimit'=>$leaveLimit,
         'LeaveCount'=>$LeaveCount,
         // '$staffID'=>$_SERVER['staffID'],
       ];
       //to get enter reason
       $checkDate=$this->LeaveModel->checkExsistingDate($data['date']) ;

       $data['reasonentered']=$data['reason'];
         if($_POST['action']=="addleave"){
               $today = date('Y-m-d');
               if (empty($data['date'])) {
                  $data['date_error']="Please enter date";
               }
               if ((($data['date'])<$today)) {
                  $data['date_error']="Please enter valid date";
               }

               if (empty($data['reason'])) {
                  $data['reason_error']="Please mention the reason";
               }
               if(!empty($checkDate)){
                  $data['date_error']="Date you entered is already Exist.";
               }

               if (empty($data['date_error']) && empty($data['reason_error'])) {
                  $this->LeaveModel->requestleave($data);
                  //redirect to this view

               redirect('serProvDashboard/leaves');
               }

               else {
                  $data['haveErrors'] = 1;
                  $this->view('serviceProvider/serProv_leaves', $data);
                  }
         }
         else if($_POST['action']=="cancel"){
            $data['haveErrors'] = 0;
            $this->view('serviceProvider/serProv_leaves', $data);
         }
         else{
            die("something went wrong");
         }
      }

      else {
         $data=[ 'date'=>'',
         'reason'=>'',
         'date_error'=>'',
         'reason_error'=>'',
         'tableData'=>$leaveData,
         'haveErrors' => 0,
         'reasonentered'=>'',
         'leaveLimit'=>$leaveLimit,
         'LeaveCount'=>$LeaveCount,
         ];
         $this->view('serviceProvider/serProv_leaves', $data);
      }
   }
   public function getLeaveLimit(){
      
      $leaveLimit = $this->LeaveModel->getLeaveLimit();
      // die("error");
      
      // print_r($leaveLimit);

      return $leaveLimit;
   }












}