<?php
class Leaves extends Controller
{
   public function __construct()
   {
      //   $this->ServiceModel = $this->model('ServiceModel');
   }
   public function leaveRequest()
   {
      // validateSession([6]);
      $this->view('manager/mang_leaveRequests');
   }
}
