<?php
class testModel extends Model
{
   // public function getAllUsers()
   // {
   //    $x = "Hair Trrrrr";
   //    $y = 5;

   //    $result  = null;

   //    try
   //    {
   //       $this->dbh->beginTransaction();

   //       $this->insert('resources', ['name' => "Test", 'quantity' => 4]);
   //       $this->insert('resourcess', ['name' => $x, 'quantity' => $y]);

   //       $this->dbh->commit();
   //    }
   //    catch (\Throwable $e)
   //    {
   //       print_r($e->getMessage());
   //       $this->dbh->rollBack();
   //       // throw $e; 
   //    }


   //    // $result = $this->getResultSet('staff', ['fName', 'lName', 'gender', 'staffType'], ['gender' => 'F']);
   //    // $result = $this->customQuery("SELECT * FROM services");
   //    // $result = $this->update('customers', ['fName' => 'Binuka', 'lName' => 'Karunarathne'], ['mobileNo' => '0712334567', 'gender' => 'M']);
   //    // $result = $this->getRowCount('users', [null]);
   //    // var_dump($result);
   //    // return $result;
   // }

   public function func()
   {
      $this->insert('resources', ['name' => "Test1", 'quantity' => 4]);
   }

   // public function getUsersCount()
   // {
   //    $result = $this->getRowCount('users', ['userType' => 6, 'mobileNo' => '0717679714']);
   //    var_dump($result);
   // }

   // public function getSingleUser()
   // {
   //    $result = $this->getSingle('users', '*', ['userType' => 6]);
   //    var_dump($result);
   //    return $result;
   // }

   // public function removeResource()
   // {
   //    $this->insert('resources', ['name' => "Hair Trimmer", 'quantity' => 5]);
   //    // $this->delete('resources', ['name' => 'Hair Irons']);
   //    // var_dump($result);
   //    // return $result;
   // }
}
