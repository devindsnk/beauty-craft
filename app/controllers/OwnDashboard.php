<?php
class OwnDashboard extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
      $this->staffModel = $this->model('StaffModel');
      $this->serviceModel = $this->model('ServiceModel');
      $this->resourceModel = $this->model('ResourceModel');
   }
   public function home()
   {
      redirect('OwnDashboard/overview');
   }
   public function closeSalon()
   {
      $this->view('owner/own_closeSalon');
   }
   public function customers()
   {
      $this->view('owner/own_customers');
   }

   public function cusDetailView()
   {
      $this->view('common/customerView');
   }
   
   public function overview()
   {
      $this->view('owner/own_overview');
   }
   public function rates()
   {
      $this->view('owner/own_rates');
   }
   public function reservations()
   {
      $this->view('owner/own_reservations');
   }
   public function resources()
   {   
    
         $resourceDetails = $this->serviceModel->getResourceDetails();
         // print_r($resourceDetails);
         // $GetResourceArray = ['resource' => $resourceDetails];
         // $this->view('owner/own_resources', $GetResourceArray);
      
            // die('success');
           if ($_SERVER['REQUEST_METHOD'] == 'POST')
           {
              $data = [ 
                 'resourceName' => trim($_POST['resourceName']),
                 'resourceQuantity' => isset($_POST['resourceQuantity']) ? trim($_POST['resourceQuantity']) : '',            
                 'resourceName_error' => '',
                 'resourceQuantity_error' => '',
                 'haveErrors' => 0,
                 'resource' => $resourceDetails                  
              ];
              // Validating ResName
              if($_POST['action']=="addResource"){
              if (empty($data['resourceName']))
              {
                 $data['resourceName_error'] = "Please enter Resource Name";
              }
              else if (!preg_match("/^[a-zA-Z-' ]*$/",$data['resourceName'])) {
                 $data['resourceName_error']  = "Only letters are allowed";
               }
     
              // Validating 
              if (empty($data['resourceQuantity']))
              {
                 $data['resourceQuantity_error'] = "Please select number of resource";
              }
            
     
              if (
                 empty($data['resourceName_error']) && empty($data['resourceQuantity_error']) 
              ) {
     
               //   print_r($data);
                 $this->resourceModel->addResourceDetails($data); 
                 redirect('OwnDashboard/resources'); 
              }
              else
              {
                 $data['haveErrors'] = 1;
                 $this->view('owner/own_resources', $data);
              }
           }
           else if($_POST['action']=="cancel"){
            $data['haveErrors'] = 0;
            $this->view('owner/own_resources', $data);
         }
         }
         
           else
           {
     
              $data = [
                 'resourceName' => '',
                 'resourceQuantity' => '', 
                 'resourceName_error' => '',
                 'resourceQuantity_error' => '',  
                 'haveErrors'=>0,   
                 'resource' => $resourceDetails      
              ];
              $this->view('owner/own_resources', $data);
              
           }
           

      // $this->view('owner/own_resources');
     
   }
   public function salaries()
   {
      $this->view('owner/own_salaries');
   }
   public function services()
   {
      $sDetails = $this->serviceModel->getServiceDetails();

      $GetServicesArray = [
         'services' => $sDetails
      ];
      $this->view('owner/own_services', $GetServicesArray);
   }
   public function staff()
   {
      $staffDetails = $this->staffModel->getStaffDetails();
      $GetStaffArray = ['staff' => $staffDetails];
      $this->view('owner/own_staff', $GetStaffArray);
   }

   public function analyticsOverall()
   {
      $this->view('owner/own_subAnalyticsOverall');
   }
   public function analyticsService()
   {
      $this->view('owner/own_subAnalyticsService');
   }
   public function analyticsSProvider()
   {
      $this->view('owner/own_subAnalyticsSProvider');
   }
}
