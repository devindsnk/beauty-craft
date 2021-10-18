<?php
session_start();

class User extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('userModel');
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
               // Checking if whether user exists
               $result = $this->userModel->getUserData($data['mobileNo']);
               // Handle already registered but inactive customers properly
               if (!$result)
               {
                  $data['mobileNo_error'] = "User does not exist.";
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
                     $data['mobileNo_error'] = "Something went wrong";
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
      }
      else
      {
         $this->view('resetPassword');
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

   public function signout()
   {
      unset($_SESSION['userMobileNo']);
      unset($_SESSION['userType']);
      session_destroy();
      redirect('home');
   }
}
