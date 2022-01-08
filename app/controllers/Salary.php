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
      print_r($staffType);
      // die("success");
      $staffdetailsBystaffID = $this->staffModel->getStaffDetailsByStaffID($staffID);
      $bankdetailsBystaffID = $this->staffModel->getStaffBankDetailsByStaffID($staffID);

      $casualLeaveBystaffID = $this->leaveModel->casualLeaveByStaffID($staffID, $staffType);
      $managerLeaveBystaffID = $this->leaveModel->managerCasualLeaveByStaffID($staffID, $staffType);

      $salaryRateD = $this->salaryModel->getAllSalaryRateDetails();
      $leaveRateD = $this->salaryModel->getAllLeaveRateDetails();
      $commisionRateD = $this->salaryModel->getAllCommisionRateDetails();
      $StaffSalaryPaymentD = $this->salaryModel->getAllStaffSalaryPaymentDetailsByStaffID($staffID);

      $AllSalaryReportDetails = ['staffD' => $staffdetailsBystaffID, 'bankD' => $bankdetailsBystaffID, 'salaryRateD' => $salaryRateD, 'leaveRateD' => $leaveRateD, 'commisionRateD' => $commisionRateD, 'StaffSalaryPaymentD' => $StaffSalaryPaymentD];
      $this->view('owner/own_salaryReportView', $AllSalaryReportDetails);
   }

   public function salaryTableView()
   {
      $staffDetails = $this->staffModel->getAllStaffDetails();
      $salaryRateDetails = $this->salaryModel->getAllSalaryRateDetails();
      $leaveRateDetails = $this->salaryModel->getAllLeaveRateDetails();
      $commisionRateDetails = $this->salaryModel->getAllCommisionRateDetails();
      $StaffSalaryPaymentDetails = $this->salaryModel->getAllStaffSalaryPaymentDetails();

      print_r($staffDetails);
      $AllSalaryDetails = ['staffD' => $staffDetails, 'salaryRateD' => $salaryRateDetails, 'leaveRateD' => $leaveRateDetails, 'commisionRateD' => $commisionRateDetails, 'StaffSalaryPaymentD' => $StaffSalaryPaymentDetails];
      print_r($AllSalaryDetails);
      $this->view('owner/own_salaries', $AllSalaryDetails);
   }
}
