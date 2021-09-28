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
            'password_error' => '',

            'fname' => '',
            'lname' => '',
            'gender' => '',
            'mobileNo' => '',
            'code' => '',
            'password_2' => '',
            'confirmPassword' => '',
            'fname_error' => '',
            'lname_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'code_error' => '',
            'password_error_2' => '',
            'confirmPassword_error' => '',
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
            $selectbutton= 'login'; 
            $_COOKIE['selectbtn'] = $selectbutton;
            $this->view('login', $data);
         }
      } else {
         $data = [
            'contactNo' => '',
            'password' => '',
            'contactNo_error' => '',
            'password_error' => '',

            'fname' => '',
            'lname' => '',
            'gender' => '',
            'mobileNo' => '',
            'code' => '',
            'password_2' => '',
            'confirmPassword' => '',
            'fname_error' => '',
            'lname_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'code_error' => '',
            'password_error_2' => '',
            'confirmPassword_error' => '',
         ];
         $selectbutton= 'loginmmmm'; 
         $_COOKIE['selectbtn'] = $selectbutton;
         $this->view('login', $data);
      }
   }

   public function register()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $data = [
            'contactNo' => '',
            'password' => '',
            'contactNo_error' => '',
            'password_error' => '',

            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'gender' => trim($_POST['gender']),
            'mobileNo' => trim($_POST['mobileNo']),
            'code' => trim($_POST['code']),
            'password_2' => trim($_POST['password_2']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'fname_error' => '',
            'lname_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'code_error' => '',
            'password_error_2' => '',
            'confirmPassword_error' => '',
         ];

         // Validating fname
         if (empty($data['fname'])) {
            $data['fname_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['lname'])) {
            $data['lname_error'] = "Please enter Last Name";
         }

         // Validating gender
         if (empty($data['gender'])) {
            $data['gender_error'] = "Please select gender";
         }

         // Validating mobileNo
         if (empty($data['mobileNo'])) {
            $data['mobileNo_error'] = "Please enter Last Name";
         }

         // Validating code
         if (empty($data['code'])) {
            $data['code_error'] = "Please enter Verfication Code";
         }

         // Validating password
         if (empty($data['password_2'])) {
            $data['password_error_2'] = "Please enter Password";
         }

         // Validating confirmPassword
         if (empty($data['confirmPassword'])) {
            $data['confirmPassword_error'] = "Please enter Password again";
         }

         if (empty($data['fname_error']) && empty($data['lname_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) && empty($data['code_error']) && empty($data['password_error_2']) && empty($data['confirmPassword_error'])) {
            die("Success");
         } else {
            $selectbutton= 'register'; 
            $_COOKIE['selectbtn'] = $selectbutton;
            $this->view('login', $data);
         }
      } else {
         $data = [
            'contactNo' => '',
            'password' => '',
            'contactNo_error' => '',
            'password_error' => '',

            'fname' => '',
            'lname' => '',
            'gender' => '',
            'mobileNo' => '',
            'code' => '',
            'password_2' => '',
            'confirmPassword' => '',
            'fname_error' => 'Please enter something sample',
            'lname_error' => 'Please enter something sample',
            'gender_error' => 'Please enter something sample',
            'mobileNo_error' => 'Please enter something sample',
            'code_error' => 'Please enter something sample',
            'password_error_2' => 'Please enter something sample',
            'confirmPassword_error' => 'Please enter something sample',
         ];
         $selectbutton= 'register'; 
         $_COOKIE['selectbtn'] = $selectbutton;
         $this->view('login', $data);
      }
   }
}
