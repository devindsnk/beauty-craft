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
      //to get latest leave limit
      $leaveLimit=$this->LeaveModel->getLeaveLimit();
     //to get current month leave count
      $leaveCount=$this->LeaveModel->getLeaveCount();
       $remainingLeaveCount= $leaveLimit - $leaveCount;
      //echo  $remainingLeaveCount;
  
      if ($_SERVER['REQUEST_METHOD']=='POST') {
         

         $data=[ 'date'=>trim($_POST['date']),
         'reason'=>trim($_POST['reason']),
         'date_error'=>'',
         'reason_error'=>'',
         'staffID'=>'00005',
         'tableData'=>$leaveData,
         'haveErrors' => 0,
         'reasonentered'=>'',
         'remainingCount'=> $remainingLeaveCount,
         'leaveexceed'=>0,
      
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
                  //leave count according to selected date
                  $leavesOfSelectedMonth=$this->LeaveModel->checkLeaveDate($data);
                 // echo $leavesOfSelectedMonth;
           
                 // echo $data['leaveLimit'];
                  if($leaveLimit <= $leavesOfSelectedMonth)
                  {
                     $data['leaveexceed']=1;
                     $data['haveErrors'] = 1;
                     $this->view('serviceProvider/serProv_leaves', $data);
                   //  echo $_GET['leaveExceedStatus'];
                    // die ('success');
                    $leaveResponse=1;
                    $leaveResponse=$_GET['leaveResponnse'];
                    // die ($leaveResponse);
                    $this->view('serviceProvider/serProv_leaves');
                    if($leaveResponse==1){
                       echo "success";
                     //  $this->view('serviceProvider/serProv_leaves');
                    }
                     if($leaveResponse==0)
                    {
                       echo "fail";
                       $this->LeaveModel->requestleave($data);
                        // redirect to this view
                      //  redirect('serProvDashboard/leaves');
                    }
                     
                  }
                  else{
                  // print_r($data['leavesOfSelectedMonth']);
                  // die("selected  month leave count ");
                  $this->LeaveModel->requestleave($data);
                 // redirect to this view
                 redirect('serProvDashboard/leaves');
                  }
               //redirect('serProvDashboard/leaves');
              // $this->view('serviceProvider/serProv_leaves', $data);
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
         'remainingCount'=> $remainingLeaveCount,
         'leaveexceed'=>0,
         
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