<?php
class ReceptDashboard extends Controller
{
   public function __construct()
   {
      Session::validateSession([4]);
      $this->serviceModel = $this->model('ServiceModel');
      $this->reservationModel = $this->model('ReservationModel');
      $this->staffModel = $this->model('StaffModel');
      $this->salesModel = $this->model('SalesModel');
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
      $results = $this->reservationModel->getAllPendingRecallRequests();
      $this->view('receptionist/recept_recallRequests', $results);
   }
   public function sales()
   {
      // Session::validateSession([4]);

      // TODO : sort invoices by date 
      $invoices = $this->salesModel->getAllInvoices();
      $this->view('receptionist/recept_sales', $invoices);
   }

   public function invoiceView($invoiceNo, $type)
   {
      if ($type == 1)
      {
         $data = $this->salesModel->getPayInvoice_ReservationData_RefundInvoice($invoiceNo);
      }
      else
      {
         $data = $this->salesModel->getRefInvoice_ReservationData($invoiceNo);
      }
      $data->type = $type;
      // var_dump($data);
      $this->view('receptionist/recept_invoiceView', $data);
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
