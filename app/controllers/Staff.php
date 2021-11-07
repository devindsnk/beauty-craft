<?php
class Staff extends Controller
{
   public function __construct()
   {
      $this->userModel = $this->model('UserModel');
      $this->staffModel = $this->model('StaffModel');
   }

   public function addStaff()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'staffimage' => trim($_POST['staffimage']),
            'staffFname' => trim($_POST['staffFname']),
            'staffLname' => trim($_POST['staffLname']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'staffNIC' => trim($_POST['staffNIC']),
            'staffDOB' => trim($_POST['staffDOB']),
            'staffType' => isset($_POST['staffType']) ? trim($_POST['staffType']) : '',
            'staffHomeAdd' => trim($_POST['staffHomeAdd']),
            'staffHomeAddTyped'=>'',
            'staffMobileNo' => trim($_POST['staffMobileNo']),
            'staffEmail' => trim($_POST['staffEmail']),
            'staffAccNum' => trim($_POST['staffAccNum']),
            'staffAccHold' => trim($_POST['staffAccHold']),
            'staffAccBank' => trim($_POST['staffAccBank']),
            'staffAccBranch' => trim($_POST['staffAccBranch']),
            'staffimage_error' => '',
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
            $data['staffHomeAddTyped']= $data['staffHomeAdd'];
            
            if (empty($data['staffimage']))
            {
               $data['staffimage_error'] = "Please insert a image";
            }
            // Validating fname
         if (empty($data['staffFname']))
         {
            $data['staffFname_error'] = "Please enter First Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffFname'])) {
            $data['staffFname_error']  = "Only letters are allowed";
          }

         // Validating lname
         if (empty($data['staffLname']))
         {
            $data['staffLname_error'] = "Please enter Last Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffFname'])) {
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
         else if (preg_match ("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $data['staffNIC']) ){ 
            $data['staffNIC_error'] = "Only numeric values and letters are allowed";
         }  
         elseif (!(strlen($data['staffNIC']) == 10) && !(strlen($data['staffNIC']) == 12) ){
            $data['staffNIC_error'] = "Invalid NIC format";
         }
         elseif(strlen($data['staffNIC']) == 12 && !is_numeric($data['staffNIC'])){
            $data['staffNIC_error'] = "Invalid nic format";
         }
         elseif ((strlen($data['staffNIC']) == 10)){
         if(!is_numeric(substr($data['staffNIC'], 0, 9)) || (substr($data['staffNIC'],9,10))!="V"){
            $data['staffNIC_error'] = "Invalid nic format";
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
            $data['staffMobileNo_error'] = "Please enter contact number";
         }
         else if (!preg_match ("/^[0-9]*$/", $data['staffMobileNo']) || (strlen($data['staffMobileNo']) != 10) ){  
            $data['staffMobileNo_error'] = "Invalid contact number format";
         }  

         // Validating email
         if (empty($data['staffEmail']))
         {
            $data['staffEmail_error'] = "Please enter email";
         }
         else if (!filter_var($data['staffEmail'], FILTER_VALIDATE_EMAIL)) {
            $data['staffEmail_error'] = "Invalid email format";
         }

      
         // Validating account number
         if (empty($data['staffAccNum']))
         {
            $data['staffAccNum_error'] = "Please enter bank account number";
         }
         else if (!preg_match ("/^[0-9]*$/", $data['staffAccNum']) ){  
            $data['staffAccNum_error'] = "Invalid account number ormat";
         }  

         // Validating account holder's name
         if (empty($data['staffAccHold']))
         {
            $data['staffAccHold_error'] = "Please enter bank account holders name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccHold'])) {
            $data['staffAccHold_error']  = "Only letters are allowed";
          }

         // Validating bank name
         if (empty($data['staffAccBank']))
         {
            $data['staffAccBank_error'] = "Please enter bank name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
            $data['staffAccBank_error']  = "Only letters are allowed";
          }

          // Validating branch name
         if (empty($data['staffAccBranch'])) {
            $data['staffAccBranch_error'] = "Please enter branch name";
         }
         // else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
         //    $data['staffAccBank_error']  = "Only letters are allowed";
         //  }

       

         if (
            empty($data['staffimage_error']) && empty($data['staffFname_error']) && empty($data['staffLname_error']) && empty($data['gender_error']) && empty($data['staffNIC_error']) && empty($data['staffDOB_error']) && empty($data['staffType_error']) && empty($data['staffHomeAdd_error']) && empty($data['staffMobileNo_error']) && empty($data['staffEmail_error']) &&
            empty($data['staffAccNum_error']) && empty($data['staffAccHold_error']) && empty($data['staffAccBank_error']) && empty($data['staffAccBranch_error'])
         ) {

            // print_r($data);
            $this->staffModel->addStaffDetails($data);
            $this->staffModel->addBankDetails($data);
            $this->userModel->registerUser($data['staffMobileNo'], $data['staffNIC'], $data['staffType']);
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
            'staffimage' => '',
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
            'staffimage_error' => '',
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
            'staffHomeAddTyped'=>'',
            
         ];
         $this->view('owner/own_staffAdd', $data);
      }
   }
   public function updateStaff($staffID) 
   {
      // die('success');
      // $this->view('owner/own_staffUpdate');  
      // $staffdetails = $this->staffModel->getStaffDetailsByStaffID($staffID); 
      // $this->view('owner/own_staffUpdate',$staffdetails[0]); 

      $staffdetails = $this->staffModel->getStaffDetailsByStaffID($staffID);

      // $this->view('owner/own_staffUpdate',$staffdetails[0]); 
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         // die('success');
         $data = [
            // 'staffimage' => trim($_POST['staffimage']),
            'staffFname' => trim($_POST['staffFname']),
            'staffLname' => trim($_POST['staffLname']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'staffNIC' => trim($_POST['staffNIC']),
            'staffDOB' => trim($_POST['staffDOB']),
            // 'staffType' => isset($_POST['staffType']) ? trim($_POST['staffType']) : '',
            'staffAddress' => trim($_POST['staffAddress']),
            'staffMobileNo' => trim($_POST['staffMobileNo']),
            'staffEmail' => trim($_POST['staffEmail']),
            'staffAccNum' => trim($_POST['staffAccNum']),
            'staffAccHold' => trim($_POST['staffAccHold']),
            'staffAccBank' => trim($_POST['staffAccBank']),
            'staffAccBranch' => trim($_POST['staffAccBranch']),
            // 'staffimage_error' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            // 'staffType_error' => '',
            'staffAddress_error' => '',
            'staffMobileNo_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
            'staffAccBranch_error' => '',
            'staffdetails' => $staffdetails[0],
         ];
            // $data['staffHomeAddTyped']= $data['staffAddress'];

            // Validating fname
         if (empty($data['staffFname']))
         {
            $data['staffFname_error'] = "Please enter First Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffFname'])) {
            $data['staffFname_error']  = "Only letters are allowed";
          }

         // Validating lname
         if (empty($data['staffLname']))
         {
            $data['staffLname_error'] = "Please enter Last Name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffFname'])) {
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
         else if (preg_match ("/[\'^£$%&*()}{@#~?><>,|=_+¬-]/", $data['staffNIC']) ){ 
            $data['staffNIC_error'] = "Only numeric values and letters are allowed";
         }  
         elseif (!(strlen($data['staffNIC']) == 10) && !(strlen($data['staffNIC']) == 12) ){
            $data['staffNIC_error'] = "Invalid NIC format";
         }
         elseif(strlen($data['staffNIC']) == 12 && !is_numeric($data['staffNIC'])){
            $data['staffNIC_error'] = "Invalid nic format";
         }
         elseif ((strlen($data['staffNIC']) == 10)){
         if(!is_numeric(substr($data['staffNIC'], 0, 9)) || (substr($data['staffNIC'],9,10))!="V"){
            $data['staffNIC_error'] = "Invalid nic format";
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
         // if (empty($data['staffType']))
         // {
         //    $data['staffType_error'] = "Please select staff type";
         // }

         // Validating address
         if (empty($data['staffAddress']))
         {
            $data['staffAddress_error'] = "Please enter address";
         }

         // Validating contact num
         if (empty($data['staffMobileNo']))
         {
            $data['staffMobileNo_error'] = "Please enter contact number";
         }
         else if (!preg_match ("/^[0-9]*$/", $data['staffMobileNo']) || (strlen($data['staffMobileNo']) != 10) ){  
            $data['staffMobileNo_error'] = "Invalid contact number format";
         }  

         // Validating email
         if (empty($data['staffEmail']))
         {
            $data['staffEmail_error'] = "Please enter email";
         }
         else if (!filter_var($data['staffEmail'], FILTER_VALIDATE_EMAIL)) {
            $data['staffEmail_error'] = "Invalid email format";
         }

      
         // Validating account number
         if (empty($data['staffAccNum']))
         {
            $data['staffAccNum_error'] = "Please enter bank account number";
         }
         else if (!preg_match ("/^[0-9]*$/", $data['staffAccNum']) ){  
            $data['staffAccNum_error'] = "Invalid account number ormat";
         }  

         // Validating account holder's name
         if (empty($data['staffAccHold']))
         {
            $data['staffAccHold_error'] = "Please enter bank account holders name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccHold'])) {
            $data['staffAccHold_error']  = "Only letters are allowed";
          }

         // Validating bank name
         if (empty($data['staffAccBank']))
         {
            $data['staffAccBank_error'] = "Please enter bank name";
         }
         else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
            $data['staffAccBank_error']  = "Only letters are allowed";
          }

          // Validating branch name
         if (empty($data['staffAccBranch'])) {
            $data['staffAccBranch_error'] = "Please enter branch name";
         }
         // else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['staffAccBank'])) {
         //    $data['staffAccBank_error']  = "Only letters are allowed";
         //  }

       

         if (
            empty($data['staffFname_error']) && empty($data['staffLname_error']) && empty($data['gender_error']) && empty($data['staffNIC_error']) && empty($data['staffDOB_error']) && empty($data['staffAddress_error']) && empty($data['staffMobileNo_error']) && empty($data['staffEmail_error']) &&
            empty($data['staffAccNum_error']) && empty($data['staffAccHold_error']) && empty($data['staffAccBank_error']) && empty($data['staffAccBranch_error'])
         ) {

            print_r($staffID);
            print_r($data);
            $this->staffModel->updateStaffDetails($data,$staffID);
            $this->staffModel->updateBankDetails($data,$staffID);
            // $this->userModel->registerUser($data['staffMobileNo'], $data['staffNIC'], $data['staffType']);
            header('location: ' . URLROOT . '/OwnDashboard/staff');
         }
         else
         {
            // die('success');
            $this->view('owner/own_staffUpdate',$data);
         }
      }
      else
      {

         $data = [
            // 'staffimage' => '',
            'staffFname' => '',
            'staffLname' => '',
            'gender' => '',
            'staffNIC' => '',
            'staffDOB' => '',
            // 'staffType' => '',
            'staffAddress' => '',
            'staffMobileNo' => '',
            'staffEmail' => '',
            'staffAccNum' => '',
            'staffAccHold' => '',
            'staffAccBank' => '',
            'staffAccBranch' => '',
            // 'staffimage_error' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            // 'staffType_error' => '',
            'staffAddress_error' => '',
            'staffMobileNo_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
            'staffAccBranch_error' => '',
            'staffdetails' => $staffdetails[0],
            
         ];
         // die('success');
         $this->view('owner/own_staffUpdate', $data);

      }
   

   }
   public function viewStaff($staffID)
   {
      $bankDetails = $this->staffModel->getStaffDetailsByStaffID($staffID);
      $this->view('owner/own_staffView',$bankDetails[0]);
   }  

   public function RemStaffReservations()
   {
      $this->view('owner/own_RemStaffViewReservations');
   }

}
