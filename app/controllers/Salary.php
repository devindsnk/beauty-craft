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
      die("success");
      print_r($staffType);
      // die("success");
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

   public function salaryTableView()
   {
      //mase awasana dwsd ndd -checked
      //mase awasana dwsa neweinm awasaneta calculate krpu eka pennanna one salary payment table eken aran
      // mase awasana dws nm check krnna one klin calcultae krld ndd
      // calculate krlnm e calculate krpu eka pennna one
      // calculate krl naththm eka calculate wenna one

      //Last day of current month.
      $lastDayThisMonth = date("Y-m-t");
      //current date
      $currentDate = date('Y-m-d');
      //current month
      $currentDateStrTime = strtotime($currentDate);
      $currentDateMonth = date("F", $currentDateStrTime);
      $currentDateYear = date("Y", $currentDateStrTime);

      //last inputed month into database
      $result = $this->salaryModel->lastInputedMonth();
      print_r($result[0]->month);
      $mostRecentDate = strtotime($result[0]->month);
      $mostRecentDateMonth = date("F", $mostRecentDate);
      $mostRecentDateYear = date("Y", $mostRecentDate);
      $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails();
      die("error");
      // check whetather the today is the last date of this month
      if ($currentDate == $lastDayThisMonth)
      {

         // to check whether the payment has done or not in this month
         //if the most recent month is equal to the current month then the calculation has done i this month

         if ($currentDateMonth == $mostRecentDateMonth && $mostRecentDateYear == $currentDateYear)
         {

            // get all the salary payment details related to the most recent month
            $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails();
         }
         // if the most recent month is not equal to the current month then the payment has'nt completed
         else
         {
            //calculate the salary for this month and store in salary table with status not paid
            $result = $this->salaryModel->calculateAndInsertSalaryPaymentDetails();
         }
      }

      if ($currentDate != $lastDayThisMonth)
      {

         //get data according to most recent month
         $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails();
      }

      die("date succcess");
      $staffDetails = $this->staffModel->getAllStaffDetails();
      $salaryRateDetails = $this->salaryModel->getAllSalaryRateDetails();
      $leaveRateDetails = $this->salaryModel->getAllLeaveRateDetails();
      $commisionRateDetails = $this->salaryModel->getAllCommisionRateDetails();
      $StaffAndSalaryPaymentDetails = $this->salaryModel->getAllStaffAndSalaryPaymentDetails();
      $AllSalaryDetails = ['staffD' => $staffDetails, 'salaryRateD' => $salaryRateDetails, 'leaveRateD' => $leaveRateDetails, 'commisionRateD' => $commisionRateDetails, 'StaffAndSalaryPaymentD' => $StaffAndSalaryPaymentDetails];
      print_r($AllSalaryDetails);
      $this->view('owner/own_salaries', $AllSalaryDetails);
   }
}
