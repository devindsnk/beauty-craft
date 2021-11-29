<?php
class  Resources extends Controller
{
   public function __construct()
   {
    //   $this->userModel = $this->model('UserModel');
    //   $this->staffModel = $this->model('StaffModel');
   }

   public function viewResources(){

    $this->view('common/resourcesViewMore');

   }

   


}