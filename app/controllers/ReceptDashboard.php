<?php
class ReceptDashboard extends Controller
{
   public function __construct()
   {
      validateSession([4]);
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
      // validateSession([4]);
      $this->view('receptionist/recept_newReservation');
   }
   public function recallRequests()
   {
      // validateSession([4]);
      $this->view('receptionist/recept_recallRequests');
   }
   public function sales()
   {
      // validateSession([4]);
      $this->view('receptionist/recept_sales');
   }
   public function services()
   {
      // validateSession([4]);
      $sDetails = $this->serviceModel->getServiceDetails();

      $GetServicesArray = [
         'services' => $sDetails
      ];
      $this->view('receptionist/recept_services', $GetServicesArray);
   }
   public function customers()
   {
      // validateSession([4]);
      $this->view('receptionist/recept_customers');
   }
   public function staffMembers()
   {
      // validateSession([4]);
      $staffDetails = $this->staffModel->getStaffDetails();

      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('receptionist/recept_staffMembers', $GetStaffArray);
   }
   public function leaves()
   {
      // validateSession([4]);
      $this->view('receptionist/recept_leaves');
   }
}
