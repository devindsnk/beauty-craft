<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

    <header class="full-header">
		<div class="header-center verticalCenter">
			<h1 class="header-topic">Leave Request</h1>
		</div>
		<div class="header-right verticalCenter">
			<a href="<?php echo URLROOT ?>/MangDashboard/leaveRequests" class="top-right-closeBtn"><i
					class="fal fa-times fa-2x "></i></a>
		</div>
	</header>
    <div class="content leaveReq">
        <form class="form" action="">

            <div class="leave-requests-main leave-request">
                <!-- <div class="leave-request-main-head">
                    <h1>Leave Request</h1>
                </div> -->
                <div class="mang-sub-container1 leave-sub-container">
                    <!--card1-->
                    <div class="contentBox leave-sub-container-card">
                        <p>Leaves taken</p>
                        <p>2</p>
                    </div>
                    <!--End of card1-->

                    <!--card2-->
                    <div class="contentBox leave-sub-container-card">
                        <p>Remaining Leaves</p>
                        <p>5</p>
                    </div>
                    <!--End of card2-->
                </div>

                <div class="leave-requests-sub">
                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Staff Member Name</label>
                                <input type="text" name="" id="" placeholder="Ruwanthi Munasinghe" disabled>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Staff Type</label>
                                <input type="text" name="" id="" placeholder="Service Provider" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Staff ID</label>
                                <input type="text" name="" id="" placeholder="SP0001" disabled>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Date</label>
                                <input type="text" name="" id="" placeholder="2021.05.02" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="labels" for="">Reason</label><br>
                                <textarea id="takeLeaveReason"  class="" name="" rows="4" cols="50" disabled>Go to hospital</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="leave-requests-button-div">
                        <div class="">
                            <button class="buttonLeaveRequest btn btn-filled btn-success-green">Approve</button>
                        </div>
                        <div class="">
                            <button class="buttonLeaveRequest btn btn-filled btn-error-red">Reject</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
<?php require APPROOT . "/views/inc/footer.php" ?>