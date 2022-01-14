<?php

use function PHPSTORM_META\type;

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
   
   public function getAllStaffAndSalaryPaymentDetails($mostRecentDateMonth,$mostRecentDateYear)
   {

      $result = $this->customQuery(
         "SELECT staff.staffID,staff.fName,staff.lName,staff.staffType,salarypayments.status,salarypayments.amount FROM staff LEFT JOIN salarypayments ON staff.staffID = salarypayments.staffID"
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
   public function calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth,$fiveDaysBeforeInThisMonth)
   {

      $totalIncome = 0;
      // $staffDetails = $this->getResultSet('staff', '*', null);
      $staffDetails = $this->customQuery("SELECT * FROM staff WHERE staffType IN (3,4,5)");

      $staffCount = sizeof($staffDetails);
      // print_r($staffCount);
      
      for ($i = 0; $i < $staffCount; $i++)
      {
          $staffID = $staffDetails[$i]->staffID;
          // get leave limits details
          $leaveLimitDetails = $this->customQuery("SELECT * FROM leavelimits ORDER BY changedDate DESC LIMIT 1");
          // get general leave limit
          $generalLeaveLimit = $leaveLimitDetails[0]->generalLeave;
          // get manager leave limit
          $mangGeneralLeaveLimit =  $leaveLimitDetails[0]->managerGeneralLeave;
          
         if ($staffDetails[$i]->staffType == 5)
         {
            // get service provider basic salary rate
            $servProSalaryRate = $this->customQuery("SELECT salaryrates.serviceProviderSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
   
            // get genaral leave limit
            $serRate = $this->customQuery("SELECT leavelimits.generalLeave FROM leavelimits ORDER BY changedDate DESC LIMIT 1");
            
            // get all completed service provider's reservation details by staff id
            $resDetails = $this->getResultSet('reservations', '*', ['staffID' => $staffDetails[$i]->staffID, 'status' => 4]);
           
            // get all approved and rejected medical leave details of service provider by staff id
            $leaveType = "casual";
            $leaveDetails = $this->customQuery("SELECT * FROM generalleaves WHERE staffID = '$staffID' AND leaveType = '$leaveType' AND status IN (1,3)");
            $AllLeaveCount = sizeof($leaveDetails);
            $resCount = sizeof($resDetails);

            for ($j = 0; $j < $resCount; $j++)
            {
               $totalIncomeFromRes = 0;
               // condition to check the data is added in between previous month 5 days before and this month five days before
               if($fiveDaysBeforInPrevMonth>$resDetails[$j]->date && $fiveDaysBeforeInThisMonth<$resDetails[$j]->date ){
               $servDetails[$j] = $this->getSingle('services', ['price'], ['serviceID' => $resDetails[$j]->serviceID, 'status' => 1]);
               print_r($servDetails[$j]->price);

               $totalIncomeFromRes = $totalIncomeFromRes + $servDetails[$j]->price;
               // print_r(type($servDetails->price)); 
               }
            }

            for ($j = 0; $j < $AllLeaveCount; $j++)
            {
               // condition to check the data is added in between previous month 5 days before and this month five days before
                if($fiveDaysBeforInPrevMonth>$leaveDetails [$j]->leaveDate  && $fiveDaysBeforeInThisMonth<$leaveDetails[$j]->leaveDate  ){
                  $ServProLeaveCount = $ServProLeaveCount + 1;
               }
            }

            //check whether the limit has exceeded or not 
            $reducingAmount =0;
            if($generalLeaveLimit<$ServProLeaveCount){
              $exceededCount = $ServProLeaveCount - $generalLeaveLimit;
              $reducingAmount  = $exceededCount*250;
            }
            
            $totalSalary = $servProSalaryRate + $totalIncomeFromRes - $reducingAmount;
            
         }
         elseif ($staffDetails[$i]->staffType == 4)
         {
            // print_r($staffDetails[$i]->staffID);
            $recepSalaryRate = $this->customQuery("SELECT salaryrates.receptionistSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            $recepLeaveDetails = $this->customQuery("SELECT * FROM generalleaves WHERE staffID = '$staffID'  AND status IN (1,3)");
            $AllLeaveCount = sizeof($recepLeaveDetails);
             // condition to check the data is added in between previous month 5 days before and this month five days before
             for ($j = 0; $j < $AllLeaveCount; $j++)
             {
                // condition to check the data is added in between previous month 5 days before and this month five days before
                 if($fiveDaysBeforInPrevMonth>$leaveDetails [$j]->leaveDate  && $fiveDaysBeforeInThisMonth<$leaveDetails[$j]->leaveDate  ){
                   $recepLeaveCount = $recepLeaveCount + 1;
                }
             }

             //check whether the limit has exceeded or not 
             $reducingAmount =0;
             if($generalLeaveLimit<$recepLeaveCount){
               $exceededCount = $recepLeaveCount - $generalLeaveLimit;
               $reducingAmount  = $exceededCount*250;
             }
             
             // Calculate the salary amount
             $totalSalary = $recepSalaryRate - $reducingAmount;
             
         }

         elseif ($staffDetails[$i]->staffType == 3)
         {
            $managerSalary = 0;
            // get mng basuc salary 
            $mangSalaryRate = $this->customQuery("SELECT salaryrates.managerSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            // get mng leave details
            $mangLeaveDetails = $this->customQuery("SELECT * FROM managerleaves WHERE staffID = '$staffID'  AND status IN (1,3)");
            $AllLeaveCount = sizeof($mangLeaveDetails);
            // condition to check the data is added in between previous month 5 days before and this month five days before
            for ($j = 0; $j < $AllLeaveCount; $j++)
            {
               // condition to check the data is added in between previous month 5 days before and this month five days before
                if($fiveDaysBeforInPrevMonth>$leaveDetails [$j]->leaveDate  && $fiveDaysBeforeInThisMonth<$leaveDetails[$j]->leaveDate  ){
                  $mangLeaveCount = $mangLeaveCount + 1;
               }
            }

            //check whether the limit has exceeded or not 
            $reducingAmount =0;
            if($generalLeaveLimit<$recepLeaveCount){
              $exceededCount = $mangLeaveCount - $mangGeneralLeaveLimit;
              $reducingAmount  = $exceededCount*250;
            }

            // Calculate the salary amount
            $mangTotalSalary = $mangSalaryRate - $reducingAmount;                  
           }
      }
      die("servDetails awa");
   }




}
