<?php
class ResourceModel extends Model
{
   public function addResourceType($data)
   {
      $this->insert('resources', ['name' => $data['name']]);
      $this->update('resources', ['status' => 0], ['name' => $data['name']]);
   }

   public function getCountsOfAllResources()
   {
      // TODO: check if okay with new db changes 
      $results = $this->getResultSet("resources", ["resourceID", "quantity"]);
      return $results;
   }

   public function addPurchaseDetails($data)
   {
      $NoOfResources = $data['quantity'];
      $ResourceID = $data['nameSelected'];
      for ($x = 1; $x <= $NoOfResources; $x++)
      {
         $this->insert('purchaserecords', ['resourceID' => $ResourceID, 'manufacturer' => $data['manufacturer'], 'modelNo' => $data['modelNo'], 'warrantyExpDate' => $data['warrantyExpDate'], 'price' => $data['price'], 'purchaseDate' => $data['purchaseDate']]);
      }
   }

   public function updatePurchaseDetails($data)
   {
      //Define relevant data in to variables
      $purchaseID = $data['purchaseID'];
      $CurrentResourceID = $data['currentResourceID'];
      $NewResourceID = $data['nameSelected'];
      $currentQuantityCurrentResourceID = $this->getSingle('resources', ['quantity'], ['resourceID' => $CurrentResourceID]);
      $currentQuantityNewResourceID = $this->getSingle('resources', ['quantity'], ['resourceID' => $NewResourceID]);
      $UpdatedQuantityForCurrentResourceID = $currentQuantityCurrentResourceID->quantity - 1;
      $UpdatedQuantityForNewResourceID = $currentQuantityNewResourceID->quantity + 1;

      // conditions and queries 
      // if current resource id equal to new resource id 
      if ($CurrentResourceID == $NewResourceID)
      {
         $this->update('purchaserecords', ['resourceID' => $NewResourceID, 'manufacturer' => $data['manufacturer'], 'modelNo' => $data['modelNo'], 'warrantyExpDate' => $data['warrantyExpDate'], 'price' => $data['price'], 'purchaseDate' => $data['purchaseDate']], ['purchaseID' => $purchaseID]);
      }

      // if current resource id not equal to new resource id
      elseif ($CurrentResourceID != $NewResourceID)
      {
         $this->update('resources', ['quantity' => $UpdatedQuantityForCurrentResourceID], ['resourceID' => $CurrentResourceID]);
         $this->update('resources', ['quantity' => $UpdatedQuantityForNewResourceID], ['resourceID' => $NewResourceID]);
         $this->update('purchaserecords', ['resourceID' => $NewResourceID, 'manufacturer' => $data['manufacturer'], 'modelNo' => $data['modelNo'], 'warrantyExpDate' => $data['warrantyExpDate'], 'price' => $data['price'], 'purchaseDate' => $data['purchaseDate']], ['purchaseID' => $purchaseID]);
      }
   }

   //-------------------------------------- Start -----------------------------------------------------------//
   //---- codes related to updating the resource count when removing and adding resources to the system ----// 
   //------------------------------------------------------------------------------------------------------//
   public function updateResourceQuantityAfterAddResources($data)
   {
      $ResourceID = $data['nameSelected'];
      // Get the current total resource count from resources table
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);
      // Calcultate the total resource count by adding one for resources count
      $totalQuantity = (int)$data['quantity'] + $currentQuantity->quantity;
      $result1 = $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
   }

   public function updateResourceQuantityAfterRemoveResources($ResourceID)
   {
      // Get the current total resource count from resources table
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);

      // Calcultate the resource count by redusing the removed resource
      $totalQuantity =  (int)$currentQuantity->quantity - 1;
      $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
   }

   //-------------------------------------- End -------------------------------------------------------------//
   //---- codes related to updating the resource count when removing and adding resources to the system ----// 
   //------------------------------------------------------------------------------------------------------//

   public function getAllRsourceTypeDetails()
   {
      $results = $this->getResultSet('resources', ['name', 'resourceID'], null);
      return $results;
   }

   public function getPurchaseDetailsByResourceID($resourceID)
   {
      $results = $this->getResultSet('purchaserecords', '*',  ['resourceID' => $resourceID]);
      return $results;
   }

   public function removeResourcePurchaseRecord($purchaseID) //details
   {
      $this->update('purchaserecords', ['status' => 0], ["purchaseID" => $purchaseID]);
   }

   public function getRsourcePurchaseDetailsByPurchaseID($purchaseID)
   {
      $results = $this->getSingle('purchaserecords', '*',  ['purchaseID' => $purchaseID]);
      return $results;
   }
}
