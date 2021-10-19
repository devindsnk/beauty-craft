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

    public function addTimeSlot($data, $slotNo){
        $slotNo++;

        $slotDuration = $data['sSlot1Duration'];

        $this->db->query("INSERT INTO timeslots (serviceID, slotNo, duration) SELECT MAX(serviceID), '$slotNo', '$slotDuration'  FROM services");

        $this->db->execute();

    }

    public function addResourcesToService($data, $slotNo){
        $slotNo++;
        
        $i=0;

        foreach($data['sResArray'] as $ResoursesArray){

            if($data['sSelectedResCount'][$i]!=0){
                $selCount =$data['sSelectedResCount'][$i];
                $this->db->query("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '$slotNo', '$ResoursesArray->resourceID','$selCount' FROM services");

                $this->db->execute();
            }
            $i++;

        }

    }

    public function getServiceDetails(){

        $this->db->query("SELECT * FROM services"); 
        
        $result = $this->db->resultSet();

        return $result;
    }
    
    public function getServiceProviderDetails(){
        
        $this->db->query("SELECT staffID,fName,lName FROM staff WHERE staffType=1"); 
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getServiceTypeDetails(){

        $this->db->query("SELECT DISTINCT type From services");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getResourceDetails(){

        $this->db->query("SELECT resourceID, name, quantity From resources");

        $result = $this->db->resultSet();

        return $result;
    }

    public function getOneServiceDetail($serviceID){

        $this->db->query("SELECT * 
                          FROM services 
                          WHERE serviceID='$serviceID'
                          "); 
        
        $result = $this->db->resultSet();

        return $result;
    }

    public function getOneServicesSProvDetail($serviceID){

        $this->db->query("SELECT serviceproviders.staffID,staff.fName,staff.lName 
                          FROM staff 
                          
                          INNER JOIN serviceproviders
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID='$serviceID'

                          "); 

        $result = $this->db->resultSet();

        return $result;
    }

    public function getAllocatedResourceDetails($serviceID){

        $this->db->query("SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                          FROM resources 
                          
                          INNER JOIN resourceallocation
                          ON resources.resourceID = resourceallocation.resourceID
                          WHERE resourceallocation.serviceID='$serviceID'

                          "); 

        $result = $this->db->resultSet();

        return $result;
    }
}