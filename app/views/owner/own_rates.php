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
        <div class="cardContainer">

            <div class="card1 contentBox">
                <h3>Leave Limit</h3>

                <div class="deatailbox">
                    <div class="labelBox">
                        <div class="detailLine">
                            <label class="rateLabel">Service Provider</label>
                        </div>
                        <div class="detailLine">
                            <label class="rateLabel">Receptionist</label>
                        </div>
                        <div class="detailLine">
                            <label class="rateLabel">Manager</label>
                        </div>
                    </div>
                    <div class="valueBox">
                        <div class="detailLine">
                            <input type="text" class="rateValue" value="2">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" value="2">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" value="2">
                        </div>
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey">Save Changes</button>
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
                            <input type="text" class="rateValue" value="40000LKR">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" value="40000LKR">
                        </div>
                        <div class="detailLine">
                            <input type="text" class="rateValue" value="40000LKR">
                        </div>
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey">Save Changes</button>
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
                        <input type="text" class="rateValue" value="40%">
                    </div>
                    <div class="ratebutton">
                        <button class="btn btn-filled btn-grey">Save Changes</button>
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
                        <button class="btn btn-filled btn-grey">Save Changes</button>
                    </div>
                </div>

            </div>

        </div>


    </div>
    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>