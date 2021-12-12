<?php

/*
 * Contains few functions required to format date and time
 */

function getCurrentTimeStamp()
{
   return date('Y-m-d H:i:s', time());
}

function getTimeDiff($fromTime, $toTime = NULL)
{
   if (is_null($toTime))
      $toTime = getCurrentTimeStamp();

   $minsDiff = round((strtotime($toTime) - strtotime($fromTime)) / 60, 0);
   $secDiff = (strtotime($toTime) - strtotime($fromTime)) % 60;

   // echo $toTime;
   // echo $fromTime;
   return [$minsDiff, $secDiff];
}

function minsToDuration()
{
}

function getDateFullFormat($datetime)
{
   $timestamp = strtotime($datetime);
   $date =  date('l, jS F o',  $timestamp);

   return $date;
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
