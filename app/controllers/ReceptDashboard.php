<?php
class ReceptDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
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
      $this->view('receptionist/recept_reservations');
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
      $this->view('receptionist/recept_services');
   }
   public function customers()
   {
      $this->view('receptionist/recept_customers');
   }
   public function staffMembers()
   {
      $this->view('receptionist/recept_staffMembers');
   }
   public function leaves()
   {
      $this->view('receptionist/recept_leaves');
   }
}
