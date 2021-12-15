<?php class SerProvDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([5]);
      $this->reservationModel = $this->model('reservationModel');
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
      //  die("hii");

      // validateSession([5]);
       $reservationData = $this->reservationModel->getReservationsByStaffID($_SESSION['userID']);
       
             if ($_SERVER['REQUEST_METHOD'] == 'POST')
         {
            $reservationID=$_POST['action'];
           
            $reservationMoreInfo=$this->reservationModel->getReservationMoreInfoByID($reservationID);
            $data = [
               'reservationData' =>$reservationData,
               'reservationMoreInfo'=>$reservationMoreInfo,
               'moreInfoModelOpen'=>1,
               'recallModelOpen'=>0,
               'selectedReservation'=>'$selectedReservationID',
               'customerNote'=>'',
               'recallReason'=>''

              
            ];

            if($_POST['action']=='close'){
               // die("hello");
               $data['moreInfoModelOpen'] = 0;
               redirect('SerProvDashboard/reservations');
            }
            

            
            // print_r($data['reservationMoreInfo']);
            // die("OKKK");
      
            if($_POST['action']=='saveChanges'){
               // $selectedreservation=trim($_POST['selectedReservation']);
               // $customerNote=trim($_POST['customerNote']);

               $data = [
                           'reservationData' =>$reservationData,
                           'reservationMoreInfo'=>$reservationMoreInfo,
                           'moreInfoModelOpen'=>1,
                           'recallModelOpen'=>0,
                           'selectedReservation'=>trim($_POST['selectedReservation']),
                           'customerNote'=>trim($_POST['customerNote']),
                           'recallReason'=>''

                           
                        ];


               // print_r($data);
               // die("OK");
               $this->reservationModel->updateCustomerNote($data);
               redirect('SerProvDashboard/reservations');

              
            }
               
          
           if($_POST['action']=='recall'){
               // die("hello");
               $selectedreservation=trim($_POST['selectedReservation']);
               echo $selectedreservation;
               // die("OK");
               $reservationMoreInfo=$this->reservationModel->getReservationMoreInfoByID($selectedreservation);
               
               $data['moreInfoModelOpen'] = 0;
               $data['recallModelOpen'] = 1;
               $data['reservationMoreInfo']=$reservationMoreInfo;
               $data['recallReason'] = '';
             
             

            }
         
           
           if($_POST['action']=='sendRecall'){
               $selectedreservation=trim($_POST['selectedReservation']);
               $recallReason=trim($_POST['recallReason']);
            //   echo $selectedreservation;
            //   echo $recallReason;
            //   die("okk");
               $this->reservationModel->updateReservationRecalledState($selectedreservation,5);
               $this->reservationModel->addReservationRecall($selectedreservation,$recallReason);
               // $this->reservationModel->insertReservationRecall($selectedreservation,$recallReason);
               redirect('SerProvDashboard/reservations');

           } 
            $this->view('serviceProvider/serProv_reservation', $data); 
      
         }

          else 
         {
            $data = [
               'reservationData' =>$reservationData,
               'reservationMoreInfo'=>'',
               'moreInfoModelOpen'=>0,
               'recallModelOpen'=>0,
               'selectedReservation'=>'',
               'customerNote'=>'',
               'recallReason'=>''
                              
            ];
            $this->view('serviceProvider/serProv_reservation', $data);

         }

      $this->view('serviceProvider/serProv_reservation');
   }

 





}
