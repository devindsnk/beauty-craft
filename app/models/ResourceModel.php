<?php
class ResourceModel extends Model
{
   public function addResourceDetails($data)
   {
      die('erroraddResourceDetails');
      $results =  $this->insert('resources', ['name'=> $data['nameSelected'] , 'quantity'=> $data['quantity']]);
      var_dump($results);
      
   }  
   public function addPurchaseDetails($data)
   {
      die('erroraddPurchaseDetails');
      $name= $data['nameSelected'];
      $result = $this->customQuery(
         "SELECT resourceID FROM resources WHERE $name = :name ");
      $ResourceID = $result[0]->resourceID;
      $results =  $this->insert('purchaserecords', ['resourceID'=> $ResourceID ,'manufacturer'=> $data['manufacturer'] , 'modelNo'=> $data['modelNo'], 'warrantyExpDate'=> $data['warrantyExpDate'], 'price'=> $data['price'], 'quantity'=> $data['quantity'], 'purchaseDate'=> $data['purchaseDate']]);
      var_dump($results);
      
   }  
   public function updateResourceDetails($data)
   {
      
      $name= $data['nameSelected'];
      printf($name);
      $result = $this->getSingle('resources','resourceID', ['name' => $name]);
      // $result = $this->customQuery(
      //    "SELECT resourceID FROM resources WHERE $name = :name ");
      $ResourceID = $result[0]->resourceID;
      printf($ResourceID);
      die('errorupdateResourceDetails');
      
      $currentQuantity = $this->getSingle('resources', 'quantity', ['resourceID' => $ResourceID]);
      $totalQuantity= $data['quantity'] + $currentQuantity;
      $result2= $this->update('resources', ['quantity' => $totalQuantity], ['resourceID' => $ResourceID]);
      
   } 
   
   
}