<?php
class test extends Controller
{
   public function __construct()
   {
      $this->reservationModel = $this->model('ReservationModel');
      $this->testModel1 = $this->model('testModel');
      $this->testModel2 = $this->model('testModel2');
      $this->customerModel = $this->model('CustomerModel');
   }

   public function testFunc()
   {

      // $this->testModel->selectStmnt();
      // $this->testModel->insertStmnt();
      // $this->testModel->updateStmnt();
      // $this->testModel->deleteStmnt();
      // $this->testModel->customStmnt();

      // $this->testModel1->beginTransaction();
      // $this->testModel2->func2();
      // $this->testModel1->func();
      // $this->testModel2->commit();
   }

   public function check1()
   {
      // echo "Testing 1.. 2.. 3..";
      // $results = $this->reservationModel->getAllPendingRecallRequests();
      // var_dump($results);

      echo DateTimeExtended::getCurrentTime();
   }
}
