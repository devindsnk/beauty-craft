<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
    $selectedMain = "Rates";
    $selectedSub = "";
    require APPROOT . "/views/owner/own_sidenav.php"
    ?>

    <?php
    $title = "Rates";
    require APPROOT . "/views/inc/headerBar.php"
    ?>

    <!--Content-->
    <div class="content own rates">
        <div class="rateDate ownTableFormDate">
            <!-- <label class="rateLabel">Date</label> <br>
            <input type="date"> -->
        </div>
        <form action="<?php echo URLROOT; ?>/ownDashboard/rates" method="post" class="form">
            <div class="cardContainer">

                <div class="card1 contentBox">
                    <h3>Leave Limit</h3>

                    <form action="<?php echo URLROOT; ?>/rates/updateLeaveLimit" method="post">

                        <div class="deatailbox">

                            <div class="labelBox">
                                <div class="detailLableLine">
                                    <label class="rateLabel">Casual Leave Limit</label> <br>
                                    <span class="error"><?php echo $data['generalLeave_error']; ?></span>
                                </div>
                                <div class="detailLableLine">
                                    <label class="rateLabel">Medical Leave Limit</label> <br>
                                    <span class="error"><?php echo $data['medicalLeave_error']; ?></span>
                                </div>
                                <div class="detailLableLine">
                                    <label class="rateLabel">Manager Casual Leave Limit</label> <br>
                                    <span class="error"><?php echo $data['managerGeneralLeave_error']; ?></span>
                                </div>
                                <div class="detailLableLine">
                                    <label class="rateLabel">Manager Medical Leave Limit</label> <br>
                                    <span class="error"><?php echo $data['managerMedicalLeave_error']; ?></span>
                                </div>
                                <div class="detailLableLine">
                                    <label class="rateLabel">Manager Daily Leave Limit</label> <br>
                                    <span class="error"><?php echo $data['managerDailyLeave_error']; ?></span>
                                </div>

                            </div>
                            <div class="valueBox">
                                <div class="detailValueLine">
                                    <input type="text" class="rateValue" name="generalLeave" value="<?php echo $data['generalLeave']; ?>">
                                </div>
                                <div class="detailValueLine">
                                    <input type="text" name="medicalLeave" class="rateValue" value="<?php echo $data['medicalLeave']; ?>">
                                </div>
                                <div class="detailValueLine">
                                    <input type="text" class="rateValue" name="managerGeneralLeave" value="<?php echo $data['managerGeneralLeave']; ?>">
                                </div>
                                <!-- <br> -->
                                <div class="detailValueLine">
                                    <input type="text" class="rateValue" name="managerMedicalLeave" value="<?php echo $data['managerMedicalLeave']; ?>">
                                </div>
                                <!-- <br> -->
                                <div class="detailValueLine">
                                    <input type="text" class="rateValue" name="managerDailyLeave" value="<?php echo $data['managerDailyLeave']; ?>">
                                </div>
                            </div>
                            <div class="ratebutton">
                                <button class="btn btn-filled btn-grey" name="action" value="saveLeaveLimits">Save
                                    Changes</button>
                            </div>
                        </div>

                </div>

                <div class="card2 contentBox">
                    <h3>Basic Salary(LKR)</h3>

                    <div class="deatailbox">
                        <div class="labelBox">
                            <div class="detailLine">
                                <label class="rateLabel">Service Provider</label><br>
                                <span class="error"><?php echo $data['serviceProviderSalaryRate_error']; ?></span>
                            </div>
                            <div class="detailLine">
                                <label class="rateLabel">Rceptionist</label><br>
                                <span class="error"><?php echo $data['receptionistSalaryRate_error']; ?></span>
                            </div>
                            <div class="detailLine">
                                <label class="rateLabel">Manager</label><br>
                                <span class="error"><?php echo $data['managerSalaryRate_error']; ?></span>
                            </div>
                        </div>
                        <div class="valueBox">

                            <div class="detailLine">
                                <input type="text" class="rateValue" name="serviceProviderSalaryRate" value="<?php echo $data['serviceProviderSalaryRate']; ?>">
                            </div>
                            <div class="detailLine">
                                <input type="text" class="rateValue" name="receptionistSalaryRate" value="<?php echo $data['receptionistSalaryRate']; ?> ">
                            </div>
                            <div class="detailLine">
                                <input type="text" class="rateValue" name="managerSalaryRate" value="<?php echo $data['managerSalaryRate']; ?>">
                            </div>
                        </div>
                        <!-- <br> -->
                        <!-- <br> -->
                        <div class="ratebutton">
                            <button class="btn btn-filled btn-grey" name="action" value="saveSalaryRates">Save
                                Changes</button>
                        </div>
                    </div>

                    <!-- ////////////////////////////////////////////////////////////// -->
                    <div class="ownAddstaffLineContainer">
                        <div class="ownAddstaffLines">
                        </div>
                    </div>

                    <div class="deatailbox">

                        <div class="labelBox detailLine">
                            <label class="rateLabel">Service Commision Rate (%)</label><br>
                            <span class="error"><?php echo $data['rate_error']; ?></span>
                        </div>
                        <div class="valueBox detailLine">
                            <input type="text" class="rateValue" name="rate" value="<?php echo $data['rate']; ?>">
                        </div>
                        <br>
                        <div class="ratebutton">
                            <button class="btn btn-filled btn-grey" name="action" value="saveCommissionRate">Save
                                Changes</button>
                        </div>

                    </div>
                    <!-- /////////////////////////////////////////////////////////////////// -->

                </div>

            </div>
        </form>


    </div>
    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>