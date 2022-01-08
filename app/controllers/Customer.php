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
               // $con = (new Database);
               // $dbTemp = $con->getConnection();

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
      $this->view('customer/cust_changePassword');
   }

   public function myReservation()
   {
      Session::validateSession([6]);
      $this->view('customer/cust_myReservation');
   }
   public function remCustomer($cusID, $mobileNo, $rescount)
   {
      // die('success');
      // echo ($cusID);

      $this->customerModel->removeCustomerDetails($cusID, $mobileNo, $rescount);
      Toast::setToast(1, "Customer Removed Successfully!", "");
      redirect('OwnDashboard/customers');
   }

   // public function viewStaff($staffID)
   // {
   //    $bankDetails = $this->staffModel->getStaffDetailsByStaffID($staffID);
   //    $this->view('owner/own_staffView',$bankDetails[0]);
   // } 

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
      $ViewCustomerArray = ['cusDetails' => $customerDetails, 'allResCount' => $AllReservationCount, 'cancelledResCount' => $CancelledReservationCount];
      print_r($ViewCustomerArray);
      // die("");

      $this->view('common/customerView', $ViewCustomerArray);
   }

   public function getReservtaionCountByCustomerID($cusID)
   {
      // echo $date;
      //  die('success');
      $result = $this->customerModel->getUpcomingReservationCountByCusID($cusID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result));
      //  redirect('OwnDashboard/closeSalon');
      // $this->view('owner/own_closeSalon');
   }
}
