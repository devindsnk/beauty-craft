<?php
class ResourceModel extends Model
{
   public function addResourceDetails($data)
   {
      $results =  $this->insert('resources', ['name' => $data['resourceName'], 'quantity' => $data['resourceQuantity']]);
      var_dump($results);
   }

   public function getCountsOfAllResources()
   {
      // TODO: check if okay with new db changes 
      $results = $this->getResultSet("resources", ["resourceID", "quantity"]);
      return $results;
   }
}
