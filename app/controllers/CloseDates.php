<?php
class CloseDates extends Controller
{
   public function __construct()
   {
      $this->closedDatesModel = $this->model('ClosedDatesModel');
   }

   public function remCloseDate($defKey)
   {
      //  die('success');
      $this->closedDatesModel->removeCloseDateDetails($defKey);
      Toast::setToast(1, "Close date removed successfully", "");
      redirect('OwnDashboard/closeSalon');
      //  $this->view('owner/own_closeSalon');
      // $this->view('owner/own_closeSalon');
   }

   public function closeDateReservtaions($date)
   {
      // echo $date;
      //  die('success');
      $result = $this->closedDatesModel->getCloseDatesReservationDetails($date);
      $this->view('owner/own_closeSalonViewReservations', $result);
      //  redirect('OwnDashboard/closeSalon');
      // $this->view('owner/own_closeSalon');
   }

   public function getCloseDateReservtaions($date)
   {
      // $this->closedDatesModel->getCloseDatesReservationCount($data['closeDate']);
      // Session::validateSession([6]);
      $reservations = $this->closedDatesModel->getCloseDatesReservationDetails($date);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($reservations));
   }
}
