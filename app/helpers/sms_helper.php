<?php

/*
 * Contains functions related SMS sending
 */

// Accepts sms in the format of 07912345678

function sendMobileVerifySMS($mobileNo, $OTP)
{
   $SMSText = urlencode("This is your OTP code: $OTP.");
   return sendSMS($mobileNo, $SMSText);
}

function sendPasswordResetSMS($mobileNo, $OTP)
{
   $SMSText = urlencode("Enter the OTP code: $OTP to reset the password.");
   return sendSMS($mobileNo, $SMSText);
}

function sendSMS($mobileNo, $SMSText)
{
   echo $SMSText;
   // $user = SMS_USER;
   // $password = SMS_PASS;

   // $to = "94" . substr($mobileNo, 1, 9);
   // $baseurl = "http://www.textit.biz/sendmsg";

   // $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$SMSText";
   // $ret = file($url);
   // $res = explode(":", $ret[0]);

   // if (trim($res[0]) == "OK")
   // {
   //    // echo $mobileNo, $text;
   //    return true;
   //    // die("Message Sent - ID : " . $res[1]);
   // }
   // else
   // {
   //    return false;
   //    // die("Sent Failed - Error : " . $res[1]);
   // }
   return true;
}
