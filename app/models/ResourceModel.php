<?php
class ResourceModel extends Model
{
   public function addResourceDetails($data)
   {
      $results =  $this->insert('resources', ['name'=> $data['resourceName'] , 'quantity'=> $data['resourceQuantity']]);
      var_dump($results);
      
   }  

   
}