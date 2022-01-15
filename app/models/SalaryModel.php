<?php

class SalaryModel extends Model
{
   public function getAllSalaryRateDetails()
   {
      $result = $this->getResultSet('salaryrates', '*', null);
      // print_r($result);
      return $result;
   }
   public function getAllLeaveRateDetails()
   {
      $result = $this->getResultSet('leavelimits', '*', null);
      return $result;
   }
   public function getAllCommisionRateDetails()
   {
      $result = $this->getResultSet('commissionrates', '*', null);
      return $result;
   }

   public function getAllStaffAndSalaryPaymentDetails($mostRecentDateMonth, $mostRecentDateYear)
   {
      // echo $mostRecentDateMonth . $mostRecentDateYear;
      $result = $this->customQuery(
         "SELECT * FROM staff INNER JOIN salarypayments ON staff.staffID = salarypayments.staffID WHERE MONTH(paidDate)=$mostRecentDateMonth AND YEAR(paidDate)= $mostRecentDateYear"
      );
      return $result;
   }

   public function getAllStaffSalaryPaymentDetailsByStaffID($staffID)
   {
      $results = $this->getSingle("salarypayments", "*", ['staffID' => $staffID]);
      return $results;
   }

   public function lastInputedMonth()
   {
      $result = $this->customQuery("SELECT salarypayments.month FROM salarypayments ORDER BY month DESC LIMIT 1");
      return $result;
   }



   public function calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth, $fiveDaysBeforeInThisMonth)
   {
      $currentDate = date('Y-m-d');

      // get leave limits details
      $leaveLimitDetails = $this->customQuery("SELECT * FROM leavelimits ORDER BY changedDate DESC LIMIT 1");
      $nonMangCasualLimit = $leaveLimitDetails[0]->generalLeave;
      $mangCasualLimit = $leaveLimitDetails[0]->managerGeneralLeave;

      $deductionRatePerDay = 250; //TODO: Confirm this

      // get commisssion rate for services
      $commissionRate = $this->customQuery("SELECT commissionrates.rate FROM commissionrates ORDER BY changedDate DESC LIMIT 1");

      // $staffDetails = $this->getResultSet('staff', '*', null);
      $staffDetails = $this->customQuery("SELECT * FROM staff WHERE staffType IN (3,4,5)");
      $staffCount = sizeof($staffDetails);

      for ($i = 0; $i < $staffCount; $i++)
      {
         $staffID = $staffDetails[$i]->staffID;

         $totalSalary = 0;
         $basicSalary = 0;
         $additionalLeaveCount = 0;
         $deductionAmount =  0;
         $commisionAmount = 0;

         if ($staffDetails[$i]->staffType == 5)
         {
            $basicSalary = $this->customQuery("SELECT salaryrates.serviceProviderSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            $SQLstatement1 =
               "SELECT COUNT(*) 
               FROM generalleaves 
               WHERE staffID = '$staffID' AND 
                  leaveDate >= '$fiveDaysBeforInPrevMonth' AND 
                  leaveDate < '$fiveDaysBeforeInThisMonth' AND
                  status IN (1,3)";

            $results = $this->customQuery($SQLstatement1, []);
            $leaveCount = $results[0];
            $additionalLeaveCount = $leaveCount - $nonMangCasualLimit;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;

            $SQLstatement2 =
               "SELECT SUM(services.price) 
               FROM reservations
               INNER JOIN services ON reservations.serviceID = services.serviceID
               WHERE staffID = '$staffID' AND 
                     reservationDate >= '$fiveDaysBeforInPrevMonth' AND 
                     reservationDate < '$fiveDaysBeforeInThisMonth' AND
                     reservations.status IN (4)";

            $results = $this->customQuery($SQLstatement2, []);
            $totalResAmount = $results[0];

            $commisionAmount = $commissionRate * $totalResAmount / 100;
         }
         elseif ($staffDetails[$i]->staffType == 4)
         {
            $basicSalary = $this->customQuery("SELECT salaryrates.receptionistSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            $SQLstatement1 =
               "SELECT COUNT(*) 
               FROM generalleaves 
               WHERE staffID = '$staffID' AND 
                  leaveDate >= '$fiveDaysBeforInPrevMonth' AND 
                  leaveDate < '$fiveDaysBeforeInThisMonth' AND
                  status IN (1,3)";

            $results = $this->customQuery($SQLstatement1, []);
            $leaveCount = $results[0];
            $additionalLeaveCount = $leaveCount - $nonMangCasualLimit;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;
         }

         elseif ($staffDetails[$i]->staffType == 3)
         {
            $basicSalary = $this->customQuery("SELECT salaryrates.managerSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            $SQLstatement1 =
               "SELECT COUNT(*) 
               FROM managerleaves 
               WHERE staffID = '$staffID' AND 
                     leaveDate >= '$fiveDaysBeforInPrevMonth' AND 
                     leaveDate < '$fiveDaysBeforeInThisMonth' AND
                     status IN (1,3)";

            $results = $this->customQuery($SQLstatement1, []);
            $leaveCount = $results[0];
            $additionalLeaveCount = $leaveCount - $mangCasualLimit;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;
         }

         $additionalLeaveCount = ($additionalLeaveCount < 0) ? 0 : $additionalLeaveCount;
         $totalSalary = $basicSalary + $commisionAmount - $deductionAmount;

         $results = $this->insert(
            'salarypayments',
            [
               'staffID' => $staffID,
               'month' =>  $currentDate,
               'amount' => $totalSalary,
               'status' => 0,
               'additionalLeaveCount' => $additionalLeaveCount,
               'serProvCommision' => $commisionAmount
            ]
         );
      }
      die("servDetails awa");
   }
}
