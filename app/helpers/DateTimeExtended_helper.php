<?php

/*
 * Contains few functions required to format date and time
 */

class DateTimeExtended
{
   public static function getCurrentTimeStamp()
   {
      return date('Y-m-d H:i:s', time());
   }

   public static function getCurrentDate()
   {
      return date('Y-m-d', time());
   }

   public static function getCurrentTime()
   {
      return date('H:i:s', time());
   }

   public static function convertToFullFormatDate($datetime)
   {
      $timestamp = strtotime($datetime);
      $date =  date('l, jS F o',  $timestamp);

      return $date;
   }

   public static function dateToShortMonthFormat($datetime, $flag)
   {
      $timestamp = strtotime($datetime);
      switch ($flag)
      {
         case "D":
            return date('j',  $timestamp);
         case "M":
            return date('M',  $timestamp);
         case "Y":
            return date('o',  $timestamp);
      }
   }

   public static function getTimeDiff($fromTime, $toTime = NULL)
   {
      if (is_null($toTime))
         $toTime = self::getCurrentTimeStamp();

      $minsDiff = round((strtotime($toTime) - strtotime($fromTime)) / 60, 0);
      $secDiff = (strtotime($toTime) - strtotime($fromTime)) % 60;

      // echo $toTime;
      // echo $fromTime;
      return [$minsDiff, $secDiff];
   }

   public static function minsToDuration($durationInMins)
   {
      $hours = (int)($durationInMins / 60);
      $mins = $durationInMins % 60;
      if ($hours == 0)
         return $mins . " mins";
      elseif ($mins == 0)
      {
         return $hours . " hours";
      }
      else
      {
         return $hours . " h " . $mins . " mins";
      }
   }

   public static function minsToTime($timeInMins)
   {
      $hours24 = intdiv($timeInMins, 60);
      $suffix = ($hours24 >= 12) ? " PM" : " AM";
      $hours12 = ($hours24 > 12) ? $hours24 - 12 : $hours24;
      $mins12 = $timeInMins % 60;
      $time = str_pad($hours12, 2, "0", STR_PAD_LEFT) . ':' . str_pad($mins12, 2, "0", STR_PAD_LEFT) . $suffix;
      return $time;
   }
}
