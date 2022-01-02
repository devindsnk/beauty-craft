<?php
class RatesModel extends Model
{


   public function updateLeaveLimitDeatils($data)
   {
      // print_r($data);
      // die("updateLeaveLimitDeatils");
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $result= $this->insert('leavelimits', ['generalLeave'=> $data['generalLeave'],'medicalLeave'=> $data['medicalLeave'], 'managerGeneralLeave' => $data['managerGeneralLeave'], 'managerMedicalLeave' => $data['managerMedicalLeave'], 'managerDailyLeave' => $data['managerDailyLeave'], 'evidenceLimit' => $data['evidenceLimit']],null);
     var_dump($result);
   }

   public function updateSalaryRateDetails($data)
   {
      // print_r($data);
      // die("updateSalaryRateDetails");
      // print_r($data);
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $this->insert('salaryrates', ['managerSalaryRate'=> $data['managerSalaryRate'], 'receptionistSalaryRate'=> $data['receptionistSalaryRate'],'serviceProviderSalaryRate' => $data['serviceProviderSalaryRate']],null);
   }

   public function updateCommissionRateDetails($data)
   {
      print_r($data);
      die("updateCommissionRateDetails");
      $this->insert('commissionrates', ['rate' => $data['rate']],null);
   }

   public function updateMinimumNumberOfManagers($data)
   {
      print_r($data);
      die("updateMinimumNumberOfManagers");
       print_r($data);
      $this->insert('minimumnumberofmanagers', ['minimumNumber' => $data['minimumNumber']],null);
   }


public function getLeaveLimitsDetails()
{
   // $this->db->query("SELECT * FROM leavelimits");
   // $result = $this->getResultSet('leavelimits','*',['ORDER BY id DESC LIMIT 1']);
   $result = $this->getResultSet('leavelimits','*',null);
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}
public function getSalaryRateDetails()
{
   // $this->db->query("SELECT * FROM salaryrates");
      $result = $this->getResultSet('salaryrates','*',null);
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}

public function getCommissionRateDetails()
{
   // $this->db->query("SELECT * FROM commissionrates");
   $result = $this->getResultSet('commissionrates','*',null);
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}

public function getMinimumNumberOfManagers()
{
   // $this->db->query("SELECT * FROM commissionrates");
   $result = $this->getResultSet('minimumnumberofmanagers','*',null);
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}


}


