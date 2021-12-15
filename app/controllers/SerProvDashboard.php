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

      // Session::validateSession([5]);
      $reservationData = $this->reservationModel->getReservationsByStaffID(Session::getUser("id"));

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         $data = [
            'leaveData' => $reservationData,

         ];
      }

      else
      {
         $data = [
            'leaveData' => $reservationData,

         ];
         $this->view('serviceProvider/serProv_reservation', $data);
      }

      $this->view('serviceProvider/serProv_reservation');
   }
}
