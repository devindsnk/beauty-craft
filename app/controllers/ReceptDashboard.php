<?php
class ReceptDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([4]);
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
      $serviceProviders = $this->serviceModel->getServiceProviderDetails();
      $data = [
         'serviceProvidersList' => $serviceProviders
      ];

      $this->view('receptionist/recept_dailyView', $data);
   }
   public function newReservation()
   {
      // Session::validateSession([4]);
      $this->view('receptionist/recept_newReservation');
   }
   public function recallRequests()
   {
      // Session::validateSession([4]);
      $this->view('receptionist/recept_recallRequests');
   }
   public function sales()
   {
      // Session::validateSession([4]);
      $this->view('receptionist/recept_sales');
   }
   public function services()
   {
      // Session::validateSession([4]);
      $sDetails = $this->serviceModel->getServiceDetails();

      $this->view('receptionist/recept_services', $sDetails);
   }
   public function customers()
   {
      // Session::validateSession([4]);
      $this->view('receptionist/recept_customers');
   }
   public function staffMembers()
   {
      // Session::validateSession([4]);
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('receptionist/recept_staffMembers', $GetStaffArray);
   }

   public function reservationMoreInfo()
   {
      // Session::validateSession([4]);
      $this->view('common/reservationMoreInfo');
   }
}
