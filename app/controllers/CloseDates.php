<?php
class CloseDates extends Controller
{
   public function __construct()
   {
      $this->closedDatesModel = $this->model('ClosedDatesModel');
   }

   public function remCloseDate($defKey)
   {
      $this->closedDatesModel->removeCloseDateDetails($defKey);
      Toast::setToast(1, "Close date removed successfully", "");
      redirect('OwnDashboard/closeSalon');
   }

   public function closeDateReservtaions($date)
   {
      $result = $this->closedDatesModel->getCloseDatesReservationDetails($date);
      $this->view('owner/own_closeSalonViewReservations', $result);
   }

   public function getCloseDateReservtaions($date)
   {
      $reservations = $this->closedDatesModel->getCloseDatesReservationDetails($date);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($reservations));
   }
}
