<?php
class Uses extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function register()
   {
      $this->view('home');
   }
}
