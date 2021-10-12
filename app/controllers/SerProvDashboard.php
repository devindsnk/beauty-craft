<?php class SerProvDashboard extends Controller {
   public function __construct() {
      $this->LeaveModel=$this->model('LeaveModel');
   }

   public function overview() {
      $this->view('serviceProvider/serProv_overview');
   }

   public function reservations() {
      $this->view('serviceProvider/serProv_reservation');
   }

   public function leaves() {
     
      if ($_SERVER['REQUEST_METHOD']=='POST') {
         $data=[ 'date'=>trim($_POST['date']),
         'reason'=>trim($_POST['reason']),
         'date_error'=>'',
         'reason_error'=>'',
         '$staffID'=>'00005',
         // '$staffID'=>$_SERVER['staffID'],



         ];

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

         if (empty($data['date_error']) && empty($data['reason_error'])) {
            $this->LeaveModel->requestleave($data);
            //redirect to this view
            $data=[ 'date'=>'',
         'reason'=>'',
         'date_error'=>'',
         'reason_error'=>'',
         ];
         $this->view('serviceProvider/serProv_leaves', $data);

         }

         else {
            $this->view('serviceProvider/serProv_leaves', $data);
         }

      }

      else {
         $data=[ 'date'=>'',
         'reason'=>'',
         'date_error'=>'',
         'reason_error'=>'',
         ];
         $this->view('serviceProvider/serProv_leaves', $data);
      }
   }

   PUBLIC FUNCTION Show($staffID){

$leave=$this->LeaveModel->getLeaveByID($staffID);
$data =[];
$this->view('serviceProvider/serProv_leaves', $data);

   }












}

