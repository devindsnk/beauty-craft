<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

    <?php
    $selectedMain = "Reservations";
    require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
    ?>

    <?php
    $title = "Reservations";
    require APPROOT . "/views/inc/headerBar.php"
    ?>



    <!--Content-->
    <!--Content-->
    <div class="content serprov">
        <!--sub-container1-card 1-->

        <div class="container1-card">
            <div class="sub-container1-card-content res">
                <div class="mainsection">

                    <form>

                        <a href="#" class="previous round">&#8249;</a>
                        
                        <input class="selecteddate" type="date" id="date_input" value="" />
                        <a href="#" class="next round">&#8250;</a>
                        <!-- <input type="button" value="Get Weekday" onclick="day_of_week()" /> -->
                    </form>
                    <div class="day" id="output"><?php echo date("l");?></div>
                </div>
            </div>
        </div>
        <!--End sub-container1-card  1-->
        <!--sub-container2-->
        <div class="sub-content-container2">
            <div class="topic">
                <h2> Reservations List</h2>
            </div>
            <!--sub-container2-card-->
            <div class="reservationlist">
                <div class="scroll-area">
                  
                    <?php foreach ($data['reservationData'] as $reservation) : ?>



                    <form action="<?php echo URLROOT; ?>/serProvDashboard/reservations" class="form" method="POST">
                        <div class="sub-container2-card">

                            <!--sub-container2-card-timetype-->
                            <div class="sub-container2-card-ts">
                                <span
                                    class="sub-container2-card-time"><?php echo $reservation->startTime." - ".$reservation->endTime;?></span>
                                <span class="sub-container2-card-service"><?php echo $reservation->name; ?></span>
                            </div>
                            <!--sub-container2-card-timetype-->
                            <div class="sub-container2-card-name">
                                <span class="sub-container2-card-cstname">Customer</span>
                                <span class="name"><?php echo $reservation->fName." ".$reservation->lName;?></span>
                            </div>
                            <div class="confbtn">
                                <?php if ($reservation->status ==1): ?>
                                <div class="confirm-status yellow">
                                    <span>Not Confirmed</span>
                                </div>
                                <?php elseif ($reservation->status== 2) : ?>
                                <div class="confirm-status blue">
                                    <span>Confirmed</span>
                                </div>
                                <?php elseif ($reservation->status == 4) : ?>
                                <div class="confirm-status green">
                                    <span>Completed</span>
                                </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="sub-container2-card-link">
                                <button class="btnOpen btnResMoreInfo" name="action" type="submit"
                                    value="<?php echo $reservation->reservationID; ?>">More Info</button>
                            </div>

                        </div>
                    </form>

                    <?php endforeach; ?>


                    <!-- end web view -->
                </div>
                <!-- <div class="mobview">

                        End mobile sub-container2-card
                    </div> -->
                <!--End scroll area-->
            </div>
        </div>

        <!-- modal -->
        <div class="modal-container reservation-more-info <?php if ($data['moreInfoModelOpen']) echo "show" ?>">
            <div class="modal-box">
                <?php foreach ($data['reservationMoreInfo'] as $reservationMoreInfo) : ?>
                <form action="<?php echo URLROOT; ?>/serProvDashboard/reservations" class="form" method="POST" id="<?php echo $reservationMoreInfo->reservationID; ?>">
                    <h1>Reservation details</h1>
                    <div class="modelcontent">

                        <div class="modaldetails">
                            <div class="modaldetails-name">
                                <span class="service"><?php echo $reservationMoreInfo->name; ?></span><br>
                                <span class="name"><?php echo $reservationMoreInfo->fName." ".$reservationMoreInfo->lName;?></span>
                            </div>
                            <div class="modaldetails-status">
                                <?php if ($reservationMoreInfo->status ==1): ?>
                                <div class="confirm-status yellow">
                                    <span>Not Confirmed</span>
                                </div>
                                <?php elseif ($reservationMoreInfo->status== 2) : ?>
                                <div class="confirm-status blue">
                                    <span>Confirmed</span>
                                </div>
                                <?php elseif ($reservationMoreInfo->status == 4) : ?>
                                <div class="confirm-status green">
                                    <span>Completed</span>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modaldatetime">
                            <div class="modaldatetime-time">
                                <span><?php echo $reservationMoreInfo->startTime." - ".$reservationMoreInfo->endTime;?></span><br>
                                <span class="duration"><?php echo $reservationMoreInfo->totalDuration." mins"; ?></span>
                            </div>
                            <div class="modaldatetime-date">
                                <?php $date=new DateTime($reservationMoreInfo->date); ?>
                                <span><?php echo $date->format('F d'); ?></span><br>
                                <span><?php echo $date->format('Y'); ?></span>
                            </div>
                        </div>

                        <div class="Reservationnote-cust">
                            <div class="Reservationnote-name">
                                <span>Reservation Note</span>
                            </div>
                            <div class="Reservationnote-note">
                                <span><?php echo $reservationMoreInfo->remarks; ?></span>

                            </div>
                        </div>
                        <div class="Reservationnote">
                            <div class="Reservationnote-name">
                                <span>Customer Note</span>
                            </div>
                            <div class="Reservationnote-note editable" contenteditable="true">
                                <span name="customerNote"><?php echo $reservationMoreInfo->customerNote; ?></span>
                            </div>

                        </div>
                        <div class="savechange">
                            <button>Save Changes</button>
                            <input type="text" name="selectedReservation" class="selectedReservation" value="<?php echo $reservationMoreInfo->reservationID; ?>">
                        </div>
                        
                        <div class="modalbutton-more">
                            <div class="more-details-modalbtnsection">
                                <button class="btn btnClose normal" name="action" type="submit" value="close">Close</button>


                                <button class="btnOpen btnResRecall button" name="action" type="submit" id="<?php echo $reservationMoreInfo->reservationID; ?>" value="recall">Recall</button>

                            </div>
                        </div>
                    </div>
                </form>
                <?php endforeach; ?>
            </div>
        </div>
        <!-- end modal -->

        <div class="modal-container reservation-recall <?php if ($data['recallModelOpen']) echo "show" ?>">
        
        <div class="modal-box addItems">
            <?php foreach ($data['reservationMoreInfo'] as $reservationMoreInfo) : ?>
            <form action="<?php echo URLROOT; ?>/serProvDashboard/reservations" class="form" method="POST">    
                <h1>Recall request</h1>
              
                <div class="modaldetails">
                    <div class="modaldetails-name">
                        <span class="service"><?php echo $reservationMoreInfo->name; ?></span><br>
                        <span class="name"><?php echo $reservationMoreInfo->fName." ".$reservationMoreInfo->lName;?></span>
                    </div>
                    <div class="statusrecall">
                           <?php if ($reservationMoreInfo->status ==1): ?>
                                <div class="confirm-status yellow">
                                    <span>Not Confirmed</span>
                                </div>
                                <?php elseif ($reservationMoreInfo->status== 2) : ?>
                                <div class="confirm-status blue">
                                    <span>Confirmed</span>
                                </div>
                                <?php elseif ($reservationMoreInfo->status == 4) : ?>
                                <div class="confirm-status green">
                                    <span>Completed</span>
                                </div>
                                <?php endif; ?>
                    </div>

                </div>
                <div class="modelcontent">
                    <div class="modaldatetime">
                        <div class="modaldatetime-time">
                            <span><?php echo $reservationMoreInfo->startTime." - ".$reservationMoreInfo->endTime;?></span><br>

                        </div>
                        <div class="modaldatetime-date">
                            <?php $date=new DateTime($reservationMoreInfo->date); ?>
                                <span><?php echo $date->format('F d'); ?></span><br>
                                <span><?php echo $date->format('Y'); ?></span>
                        </div>
                    </div>

                    <div class="Reservationnote">
                        <div class="Reservationnote-name">
                            <span>Reason</span>
                        </div>
                        <div class="Reservationnote-note editable" contenteditable="true">
                            <span></span>
                        </div>

                    </div>
                    <div class="savechange">

                    </div>


                    <div class="modalbutton-more">
                        <div class="more-details-modalbtnsection">
                            <button class="btn btnClose new" name="action" type="submit" value="close">Cancel</button>

                            <button class="btnOpen new" type="button">Proceed</button>
                        </div>
                    </div>
                </div>
            
                </form>
                 <?php endforeach; ?>
            </div>
        
        </div>
    </div>
    </div>
    <script>
        function day_of_week() {
            var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            var d = document.getElementById('date_input').valueAsDate;
            var n = d.getDay()
            document.getElementById("output").innerHTML = weekday[n];
        }
    </script>

    <!--End Content-->
    <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationMoreview.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>