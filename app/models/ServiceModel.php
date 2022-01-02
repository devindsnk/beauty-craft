<?php
class ServiceModel extends Model
{
    public function addService($data, $slotNo)
    {
        $noofTimeSlots = 1;

        $totalTimeDuration = (int)$data['slot1Duration'] + (int)$data['slot2Duration'] + (int)$data['slot3Duration'] + (int)$data['interval1Duration'] + (int)$data['interval2Duration'];

        if ($slotNo == 1)
        {
            $noofTimeSlots = 2;
        }
        elseif ($slotNo == 2)
        {
            $noofTimeSlots = 3;
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
        // print_r($data['sSelectedProv'][0]);
        // die('awa2');
        foreach ($data['sSelectedProv'] as $SelectedProv)
        {   
            // print_r($SelectedProv);
            // die('awa2');
            $this->customQuery("INSERT INTO serviceproviders (serviceID, staffID) SELECT MAX(serviceID), '$SelectedProv' FROM services", []);
        }
    }

    public function addTimeSlot($data, $slotNo)
    {
        $startingTime1 = 0;
        $startingTime2 = (int)$data['slot1Duration'] + (int)$data['interval1Duration'];
        $startingTime3 = $startingTime2 + (int)$data['slot2Duration'] + (int)$data['interval2Duration'];

        // print_r($startingTime1);
        // print_r($startingTime2);
        // print_r($startingTime3);
        // die('ffff');

        if ($slotNo == 0)
        {
            $slot1Duration = $data['slot1Duration'];

            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1' ,'$slot1Duration'  FROM services", []);
        }
        elseif ($slotNo == 1)
        {
            $slot1Duration = $data['slot1Duration'];
            $slot2Duration = $data['slot2Duration'];


            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '1', '$startingTime1','$slot1Duration'  FROM services", []);
            $this->customQuery("INSERT INTO timeslots (serviceID, slotNo, startingTime, duration) SELECT MAX(serviceID), '2', '$startingTime2', '$slot2Duration'  FROM services", []);
        }
        elseif ($slotNo == 2)
        {
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
    public function addIntervalTimeSlot($data, $slotNo)
    {

        if ($slotNo == 1)
        {
            $interval1Duration = $data['interval1Duration'];

            $this->customQuery("INSERT INTO intervals (serviceID, slotNo, duration) SELECT MAX(serviceID), '2', '$interval1Duration'  FROM services", []);
        }
        elseif ($slotNo == 2)
        {
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
            if ($data['sSelectedResCount1'][$i] != 0)
            {
                $selCount = $data['sSelectedResCount1'][$i];

                $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '1', '$ResoursesArray->resourceID','$selCount' FROM services", []);
            }
            $i++;
        }

        if ($slotNo == 1)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                if ($data['sSelectedResCount2'][$i] != NULL)
                {
                    $selCount = $data['sSelectedResCount2'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '2', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                $i++;
            }
        }
        elseif ($slotNo == 2)
        {
            $i = 0;
            foreach ($data['sResArray'] as $ResoursesArray)
            {
                if ($data['sSelectedResCount2'][$i] != NULL)
                {
                    $selCount = $data['sSelectedResCount2'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '2', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                if ($data['sSelectedResCount3'][$i] != NULL)
                {
                    $selCount = $data['sSelectedResCount3'][$i];

                    $this->customQuery("INSERT INTO resourceallocation (serviceID, slotNo, resourceID, requiredQuantity) SELECT MAX(serviceID), '3', '$ResoursesArray->resourceID','$selCount' FROM services", []);
                }
                $i++;
            }
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

    public function getNoofSlots($serviceID)
    {
        $noofSlots = $this->getResultSet('services', ['noofTimeSlots'], ['serviceID' => $serviceID]);
        $x = $noofSlots[0]->noofTimeSlots;
        return $x;
    }

    public function getOneServiceDetail($serviceID)
    {
        $results = $this->getResultSet('services', '*', ['serviceID' => $serviceID]);

        return $results;
    }

    public function getOneServicesSProvDetail($serviceID)
    {
        $results = $this->customQuery(
            "SELECT serviceproviders.staffID,staff.fName,staff.lName 
                          FROM staff 
                          INNER JOIN serviceproviders
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID=:sID",
            [':sID' => $serviceID]
        );

        return $results;
    }

    public function getSlotDuration($serviceID, $slotNo)
    {
        if ($slotNo == 1)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                          FROM timeslots 
                          WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 1]
            );
        }
        elseif ($slotNo == 2)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM timeslots 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM timeslots 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        if ($duration != NULL)
        {
            $x = $duration[0]->duration;
            return $x;
        }
    }

    public function getIntervalDuration($serviceID, $slotNo)
    {
        if ($slotNo == 2)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM intervals 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $duration = $this->customQuery(
                "SELECT duration 
                        FROM intervals 
                        WHERE serviceID=:sID AND slotNo=:slotNo",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        if ($duration != NULL)
        {
            $x = $duration[0]->duration;
            return $x;
        }
    }

    public function getAllocatedResourceDetailsofSlot($serviceID, $slotNo)
    {

        if ($slotNo == 1)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 1]
            );
        }
        elseif ($slotNo == 2)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 2]
            );
        }
        elseif ($slotNo == 3)
        {
            $results = $this->customQuery(
                "SELECT resources.resourceID,resources.name,resourceallocation.requiredQuantity 
                                        FROM resources 
                                        INNER JOIN resourceallocation
                                        ON resources.resourceID = resourceallocation.resourceID
                                        WHERE resourceallocation.serviceID=:sID AND resourceallocation.slotNo=:slotNo AND resourceallocation.requiredQuantity <> 0",
                [':sID' => $serviceID, ':slotNo' => 3]
            );
        }

        return $results;
    }

    public function getServiceProvidersByService($serviceID)
    {

        $results = $this->customQuery(
            "SELECT staff.staffID, staff.fName, staff.lName
                          FROM staff 
                          INNER JOIN serviceproviders 
                          ON serviceproviders.staffID = staff.staffID
                          WHERE serviceproviders.serviceID = :sID",
            [':sID' => $serviceID]
        );

        return $results;
    }

    public function getServiceDuration($serviceID)
    {
        $results = $this->getSingle('services', ['totalDuration'], ['serviceID' => $serviceID]);

        return $results->totalDuration;
    }

    // START FOR MANAGER OVERVIEW
    public function getAllAvailableServices()
    {
        $results = $this->getResultSet("services",  "*",  ["status" => 1]);

        return $results;
    }
    
    public function getAvailableServiceCount()
    {
        $results = $this->getRowCount('services', ['status' => 1]);

        return $results;
    }
    public function getAvailableServiceProvidersCount()
    {
        $results = $this->customQuery(
            "SELECT Count(DISTINCT staffID) AS serProvCount
                                    FROM serviceproviders",
            []
        );

        return $results;
    }
    // END FOR MANAGER OVERVIEW

    // START FOR MANAGER UPDATE SERVICE
    public function changeServiceStatus($serviceID, $state)
    {
        $results =  $this->update('services', ['status' => $state], ['serviceID' => $serviceID]);
    }
    // END FOR MANAGER UPDATE SERVICE

    // START FOR ANALYTICS 
    public function getDetailsForServiceReportJS($serviceID,$year,$month)
    {
        $results = $this->customQuery("SELECT S.serviceID, S.name, COUNT(DISTINCT SP.staffID) AS NoOFStaff, COUNT(DISTINCT RES.reservationID) AS NoOfRes, COUNT(DISTINCT RES.reservationID)*S.price AS TotalServicePrice
                                        FROM services AS S
                                        INNER JOIN serviceproviders AS SP
                                        ON S.serviceID = SP.serviceID
                                        AND SP.serviceID = :serviceID
                                        LEFT JOIN reservations AS RES 
                                        ON S.serviceID = RES.serviceID
                                        AND RES.serviceID = :serviceID AND RES.status = 4 AND MONTH(RES.date) = $month AND YEAR(RES.date)=$year",
                                        ['serviceID' => $serviceID]
                                    );
        return $results;
    }

    public function getDetailsForServiceProvReportJS($staffID,$year,$month)
    {
        $results = $this->customQuery("SELECT S.staffID,S.fName,S.lName,COUNT(SP.serviceID) AS NoOFService,COUNT(DISTINCT RES.reservationID) AS NoOfRes,COUNT(DISTINCT RES.reservationID) * SV.price AS TotalServicePrice
                                    FROM staff AS S
                                    INNER JOIN serviceproviders AS SP
                                    ON S.staffID = SP.staffID AND SP.staffID = :staffID
                                    INNER JOIN services AS SV
                                    ON SP.serviceID = SV.serviceID
                                    LEFT JOIN reservations AS RES
                                    ON S.staffID = RES.staffID 
                                    AND S.staffID = :staffID AND RES.status = 4 AND S.staffType = 5 AND MONTH(RES.date) =  $month AND YEAR(RES.date) = $year",
                                    ['staffID' => $staffID]
                                    );
        return $results;
    }

    public function getServiceAnalyticsDetails($serviceID, $from, $to)
    {
        if($serviceID!=0){
            $results = $this->customQuery("SELECT DATE_FORMAT(reservations.date, '%Y-%m') AS YearAndMonth, FLOOR((DayOfMonth(reservations.date)-1)/7)+1 AS weekNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
                                    FROM services
                                    INNER JOIN reservations ON reservations.serviceID = services.serviceID
                                    WHERE reservations.status = :status AND (reservations.date BETWEEN '$from' AND '$to') AND services.serviceID=$serviceID
                                    GROUP BY DATE_FORMAT(reservations.date, '%u-%Y')
                                    ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%u-%Y')",
                                    [':status' => 4]
                                    );
        }else{
            $results = $this->customQuery("SELECT DATE_FORMAT(reservations.date, '%Y-%m') AS YearAndMonth, FLOOR((DayOfMonth(reservations.date)-1)/7)+1 AS weekNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
                                    FROM services
                                    INNER JOIN reservations ON reservations.serviceID = services.serviceID
                                    WHERE reservations.status = :status AND (reservations.date BETWEEN '$from' AND '$to')
                                    GROUP BY DATE_FORMAT(reservations.date, '%u-%Y')
                                    ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%u-%Y')",
                                    [':status' => 4]
                                    );
        }
        
        return $results;
    }
    public function getServiceProvAnalyticsDetails($staffID, $from, $to)
    {
        if($staffID!=0){
            $results = $this->customQuery("SELECT DATE_FORMAT(reservations.date, '%Y-%m') AS YearAndMonth, FLOOR((DayOfMonth(reservations.date)-1)/7)+1 AS weekNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
            FROM reservations
            INNER JOIN services ON reservations.serviceID = services.serviceID
            WHERE reservations.status = :status AND (reservations.date BETWEEN '$from' AND '$to') AND reservations.staffID=$staffID
            GROUP BY DATE_FORMAT(reservations.date, '%u-%Y')
            ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%u-%Y')",
            [':status' => 4]
            );
        }else{
            $results = $this->customQuery("SELECT DATE_FORMAT(reservations.date, '%Y-%m') AS YearAndMonth, FLOOR((DayOfMonth(reservations.date)-1)/7)+1 AS weekNo, SUM(services.price) AS TotalIncome, COUNT(*) AS TotalReservations
            FROM reservations
            INNER JOIN services ON reservations.serviceID = services.serviceID
            WHERE reservations.status = :status AND (reservations.date BETWEEN '$from' AND '$to')
            GROUP BY DATE_FORMAT(reservations.date, '%u-%Y')
            ORDER BY reservations.date, DATE_FORMAT(reservations.date, '%u-%Y')",
            [':status' => 4]
            );
        }
        return $results;
    }
    public function getTop5ServiceProvs()
    {
        // $results = $this->customQuery("SELECT staff.staffID, staff.fName, staff.lName, SUM(services.price)
        //     FROM staff
        //     INNER JOIN services ON reservations.serviceID = services.serviceID  555
        //     INNER JOIN reservations ON reservations.serviceID = services.serviceID
        //     INNER JOIN serviceproviders ON serviceproviders.serviceID = reservations.serviceID
        //     WHERE reservations.status = :status1 AND services.status = :status2 AND (MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(reservations.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH)) 
        //     GROUP BY staff.staffID 
        //     ORDER BY MAX(SUM(services.price))",
        //     [':status1' => 4, 'status2' => 1]
        //     );
        $results = $this->customQuery("SELECT reservations.staffID, staff.fName, staff.lName, COUNT(*) AS resCount, SUM(services.price) AS totIncome
            FROM reservations
            INNER JOIN services ON services.serviceID = reservations.serviceID
            INNER JOIN staff ON reservations.staffID = staff.staffID
            WHERE reservations.status = :status
            GROUP BY reservations.staffID
            ORDER BY SUM(services.price) DESC
            LIMIT 5",
            [':status' => 4]
            );
        return $results;
    }
    public function getTop5Services()
    {
        $results = $this->customQuery("SELECT services.name, COUNT(DISTINCT reservations.reservationID), COUNT( DISTINCT reservations.serviceID)* SUM(services.price) AS totIncome
                                    FROM reservations
                                    INNER JOIN services ON reservations.serviceID = services.serviceID AND services.status = :status2
                                    WHERE reservations.status = :status1 AND(MONTH(reservations.date) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH) AND YEAR(reservations.date) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH))
                                    GROUP BY reservations.serviceID
                                    ORDER BY SUM(services.price) DESC
                                    LIMIT 5;",
                                    [':status1' => 4, 'status2' => 1]
                                    );
        return $results;
    }
    // END FOR ANALYTICS 
    
    // Returns required resources of each slot with start and end times of a given service.
    public function getServiceSlotsSummary($serviceID)
    {
        $SQLstatement =
            "SELECT TS.slotNo, 
                    RA.resourceID, 
                    RA.requiredQuantity, 
                    TS.startingTime AS givenStartTime, 
                    TS.startingTime + TS.duration AS givenEndTime
            FROM timeslots AS TS
            INNER JOIN resourceallocation AS RA
            ON RA.serviceID = TS.serviceID AND RA.slotNo = TS.slotNo
            WHERE TS.serviceID = :serviceID;";

        $results = $this->customQuery(
            $SQLstatement,
            [":serviceID" => $serviceID]
        );
        return $results;
    }
}
