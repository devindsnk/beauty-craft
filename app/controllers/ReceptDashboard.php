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
      redirect('ReceptDashboard/dailyOverview/' . $curDate);
   }
   public function dailyOverview($date, $sProvider = null)
   {
      // if (is_null($sProvider))
      // {
      //    $reservations = $this->reservationModel->getUpcomingReservationsByDate($date);
      // }
      // else
      // {
      //    $reservations = $this->reservationModel->getUpcomingReservationsByDateAndStaff($date, $sProvider);
      // }

      // $serviceProviders = $this->serviceModel->getServiceProviderDetails();

      $this->reservationModel->updateTodayNotConfirmedToCancel();


      $data = [
         'selectedDate' => $date
      ];

      $this->view('receptionist/recept_dailyOverview', $data);
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
      $curDate =  DateTimeExtended::getCurrentDate(); //"2022-03-15"; 
      $toDate = date('Y-m-d', strtotime($curDate . ' + 3 days'));;

      $sProviders = $this->staffModel->getStaffWithLeaveStatusByDate($curDate);

      $pendingReservations = $this->reservationModel->getPendingReservationsByDate($curDate, $toDate);

      $data = [
         'sProviders' => $sProviders,
         'pendingReservations' => $pendingReservations
      ];

      $this->view("receptionist/recept_test", $data);
   }
}
