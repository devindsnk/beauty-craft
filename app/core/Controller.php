<?php
/* 
 * Base Controller
 * Loads the models and views
 */

class Controller
{
   //checking session
   public function checkSession()
   {
   }
   // Load model
   public function model($model)
   {
      require_once '../app/models/' . $model . '.php';
      return new $model();
   }

   // Load view
   public function view($view, $data = [])
   {
      if (file_exists('../app/views/' . $view . '.php'))
      {
         require_once '../app/views/' . $view . '.php';
      }
      else
      {
         die('View does not exist');
      }
   }
}
