<?php

// Accepts sms in the format of 07912345678
function sendSMS($mobileNo, $text)
{
   // $user = SMS_USER;
   // $password = SMS_PASS;

   // $to = "94" . substr($mobileNo, 1, 9);
   // $baseurl = "http://www.textit.biz/sendmsg";

   // $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
   // $ret = file($url);
   // $res = explode(":", $ret[0]);

   // if (trim($res[0]) == "OK")
   // {
   //    die("Message Sent - ID : " . $res[1]);
   // }
   // else
   // {
   //    die("Sent Failed - Error : " . $res[1]);
   // }
   echo $mobileNo, $text;
   return true;
}

function getOTP()
{
   $generator = "7305192864";
   $otp = "";

   for ($i = 1; $i <= 6; $i++)
   {
      $otp .= substr($generator, (rand() % (strlen($generator))), 1);
   }

   return $otp;
}
