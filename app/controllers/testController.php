<?php
class testController extends Controller
{
   public function __construct()
   {
      $this->testModel = $this->model('testModel');
      $this->testModel2 = $this->model('testModel2');
   }

   public function testFunc()
   {
      $this->testModel->selectStmnt();
      $this->testModel->insertStmnt();
      $this->testModel->updateStmnt();
      $this->testModel->deleteStmnt();
      $this->testModel->customStmnt();

      // $this->testModel->beginTransaction();
      // $this->testModel2->func2();
      // $this->testModel->func();
      // $this->testModel2->commit();

   }
}
