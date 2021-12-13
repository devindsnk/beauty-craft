<?php

/*
 * Contains session management funtion
 * Restricts unauthorized user access by checking logged in user type
 */

class Session
{
   public static function setSingle($name, $value)
   {
      $_SESSION[$name] = $value;
   }

   public static function setBundle($bundleName, $values)
   {
      $_SESSION[$bundleName] = $values;
   }

   public static function get($dataName)
   {
      return $_SESSION[$dataName];
   }

   public static function clear($dataName)
   {
      unset($_SESSION[$dataName]);
   }

   public static function validateSession($accessibleUsers)
   {
      if (!isset($_SESSION['userType']))
      {
         redirect('pages/accessDenied');
      }
      else
      {
         $status = in_array($_SESSION['userType'], $accessibleUsers);
         if (!$status)
         {
            redirect('pages/accessDenied');
         }
      }
   }

   public static function hasToastNotification()
   {
      if (isset($_SESSION['toast']))
         return true;
      else
         return false;
   }

   public static function clearToastNotification()
   {
      self::clear('toast');
   }
}
