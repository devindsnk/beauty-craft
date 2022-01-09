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
      $curDate =  DateTimeExtended::getCurrentDate();
      redirect('ReceptDashboard/dailyView/' . $curDate);
   }
   public function dailyView($date, $sProvider = null)
   {
      if (is_null($sProvider))
      {
         $reservations = $this->reservationModel->getUpcomingReservationsByDate($date);
      }
      else
      {
         $reservations = $this->reservationModel->getUpcomingReservationsByDateAndStaff($date, $sProvider);
      }

      $serviceProviders = $this->serviceModel->getServiceProviderDetails();

      $data = [
         'selectedDate' => $date,
         'selectedStaffID' => $sProvider,
         'serviceProvidersList' => $serviceProviders,
         'reservations' => $reservations
      ];

      $this->view('receptionist/recept_dailyView', $data);
   }
   public function newReservation()
   {
      $this->view('receptionist/recept_newReservation');
   }
   public function recallRequests()
   {
      $results = $this->reservationModel->getAllPendingRecallRequests();
      $this->view('receptionist/recept_recallRequests', $results);
   }
   public function sales()
   {
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

      $this->view('receptionist/recept_invoiceView', $data);
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

   public function reservationMoreInfo()
   {
      $this->view('common/reservationMoreInfo');
   }
}
