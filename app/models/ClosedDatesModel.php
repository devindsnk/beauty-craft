<?php
class ClosedDatesModel extends Model
{ 
   public function checkIfClosed($date)
   {
      // $date = '2021-11-02';
      $this->db->query("SELECT * FROM closeddates WHERE date = '$date';");
      $result = $this->db->resultSet();
      // print_r($result);
      if ($result)
         return true;
      else
         return false; 
   }

   public function addCloseDate($data)
   {
      // print_r($data);
      $results =  $this->insert('closeddates', ['date' =>  $data['closeDate'] , 'note'=> $data['closeSalonReason']]);
      var_dump($results);
   }

   public function getCloseDatesDetails()
   {
      
      $results =  $this->getResultSet('closeddates','*',null);
      // print_r($results);
      var_dump($results);
      return $results; 
   }

   public function removeCloseDateDetails($defKey)
   {
      
      $results = $this->delete('closeddates', ['defKey' => $defKey ]);
      // print_r($results);
      var_dump($results);
   }
}
