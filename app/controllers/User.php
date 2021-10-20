<?php
session_start();

class User extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('userModel');
      $this->pinModel = $this->model('pinVerifyHandlerModel');
   }
   public function signin()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'mobileNo' => trim($_POST['mobileNo']),
            'password' => trim($_POST['password']),
            'mobileNo_error' => '',
            'password_error' => ''
         ];

         // Validating contactNo
         if (empty($data['mobileNo']))
         {
            $data['mobileNo_error'] = "Please enter Mobile No";
         }
         // Validating password
         if (empty($data['password']))
         {
            $data['password_error'] = "Please enter Password";
         }

         if (empty($data['mobileNo_error']) && empty($data['password_error']))
         {
            $result = $this->userModel->getUser($data['mobileNo']);

            if (!empty($result))
            {
               $user = $result[0];   //REmove after createing query builders
               $hashedPassword = $user->password;

               if (password_verify($data['password'], $hashedPassword))
               {
                  $this->createUserSession($user);
                  // die($_SESSION['userMobileNo']);
                  $this->provideIntialView();
                  // die("SUCCESS");
               }
               else
               {  //Handle incorrect Attempts
                  $data['password_error'] = "Incorrect password";
               }
            }
            else
            {
               $data['mobileNo_error'] = "Invalid mobile no";
            }

            if (!empty($data['mobileNo_error']) || !empty($data['password_error']))
            {
               $this->view('signin', $data);
            }
         }
         else
         {
            $this->view('signin', $data);
         }
      }
      else
      {
         $data = [
            'mobileNo' => '',
            'password' => '',
            'mobileNo_error' => '',
            'password_error' => ''
         ];
         $this->view('signin', $data);
      }
   }

   public function resetPassword()
   {
      // If the request is a post
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // Data is loaded
         $data = [
            'mobileNo' => trim($_POST['mobileNo']),
            'pin' => trim($_POST['pin']),
            'newPassword' => trim($_POST['password']),
            'confirmNewPassword' => trim($_POST['confirmPassword']),
            'mobileNo_error' => '',
            'pin_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
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
               $isUserExists = $this->userModel->checkUserExists($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if ($isUserExists)
               {
                  // If no issues
                  //GET otp
                  $pin = generatePIN($this->pinModel, $data['mobileNo'], 2);
                  if ($pin)
                  {
                     // Send otp
                     $SMStext = urlencode("This is your OTP code: $pin");
                     $SMSResponse = sendSMS($data['mobileNo'], $SMStext);

                     //If pin sent successfull then store the pin
                     if ($SMSResponse)
                     {
                        storePIN($this->pinModel, $pin, $data['mobileNo'], 2);
                     }
                     // If sending pin sending fails
                     else
                     {
                        $data['mobileNo_error'] = "Check you mobile number again";
                     }
                  }
                  else
                  {
                     $data['mobileNo_error'] = "PIN has been sent already";
                  }
               }
               else
               {
                  $data['mobileNo_error'] = "User does not exists";
               }
            }
            //  providing the view again
            $this->view('resetPassword', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "save")
         {
            // Validate everything

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
            if (empty($data['newPassword']))
            {
               $data['password_error'] = "Please enter new Password";
            }

            // Validating confirmPassword
            if (empty($data['confirmNewPassword']))
            {
               $data['confirmPassword_error'] = "Please enter new Password again";
            }
            else if ($data['newPassword'] != $data['confirmNewPassword'])
            {
               $data['confirmNewPassword_error'] = "New Passwords dont't match";
            }

            if (
               empty($data['mobileNo_error']) && empty($data['pin_error']) && empty($data['newPassword_error']) && empty($data['confirmNewPassword_error'])
            )
            {
               // PIN verification
               $isVerified = verifyPIN($this->pinModel, $data['mobileNo'], $data['pin'], 2);

               //If pin is not requested or previously-used or incorrect
               if (!$isVerified)
               {
                  $data['pin_error'] = "Incorrect PIN";
                  $this->view('resetPassword', $data);
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

                  $this->userModel->updatePassword($data['mobileNo'], $data['newPassword']);
                  removePIN($this->pinModel, $data['mobileNo'], 2);

                  // Provide success message here
                  header('location: ' . URLROOT . '/user/signin');
               }
            }
            else
            {
               $this->view('resetPassword', $data);
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
            'mobileNo' => '',
            'pin' => '',
            'newPassword' => '',
            'confirmNewPassword' => '',
            'mobileNo_error' => '',
            'pin_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
         ];
         $this->view('resetPassword', $data);
      }
   }

   private function createUserSession($user)
   {
      session_start();
      $_SESSION['userMobileNo'] = $user->mobileNo;
      $_SESSION['userType'] = $user->userType;
   }

   public function provideIntialView()
   {
      switch ($_SESSION['userType'])
      {
         case 'customer':
            redirect('home');
            break;
         case 'receptionist':
            redirect('receptDashboard/dailyView');
            break;
         case 'serviceProvider':
            redirect('serProvDashboard/overview');
            break;
         case 'manager':
            redirect('mangDashboard/overview');
            break;
         case 'owner':
            redirect('ownDashboard/overview');
            break;
         case 'admin':
            redirect('owner/overview');
            break;
         default:
            die("USER TYPE ERROR");
            // http_response_code(404);
            // header('Location: /error');
            break;
      }
   }

   public function signout()
   {
      unset($_SESSION['userMobileNo']);
      unset($_SESSION['userType']);
      session_destroy();
      redirect('home');
   }
}


// USER LEVEL TYPES

// System admin => 1
// Owner => 2
// Manager => 3
// Receptionist => 4
// Service Provider => 5
// Customer => 6
