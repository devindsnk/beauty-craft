<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
    $selectedMain = "Test";
    require APPROOT . "/views/receptionist/recept_sideNav.php"
    ?>

    <?php
    $title = "Sample Here";
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

                            <span class="status-tag text-uppercase <?php echo $statusClass; ?> "><?php echo $statusValue ?></span>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
            <div class="resConfirmation contentBox">
                <h3>Pending Reservation Confirmations</h3>
                <?php var_dump($data['pendingReservations']) ?>
            </div>
        </div>


    </div>
    <!--End Content-->
    <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

    <?php require APPROOT . "/views/inc/footer.php" ?>
