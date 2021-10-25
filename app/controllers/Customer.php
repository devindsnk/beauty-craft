<?php
class Customer extends Controller
{
   public function __construct()
   {
      $this->customerModel = $this->model('CustomerModel');
      $this->userModel = $this->model('userModel');
      $this->pinModel = $this->model('pinVerifyHandlerModel');
   }

   public function register()
   {
      // If the request is a post
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // Data is loaded
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
            'confirmPassword_error' => ''
         ];

         // If the pin is requested
         if ($_POST['action'] == "getPIN")
         {
            // Validating mobileNo
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            if (empty($data['mobileNo_error']))
            {
               // Checking if already registered
               $isUserExists = $this->userModel->checkUserExists($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if ($isUserExists)
               {
                  $data['mobileNo_error'] = "Number is already registered";
               }
               else
               { // If no issues
                  //GET otp
                  $pin = generatePIN($this->pinModel, $data['mobileNo'], 1);
                  if ($pin)
                  {
                     // Send otp
                     $SMStext = urlencode("This is your OTP code: $pin");
                     $SMSResponse = sendSMS($data['mobileNo'], $SMStext);

                     //If pin sent successfull then store the pin
                     if ($SMSResponse)
                     {
                        storePIN($this->pinModel, $pin, $data['mobileNo'], 1);
                     }
                     // If sending pin sending fails
                     else
                     {
                        $data['mobileNo_error'] = "Check you mobile number again";
                     }
                  }
                  else
                  {
                     $data['mobileNo_error'] = "PIN has been already sent";
                  }
               }
            }
            //  providing the view again
            $this->view('register', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "register")
         {
            // Validate everything
            $data['fName_error'] = emptyCheck($data['fName']);
            $data['lName_error'] = emptyCheck($data['lName']);
            $data['gender_error'] = emptyCheck($data['gender']);
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            $data['pin_error'] = emptyCheck($data['pin']);
            // Check Password strength here
            $data['password_error'] = emptyCheck($data['password']);
            $data['confirmPassword_error'] = emptyCheck($data['confirmPassword']);
            if (empty($data['password_error']) && empty($data['confirmPassword_error']) && $data['password'] != $data['confirmPassword'])
            {
               $data['confirmPassword_error'] = "Passwords dont't match";
            }

            if (
               empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) &&
               empty($data['pin_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])
            )
            {
               // $con = (new Database);
               // $dbTemp = $con->getConnection();

               // PIN verification
               $isVerified = verifyPIN($this->pinModel, $data['mobileNo'], $data['pin'], 1);

               //If pin is not requested or previously-used or incorrect
               if (!$isVerified)
               {
                  $data['pin_error'] = "Incorrect PIN";
                  $this->view('register', $data);
               }
               else
               {
                  // // $con = (new Database);
                  // // $dbTemp = $con->getConnection();
                  // try
                  // {
                  //    // First of all, let's begin a transaction
                  //    $dbTemp->beginTransaction();

                  //    // A set of queries; if one fails, an exception should be thrown
                  //    $this->customerModel->registerCustomer($data, $con);
                  //    // $this->userModel->registerUser($data, $con);
                  //    // If we arrive here, it means that no exception was thrown
                  //    // i.e. no query has failed, and we can commit the transaction
                  //    $dbTemp->commit();
                  // }
                  // catch (\Throwable $e)
                  // {
                  //    print_r($e->getMessage());
                  //    // An exception has been thrown
                  //    // We must rollback the transaction
                  //    $dbTemp->rollback();
                  //    throw $e; // but the error must be handled anyway
                  // 


                  $this->customerModel->registerCustomer($data);
                  $this->userModel->registerUser($data['mobileNo'], $data['password'], 6);
                  removePIN($this->pinModel, $data['mobileNo'], 1);

                  // Provide success message here
                  header('location: ' . URLROOT . '/user/signin');
               }
            }
            else
            {
               $this->view('register', $data);
            }
         }
         else
         {
            die("Something went wrong");
         }
      }
      else
      {
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
            'confirmPassword_error' => ''
         ];
         $this->view('register', $data);
      }
   }

   public function changePassword()
   {
      validateSession([6]);
      $this->view('customer/cust_changePassword');
   }

   public function myReservation()
   {
      validateSession([6]);
      $this->view('customer/cust_myReservation');
   }
}
