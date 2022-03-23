<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Leave Request</h1>
        </div>
        <!-- <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/MangDashboard/leaveRequests" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
        </div> -->
        <div class="header-right verticalCenter">
            <span class="top-right-closeBtn" onclick="history.back()">
                <i class=" fal fa-times fa-2x "></i>
            </span>
        </div>
    </header>
    <div class="content leaveReq">
        <form class="form" action="<?php echo URLROOT; ?>/leaves/responceForLeaveRequest/<?php echo $data['leaveDetails']->staffID; ?>/<?php echo $data['leaveDetails']->leaveDate; ?>" method="post">

            <div class="leave-requests-main leave-request">
                <div class="mang-sub-container1 leave-sub-container">
                    <!--card1-->
                    <div class="contentBox leave-sub-container-card">
                        <p>Medical Taken</p>
                        <p><?php echo $data['medicalCount']; ?></p>
                        <p>Casual Taken</p>
                        <p><?php echo $data['casualCount']; ?></p>
                    </div>
                    <!--End of card1-->

                    <!--card2-->
                    <div class="contentBox leave-sub-container-card">
                        <p>Medical Remaining</p>
                        <p><?php echo $data['remainingMedical']; ?></p>
                        <p>Casual Remaining</p>
                        <p><?php echo $data['remainingCasual']; ?></p>
                    </div>
                    <!--End of card2-->
                </div>

                <div class="leave-requests-sub">
                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Staff Member</label>
                                <input type="text" name="" id="" placeholder="<?php echo $data['leaveDetails']->staffID ?> - <?php echo $data['leaveDetails']->fName ?>" disabled>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Staff Type</label>
                                <input type="text" name="" id="" <?php if ($data['leaveDetails']->staffType == 4) : ?> placeholder="Receptionist" <?php elseif ($data['leaveDetails']->staffType == 5) : ?> placeholder="Service Provider" <?php endif; ?> disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Date</label>
                                <input type="text" name="" id="" placeholder="<?php echo $data['leaveDetails']->leaveDate ?>" disabled>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Leave Type</label>
                                <input type="text" name="" id="" placeholder="<?php if ($data['leaveDetails']->leaveType == 1) : ?>Casual<?php elseif ($data['leaveDetails']->leaveType == 2) : ?>Medical 
                              <?php endif; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Reason</label><br>
                                <textarea id="takeLeaveReason" class="" name="" rows="4" cols="50" disabled><?php echo $data['leaveDetails']->reason ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <?php date_default_timezone_set("Asia/Colombo");
                $today = date("Y-m-d H:i:s"); ?>
                <div class="leave-requests-button-div">
                    <?php if ($data['leaveDetails']->status != 3 && $data['leaveDetails']->status != 1 && $data['leaveDetails']->status != 0 && $data['leaveDetails']->leaveDate > $today) : ?>
                        <div class="">
                            <button type="button" class="buttonLeaveRequest btn btn-filled btn-success-green btnApproveLeave" data-staffID="<?php echo $data['leaveDetails']->staffID; ?>" data-leaveDate="<?php echo $data['leaveDetails']->leaveDate; ?>">Approve</button>
                        </div>
                        <div class="">
                            <button type="button" class="buttonLeaveRequest btn btn-filled btn-error-red btnRejectLeave" data-staffID="<?php echo $data['leaveDetails']->staffID; ?>" data-leaveDate="<?php echo $data['leaveDetails']->leaveDate; ?>">Reject</button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </form>
    </div>

    <!-- Leave approving modal -->
    <div class="modal-container approve-leave">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Approve the Leave</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to Approve the leave?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalBlueButton approveBtn" onclick="approveLeaveRequest(this);">Yes, Approve</button>
            </div>
        </div>
    </div>
    <!-- End of Leave approving modal -->

    <!-- Leave Rejecting modal -->
    <div class="modal-container reject-leave">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Reject the Leave</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to Reject the leave?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalRedButton rejectBtn" onclick="rejectLeaveRequest(this);">Yes, Reject</button>
            </div>
        </div>
    </div>
    <!-- End of Leave Rejecting modal -->

    <script src="<?php echo URLROOT ?>/public/js/leaveRequests.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>