<?php
class RatesModel
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function updateLeaveLimitDeatils($data)
   {
      // print_r($data);
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $this->db->query("UPDATE leavelimits SET managerLeaveLimit=:managerLeaveLimit, serviceProviderLeaveLimit=:serviceProviderLeaveLimit, receptionistLeaveLimit=:receptionistLeaveLimit" );
      
      $this->db->bind(':managerLeaveLimit', $data['managerLeaveLimit']);
      $this->db->bind(':serviceProviderLeaveLimit', $data['serviceProviderLeaveLimit']);
      $this->db->bind(':receptionistLeaveLimit', $data['receptionistLeaveLimit']);

      $this->db->execute();
   }

   public function updateSalaryRateDetails($data)
   {
      // print_r($data);
      // $this->db->query("INSERT INTO leavelimits(managerLeaveLimit, serviceProviderLeaveLimit, receptionistLeaveLimit ) VALUES(:managerLeaveLimit, :serviceProviderLeaveLimit, :receptionistLeaveLimit)");
      $this->db->query("UPDATE salaryrates SET managerSalaryRate=:managerSalaryRate, receptionistSalaryRate=:receptionistSalaryRate, serviceProviderSalaryRate=:serviceProviderSalaryRate" );
      
      $this->db->bind(':managerSalaryRate', $data['managerSalaryRate']);
      $this->db->bind(':receptionistSalaryRate', $data['receptionistSalaryRate']);
      $this->db->bind(':serviceProviderSalaryRate', $data['serviceProviderSalaryRate']);

      $this->db->execute();
   }

   public function updateCommissionRateDetails($data)
   {
      print_r($data);
      $this->db->query("UPDATE commissionrates SET rate=:commisionRate");
      
      $this->db->bind(':commisionRate', $data['commisionRate']);
      $this->db->execute();
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
   $this->db->query("SELECT * FROM leavelimits");
      $result = $this->db->resultSet();
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}
public function getSalaryRateDetails()
{
   $this->db->query("SELECT * FROM salaryrates");
      $result = $this->db->resultSet();
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}

public function getCommissionRateDetails()
{
   $this->db->query("SELECT * FROM commissionrates");
      $result = $this->db->resultSet();
      // die('success');
      // print_r($result);
      return $result;
   // $this->db->query('SELECT * FROM leavelimits WHERE defKey=(SELECT LAST_INSERT_ID()');
}


}


