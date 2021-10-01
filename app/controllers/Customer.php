<?php
class Customer extends Controller
{
   public function __construct()
   {
      $this->customerModel = $this->model('CustomerModel');
   }

   public function register()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         $data = [
            'fName' => trim($_POST['fName']),
            'lName' => trim($_POST['lName']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'mobileNo' => trim($_POST['mobileNo']),
            'pin' => trim($_POST['pin']),
            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'pin_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
         ];

         // Validating fname
         if (empty($data['fName'])) {
            $data['fName_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['lName'])) {
            $data['lName_error'] = "Please enter Last Name";
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
         if (empty($data['pin'])) {
            $data['pin_error'] = "Please enter Verfication Code";
         }

         // Validating password
         if (empty($data['password'])) {
            $data['password_error'] = "Please enter Password";
         }

         // Validating confirmPassword
         if (empty($data['confirmPassword'])) {
            $data['confirmPassword_error'] = "Please enter Password again";
         } else if ($data['password'] != $data['confirmPassword']) {
            $data['confirmPassword_error'] = "Passwords dont't match";
         }

         if (empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) && empty($data['code_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])) {
            $this->customerModel->register($data);
            header('location: ' . URLROOT . '/user/signin');
         } else {
            // die("Fail");
            $this->view('register', $data);
         }
      } else {
         $data = [
            'fName' => '',
            'lName' => '',
            'gender' => '',
            'mobileNo' => '',
            'pin' => '',
            'confirmPassword' => '',
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'pin_error' => '',
            'password_error' => '',
            'confirmPassword_error' => '',
         ];
         $this->view('register', $data);
      }
   }
}
