<?php
class User extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }
   public function signin()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $data = [
            'mobileNo' => trim($_POST['contactNo']),
            'password' => trim($_POST['password']),
            'mobileNo_error' => '',
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
            $this->view('signin', $data);
         }
      } else {
         $data = [
            'mobileNo' => '',
            'password' => '',
            'mobileNo_error' => '',
            'password_error' => ''
         ];
         $this->view('signin', $data);
      }
   }
}
