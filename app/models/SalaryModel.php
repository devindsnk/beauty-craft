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
   
   public function getAllStaffAndSalaryPaymentDetails()
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
   public function calculateAndInsertSalaryPaymentDetails()
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
         
            $leaveCount = sizeof($leaveDetails);
            
            $resCount = sizeof($resDetails);
            for ($j = 0; $j < $resCount; $j++)
            {
               // condition to check the data is added in between previous month 5 days before and this month five days before
               //  if(){
               $servDetails[$j] = $this->getSingle('services', ['price'], ['serviceID' => $resDetails[$j]->serviceID, 'status' => 1]);
               print_r($servDetails[$j]->price);
               // print_r(type($servDetails->price)); 
               // }
            }
         }

         elseif ($staffDetails[$i]->staffType == 4)
         {
            // print_r($staffDetails[$i]->staffID);
            $recepSalaryRate = $this->customQuery("SELECT salaryrates.receptionistSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");

            $recepLeaveDetails = $this->customQuery("SELECT * FROM generalleaves WHERE staffID = '$staffID'  AND status IN (1,3)");
             // condition to check the data is added in between previous month 5 days before and this month five days before
            //  if(){
            // $leaveCount = sizeof($leaveDetails);
            // }
         }

         elseif ($staffDetails[$i]->staffType == 3)
         {
            $managerSalary = 0;
            // print_r($staffDetails[$i]->staffID);
            // get mng basuc salary 
            $mangSalaryRate = $this->customQuery("SELECT salaryrates.managerSalaryRate FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
            // get mng leave details
            $mangLeaveDetails = $this->customQuery("SELECT * FROM managerleaves WHERE staffID = '$staffID'  AND status IN (1,3)");
             // condition to check the data is added in between previous month 5 days before and this month five days before
            //  if(){
            $mangLeaveCount = sizeof($mangLeaveDetails);
                  if($mangLeaveCount>$mangGeneralLeaveLimit){
                     //calculate extra leaves that manager have taken
                     $extraLeaves = $mangLeaveCount - $mangGeneralLeaveLimit;
                     // calculating reducing amount
                     $reduceAmount = $extraLeaves*250;
                     $managerSalary = $mangSalaryRate-$reduceAmount;
                  }
                  else {
                     $managerSalary = $mangSalaryRate;

                     // insert  to insert data to payment details table

                  }
            // }
         }
      }
      die("servDetails awa");
   }




}
