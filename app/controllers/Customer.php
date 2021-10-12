<?php
class Customer extends Controller
{
   public function __construct()
   {
      $this->customerModel = $this->model('CustomerModel');
      $this->userModel = $this->model('userModel');
   }

   public function sendOTP()
   {
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
            'confirmPassword_error' => '',
         ];

         // If the pin is requested
         if ($_POST['action'] == "getPIN")
         {
            // Validating mobileNo
            if (empty($data['mobileNo']))
            {
               $data['mobileNo_error'] = "Please enter mobile number";
            }
            else
            {
               // Checking if already registered
               $result = $this->customerModel->getCustomerData($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if ($result)
               {
                  $data['mobileNo_error'] = "Number is already registered";
               }
               else
               { // If no issues
                  //GET otp
                  $pin = getOTP();

                  //Send otp
                  $SMStext = urlencode("This is your OTP code: $pin");
                  $SMSResponse = sendSMS($data['mobileNo'], $SMStext);

                  // If sending pin fails
                  if (!$SMSResponse)
                  {
                     $data['mobileNo_error'] = "Check you mobile number again";
                  }
                  else
                  {  //If pin sent successfull then enter record
                     $this->customerModel->addVerificationPIN($data['mobileNo'], $pin);
                     // handle invalid pins properly
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

            // Validating fname
            if (empty($data['fName']))
            {
               $data['fName_error'] = "Please enter First Name";
            }

            // Validating lname
            if (empty($data['lName']))
            {
               $data['lName_error'] = "Please enter Last Name";
            }

            // Validating gender
            if (empty($data['gender']))
            {
               $data['gender_error'] = "Please select gender";
            }

            // Validating mobileNumber
            if ($data['mobileNo'] == "")
            {
               $data['mobileNo_error'] = "Please enter mobile no";
            }

            // Validating code
            if ($data['pin'] == "")
            {
               $data['pin_error'] = "Please enter Verfication PIN";
            }

            // Validating password
            if (empty($data['password']))
            {
               $data['password_error'] = "Please enter Password";
            }

            // Validating confirmPassword
            if (empty($data['confirmPassword']))
            {
               $data['confirmPassword_error'] = "Please enter Password again";
            }
            else if ($data['password'] != $data['confirmPassword'])
            {
               $data['confirmPassword_error'] = "Passwords dont't match";
            }


            if (
               empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) &&
               empty($data['pin_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])
            )
            {
               //    // try {
               //    //    // First of all, let's begin a transaction
               //    //    $this->db->beginTransaction();

               //    //    // A set of queries; if one fails, an exception should be thrown
               //    //    $this->customerModel->register($data);
               //    //    $this->userModel->register($data);

               //    //    // If we arrive here, it means that no exception was thrown
               //    //    // i.e. no query has failed, and we can commit the transaction
               //    //    $this->dbh->commit();
               //    // } catch (\Throwable $e) {
               //    //    // An exception has been thrown
               //    //    // We must rollback the transaction
               //    //    $this->dbh->rollback();
               //    //    throw $e; // but the error must be handled anyway
               //    // }

               // PIN verification
               $result = $this->customerModel->getVerificationPIN($data['mobileNo']);

               //If pin is not requested or previously-used or incorrect
               if (!$result || $result->valid == 0 || strcmp($data['pin'], $result->pin) != 0)
               {
                  $data['pin_error'] = "Incorrect PIN";
                  $this->view('register', $data);
               }
               // Check for pin timeout here 
               else
               {
                  $this->customerModel->registerCustomer($data);
                  $this->customerModel->markPINInvalid($data['mobileNo']);
                  $this->userModel->registerUser($data);

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
            'confirmPassword_error' => '',
         ];
         $this->view('register', $data);
      }
   }
   public function profile()
   {
      $this->view('customer/cust_profile');
   }
   public function changePassword()
   {
      $this->view('customer/cust_changePassword');
   }
   public function myReservation()
   {
      $this->view('customer/cust_myReservation');
   }
}
