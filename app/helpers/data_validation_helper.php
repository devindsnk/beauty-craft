<?php

/*
 * Common validation helper 
 * Contains validation functions for general forms
 */

function emptyCheck($value)
{
   if ($value == "") return "Please fill out this field.";
   else return "";
}

function validateNIC($value)
{
   $emptyCheckResponse = emptyCheck($value);
   if ($emptyCheckResponse == "" && !preg_match("/^[0-9]{12}$/", $value) && !preg_match("/^[0-9]{9}[V|X]$/", $value))
   {
      return "Invalid NIC format.";
   }
   else return $emptyCheckResponse;
}

function validateMobileNo($value)
{
   $emptyCheckResponse = emptyCheck($value);
   if ($emptyCheckResponse == "" && !preg_match("/^[0][7][0-9]{8}$/", $value))
   {
      return "Invalid mobile number format.";
   }
   return $emptyCheckResponse;
}
