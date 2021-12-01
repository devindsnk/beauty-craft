<?php
class Rates extends Controller
{
   public function __construct()
   {
    
      $this->ratesModel = $this->model('RatesModel');
   }

   public function updateLeaveLimit()  
   {  

      if ($_SERVER['REQUEST_METHOD'] == 'POST') 
      {
        $data = [   
            'managerLeaveLimit' => trim($_POST['managerLeaveLimit']),
            'serviceProviderLeaveLimit' => trim($_POST['serviceProviderLeaveLimit']),
            'receptionistLeaveLimit' => trim($_POST['receptionistLeaveLimit']),
            'managerLeaveLimit_error' => '', 
            'serviceProviderLeaveLimit_error' => '', 
            'receptionistLeaveLimit_error' => '', 
            // 'leaveLimits' => $LeavelimitsDetails[0],  
         ];

         if (empty($data['managerLeaveLimit']))
         {
            $data['managerLeaveLimit_error'] = "Please insert a image";
         }
         // Validating fname
         if (empty($data['serviceProviderLeaveLimit']))  
        {
         $data['serviceProviderLeaveLimit_error'] = "Please enter First Name"; 
        }

        // Validating lname
        if (empty($data['receptionistLeaveLimit'])) 
        {
         $data['receptionistLeaveLimit_error'] = "Please enter Last Name";
        } 
        if (
            empty($data['managerLeaveLimit_error']) && empty($data['serviceProviderLeaveLimit_error']) && empty($data['receptionistLeaveLimit_error']))
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
            'managerLeaveLimit' => '',
            'serviceProviderLeaveLimit' => '',
            'receptionistLeaveLimit' => '',
            'managerLeaveLimit_error' => '',
            'serviceProviderLeaveLimit_error' => '',
            'receptionistLeaveLimit_error' => '',
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
            'staffimage' => trim($_POST['staffimage']),
            'staffFname' => trim($_POST['staffFname']),
            'staffLname' => trim($_POST['staffLname']),
            'staffimage_error' => '',
            'staffFname_error' => '',
            'staffLname_error' => '',
         ];
         if (empty($data['staffimage']))
         {
            $data['staffimage_error'] = "Please insert a image";
         }
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
       }
     }

    public function updateCommisionRate()
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
       {
        $data = [
            'staffimage' => trim($_POST['staffimage']),
            'staffLname_error' => '',
         ];
         if (empty($data['staffimage']))
         {
            $data['staffimage_error'] = "Please insert a image";
         }
       }
     }

     public function updateMinimumNumberOfManagers()
    {
       if ($_SERVER['REQUEST_METHOD'] == 'POST')
       {
        $data = [
            'staffimage' => trim($_POST['staffimage']),
            'staffLname_error' => '',
         ];
         if (empty($data['staffimage']))
         {
            $data['staffimage_error'] = "Please insert a image";
         }
       }
     }

}