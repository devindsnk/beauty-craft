<?php
class ResourceModel extends Model
{
   public function addResourceType($data)
   {
      // die('erroraddResourceDetails');

      $this->insert('resources', ['name' => $data['name']]);
      $this->update('resources', ['status' => 0], ['name' => $data['name']]);
      // var_dump($results);
   }

   public function getCountsOfAllResources()
   {
      // TODO: check if okay with new db changes 
      $results = $this->getResultSet("resources", ["resourceID", "quantity"]);
      return $results;
   }

   public function addPurchaseDetails($data)
   {

      // die('erroraddPurchaseDetails');
      $NoOfResources = $data['quantity'];
      $ResourceID = $data['nameSelected'];
      for ($x = 1; $x <= $NoOfResources; $x++)
      {
         $this->insert('purchaserecords', ['resourceID' => $ResourceID, 'manufacturer' => $data['manufacturer'], 'modelNo' => $data['modelNo'], 'warrantyExpDate' => $data['warrantyExpDate'], 'price' => $data['price'], 'purchaseDate' => $data['purchaseDate']]);
         // var_dump($results);
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
      print_r($currentQuantityCurrentResourceID->quantity);
      echo "<br>";
      print_r($currentQuantityNewResourceID->quantity);
      // die("resourcemodel called");
      echo "<br>";
      $UpdatedQuantityForCurrentResourceID = $currentQuantityCurrentResourceID->quantity - 1;
      $UpdatedQuantityForNewResourceID = $currentQuantityNewResourceID->quantity + 1;
      print_r($UpdatedQuantityForCurrentResourceID);
      echo "<br>";
      print_r($UpdatedQuantityForNewResourceID);
      // conditions and queries 
      // if current resource id equal to new resource id 
      if ($CurrentResourceID == $NewResourceID)
      {
         // print_r($CurrentResourceID);
         // print_r($NewResourceID);
         die('errorUpdatePurchaseDetails if called');
         $this->update('purchaserecords', ['resourceID' => $NewResourceID, 'manufacturer' => $data['manufacturer'], 'modelNo' => $data['modelNo'], 'warrantyExpDate' => $data['warrantyExpDate'], 'price' => $data['price'], 'purchaseDate' => $data['purchaseDate']]);
      }

      // if current resource id not equal to new resource id
      elseif ($CurrentResourceID != $NewResourceID)
      {
         // die("currentQuantityCurrentResourceID = 1 and currentQuantityNewResourceID = 0");
         // current resource id eke status eka change wenna one not available widiyt
         // new res id eke status eka availble widiyt change wenna one 
         // details tika update wenn one
         // resource table eke id dekatama adalawa quantity deka change wenna one (CurrentResourceID eke table eke quantity eka 0 and NewResourceID eke quantity eka ekakin wadi wenna one )
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
      print_r($currentQuantity);
      // die("stopped updating quatity");

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
      $result2 = $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);

      //-------------------------------------- End -------------------------------------------------------------//
      //---- codes related to updating the resource count when removing and adding resources to the system ----// 
      //------------------------------------------------------------------------------------------------------//

   }

   public function getAllRsourceTypeDetails()
   {
      $results = $this->getResultSet('resources', ['name', 'resourceID'], null);

      return $results;
   }
   public function getPurchaseDetailsByResourceID($resourceID)
   {
      // die("success");
      $results = $this->getResultSet('purchaserecords', '*',  ['resourceID' => $resourceID]);

      return $results;
   }
   public function removeResourcePurchaseRecord($purchaseID) //details
   {
      $this->update('purchaserecords', ['status' => 0], ["purchaseID" => $purchaseID]);
   }

   public function getRsourcePurchaseDetailsByPurchaseID($purchaseID)
   {
      // die("success");
      $results = $this->getSingle('purchaserecords', '*',  ['purchaseID' => $purchaseID]);

      return $results;
   }
}
