<?php class SerProvDashboard extends Controller
{
   public function __construct()
   {
      // validateSession([5]);
     
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
      // validateSession([5]);
      $this->view('serviceProvider/serProv_reservation');
   }

}
