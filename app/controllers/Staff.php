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
            'staffFname' => trim($_POST['staffFname']),
            'staffLname' => trim($_POST['staffLname']),
            'gender' => isset($_POST['gender']) ? trim($_POST['gender']) : '',
            'staffNIC' => trim($_POST['staffNIC']),
            'staffDOB' => trim($_POST['staffDOB']),
            'staffType' => isset($_POST['staffType']) ? trim($_POST['staffType']) : '',
            'staffHomeAdd' => trim($_POST['staffHomeAdd']),
            'staffContactNum' => trim($_POST['staffContactNum']),
            'staffEmail' => trim($_POST['staffEmail']),
            'staffAccNum' => trim($_POST['staffAccNum']),
            'staffAccHold' => trim($_POST['staffAccHold']),
            'staffAccBank' => trim($_POST['staffAccBank']),
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            'staffType_error' => '',
            'staffHomeAdd_error' => '',
            'staffContactNum_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
         ];

         // Validating fname
         if (empty($data['staffFname']))
         {
            $data['staffFname_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['staffLname']))
         {
            $data['staffLname_error'] = "Please enter Last Name";
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

         // Validating date of birth
         if (empty($data['staffDOB']))
         {
            $data['staffDOB_error'] = "Please enter Date of birth";
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
         if (empty($data['staffContactNum']))
         {
            $data['staffContactNum_error'] = "Please enter contact number";
         }
         // Validating email
         if (empty($data['staffEmail']))
         {
            $data['staffEmail_error'] = "Please enter email";
         }

         // Validating account number
         if (empty($data['staffAccNum']))
         {
            $data['staffAccNum_error'] = "Please enter bank account number";
         }
         // Validating account holder's name
         if (empty($data['staffAccHold']))
         {
            $data['staffAccHold_error'] = "Please enter bank account holders name";
         }
         // Validating bank name
         if (empty($data['staffAccBank']))
         {
            $data['staffAccBank_error'] = "Please enter bank name";
         }


         if (
            empty($data['staffFname_error']) && empty($data['staffLname_error']) && empty($data['gender_error']) && empty($data['staffNIC_error']) && empty($data['staffDOB_error']) && empty($data['staffType_error']) && empty($data['staffHomeAdd_error']) && empty($data['staffContactNum_error']) && empty($data['staffEmail_error']) &&
            empty($data['staffAccNum_error']) && empty($data['staffAccHold_error']) && empty($data['staffAccBank_error'])
         )
         {
            $this->staffModel->addStaffDetails($data);
            $this->staffModel->addBankDetails($data);
            $this->userModel->registerUser($data['staffContactNum'], $data['staffNIC'], $data['staffType']);
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
            'staffFname' => '',
            'staffLname' => '',
            'gender' => '',
            'staffNIC' => '',
            'staffDOB' => '',
            'staffType' => '',
            'staffHomeAdd' => '',
            'staffContactNum' => '',
            'staffEmail' => '',
            'staffAccNum' => '',
            'staffAccHold' => '',
            'staffAccBank' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
            'gender_error' => '',
            'staffNIC_error' => '',
            'staffDOB_error' => '',
            'staffType_error' => '',
            'staffHomeAdd_error' => '',
            'staffContactNum_error' => '',
            'staffEmail_error' => '',
            'staffAccNum_error' => '',
            'staffAccHold_error' => '',
            'staffAccBank_error' => '',
         ];
         $this->view('owner/own_staffAdd', $data);
      }
   }
   public function updateStaff()
   {
      $this->view('owner/own_staffUpdate');
   }
   public function viewStaff()
   {
      $this->view('owner/own_staffView');
   }
   public function salaryReport()
   {
      $this->view('owner/own_salaryReportView');
   }
}
