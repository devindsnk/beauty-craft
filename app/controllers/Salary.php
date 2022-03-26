<?php
class Salary extends Controller
{
   public function __construct()
   {
      $this->staffModel = $this->model('StaffModel');
      $this->salaryModel = $this->model('SalaryModel');
      $this->leaveModel = $this->model('LeaveModel');
   }

   public function salaryReport($staffID, $staffType)
   {      
      $staffdetailsBystaffID = $this->staffModel->getStaffDetailsByStaffID($staffID);
      $bankdetailsBystaffID = $this->staffModel->getStaffBankDetailsByStaffID($staffID);
      if ($staffType == 3)
      {
         $managerLeaveBystaffID = $this->leaveModel->managerCasualLeaveByStaffID($staffID);
      }

      else
      {
         $casualLeaveBystaffID = $this->leaveModel->casualLeaveByStaffID($staffID);
      }

      $salaryRateD = $this->salaryModel->getAllSalaryRateDetails();
      $leaveRateD = $this->salaryModel->getAllLeaveRateDetails();
      $commisionRateD = $this->salaryModel->getAllCommisionRateDetails();
      $StaffSalaryPaymentD = $this->salaryModel->getAllStaffSalaryPaymentDetailsByStaffID($staffID);

      $AllSalaryReportDetails = ['staffD' => $staffdetailsBystaffID, 'bankD' => $bankdetailsBystaffID, 'salaryRateD' => $salaryRateD, 'leaveRateD' => $leaveRateD, 'commisionRateD' => $commisionRateD, 'StaffSalaryPaymentD' => $StaffSalaryPaymentD];
      $this->view('owner/own_salaryReportView', $AllSalaryReportDetails);
   }

   public function salaryPayWithStaffID($staffID, $month,$mobileNo)
   {  
      $this->salaryModel->payNowSalaryWithStaffID($staffID,$month);
      SMS::sendSalaryPaySMS($mobileNo);
      header('location: ' . URLROOT . '/Salary/salaryTableView');
   }
   public function salaryPayMultipleStaffID($staffIDs, $months)
   {  
      $noOfStaffMembers = sizeof($staffIDs);
      for($i=0;$i<$noOfStaffMembers;$i++){    
      $this->salaryModel->payNowSalaryWithStaffID($staffIDs[$i],$months[$i]);
      }
      header('location: ' . URLROOT . '/Salary/salaryTableView');
      // $this->view('owner/own_salaries');
   }

   public function salaryTableView($staffName="all", $staffID="all",$paidType="all",$month="all")
   {
      // Last day of current month.
      $lastDayThisMonth = date("Y-m-t");
      
      // current date
      // $currentDate = date('Y-m-d');
      $currentDate =  $lastDayThisMonth;

      // date before five days from last date of previous month
      $date = new DateTime();
      $date->modify("last day of previous month");
      $lastDateOfPrevMonth=$date->format("Y-m-d");
      $time = strtotime( $lastDateOfPrevMonth .'-5 days');
      $fiveDaysBeforInPrevMonth = date("Y-m-d", $time);

      // date before five days from last date of this month
      $time = strtotime( $lastDayThisMonth .'-5 days');
      $fiveDaysBeforeInThisMonth = date("Y-m-d", $time);

      // $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth,$fiveDaysBeforeInThisMonth);

      // current month & year (?)
      $currentDateStrTime = strtotime($currentDate);
      $currentDateMonth = date("F", $currentDateStrTime);
      $currentDateYear = date("Y", $currentDateStrTime);

      // last inputed month into database
      $result = $this->salaryModel->lastInputedMonth();
      // print_r($result[0]->month);
      $mostRecentDate = strtotime($result[0]->month);
      $mostRecentDateMonth = date("F", $mostRecentDate);
      $mostRecentDateYear = date("Y", $mostRecentDate);
      $RecentmonthInNumber = date("m",strtotime($mostRecentDate));
      // $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth,$fiveDaysBeforeInThisMonth);

      // check whetather the today is the last date of this month
      if ($currentDate == $lastDayThisMonth)
      {
         // to check whether the payment has done or not in this month
         // if the most recent month is equal to the current month then the calculation has done i this month

         if ($currentDateMonth == $mostRecentDateMonth && $mostRecentDateYear == $currentDateYear)
         {
            // die("payments has done condition called in last day of the month");
            // get all the salary payment details related to the most recent month
            $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($staffName,$staffID,$paidType,$month);
            $data = [ 
               'nameTyped' => $staffName, 
               'staffIDSelected' => $staffID, 
               'paidTypeSelected' => $paidType, 
               'selectedMonth' => $month,
               'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
            ];  
      
            $this->view('owner/own_salaries', $data);
         }
            // if the most recent month is not equal to the current month then the payment has'nt completed
         else
         {
            // die("payments has to be done condition called in last day of the month");
            // calculate the salary for this month and store in salary table with status not paid
            $this->salaryModel->beginTransaction();
            $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth,$fiveDaysBeforeInThisMonth);
            $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($staffName,$staffID,$paidType,$month);
            $this->salaryModel->commit();
            $data = [ 
               'nameTyped' => $staffName, 
               'staffIDSelected' => $staffID, 
               'paidTypeSelected' => $paidType, 
               'selectedMonth' => $month,
               'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
            ]; 
      
            $this->view('owner/own_salaries', $data);
         }
      }

      elseif ($currentDate != $lastDayThisMonth)
      {
         // die("payments has done condition called not in last day of the month");
         $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($staffName,$staffID,$paidType,$month);
            $data = [ 
               'nameTyped' => $staffName, 
               'staffIDSelected' => $staffID, 
               'paidTypeSelected' => $paidType, 
               'selectedMonth' => $month,
               'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
            ];   
         $this->view('owner/own_salaries', $data);
      }

   }
}
