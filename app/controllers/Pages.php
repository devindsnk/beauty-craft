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
   // public function login()
   // {
   //    $val= "log";
   //    $_COOKIE['varname'] = $val;
   //    $this->view('login');
   // }
   // public function register()
   // {
   //    $val= 'reg'; 
   //    $_COOKIE['varname'] = $val;
   //    $this->view('login');
   // }
}
