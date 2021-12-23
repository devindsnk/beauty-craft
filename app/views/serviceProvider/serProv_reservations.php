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
    <div class="content serprov">
        <!--sub-container1-card 1-->

        <div class="container1-card">


            <form class="form filter-options" action="">
                <div class="options-container">
                    <div class="left-section">
                        <div class="row statusopt">
                            <div class="column">
                                <div class="dropdown-group reservation">
                                    <label class="label" for="lName">Status</label>
                                    <select name="lstatus" id="lstatus">
                                        <option value="All" selected>All</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Rejected">Rejected</option>
                                    </select>
                                </div>
                                <span class="error"> <?php echo " "; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="right-section">
                        <a href="" class="btn btn-filled btn-black">Search</a>
                        <!-- <button class="btn btn-search">Search</button> -->
                    </div>
                </div>

            </form>

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
                            <input type="text" name="selectedReservation" class="selectedReservation" value="<?php echo $reservation->reservationID; ?>">

                            <div class="sub-container2-card">

                                <!--sub-container2-card-timetype-->
                                <div class="sub-container2-card-ts">
                                    <span class="sub-container2-card-time"><?php echo $reservation->startTime . " - " . $reservation->endTime; ?></span>
                                    <span class="sub-container2-card-service"><?php echo $reservation->name; ?></span>
                                </div>
                                <!--sub-container2-card-timetype-->
                                <div class="sub-container2-card-name">
                                    <span class="sub-container2-card-cstname">Customer</span>
                                    <span class="name"><?php echo $reservation->fName . " " . $reservation->lName; ?></span>
                                </div>
                                <div class="confbtn">
                                    <?php if ($reservation->status == 1) : ?>
                                        <div class="confirm-status yellow">
                                            <span>Not Confirmed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 2) : ?>
                                        <div class="confirm-status blue">
                                            <span>Confirmed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 4) : ?>
                                        <div class="confirm-status green">
                                            <span>Completed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 5) : ?>
                                        <div class="confirm-status gray">
                                            <span>Recalled</span>
                                        </div>
                                    <?php endif; ?>

                                </div>

                                <div class="sub-container2-card-link">
                                    <button class="btnOpen btnResMoreInfo" name="action" type="submit" value="moreInfo">More
                                        Info</button>

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
                                    <span class="name"><?php echo $reservationMoreInfo->fName . " " . $reservationMoreInfo->lName; ?></span>
                                </div>
                                <div class="modaldetails-status">
                                    <?php if ($reservationMoreInfo->status == 1) : ?>
                                        <div class="confirm-status yellow">
                                            <span>Not Confirmed</span>
                                        </div>
                                    <?php elseif ($reservationMoreInfo->status == 2) : ?>
                                        <div class="confirm-status blue">
                                            <span>Confirmed</span>
                                        </div>
                                    <?php elseif ($reservationMoreInfo->status == 4) : ?>
                                        <div class="confirm-status green">
                                            <span>Completed</span>
                                        </div>
                                    <?php elseif ($reservationMoreInfo->status == 5) : ?>
                                        <div class="confirm-status gray">
                                            <span>Recalled</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="modaldatetime">
                                <div class="modaldatetime-time">
                                    <span><?php echo $reservationMoreInfo->startTime . " - " . $reservationMoreInfo->endTime; ?></span><br>
                                    <span class="duration"><?php echo $reservationMoreInfo->totalDuration . " mins"; ?></span>
                                </div>
                                <div class="modaldatetime-date">
                                    <?php $date = new DateTime($reservationMoreInfo->date); ?>
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
                                    <textarea class="customerNoteSection" name="customerNote" value="<?php echo $reservationMoreInfo->customerNote; ?>"><?php echo $reservationMoreInfo->customerNote; ?></textarea>
                                </div>

                            </div>
                            <div class="savechange">
                                <button name="action" type="submit" value="saveChanges">Save Changes</button>
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
                                <span class="name"><?php echo $reservationMoreInfo->fName . " " . $reservationMoreInfo->lName; ?></span>
                            </div>
                            <div class="statusrecall">
                                <?php if ($reservationMoreInfo->status == 1) : ?>
                                    <div class="confirm-status yellow">
                                        <span>Not Confirmed</span>
                                    </div>
                                <?php elseif ($reservationMoreInfo->status == 2) : ?>
                                    <div class="confirm-status blue">
                                        <span>Confirmed</span>
                                    </div>
                                <?php elseif ($reservationMoreInfo->status == 4) : ?>
                                    <div class="confirm-status green">
                                        <span>Completed</span>
                                    </div>
                                <?php elseif ($reservationMoreInfo->status == 5) : ?>
                                    <div class="confirm-status gray">
                                        <span>Recalled</span>
                                    </div>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="modelcontent">

                            <div class="modaldatetime">
                                <div class="modaldatetime-time">
                                    <span><?php echo $reservationMoreInfo->startTime . " - " . $reservationMoreInfo->endTime; ?></span><br>

                                </div>
                                <div class="modaldatetime-date">
                                    <?php $date = new DateTime($reservationMoreInfo->date); ?>
                                    <span><?php echo $date->format('F d'); ?></span><br>
                                    <span><?php echo $date->format('Y'); ?></span>
                                </div>
                            </div>

                            <div class="Reservationnote">
                                <div class="Reservationnote-name">
                                    <span>Reason</span>
                                </div>
                                <div class="Reservationnote-note editable" contenteditable="true">

                                    <textarea class="customerNoteSection" name="recallReason" value=""><?php if ($reservationMoreInfo->status == 5) echo $data['recallReason']; ?></textarea>
                                </div>
                                <span class="error"> <?php echo $data['recallReason_error']; ?></span>

                            </div>
                            <div class="savechange">
                                <input type="text" name="selectedReservation" class="selectedReservation" value="<?php echo $reservationMoreInfo->reservationID; ?>">

                            </div>


                            <div class="modalbutton-more">
                                <div class="more-details-modalbtnsection">
                                    <button class="btn btnClose new" name="action" type="submit" value="moreInfo">Back</button>

                                    <button class="btnOpen new<?php if ($reservationMoreInfo->status == 5) echo " hide"; ?>" type="submit" name="action" id="<?php echo $reservationMoreInfo->reservationID; ?>" value="sendRecall">Proceed</button>
                                    <button class="btnDelete<?php if ($reservationMoreInfo->status == 5)
                                                            {
                                                                echo " btn btn-filled btn-error-red";
                                                            }
                                                            else
                                                            {
                                                                echo " hide";
                                                            } ?>" type="submit" name="action" id="<?php echo $reservationMoreInfo->reservationID; ?>" value="cancelRecall">Delete</button>




                                </div>
                            </div>

                        </div>
                        <input type="text" name="selectedReservation" class="selectedReservation" value="<?php echo $reservationMoreInfo->reservationID; ?>">
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