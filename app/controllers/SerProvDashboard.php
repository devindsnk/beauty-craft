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

      // Session::validateSession([5]);
      $reservationData = $this->reservationModel->getReservationsByStaffID(Session::getUser("id"));


      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'reservationData' => $reservationData,
            'reservationMoreInfo' => '',
            'moreInfoModelOpen' => 0,
            'recallModelOpen' => 0,
            'selectedReservation' => '',
            'customerNote' => '',
            'recallReason' => '',
            'recallReason_error' => '',



         ];

         if ($_POST['action'] == 'moreInfo')
         {
            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['moreInfoModelOpen'] = 1;

            $this->view('serviceProvider/serProv_reservation', $data);
         }


         if ($_POST['action'] == 'saveChanges')
         {
            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['customerNote'] = trim($_POST['customerNote']);
            $data['moreInfoModelOpen'] = 1;

            $this->reservationModel->updateCustomerNote($data);
            redirect('SerProvDashboard/reservations');
         }

         if ($_POST['action'] == 'close')
         {
            // die("hello");
            $data['moreInfoModelOpen'] = 0;
            redirect('SerProvDashboard/reservations');
         }


         if ($_POST['action'] == 'recall')
         {

            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['moreInfoModelOpen'] = 0;
            $data['recallModelOpen'] = 1;

            if ($data['reservationMoreInfo'][0]->status == 5)
            {
               $data['recallReason'] = $this->reservationModel->getRecallReasonByReservationID(trim($_POST['selectedReservation']));
            }

            $this->view('serviceProvider/serProv_reservation', $data);
         }


         if ($_POST['action'] == 'sendRecall')
         {

            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['recallReason'] = trim($_POST['recallReason']);
            $data['recallReason_error'] = emptyCheck(trim($_POST['recallReason']));
            $data['recallModelOpen'] = 1;


            if ($data['recallReason_error'])
            {
               // die($data['recallReason_error']);
               $this->view('serviceProvider/serProv_reservation', $data);
            }
            else
            {

               $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 5);
               $this->reservationModel->addReservationRecall($data['selectedReservation'], $data['recallReason']);

               redirect('SerProvDashboard/reservations');
            }
         }
      }

      else
      {
         $data = [
            'reservationData' => $reservationData,
            'reservationMoreInfo' => '',
            'moreInfoModelOpen' => 0,
            'recallModelOpen' => 0,
            'selectedReservation' => '',
            'customerNote' => '',
            'recallReason' => '',
            'recallReason_error' => ''

         ];
         $this->view('serviceProvider/serProv_reservation', $data);
      }
   }
}
