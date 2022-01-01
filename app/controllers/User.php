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
            $user = $this->userModel->getUser($data['mobileNo']);

            if (!empty($user))
            {
               $tooManyAttempts =  $this->checkFailedAttempsts($data['mobileNo']);

               if ($tooManyAttempts)
               {
                  $data['mobileNo_error'] = "Too many failed attempts.<br>Please reset the password!";
               }
               else
               {
                  $hashedPassword = $user->password;

                  if (password_verify($data['password'], $hashedPassword))
                  {
                     $this->userModel->resetFailedAttempts($data['mobileNo']);
                     $this->createUserSession($user);
                     $this->provideIntialView();

                     //System log
                     Systemlog::signin();
                  }
                  else
                  {  //Handle incorrect Attempts
                     $this->userModel->incrementFailedAttempts($data['mobileNo']);
                     $data['password_error'] = "Incorrect password";
                  }
               }
            }
            else
            {
               $data['mobileNo_error'] = "User does not exists.";
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
            'password_error' => '',
            'contactNo' => '0762930963'
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
               $isLoginExists = $this->userModel->checkLoginExists($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if ($isLoginExists)
               {
                  // If no issues
                  //GET otp
                  $OTP = $this->OTPModel->requestOTP($data['mobileNo'], 2);
                  if ($OTP)
                  {
                     // Send otp
                     $SMSResponse = SMS::sendPasswordResetSMS($data['mobileNo'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse)
                     {
                        $this->OTPModel->storeOTP($data['mobileNo'], $OTP,  2);
                        Toast::setToast(1, "Password recovery OTP sent!", "Check you mobile for the OTP.");
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
                  $this->userModel->beginTransaction();
                  $this->userModel->updatePassword($data['mobileNo'], $data['newPassword']);
                  $this->userModel->resetFailedAttempts($data['mobileNo']);
                  $this->OTPModel->removeOTP($data['mobileNo'], 2);
                  $this->userModel->commit();

                  //System log
                  // Systemlog::resetPassword();

                  Toast::setToast(1, "Password recovery successful!", "Sign in using new password.");
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
      Session::setBundle(
         'user',
         [
            "mobileNo" => $user->mobileNo,
            "type" => $user->userType,
            "id" => $this->getUserData($user)[0],
            "name" =>  $this->getUserData($user)[1],
            "img" => $this->getUserData($user)[2]
         ]
      );
   }

   public function provideIntialView()
   {
      if (Session::hasLoggedIn())
      {
         switch (Session::getUser("type"))
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
         case 1:
         case 2:
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

   public function checkFailedAttempsts($mobileNo)
   {
      $allowedMaxFailedAttempts = 5; // consecutive
      $currentFailedAttempts = $this->userModel->getFailedAttempts($mobileNo);

      if ($currentFailedAttempts >= $allowedMaxFailedAttempts)
         return true;
      else
         return false;
   }

   public function autoLogout()
   {
      // Systemlog::signout();

      // Session::clear('user');
      // session_destroy();
      return;
   }

   public function signout()
   {
      //System log
      Systemlog::signout();

      Session::clear('user');
      session_destroy();
      redirect('home');
   }
}
