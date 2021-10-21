<?php
class ReceptDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      $this->staffModel = $this->model('StaffModel');
   }
   public function home()
   {
      redirect('ReceptDashboard/dailyView');
   }
   public function dailyView()
   {
      $this->view('receptionist/recept_dailyView');
   }
   public function reservations()
   {
      $reservationsList = $this->reservationModel->getAllReservations();
      $this->view('receptionist/recept_reservations', $reservationsList);
   }
   public function newReservation()
   {
      $this->view('receptionist/recept_newReservation');
   }
   public function recallRequests()
   {
      $this->view('receptionist/recept_recallRequests');
   }
   public function sales()
   {
      $this->view('receptionist/recept_sales');
   }
   public function services()
   {
      $sDetails = $this->serviceModel->getServiceDetails();

      $GetServicesArray = [
         'services' => $sDetails
      ];
      $this->view('receptionist/recept_services', $GetServicesArray);
   }
   public function customers()
   {
      $this->view('receptionist/recept_customers');
   }
   public function staffMembers()
   {
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('receptionist/recept_staffMembers', $GetStaffArray);
   }
   public function leaves()
   {
      $this->view('receptionist/recept_leaves');
   }
}
