<?php
class Customer extends Controller
{
   public function __construct()
   {
      $this->customerModel = $this->model('CustomerModel');
      $this->userModel = $this->model('userModel');
      $this->OTPModel = $this->model('OTPManagementModel');
   }

   public function viewAllCustomers()
   {
      Session::validateSession([2, 3, 4]);
      $CusDetails = $this->customerModel->getAllCustomerDetails();
      $CustomerDataArray = ['customer' => $CusDetails];
      $this->view('common/allCustomersTable', $CustomerDataArray);
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
            'OTP' => trim($_POST['OTP']),
            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            // Validating mobileNo
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            if (empty($data['mobileNo_error']))
            {
               // Checking if already registered
               $isUserExists = $this->userModel->checkAlreadyRegistered($data['mobileNo']);

               if ($isUserExists)
               {
                  $data['mobileNo_error'] = "Number is already registered";
               }
               else
               { // If no issues
                  //GET otp
                  $OTP = $this->OTPModel->requestOTP($data['mobileNo'], 1);
                  if ($OTP)
                  {
                     // Send otp
                     $SMSResponse = SMS::sendMobileVerifySMS($data['mobileNo'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse)
                     {
                        $this->OTPModel->storeOTP($data['mobileNo'], $OTP, 1);
                        Toast::setToast(1, "Verification OTP sent!", "Check you mobile for the OTP.");
                     }
                     // If sending OTP sending fails
                     else
                     {
                        $data['mobileNo_error'] = "Check you mobile number again";
                     }
                  }

                  // The sent pin is not timeout
                  else
                  {
                     $data['mobileNo_error'] = "OTP has been sent already";
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
            $data['OTP_error'] = emptyCheck($data['OTP']);
            // TODO: Check Password strength here
            $data['password_error'] = emptyCheck($data['password']);
            $data['confirmPassword_error'] = emptyCheck($data['confirmPassword']);
            if (empty($data['password_error']) && empty($data['confirmPassword_error']) && $data['password'] != $data['confirmPassword'])
            {
               $data['confirmPassword_error'] = "Passwords dont't match";
            }

            if (
               empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) &&
               empty($data['OTP_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['mobileNo'], $data['OTP'], 1);

               //If OTP is not requested or previously-used or incorrect
               if (!$isVerified)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('register', $data);
               }
               else
               {
                  $this->userModel->beginTransaction();

                  $this->userModel->registerUser($data['mobileNo'], $data['password'], 6);
                  $this->customerModel->registerCustomer($data);
                  $this->OTPModel->removeOTP($data['mobileNo'], 1);

                  //System log
                  Systemlog::createCustomerAccount();

                  SMS::sendCustomerRegSMS($data['mobileNo']);
                  $this->userModel->commit();

                  Toast::setToast(1, "Registration Successful!", "You can login to your account now.");
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
            'OTP' => '',
            'confirmPassword' => '',
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => ''
         ];
         $this->view('register', $data);
      }
   }

   public function changePassword()
   {
      Session::validateSession([6]);
      $result = $this->userModel->getUser(Session::getUser("mobileNo"));
      $hashedPassword = $result->password;
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'mobileNo' => $result->mobileNo,
            'currentPassword' => trim($_POST['currentPassword']),
            'newPassword1' => trim($_POST['password1']),
            'newPassword2' => trim($_POST['password2']),
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];

         $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
         $data['newPassword_error'] = emptyCheck($data['newPassword1']);
         $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);
         if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
         {
            $this->view('customer/cust_changePassword', $data);
         }

         else //no errors
         {
            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $this->view('customer/cust_changePassword', $data);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['mobileNo'], $data['newPassword1']);
                  //System log
                  Toast::setToast(1, "Password changed successfully", "");

                  Systemlog::changePassword();
                  $this->view('customer/cust_changePassword', $data);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $this->view('customer/cust_changePassword', $data);
            }

            $this->view('customer/cust_changePassword', $data);
         }
      }
      else
      {
         $data = [
            'mobileNo' => $result->mobileNo,
            'currentPassword' => '',
            'newPassword1' => '',
            'newPassword2' => '',
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => ''
         ];
         $this->view('customer/cust_changePassword', $data);
      }
   }

   public function myReservation()
   {
      Session::validateSession([6]);
      $this->view('customer/cust_myReservation');
   }
   public function remCustomer($cusID, $mobileNo, $rescount)
   {
      $this->customerModel->removeCustomerDetails($cusID, $mobileNo, $rescount);
      Toast::setToast(1, "Customer Removed Successfully!", "");
      redirect('OwnDashboard/customers');
   }

   public function cusDetailView($cusID)
   {
      $customerDetails = $this->customerModel->getCustomerDetailsByCusID($cusID);
      // print_r($customerDetails);
      // die("controller error");
      $AllReservationCount = $this->customerModel->getAllReservationCountByCusID($cusID);
      // print_r($AllReservationCount);
      // die("controller error");
      $CancelledReservationCount = $this->customerModel->getCancelledReservationCountByCusID($cusID);
      // print_r($CancelledReservationCount);
      // die("controller error");
      $CompletedReservationSales = $this->customerModel->getAllCompletedReservationSalesByCusID($cusID);

      $ViewCustomerArray = ['cusDetails' => $customerDetails, 'allResCount' => $AllReservationCount, 'cancelledResCount' => $CancelledReservationCount, 'sales' => $CompletedReservationSales];
      // print_r($ViewCustomerArray);
      // die("");

      $this->view('common/customerView', $ViewCustomerArray);
   }

   public function getReservataionCountByCustomerID($cusID)
   {
      $result = $this->customerModel->getUpcomingReservationCountByCusID($cusID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result));
   }

   public function createCustomerAccount()
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
            'OTP' => trim($_POST['OTP']),
            'password' => trim($_POST['password']),
            'confirmPassword' => trim($_POST['confirmPassword']),
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => ''
         ];

         // If the OTP is requested
         if ($_POST['action'] == "getOTP")
         {
            // Validating mobileNo
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            if (empty($data['mobileNo_error']))
            {
               // Checking if already registered
               $isUserExists = $this->userModel->checkAlreadyRegistered($data['mobileNo']);

               if ($isUserExists)
               {
                  $data['mobileNo_error'] = "Number is already registered";
               }
               else
               {
                  $OTP = $this->OTPModel->requestOTP($data['mobileNo'], 1);
                  if ($OTP)
                  {
                     $SMSResponse = SMS::sendMobileVerifySMS($data['mobileNo'], $OTP);

                     //If OTP sent successfull then store the OTP
                     if ($SMSResponse)
                     {
                        $this->OTPModel->storeOTP($data['mobileNo'], $OTP, 1);
                        Toast::setToast(1, "Verification OTP sent!", "Check you mobile for the OTP.");
                     }
                     // If sending OTP sending fails
                     else
                     {
                        $data['mobileNo_error'] = "Check you mobile number again";
                     }
                  }

                  // The sent pin is not timeout
                  else
                  {
                     $data['mobileNo_error'] = "OTP has been sent already";
                  }
               }
            }
            //  providing the view again
            $this->view('systemAdmin/systemadmin_customer', $data);
         }
         // If registration is selected
         else if ($_POST['action'] == "register")
         {
            // Validate everything
            $data['fName_error'] = emptyCheck($data['fName']);
            $data['lName_error'] = emptyCheck($data['lName']);
            $data['gender_error'] = emptyCheck($data['gender']);
            $data['mobileNo_error'] = validateMobileNo($data['mobileNo']);
            $data['OTP_error'] = emptyCheck($data['OTP']);
            // Check Password strength here
            $data['password_error'] = emptyCheck($data['password']);
            $data['confirmPassword_error'] = emptyCheck($data['confirmPassword']);
            if (empty($data['password_error']) && empty($data['confirmPassword_error']) && $data['password'] != $data['confirmPassword'])
            {
               $data['confirmPassword_error'] = "Passwords dont't match";
            }
            if (
               empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['mobileNo_error']) &&
               empty($data['OTP_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])
            )
            {
               // OTP verification
               $isVerified = $this->OTPModel->verifyOTP($data['mobileNo'], $data['OTP'], 1);

               //If OTP is not requested or previously-used or incorrect
               if (!$isVerified)
               {
                  $data['OTP_error'] = "Incorrect OTP";
                  $this->view('systemAdmin/systemadmin_customer', $data);
               }
               else
               {
                  $this->userModel->beginTransaction();

                  $this->userModel->registerUser($data['mobileNo'], $data['password'], 6);
                  $this->customerModel->registerCustomer($data);
                  $this->OTPModel->removeOTP($data['mobileNo'], 1);

                  //System log
                  Systemlog::createCustomerAccount();

                  SMS::sendCustomerRegSMS($data['mobileNo']);
                  $this->userModel->commit();

                  Toast::setToast(1, "Registration Successful!", "You can login to your account now.");

                  redirect('Customer/createCustomerAccount');
               }
            }
            else
            {
               $this->view('systemAdmin/systemadmin_customer', $data);
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
            'OTP' => '',
            'confirmPassword' => '',
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'mobileNo_error' => '',
            'OTP_error' => '',
            'password_error' => '',
            'confirmPassword_error' => ''
         ];
         $this->view('systemAdmin/systemadmin_customer', $data);
      }
   }

   public function getAllActiveCustomers()
   {
      $result = $this->customerModel->getAllActiveCustomers();

      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result));
   }
}
