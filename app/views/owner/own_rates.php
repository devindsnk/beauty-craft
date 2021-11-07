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
            <label class="rateLabel">Date</label> <br>
            <input type="date">
        </div>
        <form action="<?php echo URLROOT; ?>/ownDashboard/rates" method="post">
        <div class="cardContainer">
        
            <div class="card1 contentBox">   
                <h3>Leave Limit</h3>   
                
                <!-- <?php print_r($data['leaveLimits']);?> --> 
                <!-- <?php print_r($data['salaryRates']);?> -->
                
                
                <!-- <form action="<?php echo URLROOT; ?>/rates/updateLeaveLimit" method="post"> --> 
                
                <div class="deatailbox">
                    <div class="labelBox">
                        <div class="detailLableLine">
                            <label class="rateLabel">Service Provider</label> <br>
                            <span class="error"><?php echo $data['managerLeaveLimit_error']; ?></span>
                        </div>
                        <div class="detailLableLine">
                            <label class="rateLabel">Receptionist</label> <br>
                            <span class="error"><?php echo $data['serviceProviderLeaveLimit_error']; ?></span>
                        </div>
                        <div class="detailLableLine">
                            <label class="rateLabel">Manager</label> <br> 
                            <span class="error"><?php echo $data['receptionistLeaveLimit_error']; ?></span> 
                        </div>
                    </div>
                    <div class="valueBox">
                        <div class="detailValueLine">
                            <input type="text" class="rateValue" name="managerLeaveLimit" value="<?php echo $data['managerLeaveLimit']; ?>" placeholder=" <?php echo $data['leaveLimits']->managerLeaveLimit; ?>">
                        </div>
                        <div class="detailValueLine">
                            <input type="text" name="serviceProviderLeaveLimit" class="rateValue" value="<?php echo $data['serviceProviderLeaveLimit']; ?>" placeholder=" <?php echo $data['leaveLimits']->serviceProviderLeaveLimit; ?>">
                        </div>
                        <div class="detailValueLine">
                            <input type="text" class="rateValue" name="receptionistLeaveLimit"  value="<?php echo $data['receptionistLeaveLimit']; ?>" placeholder="  <?php echo $data['leaveLimits']->receptionistLeaveLimit; ?>">
                        </div>
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey" name="action" value="saveLeaveLimits">Save Changes</button> 
                    </div>
                </div>
               
            </div>

            <div class="card2 contentBox">
                <h3>Basic Salary</h3>

                <div class="deatailbox">
                    <div class="labelBox">
                        <div class="detailLine">
                            <label class="rateLabel">Service Provider</label>
                        </div>
                        <div class="detailLine">
                            <label class="rateLabel">Rceptionist</label>
                        </div>
                        <div class="detailLine">
                            <label class="rateLabel">Manager</label>
                        </div>
                    </div>
                    <div class="valueBox">
                        <div class="detailLine">
                            <input type="text" class="rateValue" name="managerSalaryRate" value="<?php echo $data['managerSalaryRate']; ?>" placeholder="<?php echo $data['salaryRates']->managerSalaryRate; ?>">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" name="serviceProviderSalaryRate"  value="<?php echo $data['serviceProviderSalaryRate']; ?>" placeholder="<?php echo $data['salaryRates']->serviceProviderSalaryRate; ?>">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" name="receptionistSalaryRate" value="<?php echo $data['receptionistSalaryRate']; ?>" placeholder="<?php echo $data['salaryRates']->receptionistSalaryRate; ?>">
                        </div>
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey" name="action" value="saveSalaryRates">Save Changes</button>
                    </div>
                </div>

            </div>

            <div class="card3 contentBox">
                <h3>Other</h3>

                <div class="deatailbox">
                    <div class=" labelBox">
                        <label class="rateLabel">Service Commision Rate</label>
                    </div>
                    <div class="valueBox">
                        <input type="text" class="rateValue" value="<?php echo $data['commisionRate']; ?>" name="commisionRate" value="<?php echo $data['commisionRate']; ?>" placeholder="<?php echo $data['commissionRates']->rate; ?>%">
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey" name="action" value="saveCommissionRate">Save Changes</button>
                    </div>
                </div>
                <div class="ownAddstaffLineContainer">
                    <div class="ownAddstaffLines">
                    </div>
                </div>
                <div class="deatailbox">
                    <div class=" labelBox">
                        <label class="rateLabel">Minimum Number of Managers</label>
                    </div>
                    <div class="valueBox">
                        <input type="text" class="rateValue" value="2">
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey" name="action" value="saveManagerRate">Save Changes</button>
                    </div>
                </div>

            </div>
        
        </div>
        </form>


    </div>
    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>