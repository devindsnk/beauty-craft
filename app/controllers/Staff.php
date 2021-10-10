<?php
class Staff extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->staffModel = $this->model('StaffModel');
   }

   public function addStaff()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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
         if (empty($data['staffFname'])) {
            $data['staffFname_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['staffLname'])) {
            $data['staffLname_error'] = "Please enter Last Name";
         }

         // Validating gender
         if (empty($data['gender'])) {
            $data['gender_error'] = "Please select gender";
         }

         // Validating mobileNo
         if (empty($data['staffNIC'])) {
            $data['staffNIC_error'] = "Please enter NIC number";
         }

         // Validating code
         if (empty($data['staffDOB'])) {
            $data['staffDOB_error'] = "Please enter Date of birth";
         }
         // Validating code
         if (empty($data['staffType'])) {
            $data['staffType_error'] = "Please select staff type";
         }
         // Validating password
         if (empty($data['staffHomeAdd'])) {
            $data['staffHomeAdd_error'] = "Please enter address";
         }

         // Validating password
         if (empty($data['staffContactNum'])) {
            $data['staffContactNum_error'] = "Please enter contact number";
         }
         // Validating password
         if (empty($data['staffEmail'])) {
            $data['staffEmail_error'] = "Please enter email";
         }
         // Validating password
         if (empty($data['staffAccNum'])) {
            $data['staffAccNum_error'] = "Please enter bank account number";
         }
         // Validating password
         if (empty($data['staffAccHold'])) {
            $data['staffAccHold_error'] = "Please enter bank account holders name";
         }
         // Validating password
         if (empty($data['staffAccBank'])) {
            $data['staffAccBank_error'] = "Please enter bank name";
         }
       

         if (
            empty($data['staffFname_error']) && empty($data['staffLname_error']) && empty($data['gender_error']) && empty($data['staffNIC']) && empty($data['staffDOB_error']) && empty($data['staffType_error']) && empty($data['staffHomeAdd_error']) && empty($data['staffContactNum_error']) && empty($data['staffEmail_error']) &&
            empty($data['staffAccNum_error']) && empty($data['staffAccHold_error']) && empty($data['staffAccBank_error'])
         ) {
            $this->staffModel->addStaff($data);
            header('location: ' . URLROOT . '/OwnDashboard/staff');
         } else {
            $this->view('owner/own_staffAdd', $data);
         }
      } else {

         $data = [
            'staffFname' => '',
            'staffLname' => '',
            'gender' => '',
            'staffNIC' => '',
            'staffDOB' => '',
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
            'staffHomeAdd_error' => '',
            'staffContactNum_error' => '',
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