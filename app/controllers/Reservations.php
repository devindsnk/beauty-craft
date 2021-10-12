<?php
class Reservations extends Controller
{
   public function __construct()
   {
   }

   public function addNew()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // $data = [
         //    'mobileNo' => trim($_POST['mobileNo']),
         //    'password' => trim($_POST['password']),
         //    'mobileNo_error' => '',
         //    'password_error' => ''
         // ];
      }
      else
      {
         $data = [
            //    'mobileNo' => '',
            //    'password' => '',
            //    'mobileNo_error' => '',
            //    'password_error' => ''
         ];
         $this->view('receptionist/recept_newReservation', $data);
      }
   }




   public function notFound()
   {
      $this->view('404');
   }
}
