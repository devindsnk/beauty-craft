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
         "SELECT * FROM staff INNER JOIN salarypayments ON staff.staffID = salarypayments.staffID "
      );
      print_r($result);
      // die("salarymodel");
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
            $result = $this->customQuery("SELECT salaryrates.serviceProviderSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
            $basicSalary = $result[0]->serviceProviderSalaryRate;
            // die("salary rate serv pro");
            $SQLstatement1 =
               "SELECT COUNT(*) as totalCount
               FROM generalleaves 
               WHERE staffID = :staffID AND 
                  leaveDate >= :fiveDaysBeforInPrevMonth AND 
                  leaveDate < :fiveDaysBeforeInThisMonth AND
                  status IN (1,3)";

            $results = $this->customQuery($SQLstatement1, [':staffID' => $staffID, ':fiveDaysBeforInPrevMonth' => $fiveDaysBeforInPrevMonth, ':fiveDaysBeforeInThisMonth' => $fiveDaysBeforeInThisMonth]);

            $leaveCount = $results[0]->totalCount;
            $additionalLeaveCount = $leaveCount - $nonMangCasualLimit;
            $additionalLeaveCount = ($additionalLeaveCount < 0) ? 0 : $additionalLeaveCount;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;

            $SQLstatement2 =
               "SELECT SUM(services.price) as totalAmount
               FROM reservations
               INNER JOIN services ON reservations.serviceID = services.serviceID
               WHERE staffID = :staffID AND 
                  date >= :fiveDaysBeforInPrevMonth AND 
                  date < :fiveDaysBeforeInThisMonth AND
                     reservations.status IN (4)";

            $results = $this->customQuery($SQLstatement2, [':staffID' => $staffID, ':fiveDaysBeforInPrevMonth' => $fiveDaysBeforInPrevMonth, ':fiveDaysBeforeInThisMonth' => $fiveDaysBeforeInThisMonth]);
            $totalResAmount = $results[0]->totalAmount;
            $commisionAmount = $commissionRate[0]->rate * ($totalResAmount / 100);
         }
         elseif ($staffDetails[$i]->staffType == 4)
         {
            $result = $this->customQuery("SELECT salaryrates.receptionistSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
            $basicSalary = $result[0]->receptionistSalaryRate;
            $SQLstatement1 =
               "SELECT COUNT(*) as totalCount
               FROM generalleaves 
               WHERE staffID = :staffID AND 
                  leaveDate >= :fiveDaysBeforInPrevMonth AND 
                  leaveDate < :fiveDaysBeforeInThisMonth AND
                  status IN (1,3)";

            $results = $this->customQuery($SQLstatement1, [':staffID' => $staffID, ':fiveDaysBeforInPrevMonth' => $fiveDaysBeforInPrevMonth, ':fiveDaysBeforeInThisMonth' => $fiveDaysBeforeInThisMonth]);
            $leaveCount = $results[0]->totalCount;
            $additionalLeaveCount = $leaveCount - $nonMangCasualLimit;
            $additionalLeaveCount = ($additionalLeaveCount < 0) ? 0 : $additionalLeaveCount;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;
         }

         elseif ($staffDetails[$i]->staffType == 3)
         {

            $result = $this->customQuery("SELECT salaryrates.managerSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
            $basicSalary= $result[0]->managerSalaryRate;
            $SQLstatement1 =
               "SELECT COUNT(*) as totalCount
               FROM managerleaves 
               WHERE staffID = :staffID AND 
                  leaveDate >= :fiveDaysBeforInPrevMonth AND 
                  leaveDate < :fiveDaysBeforeInThisMonth AND
                   leaveType = 'casual'";

            $results = $this->customQuery($SQLstatement1, [':staffID' => $staffID, ':fiveDaysBeforInPrevMonth' => $fiveDaysBeforInPrevMonth, ':fiveDaysBeforeInThisMonth' => $fiveDaysBeforeInThisMonth]);
            $leaveCount = $results[0]->totalCount;
            // print_r($leaveCount);
            // die("mang leaves");
            $additionalLeaveCount = $leaveCount - $mangCasualLimit;
            $additionalLeaveCount = ($additionalLeaveCount < 0) ? 0 : $additionalLeaveCount;
            $deductionAmount =  $additionalLeaveCount *  $deductionRatePerDay;
            
         }

         $totalSalary = (int)$basicSalary + $commisionAmount - $deductionAmount;
         $results = $this->insert(
            'salarypayments',
            [
               'staffID' => $staffID,
               'month' =>  $currentDate,
               'amount' => $totalSalary,
               'status' => 0,
               'additionalLeaveCount' => $additionalLeaveCount,
               'servProCommission' => $commisionAmount
            ]
         );
      }
   }
}
