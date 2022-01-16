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
      $rType = "all";
      $view = 'overview';
      // $this->view('serviceProvider/serProv_' . $view);
      Session::validateSession([5]);
      $reservationData = $this->reservationModel->getReservationsByStaffIDForSpRes(Session::getUser("id"), $rType = null);

      $this->provideReservationView($reservationData, $view, $rType);
   }

   public function dailyview()
   {
      $rType = "all";
      $view = 'dailyview';
      Session::validateSession([5]);
      $reservationData = $this->reservationModel->getReservationsByStaffIDForSpRes(Session::getUser("id"), $rType = null);
      $this->provideReservationView($reservationData, $view, $rType);
   }

   public function reservations($rType = "all")
   {
      $view = 'reservations';
      Session::validateSession([5]);
      $reservationData = $this->reservationModel->getReservationsByStaffIDForSpRes(Session::getUser("id"), $rType);
      $this->provideReservationView($reservationData, $view, $rType);
   }



   public function provideReservationView($reservationData, $view, $rType)
   {
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
            'rType' => $rType,
         ];

         if ($_POST['action'] == 'moreInfo')
         {
            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['moreInfoModelOpen'] = 1;

            $this->view('serviceProvider/serProv_' . $view, $data);
         }


         if ($_POST['action'] == 'saveChanges')
         {
            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['reservationMoreInfo'] = $this->reservationModel->getReservationMoreInfoByID(trim($_POST['selectedReservation']));
            $data['customerNote'] = trim($_POST['customerNote']);
            $data['moreInfoModelOpen'] = 1;

            $this->reservationModel->updateCustomerNote($data);
            redirect('SerProvDashboard/' . $view);
         }

         if ($_POST['action'] == 'close')
         {
            $data['moreInfoModelOpen'] = 0;
            redirect('SerProvDashboard/' . $view);
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

            $this->view('serviceProvider/serProv_' . $view, $data);
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
               $this->view('serviceProvider/serProv_' . $view, $data);
            }
            else
            {

               $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 5);
               $this->reservationModel->addReservationRecall($data['selectedReservation'], $data['recallReason']);

               redirect('SerProvDashboard/' . $view);
            }
         }
         if ($_POST['action'] == 'cancelRecall')
         {

            $data['selectedReservation'] = trim($_POST['selectedReservation']);
            $data['recallModelOpen'] = 0;

            $this->reservationModel->beginTransaction();
            $this->reservationModel->updateReservationRecalledState($data['selectedReservation'], 1);
            $this->reservationModel->deleteReservationRecallRequest($data['selectedReservation']);
            $this->reservationModel->commit();
            redirect('SerProvDashboard/' . $view);
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
            'recallReason_error' => '',
            'rType' => $rType,


         ];
         $this->view('serviceProvider/serProv_' . $view, $data);
      }
   }

   public function getReservationListByDate($date)
   {
      $reservationData = $this->reservationModel->getReservationsByStaffIDandDate($_SESSION['userID'], $date);
      header('Content-Type: application/json; charset=utf-8');
      print_r($reservationData);

      print_r(json_encode($reservationData));
   }

   public function getReservationDetailsByID($selectedReservation)
   {
      $reservationData = $this->reservationModel->getReservationMoreInfoByID($selectedReservation);

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
      $reservationData = $this->reservationModel->updateCustomerNote($selectedReservation, $note);
      Toast::setToast(1, "Customer note changed.", "");
   }

   public function deleteRecallRequest($selectedReservation)
   {
      $this->reservationModel->updateReservationRecalledState($selectedReservation, 1);
      $this->reservationModel->deleteReservationRecallRequest($selectedReservation);

      header('Content-Type: application/json; charset=utf-8');
      echo (json_encode($selectedReservation));
   }
}
