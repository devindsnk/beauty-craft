<?php
class Pages extends Controller
{
   public function __construct()
   {
   }

   public function home()
   {
      $this->view('index');
   }
   public function notFound()
   {
      $this->view('404');
   }
}
