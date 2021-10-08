<?php
class StaffUser extends Controller
{
   public function __construct()
   {
      // $this->employeeModel = $this->model('Employee');
   }

   public function profile()
   {
      $this->view('staff/staff_profileview');
   }
   public function changePassword()
   {
      $this->view('staff/staff_changePassword');
   }
   public function leaves()
   {
      $this->view('serviceProvider/serProv_leaves');
   }
   
   
}
