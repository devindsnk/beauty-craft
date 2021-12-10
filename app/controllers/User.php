<?php

class User extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
      $this->OTPModel = $this->model('OTPManagementModel');
      $this->customerModel = $this->model('CustomerModel');
      $this->staffModel = $this->model('StaffModel');
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

         $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
         $data['password_error'] = emptyCheck($data['password']);

         if (empty($data['mobileNo_error']) && empty($data['password_error']))
         {
            $result = $this->userModel->getUser($data['mobileNo']);

            if (!empty($result))
            {
               $user = $result;   //Remove after createing query builders
               $hashedPassword = $user->password;

               if (password_verify($data['password'], $hashedPassword))
               {
                  

                  $this->createUserSession($user);
                  // die($_SESSION['userMobileNo']);
                  $this->provideIntialView();
                  // die("SUCCESS");

                  //System log
                  $log="User loged in to the system";
                  logger($data['mobileNo'],$log);
                 
                  
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
            'OTP' => trim($_POST['OTP']),
            'newPassword' => trim($_POST['password']),
            'confirmNewPassword' => trim($_POST['confirmPassword']),
            'mobileNo_error' => '',
            'OTP_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);

            if (empty($data['mobileNo_error']))
            {
               // Checking if already registered
               $isUserExists = $this->userModel->checkUserExists($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if ($isUserExists)
               {
                  // If no issues
                  //GET otp
                  $OTP = $this->OTPModel->requestOTP($data['mobileNo'], 2);
                  if ($OTP)
                  {
                     // Send otp
                     $SMSResponse = sendPasswordResetSMS($data['mobileNo'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse)
                     {
                        $this->OTPModel->storeOTP($data['mobileNo'], $OTP,  2);
                     }
                     // If sending OTP sending fails
                     else
                     {
                        $data['mobileNo_error'] = "Check you mobile number again";
                     }
                  }
                  else
                  {
                     $data['mobileNo_error'] = "OTP has been sent already";
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
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            $data['OTP_error'] = emptyCheck($data['OTP']);

            $data['newPassword_error'] = emptyCheck($data['newPassword']);
            $data['confirmNewPassword_error'] = emptyCheck($data['confirmNewPassword']);
            if (empty($data['newPassword_error']) && empty($data['confirmNewPassword_error']) && $data['newPassword'] != $data['confirmNewPassword'])
            {
               $data['confirmNewPassword_error'] = "New Passwords dont't match";
            }

            if (
               empty($data['mobileNo_error']) && empty($data['OTP_error']) && empty($data['newPassword_error']) && empty($data['confirmNewPassword_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['mobileNo'], $data['OTP'], 2);

               //If OTP is not requested or previously-used or incorrect
               if (!$isVerified)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('resetPassword', $data);
               }
               else
               {
                  $this->userModel->updatePassword($data['mobileNo'], $data['newPassword']);
                  $this->OTPModel->removeOTP($data['mobileNo'], 2);

                  // Provide success message here
                  header('location: ' . URLROOT . '/user/signin');

                  //system log
                  $log="user update the password";
                  logger($data['mobileNo'],$log);
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
            'OTP' => '',
            'newPassword' => '',
            'confirmNewPassword' => '',
            'mobileNo_error' => '',
            'OTP_error' => '',
            'newPassword_error' => '',
            'confirmNewPassword_error' => ''
         ];
         $this->view('resetPassword', $data);
      }
   }

   private function createUserSession($user)
   {
      $_SESSION = [
         'userMobileNo' => $user->mobileNo,
         'userType' => $user->userType,
         'userID' => $this->getUserData($user)[0],
         'username' => $this->getUserData($user)[1]
      ];
      //Containes customer id or staff id
      // echo $_SESSION['userMobileNo'] . " " . $_SESSION['userType'] . " " . $_SESSION['userID'] . " " . $_SESSION['username'];
      // die();
   }

   public function provideIntialView()
   {
      if (isset($_SESSION['userType']))
      {
         switch ($_SESSION['userType'])
         {
            case 1:
               redirect('sysAdminDashboard/home');
               break;
            case 2:
               redirect('ownDashboard/home');
               break;
            case 3:
               redirect('mangDashboard/home');
               break;
            case 4:
               redirect('receptDashboard/home');
               break;
            case 5:
               redirect('serProvDashboard/home');
               break;
            default:
               redirect('home');
               break;
         }

      }
      else
      {
         redirect('home');
      }
   }

   public function getUserData($user)
   {
      switch ($user->userType)
      {
         case 3:
         case 4:
         case 5:
            return $this->staffModel->getStaffUserData($user->mobileNo);
            break;
         case 6:
            return $this->customerModel->getCustomerUserData($user->mobileNo);
            break;
         default:
            return [null, null];
            break;
      }
   }

   public function signout()
   {
      $mobileNo=$_SESSION['userMobileNo'];
      unset($_SESSION['userMobileNo']);
      unset($_SESSION['userType']);
      unset($_SESSION['userID']);
      session_destroy();
      redirect('home');

      //system log
      $log="User signout from the system";
      logger($mobileNo,$log);

   }





}
