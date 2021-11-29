<?php
class RatesModel extends Model
{

   public function updateLeaveLimitDeatils($data)
   {
      // print_r($data);
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $result= $this->insert('leavelimits', ['managerLeaveLimit'=> $data['managerLeaveLimit'],'serviceProviderLeaveLimit'=> $data['serviceProviderLeaveLimit'], 'receptionistLeaveLimit' => $data['receptionistLeaveLimit']],null);
     var_dump($result);
   }

   public function updateSalaryRateDetails($data)
   {
      // print_r($data);
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $this->insert('salaryrates', ['managerSalaryRate'=> $data['managerSalaryRate'], 'receptionistSalaryRate'=> $data['receptionistSalaryRate'],'serviceProviderSalaryRate' => $data['serviceProviderSalaryRate']],null);
   }

   public function updateCommissionRateDetails($data)
   {
      $this->insert('commissionrates', ['commisionRate' => $data['commisionRate']],null);
   }

   public function updateMinimumNumberOfManagers($data)
   {
       print_r($data);
      $this->insert('minimumnumberofmanagers', ['minimumNumber' => $data['minimumNumberOfManagers']],null);
   }


   
//    public function updateLeaveLimit($data)
//    {
//       print_r($data);
//       // $this->db->query("INSERT INTO staff(ImageColumn) 
//       // SELECT BulkColumn 
//       // FROM Openrowset( Bulk 'image..Path..here', Single_Blob) as img
//       // ");
//       $this->db->query("INSERT INTO staff(image, fName, lName, staffType, mobileNo, gender, nic, address, email, dob, status) VALUES(:image, :fName, :lName, :staffType , :mobileNo, :gender, :nic, :address, :email, :dob , '1')");
      
//       $this->db->bind(':image', $data['staffimage']);
//       $this->db->bind(':fName', $data['staffFname']);
//       $this->db->bind(':lName', $data['staffLname']);
//       $this->db->bind(':staffType', $data['staffType']);
//       $this->db->bind(':mobileNo', $data['staffContactNum']);
//       $this->db->bind(':gender', $data['gender']);
//       $this->db->bind(':nic', $data['staffNIC']);
//       $this->db->bind(':address', $data['staffHomeAdd']);
//       $this->db->bind(':email', $data['staffEmail']);
//       $this->db->bind(':dob', $data['staffDOB']);

//       $this->db->execute();
//    }

public function getLeaveLimitsDetails()
{
   // $this->db->query("SELECT * FROM leavelimits");
   $result = $this->getResultSet('leavelimits','*',['ORDER BY id DESC LIMIT 1']);
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


