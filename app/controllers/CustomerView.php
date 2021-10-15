<?php
class CustomerView extends Controller
{
   public function __construct()
   {
    //   $this->customerModel = $this->model('CustomerModel');
   }

   public function cusDetailView()
   {
      $this->view('common/customerView');
   }

}