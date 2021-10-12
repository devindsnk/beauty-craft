<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">

    <div class="btn-remove-leave-request quantity-align mang">
        <a href="#" name="remove" id="" class="close-leave-request-window"><span onclick="Previous2()"><i class='fas fa-times fa-2x'></i></span></a><br/>
    </div>

    <form class="form" action="">

        <div class="leave-requests-main leave-request">
            <div class="leave-request-main-head">
				<h1>Leave Request</h1>
			</div>
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

<?php require APPROOT . "/views/inc/footer.php" ?>