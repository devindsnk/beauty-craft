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
        // die("hello");

        if (empty($data['sSelectedType'])){
            $this->db->query("INSERT INTO services (name, price, type, totalDuration, status) VALUES(:sName, :sPrice, :sNewType, :sSlot1Duration, 'active')");
            $this->db->bind(':sNewType', $data['sNewType']);
        }else{
            $this->db->query("INSERT INTO services (name, price, type, totalDuration, status) VALUES(:sName, :sPrice, :sSelectedType, :sSlot1Duration,'active')");
            $this->db->bind(':sSelectedType', $data['sSelectedType']);
        }
        

        $this->db->bind(':sName', $data['sName']);
        $this->db->bind(':sPrice', $data['sPrice']);
        $this->db->bind(':sSlot1Duration', $data['sSlot1Duration']);

        $this->db->execute();
    }

    public function addServiceProvider($data){

        foreach($data['sSelectedProv'] as $SelectedProv){

            $this->db->query("INSERT INTO serviceproviders (serviceID, staffID) SELECT MAX(serviceID), '$SelectedProv' FROM services");

            $this->db->execute();
        }

    }

    public function addTimeSlot($data){
        
        $slotDuration = $data['sSlot1Duration'];

        $this->db->query("INSERT INTO timeslots (serviceID, slotNo, duration) SELECT MAX(serviceID), '1', '$slotDuration'  FROM services");

        $this->db->execute();

    }

    public function addResourcesToService($data){

        foreach($data['sSelectedResourse'] as $SelectedResourse){

            $this->db->query("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '1', '$SelectedResourse', '10' FROM services");

            $this->db->execute();
        }

    }

    public function getServiceProviderDetails(){
        // die("hello");
        
        $this->db->query("SELECT staffID,fName,lName FROM staff WHERE staffType=1"); 
        
        $result = $this->db->resultSet();

        // print_r($result);

        return $result;
    }

    public function getServiceTypeDetails(){
        // die("hello");

        $this->db->query("SELECT DISTINCT type From services");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getResourceDetails(){
        $this->db->query("SELECT resourceID, name, quantity From resources");

        $result = $this->db->resultSet();

        return $result;
    }
}