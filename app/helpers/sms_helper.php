<?php

/*
 * Contains functions related SMS sending
 */

// Accepts sms in the format of 07912345678

function sendMobileVerifySMS($mobileNo, $OTP)
{
   $SMSText = urlencode(
      "Please enter the OTP code: $OTP to verify your mobile number.\n\nBeauty Craft"
   );
   return sendSMS($mobileNo, $SMSText, 1);
}

function sendCustomerRegSMS($mobileNo)
{
   $SMSText = urlencode(
      "Welcome to Beauty Craft!\nYour customer account has been created successfully."
   );
   return sendSMS($mobileNo, $SMSText, 0);
}

function sendPasswordResetSMS($mobileNo, $OTP)
{
   $SMSText = urlencode(
      "Please enter the OTP code: $OTP to reset the password.\nBeauty Craft"
   );
   return sendSMS($mobileNo, $SMSText, 1);
}

function sendSMS($mobileNo, $SMSText, $priorityFlag)
{
   echo $SMSText;
   $user = SMS_USER;
   $password = SMS_PASS;

   $to = "94" . substr($mobileNo, 1, 9);
   $baseurl = "http://www.textit.biz/sendmsg";

   if ($priorityFlag == 1)
      $ecoVal = "N";
   else
      $ecoVal = "Y";


   $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$SMSText&eco=$ecoVal";
   $ret = file($url);
   $res = explode(":", $ret[0]);

   if (trim($res[0]) == "OK")
   {
      // echo $mobileNo, $text;
      return true;
      // die("Message Sent - ID : " . $res[1]);
   }
   else
   {
      return false;
      // die("Sent Failed - Error : " . $res[1]);
   }
   return true;
}
