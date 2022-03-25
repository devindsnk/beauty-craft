<?php
class RatesModel extends Model
{
   public function updateLeaveLimitDeatils($data)
   {
      $this->insert('leavelimits', ['generalLeave' => $data['generalLeave'], 'medicalLeave' => $data['medicalLeave'], 'managerGeneralLeave' => $data['managerGeneralLeave'], 'managerMedicalLeave' => $data['managerMedicalLeave'], 'managerDailyLeave' => $data['managerDailyLeave'],], null);
   }

   public function updateSalaryRateDetails($data)
   {
      $this->insert('salaryrates', ['managerSalaryRate' => $data['managerSalaryRate'], 'receptionistSalaryRate' => $data['receptionistSalaryRate'], 'serviceProviderSalaryRate' => $data['serviceProviderSalaryRate']], null);
   }

   public function updateCommissionRateDetails($data)
   {
      $this->insert('commissionrates', ['rate' => $data['rate']], null);
   }

   public function updateMinimumNumberOfManagers($data)
   {
      $this->insert('minimumnumberofmanagers', ['minimumNumber' => $data['minimumNumber']], null);
   }

   public function getLeaveLimitsDetails()
   {
      // $result = $this->getResultSet('leavelimits', '*', null);
      $result = $this->customQuery("SELECT * FROM leavelimits ORDER BY changedDate DESC LIMIT 1");
      return $result;
   }
   public function getSalaryRateDetails()
   {
      // $result = $this->getResultSet('salaryrates', '*', null);
      $result = $this->customQuery("SELECT * FROM salaryrates ORDER BY changedDate DESC LIMIT 1");
      return $result;
   }

   public function getCommissionRateDetails()
   {
      // $result = $this->getResultSet('commissionrates', '*', null);
      $result = $this->customQuery("SELECT * FROM commissionrates ORDER BY changedDate DESC LIMIT 1");
      return $result;
   }

   // public function getMinimumNumberOfManagers()
   // {
   //    $result = $this->getResultSet('minimumnumberofmanagers', '*', null);
   //    return $result;
   // }
}
