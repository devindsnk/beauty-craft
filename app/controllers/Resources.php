<?php
class  Resources extends Controller
{
   public function __construct()
   {
      $this->resourceModel = $this->model('ResourceModel');
   }

   public function viewResources(){

   
    $this->view('common/resourcesViewMore');

   }
   public function addResource(){
   if ($_SERVER['REQUEST_METHOD'] == 'POST' )
   {
         $data = [
            'manufacturer' => trim($_POST['manufacturer']),
            'modelNo' => trim($_POST['modelNo']),
            'name' => '',
            'nameSelected' => isset($_POST['name']) ? trim($_POST['name']) : '',
            'warrantyExpDate' => trim($_POST['warrantyExpDate']),
            'price' => trim($_POST['price']),
            'quantity' => trim($_POST['quantity']),
            'purchaseDate' => trim($_POST['purchaseDate']),
            'manufacturer_error' => '',
            'modelNo_error' => '',
            'name_error' => '',
            'nameSelected_error' => '',
            'warrantyExpDate_error' => '',
            'price_error' => '',
            'quantity_error' => '',
            'purchaseDate_error' => '',
            'haveErrors' => 0,
         ];
      if ($_POST['action'] == "addType")
      {
         $data['name'] = trim($_POST['name']);
         if (empty($data['name']))
         {
            $data['name_error'] = "Please enter a type";
         }
         if ( empty($data['name_error']) )
         { 
          
           // print_r($data[]);
           $this->resourceModel->addResourceDetails($data);
           $this->view('owner/own_resourceAdd', $data);
        } 
        else 
        {
         $data['haveErrors'] = 1;
           $this->view('owner/own_resourceAdd', $data);
        }
      }
      else if ($_POST['action'] == "cancel")
         {
            $data['haveErrors'] = 0;
            $this->view('owner/own_resourceAdd', $data);
            // redirect('owner/own_resourceAdd');
         }
      else if ($_POST['action'] == "addResource")
      {
         if (empty($data['manufacturer']))
         {
            $data['manufacturer_error'] = "Please enter manufacturer";
         }

         if (empty($data['modelNo']))
         {
            $data['modelNo_error'] = "Please enter model number";
         }
         
         if (empty($data['nameSelected']))
         {
            $data['nameSelected_error'] = "Please enter or select a type";
         }

         if (empty($data['warrantyExpDate']))
         {
            $data['warrantyExpDate_error'] = "Please select warrantyExpDate";
         }
         
         if (empty($data['price']))
         {
            $data['price_error'] = "Please enter price";
         }
         
         if (empty($data['quantity']))
         {
            $data['quantity_error'] = "Please select quantity";
         }
         
         if (empty($data['purchaseDate']))
         {
            $data['purchaseDate_error'] = "Please select purchaseDate";
         }

         if ( empty($data['manufacturer_error']) && empty($data['modelNo_error']) && empty($data['staffLname_error']) && empty($data['nameSelected_error']) && empty($data['warrantyExpDate_error']) && empty($data['price_error']) && empty($data['quantity_error']) && empty($data['purchaseDate_error']) )
          { 

            print_r($data);
            // die('controllercalled');
            $this->resourceModel->updateResourceDetails($data);
            $this->resourceModel->addPurchaseDetails($data);
            header('location: ' . URLROOT . '/OwnDashboard/resource');
         } 
         else 
         {
            $this->view('owner/own_resourceAdd', $data);
         }
      }
   }
      else
      {

         $data = [
            'manufacturer' => '',
            'modelNo' => '',
            'name' => '',
            'nameSelected' => '',
            'warrantyExpDate' => '',
            'price' => '',
            'quantity' => '',
            'purchaseDate' => '',
            'manufacturer_error' => '',
            'modelNo_error' => '',
            'name_error' => '',
            'nameSelected_error' => '',
            'warrantyExpDate_error' => '',
            'price_error' => '',
            'quantity_error' => '',
            'purchaseDate_error' => '',
            'haveErrors' => 0,
         ];
         $this->view('owner/own_resourceAdd', $data);
      }
      // $this->view('owner/own_resourceAdd');
   }

   public function updateResource(){
      $this->view('owner/own_resourceUpdate');
   }

}