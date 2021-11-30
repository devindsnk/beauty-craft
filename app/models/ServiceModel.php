<?php
class ServiceModel extends Model
{
    public function service($data)
    {
        $this->addService($data);
    }

    public function addService($data)
    {
        if (empty($data['sSelectedType']))
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sNewType'], 'totalDuration' => $data['totalDuration'], 'status' => 1]);
        }
        else
        {
            $this->insert('services', ['name' => $data['name'], 'customerCategory' => $data['customerCategory'], 'price' => $data['price'], 'type' => $data['sSelectedType'], 'totalDuration' => $data['totalDuration'], 'status' => 1]);
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
        $slotNo++;
        $slotDuration = $data['totalDuration'];

        $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, duration) SELECT MAX(serviceID), '$slotNo', '$slotDuration'  FROM services", []);
    }

    public function addResourcesToService($data, $slotNo)
    {
        $slotNo++;
        $i = 0;

        foreach ($data['sResArray'] as $ResoursesArray)
        {
            if ($data['sSelectedResCount'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount'][$i];
                
                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '$slotNo', '$ResoursesArray->resourceID','$selCount' FROM services", []);

            }
            $i++;
        }
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

    public function getAllocatedResourceDetails($serviceID)
    {
        $results = $this->customQuery("SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                          FROM resources 
                          INNER JOIN resourceallocation
                          ON resources.resourceID = resourceallocation.resourceID
                          WHERE resourceallocation.serviceID=:sID",
                          [':sID' => $serviceID] 
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
