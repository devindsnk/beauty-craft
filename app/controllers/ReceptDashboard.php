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
   public function recallRequests()
   {
      $results = $this->reservationModel->getAllPendingRecallRequests();
      $this->view('receptionist/recept_recallRequests', $results);
   }
   public function sales($iType = "all", $status = null)
   {
      if ($iType == "all")
      {
         $invoices = $this->salesModel->getAllInvoices();
      }
      else
      {
         $invoices = $this->salesModel->getInvoicesWithFilters($iType, $status);
      }

      $data = [
         'selectedType' => $iType,
         'selectedState' => $status,
         'invoices' => $invoices
      ];
      // TODO : sort invoices by date 

      $this->view('receptionist/recept_sales',  $data);
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
   public function test()
   {
      $curDate =  "2022-01-10"; //DateTimeExtended::getCurrentDate();
      $toDate = date('Y-m-d', strtotime($curDate . ' + 3 days'));;

      var_dump($curDate);
      var_dump($toDate);

      $sProviders = $this->staffModel->getSProvidersWithLeaveStatusByDate($curDate);

      $pendingReservations = $this->reservationModel->getPendingReservationsByDate($curDate, $toDate);

      $data = [
         'sProviders' => $sProviders,
         'pendingReservations' => $pendingReservations
      ];

      $this->view("receptionist/recept_test", $data);
   }
}
