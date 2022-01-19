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

   public function salaryPayWithStaffID($staffID, $month)
   {  
      // die("salaryPayWithStaffID");    
      $this->salaryModel->payNowSalaryWithStaffID($staffID,$month);
   }

   public function salaryTableView($sType="all", $sMonth="all")
   {

      // Last day of current month.
      $lastDayThisMonth = date("Y-m-t");

      // current date
      $currentDate = date('Y-m-d');

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
      // die("error");

      // check whetather the today is the last date of this month
      if ($currentDate == $lastDayThisMonth)
      {
         // to check whether the payment has done or not in this month
         // if the most recent month is equal to the current month then the calculation has done i this month

         if ($currentDateMonth == $mostRecentDateMonth && $mostRecentDateYear == $currentDateYear)
         {
            // get all the salary payment details related to the most recent month
            $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($sType,$sMonth);
            $data = [ 
               'selectedType' => $sType, 
               // 'selectedStaffName' => $sName, 
               'selectedMonth' => $sMonth, 
               'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
            ]; 
      
            // print_r($data); 
            // die("error");  
            $this->view('owner/own_salaries', $data);
         }
            // if the most recent month is not equal to the current month then the payment has'nt completed
         else
         {
            // calculate the salary for this month and store in salary table with status not paid
            $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails($fiveDaysBeforInPrevMonth,$fiveDaysBeforeInThisMonth);
            $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($sType,$sMonth);
            $data = [ 
               'selectedType' => $sType, 
               // 'selectedStaffName' => $sName, 
               'selectedMonth' => $sMonth, 
               'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
            ]; 
      
            // print_r($data); 
            // die("error");  
            $this->view('owner/own_salaries', $data);
         }
      }

      elseif ($currentDate != $lastDayThisMonth)
      {
         
         $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails($sType,$sMonth);
         $data = [ 
            'selectedType' => $sType, 
            // 'selectedStaffName' => $sName, 
            'selectedMonth' => $sMonth, 
            'allStaffSalaryDetailsList' => $StaffAndSalaryPaymentDetails 
         ]; 
   
         print_r($data); 
         // die("error");  
         $this->view('owner/own_salaries', $data);
      }

   }
}
