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
      $this->insert('closeddates', ['date' =>  $data['closeDate'], 'note' => $data['closeSalonReason']]);
   }

   public function getCloseDatesDetails()
   {
      $results =  $this->getResultSet('closeddates', '*', null);
      return $results;
   }

   public function removeCloseDateDetails($defKey)
   {
      $this->delete('closeddates', ['defKey' => $defKey]);
   }

   public function getCloseDatesReservationDetails($date)
   {
      $SQLstatement = "SELECT * FROM reservations WHERE date = :date AND status IN (1,2);";
      $results = $this->customQuery($SQLstatement, [":date" => $date]);
      return $results;
   }
   public function getCloseDatesReservationCount($date)
   {
      $results = $this->getRowCount('reservations', ['date' => $date]);
      return $results;
   }
}
