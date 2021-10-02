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
            $user = $result[0];   //REmove after createing query builders

            if ($result)
            {
               $hashedPassword = $user->password;

               if (password_verify($data['password'], $hashedPassword))
               {
                  $this->createUserSession($user);
                  // die($_SESSION['userMobileNo']);
                  $this->provideIntialView();
                  // die("SUCCESS");
               }
               else
               {
                  //Handle incorrect Attempts
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

   private function createUserSession($user)
   {
      session_start();
      $_SESSION['userMobileNo'] = $user->mobileNo;
      $_SESSION['userType'] = $user->userType;
   }

   private function provideIntialView()
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
            // case 'owner':
            //    redirect('ownDashboard/overview');
            //    break;
            // case 'admin':
            //    redirect('owner/overview');
            //    break;
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
