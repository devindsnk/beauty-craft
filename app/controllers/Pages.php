<?php
class Pages extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function home()
   {
      $this->view('home');
   }
}
