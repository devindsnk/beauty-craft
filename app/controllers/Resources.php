<?php
class  Resources extends Controller
{
   public function __construct()
   {
      $this->resourceModel = $this->model('ResourceModel');
      $this->serviceModel = $this->model('ServiceModel');
   }

   
   public function viewAllResources(){
      $resourceDetails = $this->serviceModel->getResourceDetails();
      $this->view('common/allResourcesTable', $resourceDetails);   
   }

   public function viewResources($resourceID){
   $PurchaseDetails = $this->resourceModel->getPurchaseDetailsByResourceID($resourceID);
    $this->view('common/resourcesViewMore', $PurchaseDetails);
   }

   public function addResource(){
   $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
   // print_r($resourceTypes);
   // die("succcess");
   $CurrentResourceTypeCount =  sizeof($resourceTypes);
   // print_r($totalNumberOfResourceTypes);
   // die("success");
   // $string = 'Paneer Pakoda dish';
   // $bar = strtolower($string);
   // echo $data = preg_replace('/\s+/', '', $bar);
   // die();

   if ($_SERVER['REQUEST_METHOD'] == 'POST' )
   {
      $date_now = date("Y-m-d"); 
         $data = [ 
            'manufacturer' => trim($_POST['manufacturer']), 
            'modelNo' => trim($_POST['modelNo']),
            'name' => trim($_POST['name']),
            'nameSelected' => isset($_POST['nameSelected']) ? trim($_POST['nameSelected']) : '',
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
            'resourceTypes' => $resourceTypes,
         ];
         if ($_POST['action'] == "addType")
         {
            // die("addtypecalled");
            // $this->addResourceType($data);
            if (empty($data['name']))
            {
               $data['name_error'] = "Please enter a type";
            }
            for ($i = 0; $i < $CurrentResourceTypeCount; $i++)
            {
               // echo "hi";
               $CurrentResType =  strtolower($resourceTypes[$i]->name);
               $data1 = preg_replace('/\s+/', '', $CurrentResType);
               // echo "<br>" ; 
               $NewResType = strtolower($data['name']);
               $data2 = preg_replace('/\s+/', '', $NewResType);
               // echo "<br>" ; 
               if ($data1 == $data2)
               {
                  $data['name_error'] = "Type already exists.";
               }
            }
            // die("success");
            if (empty($data['name_error']))
            {
               $this->resourceModel->addResourceType($data);
               $data['resourceTypes'] =  $this->resourceModel->getAllRsourceTypeDetails();
               Toast::setToast(1, "Resource type added successfully", "");
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
            else if ($date_now > $data['warrantyExpDate'])
            {
               $data['warrantyExpDate_error'] = "Warranty expiration date must be a future date";
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

            if (empty($data['manufacturer_error']) && empty($data['modelNo_error']) && empty($data['nameSelected_error']) && empty($data['warrantyExpDate_error']) && empty($data['price_error']) && empty($data['quantity_error']) && empty($data['purchaseDate_error']))
            {

            // print_r($data);
            // die('controllercalled');
            $this->resourceModel->updateResourceQuantityAfterAddResources($data);
            $this->resourceModel->addPurchaseDetails($data);
            Toast::setToast(1, "Resources added successfully", "");
            header('location: ' . URLROOT . '/Resources/viewAllResources');
         } 
         else 
         {
            $this->view('owner/own_resourceAdd', $data);
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
            'resourceTypes' => $resourceTypes,
         ];
         $this->view('owner/own_resourceAdd', $data);
      }
      // $this->view('owner/own_resourceAdd');
   }
}
   public function updateResource($PurchaseID,$ResourceID){

      $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
      $CurrentResourceTypeCount =  sizeof($resourceTypes);
      $resourcePurchaseDetails = $this->resourceModel->getRsourcePurchaseDetailsByPurchaseID($PurchaseID);
      $CurrentResId = $resourcePurchaseDetails->resourceID;

      // print_r($CurrentResId);


      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
            $data = [
               'manufacturer' => trim($_POST['manufacturer']),
               'modelNo' => trim($_POST['modelNo']),
               'name' => trim($_POST['name']),
               'nameSelected' => isset($_POST['nameSelected']) ? trim($_POST['nameSelected']) : '',
               'warrantyExpDate' => trim($_POST['warrantyExpDate']),
               'price' => trim($_POST['price']),
               'purchaseDate' => trim($_POST['purchaseDate']),
               'manufacturer_error' => '',
               'modelNo_error' => '',
               'name_error' => '',
               'nameSelected_error' => '',
               'warrantyExpDate_error' => '',
               'price_error' => '',
               'purchaseDate_error' => '',
               'haveErrors' => 0,
               'resourceTypes' => $resourceTypes,
               'purchaseDetails' => $resourcePurchaseDetails,
               'currentResourceID' => $CurrentResId,
               'purchaseID' => $PurchaseID
            ];
         if ($_POST['action'] == "addType")
         { 
            // die("addtypecalled"); 
            // $this->addResourceType($data); 
            if (empty($data['name'])) 
            { 
               $data['name_error'] = "Please enter a type"; 
            } 
            for($i = 0; $i < $CurrentResourceTypeCount ; $i++) 
         { 
            // echo "hi"; 
            $CurrentResType =  strtolower($resourceTypes[$i]->name); 
            $data1 = preg_replace('/\s+/', '', $CurrentResType); 
            // echo "<br>" ; 
            $NewResType = strtolower($data['name']); 
            $data2 = preg_replace('/\s+/', '', $NewResType); 
            // echo "<br>" ; 
            if($data1 == $data2){ 
               $data['name_error'] = "Type already exists."; 
            } 

         } 
            if ( empty($data['name_error']) ) 
            { 
             
            //   print_r($data[]); 
            //   die(); 
            //   Toast::setToast(1, "Resource type added successfully", ""); 
              $this->resourceModel->addResourceType($data); 
              $data['resourceTypes'] =  $this->resourceModel->getAllRsourceTypeDetails(); 
              Toast::setToast(1, "Resource type added successfully", ""); 
              $this->view('owner/own_resourceUpdate', $data); 
            //   redirect('resources/updateResource',$data); 
           } 
           else 
           { 
            $data['haveErrors'] = 1; 
              $this->view('owner/own_resourceUpdate', $data); 
           }  
         } 
         else if ($_POST['action'] == "cancel") 
            { 
               $data['haveErrors'] = 0; 
               $this->view('owner/own_resourceUpdate', $data); 
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
            
            if (empty($data['nameSelected']) ) 
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
   
            if ( empty($data['manufacturer_error']) && empty($data['modelNo_error']) && empty($data['staffLname_error']) && empty($data['nameSelected_error']) && empty($data['warrantyExpDate_error']) && empty($data['price_error']) && empty($data['purchaseDate_error']) )
             { 
   
               // print_r($data);
               // die('controllercalled');
               $this->resourceModel->updatePurchaseDetails($data);
               Toast::setToast(1, "Resource updated successfully", "");
               $this->viewResources($ResourceID);
            }
            else
            {
               $this->view('owner/own_resourceUpdate', $data);
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
               'purchaseDate' => '',
               'manufacturer_error' => '',
               'modelNo_error' => '',
               'name_error' => '',
               'nameSelected_error' => '',
               'warrantyExpDate_error' => '',
               'price_error' => '',
               'purchaseDate_error' => '',
               'haveErrors' => 0,
               'resourceTypes' => $resourceTypes,
               'purchaseDetails' => $resourcePurchaseDetails,
               'currentResourceID' => $CurrentResId,
               'purchaseID' => $PurchaseID
            ];
            $this->view('owner/own_resourceUpdate', $data);
         }

      // $this->view('owner/own_resourceUpdate', $PurchaseID);
      // $this->viewResources($ResourceID);
   }

   public function removePurchaseRecord($ResourceID, $PurchaseID)
   {
      // die("removePurchaseRecord");

      $this->resourceModel->updateResourceQuantityAfterRemoveResources($ResourceID);
      $this->resourceModel->removeResourcePurchaseRecord($PurchaseID);
      Toast::setToast(1, "Resource removed successfully", "");
      $this->viewResources($ResourceID);
   }


   public function getResourceTypeDetails()
   {
      $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
      // $this->closedDatesModel->getCloseDatesReservationCount($data['closeDate']);
      // Session::validateSession([6]);
      // $reservationCount = $this->closedDatesModel->getCloseDatesReservationCount($date);
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($resourceTypes));
   }
}
