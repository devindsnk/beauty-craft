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
    redirect('OwnDashboard/closeSalon');
    // $this->view('owner/own_closeSalon');
   }

   public function closeDateReservtaions($date)
   {
      // echo $date;
   //  die('success');
    $result=$this->closedDatesModel->getCloseDatesReservationDetails($date);
    $this->view('owner/own_closeSalonViewReservations',$result);
   //  redirect('OwnDashboard/closeSalon');
    // $this->view('owner/own_closeSalon');
   }


}