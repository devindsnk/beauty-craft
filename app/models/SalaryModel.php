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
      // echo $mostRecentDateMonth . $mostRecentDateYear;
      $result = $this->customQuery(
         "SELECT * FROM staff INNER JOIN salarypayments ON staff.staffID = salarypayments.staffID WHERE MONTH(paidDate)=$mostRecentDateMonth AND YEAR(paidDate)= $mostRecentDateYear");
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
      $currentDate = date('Y-m-d');
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
           // get commisssion rate for services
           $serCommissionRate = $this->customQuery("SELECT commissionrates.rate FROM commissionrates ORDER BY changedDate DESC LIMIT 1");
          
         if ($staffDetails[$i]->staffType == 5)
         {
            // get service provider basic salary rate
            $servProSalaryRate = $this->customQuery("SELECT salaryrates.serviceProviderSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
   
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

            $commissionAmount = $totalIncomeFromRes*($serCommissionRate/100);
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
              $totalSalary = $servProSalaryRate + $commissionAmount - $reducingAmount;
              $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0,'additionalLeaveCount' => $exceededCount,'servProCommission' => $commissionAmount]);
            }
            else{
            $totalSalary = $servProSalaryRate + $commissionAmount ;
            $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0,'servProCommission' => $commissionAmount]);
            }
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
               $totalSalary = $recepSalaryRate - $reducingAmount;
               $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0,'additionalLeaveCount' => $exceededCount]);
             }
             else{
             // Calculate the salary amount
             $totalSalary = $recepSalaryRate;
             $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0]);
             }
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
              // Calculate the salary amount with extra leaves
              $mangTotalSalary = $mangSalaryRate - $reducingAmount;  
              $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0,'additionalLeaveCount' => $exceededCount]);
            }
            else{
            // Calculate the salary amount
            $mangTotalSalary = $mangSalaryRate;  
            $results =  $this->insert('salarypayments', ['staffID ' => $staffID,'month '=>$currentDate , 'amount' => $mangTotalSalary, 'status' => 0,]);                
            }  
         }
      }
      die("servDetails awa");
   }




}
