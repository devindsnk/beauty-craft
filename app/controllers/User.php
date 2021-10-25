<?php

class User extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
      $this->pinModel = $this->model('pinVerifyHandlerModel');
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

         // Validating contactNo
         if (empty($data['mobileNo']))
         {
            $data['mobileNo_error'] = "Please enter Mobile No";
         }
         else if (!preg_match("/^[0-9]*$/", $data['mobileNo']) || (strlen($data['mobileNo']) != 10))
         {
            $data['mobileNo_error'] = "Invalid mobile number format";
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
               $user = $result;   //Remove after createing query builders
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
            else if (!preg_match("/^[0-9]*$/", $data['mobileNo']) || (strlen($data['mobileNo']) != 10))
            {
               $data['mobileNo_error'] = "Invalid mobile number format";
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
            else if (!preg_match("/^[0-9]*$/", $data['mobileNo']) || (strlen($data['mobileNo']) != 10))
            {
               $data['mobileNo_error'] = "Invalid mobile number format";
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
         case 6:
            redirect('home');
            break;
         default:
            die("USER TYPE ERROR");
            // http_response_code(404);
            // header('Location: /error');
            break;
      }
   }
   public function getUserData($user)
   {
      switch ($user->userType)
      {
         case 3:
         case 4:
         case 5:
            return $this->staffModel->getStaffDataByMobileNo($user->mobileNo);
            break;
         case 6:
            return $this->customerModel->getCustomerDataByMobileNo($user->mobileNo);
            break;
         default:
            return [null, null];
            break;
      }
   }

   public function signout()
   {
      unset($_SESSION['userMobileNo']);
      unset($_SESSION['userType']);
      unset($_SESSION['userID']);
      session_destroy();
      redirect('home');
   }
}
