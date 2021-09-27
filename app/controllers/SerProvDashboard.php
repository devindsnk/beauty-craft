<?php
class SerProvDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function overview()
   {
      $this->view('serviceProvider/serProv_overview');
   }
   public function reservations()
   {
      $this->view('serviceProvider/serProv_reservation');
   }
   public function leaves()
   {
      $this->view('serviceProvider/serProv_leaves');
   }
   
   
}
