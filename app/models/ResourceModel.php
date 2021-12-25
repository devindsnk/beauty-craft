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
   public function updateResourceQuantityAfterAddResources($data)
   {
      
      $ResourceID= $data['nameSelected'];
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);
      $totalQuantity= (int)$data['quantity'] + $currentQuantity->quantity;
      $result2= $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
   } 

   public function updateResourceQuantityAfterRemoveResources($ResourceID)
   {
      
      $currentQuantity = $this->getSingle('resources', ['quantity'], ['resourceID' => $ResourceID]);
      $totalQuantity=  (int)$currentQuantity->quantity - 1 ;
      $result2= $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
   } 

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
   $this->delete("purchaserecords", ["purchaseID" => $purchaseID]);
   }

   public function getRsourcePurchaseDetailsByPurchaseID($purchaseID)
   {
      // die("success");
      $results = $this->getSingle('purchaserecords', '*' ,  ['purchaseID' => $purchaseID]);

      return $results;
   } 
   
   
}

