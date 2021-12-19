<?php
class ServiceModel extends Model
{
    public function service($data)
    {
        $this->addService($data);
    }

    public function addService($data,$slotNo)
    {
        $noofTimeSlots = 1;

        $totalTimeDuration = (int)$data['slot1Duration']+(int)$data['slot2Duration']+(int)$data['slot3Duration']+(int)$data['interval1Duration']+(int)$data['interval2Duration'];
        
        if($slotNo==1){
            $noofTimeSlots=2;
        }elseif($slotNo==2){
            $noofTimeSlots=3;
        }

        if (empty($data['sSelectedType']))
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sNewType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'status' => 1]);
        }
        else
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sSelectedType'], 'noofTimeSlots' => $noofTimeSlots, 'totalDuration' => $totalTimeDuration, 'status' => 1]);
        }
    }

    public function addServiceProvider($data)
    {
        foreach ($data['sSelectedProv'] as $SelectedProv)
        {
            $this->customQuery("INSERT INTO serviceproviders (serviceID, staffID) SELECT MAX(serviceID), '$SelectedProv' FROM services", []);
        }
    }

    public function addTimeSlot($data, $slotNo)
    {
        $startingTime1=0;
        $startingTime2=(int)$data['slot1Duration']+(int)$data['interval1Duration'];
        $startingTime3=$startingTime2+(int)$data['slot2Duration']+(int)$data['interval2Duration'];

        // print_r($startingTime1);
        // print_r($startingTime2);
        // print_r($startingTime3);
        // die('ffff');

        if($slotNo==0){
            $slot1Duration = $data['slot1Duration'];

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1' ,'$slot1Duration'  FROM services", []);

        }elseif($slotNo==1){
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];
           

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1','$slot1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '2', '$startingTime2', '$slot2Duration'  FROM services", []);

        }elseif($slotNo==2){
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];
            $slot3Duration = $data['slot3Duration'];

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1', '$slot1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '2', '$startingTime2','$slot2Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '3', '$startingTime3','$slot3Duration'  FROM services", []);
        }
        
        // $slot1Duration = $data['slot1Duration'];

        // $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, duration) SELECT MAX(serviceID), '$slotNo', '$slot1Duration'  FROM services", []);
    }
    public function addIntervalTimeSlot($data, $slotNo){

        if($slotNo==1){
            $interval1Duration = $data['interval1Duration'];
           
            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '2', '$interval1Duration'  FROM services", []);

        }elseif($slotNo==2){
            $interval1Duration = $data['interval1Duration'];
            $interval2Duration = $data['interval2Duration'];
           
            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '2', '$interval1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '3', '$interval2Duration'  FROM services", []);

        }
    }

    public function addResourcesToService($data, $slotNo)
    {
       
        $i = 0;

        foreach ($data['sResArray'] as $ResoursesArray)
        {
            if ($data['sSelectedResCount2'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount2'][$i];
                
                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '2', '$ResoursesArray->resourceID','$selCount' FROM services", []);

            }
            $i++;
        }
        
        $i = 0;

        foreach ($data['sResArray'] as $ResoursesArray)
        {
            if ($data['sSelectedResCount3'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount3'][$i];
                
                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '3', '$ResoursesArray->resourceID','$selCount' FROM services", []);

            }
            $i++;
        }
    
        $i = 0;

        foreach ($data['sResArray'] as $ResoursesArray)
        {
            if ($data['sSelectedResCount1'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount1'][$i];
                
                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '1', '$ResoursesArray->resourceID','$selCount' FROM services", []);

            }
            $i++;
        }

        // foreach ($data['sResArray'] as $ResoursesArray)
        // {
        //     if ($data['sSelectedResCount1'][$i] != 0)
        //     {
        //         $selCount = $data['sSelectedResCount1'][$i];
                
        //         $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '$slotNo', '$ResoursesArray->resourceID','$selCount' FROM services", []);

        //     }
        //     $i++;
        // }
    }

    public function getServiceDetails()
    {
        $results = $this->getResultSet("services", "*", []);
        
        return $results;
    }

    // Suggestion to rename this to getAllServiceProvidersData
    public function getServiceProviderDetails()
    {
        $results = $this->getResultSet('staff', ['staffID', 'fName', 'lName'], ['staffType' => 5]);
        
        return $results;
    }

    // Suggestion to rename this to getAllServiceTypes
    public function getServiceTypeDetails()
    {
        $results = $this->customQuery("SELECT DISTINCT type FROM services", []);
        
        return $results;
    }


    public function getResourceDetails()
    {   
        $results = $this->getResultSet('resources', ['resourceID', 'name', 'quantity'], null);
        
        return $results;
    }

    public function getNoofSlots($serviceID){
        $noofSlots = $this->getResultSet('services', ['noofTimeSlots'], ['serviceID' => $serviceID]);
        $x=$noofSlots[0]->noofTimeSlots;
        return $x;
    }

    public function getOneServiceDetail($serviceID)
    { 
        $results = $this->getResultSet('services', '*', ['serviceID' => $serviceID]);
        
        return $results;
    }

    public function getOneServicesSProvDetail($serviceID)
    {
        $results = $this->customQuery("SELECT serviceproviders.staffID,staff.fName,staff.lName 
                          FROM staff 
                          INNER JOIN serviceproviders
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID=:sID", 
                          [':sID' => $serviceID]  
                        );
       
        return $results;
    }

    public function getSlot1Duration($serviceID)
    {
        $duration = $this->customQuery("SELECT duration 
                          FROM timeslots 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 1] 
                          );

        if($duration!=NULL){
            $x=$duration[0]->duration;
            return $x;
        }
    }
    public function getSlot2Duration($serviceID)
    {
        $duration = $this->customQuery("SELECT duration 
                          FROM timeslots 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 2] 
                          );

        if($duration!=NULL){
            $x=$duration[0]->duration;
            return $x;
        }
    }
    public function getSlot3Duration($serviceID)
    {
        $duration = $this->customQuery("SELECT duration 
                          FROM timeslots 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 3] 
                          );
        if($duration!=NULL){
            $x=$duration[0]->duration;
            return $x;
        }
    }

    public function getInterval1Duration($serviceID)
    {
        $duration = $this->customQuery("SELECT duration 
                          FROM intervals 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 2] 
                          );
        
        if($duration!=NULL){
            $x=$duration[0]->duration;
            return $x;
        }
        
    }
    public function getInterval2Duration($serviceID)
    {
        $duration = $this->customQuery("SELECT duration 
                          FROM intervals 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 3] 
                          );

        if($duration!=NULL){
            $x=$duration[0]->duration;
            return $x;
        }
    }

    public function getAllocatedResourceDetailsofSlot1($serviceID){
        
            $results = $this->customQuery("SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                          FROM resources 
                          INNER JOIN resourceallocation
                          ON resources.resourceID = resourceallocation.resourceID
                          WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 1] 
                          );
            return $results;
    }
    public function getAllocatedResourceDetailsofSlot2($serviceID){
        
            $results = $this->customQuery("SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                          FROM resources 
                          INNER JOIN resourceallocation
                          ON resources.resourceID = resourceallocation.resourceID
                          WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 2] 
                          );
            return $results;
       
    }
    public function getAllocatedResourceDetailsofSlot3($serviceID){
        
            $results = $this->customQuery("SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                          FROM resources 
                          INNER JOIN resourceallocation
                          ON resources.resourceID = resourceallocation.resourceID
                          WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo",
                          [':sID' => $serviceID , ':slotNo' => 3] 
                          );
            return $results;
    }
    public function getServiceProvidersByService($serviceID)
    {

        $results = $this->customQuery("SELECT staff.staffID, staff.fName, staff.lName
                          FROM staff 
                          INNER JOIN serviceproviders 
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID = :sID",
                          [':sID' => $serviceID]);

        return $results;
    }

    public function getServiceDuration($serviceID)
    {
        $results = $this->getResultSet('service', ['totalDuration'], ['serviceID' => $serviceID]);
        // $this->db->query("SELECT totalDuration FROM services WHERE serviceID = :serviceID");
        // $this->db->bind(':serviceID', $serviceID);
        // $result = $this->db->single();

        return $results->totalDuration;
    }

    // FOR MANAGER OVERVIEW
    public function getAvailableServiceCount(){

        $results = $this->getRowCount('services', ['status' => 1]);
        
        return $results;
    }
    public function getAvailableServiceProvidersCount(){

        $results = $this->customQuery("SELECT Count(DISTINCT staffID) AS serProvCount
                                    FROM serviceproviders", [] 
                                    );
        
        return $results;
    }
    // FOR MANAGER OVERVIEW
}