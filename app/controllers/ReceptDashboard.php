<?php
class Pages extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function dailyView()
   {
      $this->view('');
   }
   public function reservations()
   {
      $this->view('login');
   }
   public function recallRequests()
   {
      $this->view('register');
   }
}
