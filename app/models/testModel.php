<?php
class testModel extends Model
{
   public function selectStmnt()
   {
      // To get a single record tableName, requiredColumns and conditions are passed
      $results = $this->getSingle('users', '*', ['userType' => 6]);
      var_dump($results);

      // To get the all records tableName, requiredColumns and conditions are passed
      $results = $this->getResultSet('staff', ['fName', 'lName', 'gender', 'staffType'], ['gender' => 'M']);
      var_dump($results);

      // To get the row count tableName and conditions are passed
      $results = $this->getRowCount('users', ['userType' => 6, 'mobileNo' => '0717679714']);
      var_dump($results);
   }

   public function insertStmnt()
   {
      // To insert a record tableName and valuesToBeInserted are passed 
      $results =  $this->insert('resources', ['name' => "Hair Trimmer", 'quantity' => 5]);
      var_dump($results);
   }

   public function updateStmnt()
   {
      // To update records tableName, valuesToBeUpdated and then conditions are passed 
      $results = $this->update('customers', ['fName' => 'Binuka', 'lName' => 'Karunarathne'], ['mobileNo' => '0712334567']);
      var_dump($results);
   }

   public function deleteStmnt()
   {
      // To delete records tableName and conditions are passed
      $results = $this->delete('resources', ['name' => 'Hair Irons']);
      var_dump($results);
   }

   public function customStmnt()
   {
      // When using custom queries 
      //    put the SQL statement as first paramater
      //    put an array containg values to bind as the second parameter

      $x = 1;
      $y = 40;
      $result = $this->customQuery(
         "SELECT * FROM services WHERE status = :status AND totalDuration > :duration",
         [
            ':status' => $x,
            ':duration' => $y
         ]
      );
      var_dump($result);
   }

   public function func1()
   {
      $this->insert('resources', ['name' => "Test1", 'quantity' => 5]);
   }
}
