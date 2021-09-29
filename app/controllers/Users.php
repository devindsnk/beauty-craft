<?php
class Users extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }
   public function login()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $data = [
            'contactNo' => trim($_POST['contactNo']),
            'password' => trim($_POST['password']),
            'contactNo_error' => '',
            'password_error' => ''
         ];

         // Validating contactNo
         if (empty($data['contactNo'])) {
            $data['contactNo_error'] = "Please enter Contact No";
         }
         // Validating password
         if (empty($data['password'])) {
            $data['password_error'] = "Please enter Password";
         }

         if (empty($data['contactNo_error']) && empty($data['password_error'])) {
            die("Success");
         } else {
            $this->view('login', $data);
         }
      } else {
         $data = [
            'contactNo' => '',
            'password' => '',
            'contactNo_error' => '',
            'password_error' => ''
         ];
         $this->view('login', $data);
      }
   }
}
