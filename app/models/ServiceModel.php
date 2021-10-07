<?php
class ServiceModel{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function service($data){
        $this->addService($data);
    }

    public function addService($data){
        $this->db->query("INSERT INTO services (sName, sPrice, status) VALUES(,:sName, :sPrice, 'active')");

        $this->db->bind(':sName', $data['sName']);
        $this->db->bind(':sPrice', $data['sPrice']);

        $this->db->execute();
    }

    public function getServiceProviderDetails(){
        $this->db->query("SELECT staffID,fname,lname From staff WHERE staffType='serviceProvider'"); 
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getServiceTypeDetails(){
        $this->db->query("SELECT DISTINCT service_type From services");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getResourceDetails(){
        $this->db->query("SELECT resourceID, rname, quantity From resources");

        $result = $this->db->resultSet();

        return $result;
    }
}