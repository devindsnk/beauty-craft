<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
    $selectedMain = "Test";
    require APPROOT . "/views/receptionist/recept_sideNav.php"
    ?>

    <?php
    $title = "Daily Update";
    require APPROOT . "/views/inc/headerBar.php"
    ?>

    <!--Content-->
    <div class="content recept daily-update">

        <div class="main-container">
            <div class="sProvAvailability contentBox">
                <h3>Service Providers Availability</h3>

                <?php $statusClassList = ["status-error-red", "status-success-green", "status-blue",  "status-grey", "status-warning-yellow"];
                $statusValueList  = ["On Leave", "Available", "Confirmed", "No Show", "Completed", "Recalled"]; ?>

                <div class="scroll-area">
                    <?php
                    // var_dump($data['sProviders']);
                    foreach ($data['sProviders'] as $sProvider) : ?>
                        <div class="sProv-info">
                            <div class="img-container">
                                <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/<?php echo $sProvider->imgPath ?>"></img>
                            </div>

                            <?php
                            $i = (is_null($sProvider->leaveStatus)) ? 1 : 0;
                            $statusClass = $statusClassList[$i];
                            $statusValue = $statusValueList[$i];
                            ?>

                            <div class="text-container">
                                <label class="cust-name"><?php echo $sProvider->fName . " " . $sProvider->lName ?></label>
                                <label class="contact-no"><?php echo 'SM' . $sProvider->staffID . " - " . $sProvider->mobileNo ?></label>
                            </div>

                            <span class="status-tag <?php echo $statusClass; ?> "><?php echo $statusValue ?></span>
                            <a class="btn btn-outlined btn-grey btnMarkLeave <?php if ($sProvider->leaveStatus) echo " hidden-element" ?>" data-id="<?php echo $sProvider->staffID ?>">Mark Leave</a>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="resConfirmation contentBox">
                <h3>Pending Reservation Confirmations</h3>

                <div class="scroll-area">
                    <?php
                    // var_dump($data['pendingReservations']);
                    foreach ($data['pendingReservations'] as $reservation) : ?>
                        <div class="res-info">
                            <div class="left-container">
                                <span class="service-title"><?php echo "R" . $reservation->reservationID . " - " . $reservation->serviceName ?></span>
                                <div class="bottom-container">
                                    <div class="titles">
                                        <span>Service Provider</span>
                                        <span>Customer</span>
                                        <span>Contact No</span>
                                    </div>
                                    <div class="vals">
                                        <span><?php echo $reservation->staffFName . " " . $reservation->staffLName ?> </span>
                                        <span><?php echo $reservation->custFName . " " . $reservation->custLName ?></span>
                                        <span><?php echo $reservation->custMobileNo ?></span>
                                    </div>
                                </div>
                            </div>

                            <div class="right-container">
                                <div class="date-time">
                                    <span><?php echo DateTimeExtended::minsToTime($reservation->startTime); ?></span>
                                    <span><?php echo DateTimeExtended::dateToShortMonthFormat($reservation->date, "F") ?></span>
                                </div>
                                <a class="btn btn-filled btn-blue btnResConfirm" data-id="<?php echo $reservation->reservationID ?>">Confirm</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </div>


    </div>


    <!-- SProv Mark On Leave modal -->
    <div class="modal-container sProv-markLeave">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Mark On Leave</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to mark the service provider as "On-Leave" ?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="markSProvOnLeave(this);">Yes</button>
            </div>
        </div>
    </div>
    <!-- End of SProv Mark On Leave modal -->

    <!-- Res Confirm modal -->
    <div class="modal-container reservation-confirm">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Confirm the reservation</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want confirm the reservation?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalBlueButton proceedBtn" onclick="markReservationConfirmed(this);">Yes, Confirm</button>
            </div>
        </div>
    </div>
    <!-- End of Res Confirm modal -->

    <!--End Content-->
    <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
    <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationOperations.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>
