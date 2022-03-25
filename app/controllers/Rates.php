<?php
class Rates extends Controller
{
   public function __construct()
   {

      $this->ratesModel = $this->model('RatesModel');
   }

   public function viewRateDetails()
   {
      $result1 = $this->ratesModel->getLeaveLimitsDetails();
      $result2 = $this->ratesModel->getSalaryRateDetails();
      $result3 = $this->ratesModel->getCommissionRateDetails();
      $result4 = $this->ratesModel->getMinimumNumberOfManagers();
      $GetRateArray = ['leaveLimits' => $result1, 'salaryRate' => $result2, 'commissionRate' => $result3, 'minimumNumberOfManagers' => $result4];
      $this->view('owner/own_rates', $GetRateArray);
   }

   public function updateLeaveLimit()
   {

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'generalLeave' => trim($_POST['generalLeave']),
            'medicalLeave' => trim($_POST['medicalLeave']),
            'managerGeneralLeave' => trim($_POST['managerGeneralLeave']),
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            // 'leaveLimits' => $LeavelimitsDetails[0],  
         ];

         if (empty($data['generalLeave']))
         {
            $data['generalLeave_error'] = "Please enter a value";
         }
         if ($data['generalLeave']<0)
         {
            die("minus value called");
            $data['generalLeave_error'] = "Value must be positive";
         }
         // Validating fname
         if (empty($data['medicalLeave']))
         {
            $data['medicalLeave_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['managerGeneralLeave']))
         {
            $data['managerGeneralLeave_error'] = "Please enter Last Name";
         }
         if (
            empty($data['generalLeave_error']) && empty($data['medicalLeave_error']) && empty($data['managerGeneralLeave_error'])
         )
         {

            // print_r($data);
            $this->ratesModel->updateLeaveLimitDeatils($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }
      else
      {

         $data = [
            'generalLeave' => '',
            'medicalLeave' => '',
            'managerGeneralLeave' => '',
            'generalLeave_error' => '',
            'medicalLeave_error' => '',
            'managerGeneralLeave_error' => '',
            // 'leaveLimits' => $LeavelimitsDetails[0],
         ];
         // die('Success');
         $this->view('owner/own_rates', $data);
      }
   }

   public function updateSalaryRate()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'managerSalaryRate' => trim($_POST['managerSalaryRate']),
            'serviceProviderSalaryRate' => trim($_POST['serviceProviderSalaryRate']),
            'receptionistSalaryRate' => trim($_POST['receptionistSalaryRate']),
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',
         ];
         if (empty($data['managerSalaryRate']))
         {
            $data['managerSalaryRate_error'] = "Please insert a image";
         }
         // Validating fname
         if (empty($data['serviceProviderSalaryRate']))
         {
            $data['serviceProviderSalaryRate_error'] = "Please enter First Name";
         }

         // Validating lname
         if (empty($data['staffLname']))
         {
            $data['receptionistSalaryRate_error'] = "Please enter Last Name";
         }
         if (
            empty($data['managerSalaryRate_error']) && empty($data['serviceProviderSalaryRate_error']) && empty($data['receptionistSalaryRate_error'])
         )
         {

            // print_r($data);
            $this->ratesModel->updateSalaryRateDetails($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }
      else
      {
         $data = [
            'managerSalaryRate' => '',
            'serviceProviderSalaryRate' => '',
            'serviceProviderSalaryRate' => '',
            'managerSalaryRate_error' => '',
            'serviceProviderSalaryRate_error' => '',
            'receptionistSalaryRate_error' => '',
         ];
         $this->view('owner/own_rates', $data);
      }
   }

   public function updateCommisionRate()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'rate' => trim($_POST['rate']),
            'rate_error' => '',
         ];
         if (empty($data['rate']))
         {
            $data['rate_error'] = "Please insert a image";
         }
         if (empty($data['rate_error']))
         {

            // print_r($data);
            $this->ratesModel->updateCommissionRateDetails($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }
      else
      {
         $data = [
            'rate' => '',
            'rate_error' => '',
         ];
         $this->view('owner/own_rates', $data);
      }
   }

   public function updateMinimumNumberOfManagers()
   {
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'minimumNumber' => trim($_POST['minimumNumber']),
            'minimumNumber_error' => '',
         ];
         if (empty($data['minimumNumber']))
         {
            $data['minimumNumber_error'] = "Please insert a image";
         }
         if (empty($data['minimumNumber_error']))
         {

            // print_r($data);
            $this->ratesModel->updateMinimumNumberOfManagers($data);
            $this->view('owner/own_rates', $data);
         }
         else
         {
            $this->view('owner/own_rates', $data);
         }
      }
      else
      {
         $data = [
            'minimumNumber' => '',
            'minimumNumber_error' => '',
         ];
         $this->view('owner/own_rates', $data);
      }
   }
}
