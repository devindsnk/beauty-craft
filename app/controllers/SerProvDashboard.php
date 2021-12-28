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

   public function dailyview()
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

            $this->view('serviceProvider/serProv_dailyview', $data);
         }


         if ($_POST['action'] == 'saveChanges')
         {
            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['customerNote'] = trim($_POST['customerNote']);
            $data['moreInfoModelOpen'] = 1;

            $this->reservationModel->updateCustomerNote($data);
            redirect('SerProvDashboard/dailyview');
         }

         if ($_POST['action'] == 'close')
         {
            // die("hello");
            $data['moreInfoModelOpen'] = 0;
            redirect('SerProvDashboard/dailyview');
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

            $this->view('serviceProvider/serProv_dailyview', $data);
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
               $this->view('serviceProvider/serProv_dailyview', $data);
            }
            else
            {

               $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 5);
               $this->reservationModel->addReservationRecall($data['selectedReservation'], $data['recallReason']);

               redirect('SerProvDashboard/dailyview');
            }
         }
         if ($_POST['action'] == 'cancelRecall')
         {

            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            // die($data['selectedReservation']);
            $data['recallModelOpen'] = 0;


            // if ($data['recallReason_error'])
            // {
            //    // die($data['recallReason_error']);
            //    $this->view('serviceProvider/serProv_reservation', $data);
            // }
            // else
            // {
            $this->reservationModel->beginTransaction();
            $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 1);
            $this->reservationModel->deleteReservationRecallRequest($data['selectedReservation']);
            $this->reservationModel->commit();
            redirect('SerProvDashboard/dailyview');
            // }
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
         $this->view('serviceProvider/serProv_dailyview', $data);
      }
   }


   public function reservations()
   {

      $reservationData = $this->reservationModel->getReservationsByStaffID(Session::getUser("id"));


      // if ($_SERVER['REQUEST_METHOD'] == 'POST')
      // {
      //    $data = [
      //       'reservationData' => $reservationData,
      //       'reservationMoreInfo' => '',
      //       'moreInfoModelOpen' => 0,
      //       'recallModelOpen' => 0,
      //       'selectedReservation' => '',
      //       'customerNote' => '',
      //       'recallReason' => '',
      //       'recallReason_error' => '',



      //    ];

      //    // if ($_POST['action'] == 'moreInfo')
      //    // {
      //    //    // $data['selectedReservation'] = trim($_POST['selectedReservation']);
      //    //    // $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
      //    //    $data['moreInfoModelOpen'] = 1;

      //    //    // $this->view('serviceProvider/serProv_reservations', $data);
      //    // }


      //    if ($_POST['action'] == 'saveChanges')
      //    {
      //       $data['selectedReservation'] = trim($_POST['selectedReservation']);
      //       $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
      //       $data['customerNote'] = trim($_POST['customerNote']);
      //       $data['moreInfoModelOpen'] = 1;

      //       $this->reservationModel->updateCustomerNote($data);
      //       redirect('SerProvDashboard/reservations');
      //    }

      //    if ($_POST['action'] == 'close')
      //    {
      //       // die("hello");
      //       $data['moreInfoModelOpen'] = 0;
      //       redirect('SerProvDashboard/reservations');
      //    }


      //    if ($_POST['action'] == 'recall')
      //    {

      //       $data['selectedReservation'] = trim($_POST['selectedReservation']);
      //       $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
      //       $data['moreInfoModelOpen'] = 0;
      //       $data['recallReason'] = trim($_POST['recallReason']);
      //       $data['recallReason_error'] = emptyCheck(trim($_POST['recallReason']));
      //       $data['recallModelOpen'] = 1;

      //       if ($data['reservationMoreInfo'][0]->status == 5)
      //       {
      //          $data['recallReason'] = $this->reservationModel->getRecallReasonByReservationID(trim($_POST['selectedReservation']));
      //       }

      //       $this->view('serviceProvider/serProv_reservations', $data);
      //    }

      //    // $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 5);
      //    // $this->reservationModel->addReservationRecall($data['selectedReservation'], $data['recallReason']);

      //    if ($_POST['action'] == 'sendRecall')
      //    {

      //       $data['selectedReservation'] = trim($_POST['selectedReservation']);
      //       $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
      //       $data['recallReason'] = trim($_POST['recallReason']);
      //       $data['recallReason_error'] = emptyCheck(trim($_POST['recallReason']));
      //       $data['recallModelOpen'] = 1;


      //       if ($data['recallReason_error'])
      //       {
      //          // die($data['recallReason_error']);
      //          $this->view('serviceProvider/serProv_reservations', $data);
      //       }
      //       else
      //       {

      //          $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 5);
      //          $this->reservationModel->addReservationRecall($data['selectedReservation'], $data['recallReason']);

      //          redirect('SerProvDashboard/reservations');
      //       }
      //    }
      //    if ($_POST['action'] == 'cancelRecall')
      //    {

      //       $data['selectedReservation'] = trim($_POST['selectedReservation']);
      //       // die($data['selectedReservation']);
      //       $data['recallModelOpen'] = 0;


      //        if ($data['recallReason_error'])
      //        {
      //            die($data['recallReason_error']);
      //           $this->view('serviceProvider/serProv_reservation', $data);
      //        }
      //        else
      //        {
      //       $this->reservationModel->beginTransaction();
      //       $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 1);
      //       $this->reservationModel->deleteReservationRecallRequest($data['selectedReservation']);
      //       $this->reservationModel->commit();
      //       redirect('SerProvDashboard/reservations');
      //    }
      // }

      // else
      // {
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
      $this->view('serviceProvider/serProv_reservations', $data);
      // }
   }

   public function getReservationListByDate($date)
   {
      // Session::getUser("id");
      // $user = $_SESSION['userID'];
      $reservationData = $this->reservationModel->getReservationsByStaffIDandDate($_SESSION['userID'], $date);
      header('Content-Type: application/json; charset=utf-8');
      print_r($reservationData);

      print_r(json_encode($reservationData));
   }

   public function getReservationDetailsByID($selectedReservation)
   {
      $reservationData = $this->reservationModel->getReservationMoreInfoByID($selectedReservation);
      // $recallData
      //    = $this->reservationModel->getReservationRecallDataByID($selectedReservation);
      // $reservationData['recallReason'] = $recallData['recallReason'];
      // $data = [
      //    'reservationData' => $reservationData,
      //    'recallData' => '',

      // ];

      header('Content-Type: application/json; charset=utf-8');
      echo (json_encode($reservationData));
      exit;
   }

   public function getReservationRecallData($selectedReservation)
   {
      $recallData = $this->reservationModel->getReservationRecallDataByID($selectedReservation);
      header('Content-Type: application/json; charset=utf-8');
      echo (json_encode($recallData));
   }

   public function updateCustNote($selectedReservation, $note)
   {
      // $note = urldecode($note);
      // var_dump($note);
      $reservationData = $this->reservationModel->updateCustomerNote($selectedReservation, $note);
      header('Content-Type: application/json; charset=utf-8');
      // $select = $note;
      // 
      echo (json_encode($reservationData));
      // exit;
   }
}
