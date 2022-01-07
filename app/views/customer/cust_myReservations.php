<?php
$selectedOption = "myReservations";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php require APPROOT . "/views/customer/cust_sideNav.php"; ?>
    <div class="outer-container">

        <div class="container cust my-reservations">
            <div class="top-container">
                <a href="<?php echo URLROOT ?>/reservations/newReservationCust" class="btn btn-filled btn-theme-red newResBtn"> New Reservation </a>
            </div>

            <?php foreach ($data as $reservation) : ?>
                <?php
                $statusClass = ["status-error-red", "status-warning-yellow", "status-blue", "status-grey", "status-success-green", "status-warning-yellow"];
                $statusValue  = ["Cancelled", "Pending", "Confirmed", "No Show", "Completed", "Pending"];
                $statusClass = $statusClass[$reservation->status];
                $statusValue = $statusValue[$reservation->status];

                $btnStatus = ($reservation->status == 1 || $reservation->status == 5) ? "" : "disabled";

                $date = $reservation->date;
                $date = explode('-', $date);
                $year = $date[0];
                $month   = $date[1];
                $date  = $date[2];
                $monthList = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
                $month = $monthList[$month - 1];

                $startTime = $reservation->startTime;
                $timeH24 = $startTime / 60;
                $suffix;
                if ($timeH24 >= 12) $suffix = "PM";
                else $suffix = "AM";
                if ($timeH24 == 12) $timeH = '12';
                else $timeH = str_pad($timeH24 % 12, 2, "0", STR_PAD_LEFT);
                $timeM = str_pad($startTime % 60, 2, "0", STR_PAD_LEFT);
                ?>
                <div class="sub-container contentBox">
                    <div class="row">
                        <div class="left-section">
                            <div class="row-inner">
                                <div class="column">
                                    <div class="text-group">
                                        <span class=title>Service</span>
                                        <span class=content><?php echo $reservation->serviceName ?> </span>
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="text-group">
                                        <span class=title>Service Provider</span>
                                        <span class=content><?php echo $reservation->staffFName . " " . $reservation->staffLName ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="right-section">
                            <div class="date-box">
                                <span class="time">
                                    <?php
                                    echo $timeH . ":" . $timeM . " " . $suffix;
                                    ?></span>
                                <span class="mondate"><?php echo $month . " " . $date; ?></span>
                                <span class="year"><?php echo $year; ?></span>
                            </div>
                            <div class="status-box column">
                                <span class="status-tag <?php echo $statusClass ?>"><?php echo $statusValue ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="left-section desc-container">
                            <div class="text-group">
                                <span class="content">Remarks</span>
                                <span class="description"><?php echo $reservation->remarks ?></span>
                            </div>
                        </div>
                        <div class="right-section btn-container">
                            <?php if ($reservation->status == 4) : ?>
                                <btn class="btn btn-outlined btn-blue btnProvFeedback" data-id="<?php echo $reservation->reservationID ?>">Provide Feedback</btn>
                            <?php else : ?>
                                <btn class="btn btn-outlined btn-black" <?php echo $btnStatus; ?> data-id="<?php echo $reservation->reservationID ?>">Edit</btn>
                                <btn class="btn btn-filled btn-error-red btnResCancel" <?php echo $btnStatus; ?> data-id="<?php echo $reservation->reservationID ?>">Cancel</btn>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

</div>
<!-- Provide feedback modal -->
<div class="modal-container provide-feedback">
    <div class="modal-box size-form">
        <div class="confirm-model-head">
            <h1>Provide Feedback</h1>
        </div>

        <form action="" class="form">
            <div class="text-group">
                <label class=" label" for="fName">Rating</label>
                <input type="number" class="ratingBox">
                <span class="error">egegweg</span>
            </div>

            <div class="text-group">
                <label class=" label" for="fName">Comment</label>
                <textarea name="" id="" maxlength="200" class="commentBox"></textarea>
                <span class="error">edggsg</span>
            </div>
        </form>

        <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalBlueButton proceedBtn" onclick="provideFeedback(this);">Save</button>
        </div>
    </div>
</div>
<!-- End of Provide feedback  modal -->

<!-- Res Cancellation modal -->
<div class="modal-container reservation-cancel">
    <div class="modal-box size-confirmation">
        <div class="confirm-model-head">
            <h1>Cancel Reservation</h1>
        </div>
        <div class="confirm-model-head">
            <p>Are you sure you want to cancel the reservation?</p>
        </div>
        <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="cancelReservation(this);">Yes, Cancel</button>
        </div>
    </div>
</div>
<!-- End of Res Cancellation modal -->

<?php require APPROOT . "/views/customer/cust_footer.php" ?>