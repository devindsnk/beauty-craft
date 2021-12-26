<?php
class ResourceModel extends Model
{
   public function addResourceType($data)
   {
      // die('erroraddResourceDetails');
      $results =  $this->insert('resources', ['name'=> $data['name'] ]);
      // var_dump($results);
   }  
   public function addPurchaseDetails($data)
   {

      // die('erroraddPurchaseDetails');
      $NoOfResources = $data['quantity'];
      $ResourceID= $data['nameSelected'];
      for ($x = 1; $x <= $NoOfResources; $x++)
      {
      $this->insert('purchaserecords', ['resourceID'=> $ResourceID ,'manufacturer'=> $data['manufacturer'] , 'modelNo'=> $data['modelNo'], 'warrantyExpDate'=> $data['warrantyExpDate'], 'price'=> $data['price'] , 'purchaseDate'=> $data['purchaseDate']]);
      // var_dump($results);
      }
      
   }  
   
//-------------------------------------- Start -----------------------------------------------------------//
//---- codes related to updating the resource count when removing and adding resources to the system ----// 
//------------------------------------------------------------------------------------------------------//

   public function updateResourceQuantityAfterAddResources($data)
   {
      
      $ResourceID= $data['nameSelected'];

      // Get the current total resource count from resources table
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);

      // Calcultate the total resource count by adding one for resources count
      $totalQuantity= (int)$data['quantity'] + $currentQuantity->quantity;

       // If the previous resource count 0 then it'll be updating the status as active resource type as well as the quantity
      if ($currentQuantity == 0){
         $result1= $this->update('resources', ['status' => 1,'quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
      }

      // After adding the resource if the resource count greater than 0 then it'll be only updating the quantity
      elseif($currentQuantity > 0) {
      $result2= $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
      }
   } 

   public function updateResourceQuantityAfterRemoveResources($ResourceID)
   {

      // Get the current total resource count from resources table
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);
      
      // Calcultate the resource count by redusing the removed resource
      $totalQuantity=  (int)$currentQuantity->quantity - 1 ;

      // After removing the resource if the resource count become 0 then it'll be updating the status as removed resource type as well as the quantity
      if ($totalQuantity == 0){
         $result1= $this->update('resources', ['status' => 0 ,'quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
      }
      // After removing the resource if the resource count greater than 0 then it'll be only updating the quantity
      elseif($totalQuantity > 0) {
      $result2= $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
      }

   } 

//-------------------------------------- End -------------------------------------------------------------//
//---- codes related to updating the resource count when removing and adding resources to the system ----// 
//------------------------------------------------------------------------------------------------------//



   public function getAllRsourceTypeDetails()
   {
      $results = $this->getResultSet('resources', ['name','resourceID'], null);

      return $results;
   } 
   public function getPurchaseDetailsByResourceID($resourceID)
   {
      // die("success");
      $results = $this->getResultSet('purchaserecords', '*' ,  ['resourceID' => $resourceID]);

      return $results;
   } 
   public function removeResourcePurchaseRecord($purchaseID) //details
   {
   $this->update('purchaserecords', ['status' => 0], ["purchaseID" => $purchaseID]);
   }

   public function getRsourcePurchaseDetailsByPurchaseID($purchaseID)
   {
      // die("success");
      $results = $this->getSingle('purchaserecords', '*' ,  ['purchaseID' => $purchaseID]);

      return $results;
   } 
   
   
}

