<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

    <?php
    $selectedMain = "Daily View";
    require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
    ?>

    <?php
    $title = "Daily View";
    require APPROOT . "/views/inc/headerBar.php"
    ?>



    <!--Content-->
    <div class="content serprov">
        <!--sub-container1-card 1-->

        <div class="filter-options">
            <div class="options-container left">
                <div class="sub-container1-card-content res">
                    <div class="mainsection">

                        <form>

                            <a href="#" class="previous round">&#8249;</a>

                            <input class="selecteddate" type="date" id="date_input" value="" />
                            <a href="#" class="next round">&#8250;</a>
                            <!-- <input type="button" value="Get Weekday" onclick="day_of_week()" /> -->
                        </form>
                        <div class="day" id="output"><?php echo date("l"); ?></div>
                        <span class="date-error-test">


                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!--End sub-container1-card  1-->
        <!--sub-container2-->
        <div class="sub-content-container2">
            <div class="topic">
                <h2>Reservation List</h2>
            </div>
            <!--sub-container2-card-->
            <div class="reservationlist">
                <div class="scroll-area">
                    <?php foreach ($data['reservationData'] as $reservation) : ?>
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
                                <button class="btnOpen btnResMoreInfo" data-id="<?php echo $reservation->reservationID; ?>">More
                                    Info
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>

        <!-- modal -->
        <div class="modal-container reservation-more-info">
            <div class="modal-box">


                <h1 class="header">Reservation details</h1>
                <div class="modelcontent">

                    <div class="modaldetails">
                        <div class="modaldetails-name">

                            <span class="service"></span><br>
                            <span class="name cust"></span>
                        </div>
                        <div class="modaldetails-status green">

                            <div class="moredetails-confirm-status" id="resStatus">
                                <span class="spn-moredetails-confirm-status"></span>
                            </div>

                        </div>

                    </div>
                    <div class="modaldatetime">
                        <div class="modaldatetime-time">
                            <span class="serviceTime"></span><br>
                            <span class="duration"></span>
                        </div>
                        <div class="modaldatetime-date">

                            <span class="month-day"></span><br>
                            <span class="year"></span>
                        </div>
                    </div>

                    <div class="Reservationnote-cust">
                        <div class="Reservationnote-name">
                            <span>Reservation Note</span>
                        </div>
                        <div class="Reservationnote-note">
                            <span class="Reservationnote"></span>

                        </div>
                    </div>
                    <div class="Reservationnote">
                        <div class="Reservationnote-name">
                            <span>Customer Note</span>
                        </div>
                        <div class="Reservationnote-note editable" contenteditable="true">
                            <textarea class="customerNoteSection" name="customerNote" value=""></textarea>
                        </div>

                    </div>
                    <div class="savechange">
                        <button value="saveChanges" onclick="editCustNote(this);">Save Changes</button>

                    </div>

                    <div class="modalbutton-more">
                        <div class="more-details-modalbtnsection">
                            <button class="btn modelbtnClose normal">Close</button>


                            <button class="btnOpen btnResRecall button proceedBtn" value="recall" onclick="recallResrvation(this);">Recall</button>

                        </div>
                    </div>
                </div>


            </div>
        </div>
        <!-- end modal -->

        <div class="modal-container reservation-recall">

            <div class="modal-box addItems">


                <h1 class="recall-data-header"></h1>

                <div class="modaldetails">
                    <div class="modaldetails-name">
                        <span class="recall-service"></span><br>
                        <span class="recall-name"></span>
                    </div>
                    <div class="recall-modaldetails-status">

                        <div class="recall-moredetails-confirm-status" id="recallResStatus">
                            <span class="recall-spn-moredetails-confirm-status"></span>
                        </div>

                    </div>

                </div>
                <div class="modelcontent">

                    <div class="modaldatetime">
                        <div class="modaldatetime-time">
                            <span class="recall-serviceTime"></span><br>
                            <span class="recall-duration"></span>
                        </div>
                        <div class="modaldatetime-date">

                            <span class="recall-month-day"></span><br>
                            <span class="recall-year"></span>
                        </div>
                    </div>

                    <div class="Reservationnote">
                        <div class="Reservationnote-name">
                            <span></span>
                        </div>
                        <div class="Reservationnote-note editable" contenteditable="true">

                            <textarea class="recall-reason" name="recallReason" value=""></textarea>
                        </div>
                        <span class="recall error"> </span>

                    </div>
                    <div class="savechange">
                        <input type="text" name="selectedReservation" class="selectedReservation">

                    </div>


                    <div class="modalbutton-more">
                        <div class="more-details-modalbtnsection">
                            <!-- <button class="btn  backBtn btnResMoreInfo" ">Back</button> -->
                            <button class="btn btnBack normal" value="close">Back</button>

                            <button class="btnOpen recall  proceedBtn btn btn-filled " value="sendRecall" onclick="proceedRecall(this);">Delete</button>




                        </div>
                    </div>

                </div>
                <input type="text" name="selectedReservation" class="selectedReservation">


            </div>

        </div>
        <!-- end modal -->


    </div>
    </div>

    <!--End Content-->
    <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationMoreview.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>