<?php

// Accepts sms in the format of 07912345678

// mobileVerification = 1
// passwordReset      = 2

function generatePIN($pinModel, $mobileNo, $type)
{
   $result = $pinModel->getVerificationPIN($mobileNo, $type);

   // Pin generated already
   if ($result)
   {
      $timeout = true; // Check timeout here and assign boolean

      // pin timeout
      if ($timeout)
      {
         $pin = generateOTP();
         // $pinModel->updateVerificationPIN($mobileNo, $pin, $type);
         return $pin;
      }
      // no timeout
      else
      {
         return false;
      }
   }
   // Pin not generated
   else
   {
      $pin = generateOTP();
      // $pinModel->storeVerificationPIN($mobileNo, $pin, $type);
      return $pin;
   }
}

function storePIN($pinModel, $pin, $mobileNo, $type)
{
   $pinModel->storeVerificationPIN($mobileNo, $pin, $type);
}

function verifyPIN($pinModel, $mobileNo, $enteredPIN, $type)
{
   $result = $pinModel->getVerificationPIN($mobileNo, $type);
   if ($result)
   {
      if (strcmp($result->pin, $enteredPIN) == 0)
         return true;
   }
   return false;
}

function removePIN($pinModel, $mobileNo, $type)
{
   $pinModel->removeUsedPIN($mobileNo, $type);
}

function sendSMS($mobileNo, $text)
{
   $user = SMS_USER;
   $password = SMS_PASS;

   $to = "94" . substr($mobileNo, 1, 9);
   $baseurl = "http://www.textit.biz/sendmsg";

   $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
   $ret = file($url);
   $res = explode(":", $ret[0]);

   if (trim($res[0]) == "OK")
   {
      echo $mobileNo, $text;
      return true;
      // die("Message Sent - ID : " . $res[1]);
   }
   else
   {
      return false;
      // die("Sent Failed - Error : " . $res[1]);
   }
}

function generateOTP()
{
   $generator = "7305192864";
   $otp = "";

   for ($i = 1; $i <= 6; $i++)
   {
      $otp .= substr($generator, (rand() % (strlen($generator))), 1);
   }

   return $otp;
}
