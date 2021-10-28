<?php

function minsToDuration()
{
}

function minsToTime($timeInMins)
{
   $hours24 = intdiv($timeInMins, 60);
   $suffix = ($hours24 >= 12) ? " PM" : " AM";
   $hours12 = ($hours24 > 12) ? $hours24 - 12 : $hours24;
   $mins12 = $timeInMins % 60;
   $time = str_pad($hours12, 2, "0", STR_PAD_LEFT) . ':' . str_pad($mins12, 2, "0", STR_PAD_LEFT) . $suffix;
   return $time;
}
