<?php
class ClosedDatesModel extends Model
{
   public function checkIfClosed($date)
   {
      $result = $this->getSingle("closeddates", "*", ['date' => $date]);

      if ($result)
         return true;
      else
         return false;
   }

   public function addCloseDate($data)
   {
      // print_r($data);
      $results =  $this->insert('closeddates', ['date' =>  $data['closeDate'], 'note' => $data['closeSalonReason']]);
      // var_dump($results);
   }

   public function getCloseDatesDetails()
   {

      $results =  $this->getResultSet('closeddates', '*', null);
      // print_r($results);
      // var_dump($results);
      return $results;
   }

   public function removeCloseDateDetails($defKey)
   {

      $results = $this->delete('closeddates', ['defKey' => $defKey]);
      // print_r($results);
      var_dump($results);
   }


   public function getCloseDatesReservationDetails($date)
   {
      // echo $data;
      // die("bla");
      $SQLstatement = "SELECT * FROM reservations WHERE date = :date AND status IN (1,2);";
      $results = $this->customQuery($SQLstatement, [":date" => $date]);
      // ['date' => $date]

      // var_dump($results);
      return $results;
   }
   public function getCloseDatesReservationCount($date)
   {
      // echo $date;
      // die("bla");
      // ['date' => $date]
      // print_r($results);
      // var_dump($results);
      $results = $this->getRowCount('reservations', ['date' => $date]);
      return $results;
   }
}
