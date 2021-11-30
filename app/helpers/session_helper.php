<?php

/*
 * Contains session validation funtion
 * Restricts unauthorized user access by checking logged in user type
 */

function validateSession($accessibleUsers)
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
