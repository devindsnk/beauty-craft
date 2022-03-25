<?php
class  Resources extends Controller
{
   public function __construct()
   {
      $this->resourceModel = $this->model('ResourceModel');
      $this->serviceModel = $this->model('ServiceModel');
   }

   public function viewAllResources($resourceName ="all",$resourceID ="all")
   {
      $AllResourcesDetails = $this->resourceModel->getAllResourcesWithFilters($resourceName,$resourceID); 

      $data = [ 
         'typedName' => $resourceName, 
         'typedID' => $resourceID,  
         'allResourceDetailsList' => $AllResourcesDetails 
      ]; 
      $this->view('common/allResourcesTable', $data);
   }

   public function viewResources($resourceID,$manufacturerNameInputTyped = "all")
   {
      $AllPurchaseDetails = $this->resourceModel->getPurchaseDetailsByResourceIDWithFilters($resourceID,$manufacturerNameInputTyped); 

      $data = [ 
         'typedManufacturer' => $manufacturerNameInputTyped,
         'allPurchaseeDetailsList' => $AllPurchaseDetails 
      ]; 

      $this->view('common/resourcesViewMore', $data);
   }

   public function addResource()
   {
      $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
      $CurrentResourceTypeCount =  sizeof($resourceTypes);

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
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
            if (empty($data['name']))
            {
               $data['name_error'] = "Please enter a type";
            }

            for ($i = 0; $i < $CurrentResourceTypeCount; $i++)
            {
               $CurrentResType =  strtolower($resourceTypes[$i]->name);
               $data1 = preg_replace('/\s+/', '', $CurrentResType);
               $NewResType = strtolower($data['name']);
               $data2 = preg_replace('/\s+/', '', $NewResType);
               if ($data1 == $data2)
               {
                  $data['name_error'] = "Type already exists.";
               }
            }

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
               $data['warrantyExpDate'] = "N/A";
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
               $this->resourceModel->beginTransaction();
               $this->resourceModel->updateResourceQuantityAfterAddResources($data);
               $this->resourceModel->addPurchaseDetails($data);
               $this->resourceModel->commit();
               Toast::setToast(1, "Resources added successfully", "");
               header('location: ' . URLROOT . '/Resources/viewAllResources');
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
            'resourceTypes' => $resourceTypes,
         ];
         $this->view('owner/own_resourceAdd', $data);
      }
   }
   public function updateResource($PurchaseID, $ResourceID)
   {
      $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
      $CurrentResourceTypeCount =  sizeof($resourceTypes);
      $resourcePurchaseDetails = $this->resourceModel->getRsourcePurchaseDetailsByPurchaseID($PurchaseID);
      $currentResourceType = $this->resourceModel->getRsourceTypeByResourceID($ResourceID);
      $CurrentResId = $resourcePurchaseDetails->resourceID;

      if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
         $data = [
            'manufacturer' => trim($_POST['manufacturer']),
            'modelNo' => trim($_POST['modelNo']),
            'warrantyExpDate' => trim($_POST['warrantyExpDate']),
            'price' => trim($_POST['price']),
            'purchaseDate' => trim($_POST['purchaseDate']),
            'manufacturer_error' => '',
            'modelNo_error' => '',
            'warrantyExpDate_error' => '',
            'price_error' => '',
            'purchaseDate_error' => '',
            'haveErrors' => 0,
            'resourceTypes' => $resourceTypes,
            'currentResourceID' => $CurrentResId,
            'purchaseID' => $PurchaseID,
            'name'=>  $currentResourceType->name
         ];

         if ($_POST['action'] == "addResource")
         {
            if (empty($data['manufacturer']))
            {
               $data['manufacturer_error'] = "Please enter manufacturer";
            }

            if (empty($data['modelNo']))
            {
               $data['modelNo_error'] = "Please enter model number";
            }

            if (empty($data['warrantyExpDate']))
            {
               $data['warrantyExpDate'] = "N/A";
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

            if (empty($data['manufacturer_error']) && empty($data['modelNo_error']) && empty($data['staffLname_error']) && empty($data['price_error']) && empty($data['purchaseDate_error']))
            {
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
            'manufacturer' => $resourcePurchaseDetails->manufacturer,
            'modelNo' => $resourcePurchaseDetails->modelNo,
            'name' =>  $currentResourceType->name,
            'warrantyExpDate' =>  $resourcePurchaseDetails->warrantyExpDate,
            'price' => $resourcePurchaseDetails->price,
            'purchaseDate' => $resourcePurchaseDetails->purchaseDate,
            'manufacturer_error' => '',
            'modelNo_error' => '',
            'warrantyExpDate_error' => '',
            'price_error' => '',
            'purchaseDate_error' => '',
            'haveErrors' => 0,
            'resourceTypes' => $resourceTypes,
            'currentResourceID' => $CurrentResId,
            'purchaseID' => $PurchaseID
         ];
         $this->view('owner/own_resourceUpdate', $data);
      }
   }

   public function removePurchaseRecord($ResourceID, $PurchaseID)
   {
      $this->resourceModel->beginTransaction();
      $this->resourceModel->updateResourceQuantityAfterRemoveResources($ResourceID);
      $this->resourceModel->removeResourcePurchaseRecord($PurchaseID);
      $this->resourceModel->commit();
      Toast::setToast(1, "Resource removed successfully", "");
      $this->viewResources($ResourceID);
   }

   public function getResourceTypeDetails()
   {
      $resourceTypes = $this->resourceModel->getAllRsourceTypeDetails();
      header('Content-Type: application/json; charset=utf-8');
      print_r(json_encode($resourceTypes));
   }
}
