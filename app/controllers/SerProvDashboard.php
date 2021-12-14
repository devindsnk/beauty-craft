<?php class SerProvDashboard extends Controller
{
   public function __construct()
   {
       validateSession([5]);
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

            if($_POST['action']=='close'){
               // die("hello");
               $data['moreInfoModelOpen'] = 0;
              
               redirect('SerProvDashboard/reservations');

            }
            
            $reservationID=$_POST['action'];
           
            $reservationMoreInfo=$this->reservationModel->getReservationMoreInfoByID($reservationID);
            // print_r($reservationMoreInfo);
            // $selectedReservationID=$reservationMoreInfo[0]->reservationID;
            
            // die("yyy");
            // $res->reservationID;
            
            $data = [
               'reservationData' =>$reservationData,
               'reservationMoreInfo'=>$reservationMoreInfo,
               'moreInfoModelOpen'=>1,
               'recallModelOpen'=>0,
               'selectedReservation'=>'$selectedReservationID'
              
            ];
            
            // print_r($data['reservationMoreInfo']);
            // die("OKKK");
      

               
          
           if($_POST['action']=='recall'){
               // die("hello");
               $selectedreservation=trim($_POST['selectedReservation']);
               echo $selectedreservation;
               // die("OK");
               $reservationMoreInfo=$this->reservationModel->getReservationMoreInfoByID($selectedreservation);
               
               $data['moreInfoModelOpen'] = 0;
               $data['recallModelOpen'] = 1;
               $data['reservationMoreInfo']=$reservationMoreInfo;
              print_r($data);
            //   die("OK");
              

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
               'selectedReservation'=>''
                              
            ];
            $this->view('serviceProvider/serProv_reservation', $data);

         }

      $this->view('serviceProvider/serProv_reservation');
   }

 





}
