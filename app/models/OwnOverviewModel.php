<?php
class OverviewModel extends Model
{
   public function  getManagerCount()
   {
      $results = $this->getRowCount('staff', ['status' => 1, 'status' => 2, 'staffType' => 3]);
      //    return $results;  
      print json_encode($results);
   }

   public function  getReceptioistCount()
   {
      $results = $this->getRowCount('staff', ['status' => 1, 'status' => 2, 'staffType' => 4]);
      //    return $results;  
      print json_encode($results);
   }

   public function  getServProCount()
   {
      $results = $this->getRowCount('staff', ['status' => 1, 'status' => 2, 'staffType' => 5]);
      //    return $results;  
      print json_encode($results);
   }
   
}
