<?php
class testController extends Controller
{
   public function __construct()
   {
      $this->reservationModel = $this->model('ReservationModel');
      $this->testModel = $this->model('testModel');
      $this->testModel2 = $this->model('testModel2');
   }

   // public function check()
   // {
   //    $users =  $this->testModel->getAllUsers();
   //    $data = (array) $users;
   //    var_dump($users);
   //    var_dump($data);
   //    // $data = new stdClass;
   //    // $data->name = "John Doe";
   //    // $data->position = "Software Engineer";
   //    // $data->address = "53, nth street, city";
   //    // $data->status = "Best";
   //    // $data->users = $users;

   //    // $this->view('testView', $data);
   // }

   public function testFunc()
   {
      $this->testModel->beginTransaction();
      $this->testModel2->func2();
      $this->testModel->func();
      $this->testModel2->commit();


      // $this->testModel->getAllUsers();
      // $this->testModel->getUsersCount();
      // $this->testModel->getSingleUser();
      // $this->testModel->removeResource();
   }
}
