<?php
class Staff extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
      $this->staffModel = $this->model('StaffModel');
   }

   public function viewAllStaffMembers(){ 
      $staffDetails = $this->staffModel->getAllStaffDetails(); 
      $GetStaffArray = ['staff' => $staffDetails]; 
      $this->view('common/allStaffTable', $GetStaffArray); 
   } 


   public function addStaff()
   {
      $staffD = $this->staffModel->getAllStaffDetails();
      // $CurrentNICD = $this->staffModel->getAllActiveDisableStaffNICDetails();
      $CurrentStaffCount = sizeof($staffD);
      

      if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'FILES')
      {
         // echo "<pre>";
         // print_r($_FILES['staffimage']);
         // echo "</pre>";
         // die();
         $img_name = " ";
         $new_img_name =  " ";
         $img_name = $_FILES['staffimage']['name'];
         $img_size = $_FILES['staffimage']['size'];
         $tmp_name = $_FILES['staffimage']['tmp_name'];
         $error = $_FILES['staffimage']['error'];
         $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_extension);
         $allowed_extensions = array("jpg", "jpeg", "png");
         if ($error == 0)
         {
            if (in_array($img_ex_lc, $allowed_extensions))
            {
               $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
               $img_upload_path = '../public/imgs/staffImgs/' . $new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
            }
         }
         // $tempvar= $new_img_name;
         // echo $tempvar;
         // die();

         $data = [
            'staffimagePath' => $new_img_name,
            'staffFname' => trim($_POST['staffFname']),
            'staffLname' => trim($_POST['staffLname']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'staffNIC' => trim($_POST['staffNIC']),
            'staffDOB' => trim($_POST['staffDOB']),
            'staffType' => isset($_POST['staffType']) ? trim($_POST['staffType']) : '',
            'staffHomeAdd' => trim($_POST['staffHomeAdd']),
            'staffHomeAddTyped' => '',
            'staffMobileNo' => trim($_POST['staffMobileNo']),
            'staffEmail' => trim($_POST['staffEmail']),
            'staffAccNum' => trim($_POST['staffAccNum']),
            'staffAccHold' => trim($_POST['staffAccHold']),
            'staffAccBank' => trim($_POST['staffAccBank']),
            'staffAccBranch' => trim($_POST['staffAccBranch']),
            'staffimagePath_error' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            'staffType_error' => '',
            'staffHomeAdd_error' => '',
            'staffMobileNo_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
            'staffAccBranch_error' => '',
         ];

         // print_r($data['staffimage']);
         // die();
         $data['staffHomeAddTyped'] = $data['staffHomeAdd'];

         if (($data['staffimagePath'] == " "))
         {
            $data['staffimagePath_error'] = "Please insert a valid image";
         }
         // Validating fname
         if (empty($data['staffFname']))
         {
            $data['staffFname_error'] = "Please enter First Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['staffFname']))
         {
            $data['staffFname_error']  = "Only letters are allowed";
         }

         // Validating lname
         if (empty($data['staffLname']))
         {
            $data['staffLname_error'] = "Please enter Last Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['staffFname']))
         {
            $data['staffFname_error']  = "Only letters are allowed";
         }

         // Validating gender
         if (empty($data['gender']))
         {
            $data['gender_error'] = "Please select gender";
         }
         // Validating nic
         if (empty($data['staffNIC']))
         {
            $data['staffNIC_error'] = "Please enter NIC number";
         }
         else if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $data['staffNIC']))
         {
            $data['staffNIC_error'] = "Only numeric values and letters are allowed";
         }
         elseif (!(strlen($data['staffNIC']) == 10) && !(strlen($data['staffNIC']) == 12))
         {
            $data['staffNIC_error'] = "Invalid NIC format";
         }
         elseif (strlen($data['staffNIC']) == 12 && !is_numeric($data['staffNIC']))
         {
            $data['staffNIC_error'] = "Invalid nic format";
         }
         elseif ((strlen($data['staffNIC']) == 10))
         {
            if (!is_numeric(substr($data['staffNIC'], 0, 9)) || (substr($data['staffNIC'], 9, 10)) != "V")
            {
               $data['staffNIC_error'] = "Invalid nic format";
            }
         }

         for ($i = 0 ; $i< $CurrentStaffCount; $i++){
            if($staffD[$i]->nic == $data['staffNIC']){
               $data['staffNIC_error'] = "The NIC number you entered is already exist.";
            }
      }

         // $data['staffNIC_error'] = "Invalid NIC format";

         // elseif (!(strlen($data['staffNIC']) == 10) && !preg_match ("/^[V]*$/", $data['staffNIC'])){
         //    $data['staffNIC_error'] = "Invalid NIC format";
         // }

         // Validating date of birth
         if (empty($data['staffDOB']))
         {
            $data['staffDOB_error'] = "Please select Date of birth";
         }
         // Validating staff type
         if (empty($data['staffType']))
         {
            $data['staffType_error'] = "Please select staff type";
         }
         // Validating address
         if (empty($data['staffHomeAdd']))
         {
            $data['staffHomeAdd_error'] = "Please enter address";
         }

         // Validating contact num
         if (empty($data['staffMobileNo']))
         {
            $data['staffMobileNo_error'] = "Please enter contact number.";
         }
         else if (!preg_match("/^[0-9]*$/", $data['staffMobileNo']) || (strlen($data['staffMobileNo']) != 10))
         {
            $data['staffMobileNo_error'] = "Invalid contact number format.";
         }

         for ($i = 0 ; $i< $CurrentStaffCount; $i++){
               if($staffD[$i]->mobileNo == $data['staffMobileNo']){
                  $data['staffMobileNo_error'] = "The mobile number you entered is already exist.";
               }
         }

         // Validating email
         if (empty($data['staffEmail']))
         {
            $data['staffEmail_error'] = "Please enter email";
         }
         else if (!filter_var($data['staffEmail'], FILTER_VALIDATE_EMAIL))
         {
            $data['staffEmail_error'] = "Invalid email format";
         }


         // Validating account number
         if (empty($data['staffAccNum']))
         {
            $data['staffAccNum_error'] = "Please enter bank account number";
         }
         else if (!preg_match("/^[0-9]*$/", $data['staffAccNum']))
         {
            $data['staffAccNum_error'] = "Invalid account number ormat";
         }

         // Validating account holder's name
         if (empty($data['staffAccHold']))
         {
            $data['staffAccHold_error'] = "Please enter bank account holders name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['staffAccHold']))
         {
            $data['staffAccHold_error']  = "Only letters are allowed";
         }

         // Validating bank name
         if (empty($data['staffAccBank']))
         {
            $data['staffAccBank_error'] = "Please enter bank name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['staffAccBank']))
         {
            $data['staffAccBank_error']  = "Only letters are allowed";
         }

         // Validating branch name
         if (empty($data['staffAccBranch']))
         {
            $data['staffAccBranch_error'] = "Please enter branch name";
         }
         // else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
         //    $data['staffAccBank_error']  = "Only letters are allowed";
         //  }



         if (
            empty($data['staffimagePath_error']) && empty($data['staffFname_error']) && empty($data['staffLname_error']) && empty($data['gender_error']) && empty($data['staffNIC_error']) && empty($data['staffDOB_error']) && empty($data['staffType_error']) && empty($data['staffHomeAdd_error']) && empty($data['staffMobileNo_error']) && empty($data['staffEmail_error']) &&
            empty($data['staffAccNum_error']) && empty($data['staffAccHold_error']) && empty($data['staffAccBank_error']) && empty($data['staffAccBranch_error'])
         )
         {

            // print_r($data[]);
            $this->userModel->registerUser($data['staffMobileNo'], $data['staffNIC'], $data['staffType']);
            $this->staffModel->addStaffDetails($data);
            $this->staffModel->addBankDetails($data);

            //System log
            Systemlog::createAccount($data['staffMobileNo']);

            Toast::setToast(1, "Staff Member Successfully Registered!", "");

            header('location: ' . URLROOT . '/OwnDashboard/staff');
         }
         else
         {
            $this->view('owner/own_staffAdd', $data);
         }
      }
      else
      {

         $data = [
            'staffimagePath' => '',
            'staffFname' => '',
            'staffLname' => '',
            'gender' => '',
            'staffNIC' => '',
            'staffDOB' => '',
            'staffType' => '',
            'staffHomeAdd' => '',
            'staffMobileNo' => '',
            'staffEmail' => '',
            'staffAccNum' => '',
            'staffAccHold' => '',
            'staffAccBank' => '',
            'staffAccBranch' => '',
            'staffimagePath_error' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            'staffType_error' => '',
            'staffHomeAdd_error' => '',
            'staffMobileNo_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
            'staffAccBranch_error' => '',
            'staffHomeAddTyped' => '',

         ];
         $this->view('owner/own_staffAdd', $data);
      }
   }




   public function updateStaff($staffID)
   {


      $staffdetails = $this->staffModel->getStaffDetailsByStaffID($staffID);
      $bankdetails = $this->staffModel->getStaffBankDetailsByStaffID($staffID);



   //////////////////////////////////////////////////////////////////////////////////////////////////////////////////



      $staffD = $this->staffModel->getAllStaffDetails();
      $CurrentStaffCount = sizeof($staffD);
      

      if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD'] == 'FILES')
      {
         // echo "<pre>";
         // print_r($_FILES['staffimage']);
         // echo "</pre>";
         // die();
         $img_name = " ";
         $new_img_name =  " ";
         $img_name = $_FILES['staffimage']['name'];
         $img_size = $_FILES['staffimage']['size'];
         $tmp_name = $_FILES['staffimage']['tmp_name'];
         $error = $_FILES['staffimage']['error'];
         $img_extension = pathinfo($img_name, PATHINFO_EXTENSION);
         $img_ex_lc = strtolower($img_extension);
         $allowed_extensions = array("jpg", "jpeg", "png");
         if ($error == 0)
         {
            if (in_array($img_ex_lc, $allowed_extensions))
            {
               $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
               $img_upload_path = '../public/imgs/staffImgs/' . $new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
            }
         }

         $data = [
            'staffimagePath' => $new_img_name,
            'fName' => trim($_POST['fName']),
            'lName' => trim($_POST['lName']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'nic' => trim($_POST['nic']),
            'dob' => trim($_POST['dob']),
            // 'staffType' => isset($_POST['staffType']) ? trim($_POST['staffType']) : '',
            'address' => trim($_POST['address']),
            // 'staffHomeAddTyped' => '',
            'mobileNo' => trim($_POST['mobileNo']),
            'email' => trim($_POST['email']),
            'accountNo' => trim($_POST['accountNo']),
            'holdersName' => trim($_POST['holdersName']),
            'bankName' => trim($_POST['bankName']),
            'branchName' => trim($_POST['branchName']),
            'staffimagePath_error' => '',
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'nic_error' => '',
            'dob_error' => '',
            // 'staffType_error' => '',
            'address_error' => '',
            'mobileNo_error' => '',
            'email_error' => '',
            'accountNo_error' => '',
            'holdersName_error' => '',
            'bankName_error' => '',
            'branchName_error' => '',
            // 'status' => trim($_POST['status']),
            'staffdetails' => $staffdetails[0],
            'bankdetails' => $bankdetails[0]
         ];

         // print_r($data);
         // die();
         // $data['staffHomeAddTyped'] = $data['staffHomeAdd'];

         if (($data['staffimagePath'] == " "))
         {
            $data['staffimagePath_error'] = "Please insert a valid image";
         }
         // Validating fname
         if (empty($data['fName']))
         {
            $data['fName_error'] = "Please enter First Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['fName']))
         {
            $data['fName_error']  = "Only letters are allowed";
         }

         // Validating lname
         if (empty($data['lName']))
         {
            $data['lName_error'] = "Please enter Last Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['lName']))
         {
            $data['lName_error']  = "Only letters are allowed";
         }

         // Validating gender
         if (empty($data['gender']))
         {
            $data['gender_error'] = "Please select gender";
         }
         // Validating nic
         if (empty($data['nic']))
         {
            $data['nic_error'] = "Please enter NIC number";
         }
         else if (preg_match("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $data['nic']))
         {
            $data['nic_error'] = "Only numeric values and letters are allowed";
         }
         elseif (!(strlen($data['nic']) == 10) && !(strlen($data['nic']) == 12))
         {
            $data['nic_error'] = "Invalid NIC format";
         }
         elseif (strlen($data['nic']) == 12 && !is_numeric($data['nic']))
         {
            $data['nic_error'] = "Invalid nic format";
         }
         elseif ((strlen($data['nic']) == 10))
         {
            if (!is_numeric(substr($data['nic'], 0, 9)) || (substr($data['nic'], 9, 10)) != "V")
            {
               $data['nic_error'] = "Invalid nic format";
            }
         }

         for ($i = 0 ; $i< $CurrentStaffCount; $i++){
            if($staffD[$i]->nic == $data['nic']){
               $data['nic_error'] = "The NIC number you entered is already exist.";
            }
      }

         // $data['staffNIC_error'] = "Invalid NIC format";

         // elseif (!(strlen($data['staffNIC']) == 10) && !preg_match ("/^[V]*$/", $data['staffNIC'])){
         //    $data['staffNIC_error'] = "Invalid NIC format";
         // }

         // Validating date of birth
         if (empty($data['dob']))
         {
            $data['dob_error'] = "Please select Date of birth";
         }

         // Validating address
         if (empty($data['address']))
         {
            $data['address_error'] = "Please enter address";
         }

         // Validating contact num
         if (empty($data['mobileNo']))
         {
            $data['mobileNo_error'] = "Please enter contact number.";
         }
         else if (!preg_match("/^[0-9]*$/", $data['mobileNo']) || (strlen($data['mobileNo']) != 10))
         {
            $data['mobileNo_error'] = "Invalid contact number format.";
         }

         for ($i = 0 ; $i< $CurrentStaffCount; $i++){
               if($staffD[$i]->mobileNo == $data['mobileNo']){
                  $data['mobileNo_error'] = "The mobile number you entered is already exist.";
               }
         }

         // Validating email
         if (empty($data['email']))
         {
            $data['email_error'] = "Please enter email";
         }
         else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
         {
            $data['email_error'] = "Invalid email format";
         }

         // Validating account number
         if (empty($data['accountNo']))
         {
            $data['accountNo_error'] = "Please enter bank account number";
         }
         else if (!preg_match("/^[0-9]*$/", $data['accountNo']))
         {
            $data['accountNo_error'] = "Invalid account number ormat";
         }

         // Validating account holder's name
         if (empty($data['holdersName']))
         {
            $data['holdersName_error'] = "Please enter bank account holders name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['holdersName']))
         {
            $data['holdersName_error']  = "Only letters are allowed";
         }

         // Validating bank name
         if (empty($data['bankName']))
         {
            $data['bankName_error'] = "Please enter bank name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/", $data['bankName']))
         {
            $data['bankName_error']  = "Only letters are allowed";
         }

         // Validating branch name
         if (empty($data['branchName']))
         {
            $data['branchName_error'] = "Please enter branch name";
         }
         // else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
         //    $data['staffAccBank_error']  = "Only letters are allowed";
         //  }



         if (
            empty($data['staffimagePath_error']) && empty($data['fName_error']) && empty($data['lName_error']) && empty($data['gender_error']) && empty($data['nic_error']) && empty($data['dob_error'])  && empty($data['address_error']) && empty($data['mobileNo_error']) && empty($data['email_error']) &&
            empty($data['accountNo_error']) && empty($data['holdersName_error']) && empty($data['bankName_error']) && empty($data['branchName_error'])
         )
         {

            // $this->userModel->registerUser($data['mobileNo'], $data['nic'], $data['staffType']);
            // $this->staffModel->addStaffDetails($data);
            // $this->staffModel->addBankDetails($data);
            // Toast::setToast(1, "Staff Member Successfully Registered!", "");
            // header('location: ' . URLROOT . '/OwnDashboard/staff');

            // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
            print_r($staffID);
            print_r($data);
            $this->staffModel->updateStaffDetails($data, $staffID);
            $this->staffModel->updateBankDetails($data, $staffID);
            // $this->userModel->registerUser($data['staffMobileNo'], $data['staffNIC'], $data['staffType']);
            Toast::setToast(1, "Staff Member Successfully Updated!", "");
            header('location: ' . URLROOT . '/Staff/viewAllStaffMembers');
            // >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
         }
         else
         {
            $this->view('owner/own_staffUpdate', $data);
         }
      }
      else
      {

         $data = [
            'staffimagePath' => '',
            'fName' => '',
            'lName' => '',
            'gender' => '',
            'nic' => '',
            'dob' => '',
            // 'staffType' => '',
            'address' => '',
            'mobileNo' => '',
            'email' => '',
            'accountNo' => '',
            'holdersName' => '',
            'bankName' => '',
            'branchName' => '',
            'staffimagePath_error' => '',
            'fName_error' => '',
            'lName_error' => '',
            'gender_error' => '',
            'nic_error' => '',
            'dob_error' => '',
            'address_error' => '',
            'mobileNo_error' => '',
            'email_error' => '',
            'accountNo_error' => '',
            'holdersName_error' => '',
            'bankName_error' => '',
            'branchName_error' => '',
            // 'status' => '',
            // 'staffHomeAddTyped' => '',
            'staffdetails' => $staffdetails[0],
            'bankdetails' => $bankdetails[0]

         ];
         $this->view('owner/own_staffUpdate', $data);
      }
   }












   ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////


   public function viewStaff($staffID)
   {
      $staffDetails = $this->staffModel->getStaffDetailsWithBankDetailsByStaffID($staffID);
      $this->view('owner/own_staffView',$staffDetails[0]);
   }  

   public function RemStaffReservations() //details
   {
      $this->view('owner/own_RemStaffViewReservations');
   }

   public function profile()
   {
      Session::validateSession([1, 2, 3, 4, 5]);
      $profileData = $this->staffModel->getStaffDetailsWithBankDetailsByStaffID(Session::getUser("id"));
      $serviceslist = $this->staffModel->getServiceslistByStaffID(Session::getUser("id"));
      $result = $this->userModel->getUser(Session::getUser("mobileNo"));


      $hashedPassword = $result->password;
      $data = [
         'profileData' => $profileData,
         'serviceslist' => $serviceslist,
         'currentPassword' => '',
         'newPassword1' => '',
         'newPassword2' => '',
         'currentPassword_error' => '',
         'newPassword_error' => '',
         'confirmPassword_error' => '',
         'changePasswordModelOpen' => 0
      ];

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {

         if ($_POST['action'] == "changePassword")
         {

            $data['changePasswordModelOpen'] = 1;
            echo ($data['changePasswordModelOpen']);
            $this->view('staff/staff_profileview', $data);
         }
         if ($_POST['action'] == "cancel")
         {
            $data['changePasswordModelOpen'] = 0;
            $this->view('staff/staff_profileview', $data);
         }
         if ($_POST['action'] == "proceed")
         {
            $data['currentPassword'] = trim($_POST['currentPassword']);
            $data['newPassword1'] = trim($_POST['password1']);
            $data['newPassword2'] = trim($_POST['password2']);

            $data['currentPassword_error'] = emptyCheck($data['currentPassword']);
            $data['newPassword_error'] = emptyCheck($data['newPassword1']);
            $data['confirmPassword_error'] = emptyCheck($data['newPassword2']);
            $data['changePasswordModelOpen'] = 1;
            // print_r($data);
            // die("Arrayyyyyyyyyy");
            if (!empty($data['currentPassword_error']) || !empty($data['newPassword_error']) || !empty($data['confirmPassword_error'])) //have errors
            {

               $this->view('staff/staff_profileview', $data);
            }
            else
            {
               if (password_verify($data['currentPassword'], $hashedPassword))
               {

                  if ($data['newPassword1'] != $data['newPassword2'])
                  {
                     die("password didnt matched");
                     $data['confirmPassword_error'] = "New Passwords dont't match";
                     $this->view('staff/staff_profileview', $data);
                  }
                  if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
                  {

                     $this->userModel->updatePassword(Session::getUser("mobileNo"), $data['newPassword1']);

                     //System log
                     Systemlog::changePassword();
                     $data['changePasswordModelOpen'] = 0;
                     $this->view('staff/staff_profileview', $data);
                  }
               }
               else
               {

                  $data['currentPassword_error'] = "Incorrect password";
                  $this->view('Staff/staff_profileview', $data);
               }

               $this->view('staff/staff_profileview', $data);
            }


            $this->view('staff/staff_profileview', $data);
         }
      }
      else
      {
         $data = [
            'profileData' => $profileData,
            'serviceslist' => $serviceslist,
            'currentPassword' => '',
            'newPassword1' => '',
            'newPassword2' => '',
            'currentPassword_error' => '',
            'newPassword_error' => '',
            'confirmPassword_error' => '',
            'changePasswordModelOpen' => 0
         ];
         $this->view('staff/staff_profileview', $data);
      }
   }

   public function changePassword()
   {
      Session::validateSession([1, 2]);
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
            $this->view('staff/staff_changepassword', $data);
         }

         else //no errors
         {

            if (password_verify($data['currentPassword'], $hashedPassword))
            {
               if ($data['newPassword1'] != $data['newPassword2'])
               {
                  $data['confirmPassword_error'] = "New Passwords dont't match";
                  $this->view('staff/staff_changepassword', $data);
               }
               if (empty($data['currentPassword_error']) && empty($data['newPassword_error']) && empty($data['confirmPassword_error']))
               {
                  $this->userModel->updatePassword($data['mobileNo'], $data['newPassword1']);

                  //System log
                  Systemlog::changePassword();
                  $this->view('staff/staff_changepassword', $data);
               }
            }
            else
            {
               $data['currentPassword_error'] = "Incorrect password";
               $this->view('Staff/staff_changepassword', $data);
            }

            $this->view('staff/staff_changepassword', $data);
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
         $this->view('staff/staff_changepassword', $data);
      }
   }

   public function RemoveStaff($staffID,$staffMobileNo) //details
   {
      // die("RemoveStaffController");
      $this->staffModel->removestaff($staffID,$staffMobileNo);
      Toast::setToast(1, "Staff member removed successfully", "");
      redirect('Staff/viewAllStaffMembers');
   }
   public function GetRemovingStaffDetails($staffID) //details
   {
      $RemstaffDetails = $this->staffModel->getStaffDetailsByStaffID($staffID);
      // die(); 
      print_r($RemstaffDetails);
      // die();
      // $this->staffModel->removestaff($staffID);
      $this->view('owner/own_staff', $RemstaffDetails);
      // $this->view('owner/own_RemStaffViewReservations');
   }

   public function getAllReservtaionDetailsByStaffID($staffID) //details
   {
      // die("success");
      $result = $this->staffModel->getReservtaionDetailsByStaffID($staffID);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($result));
   }
   
}
