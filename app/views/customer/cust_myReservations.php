<?php
$selectedOption = "myReservations";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php require APPROOT . "/views/customer/cust_sideNav.php"; ?>
    <div class="outer-container">
        <a href="<?php echo URLROOT ?>/reservations/newReservationCust" class="btn btn-filled btn-theme-red newResBtn"> New Reservation </a>
        <div class="container cust my-reservations">

            <?php foreach ($data as $reservation) : ?>
                <?php
                $statusClass = ["status-error-red", "status-warning-yellow", "status-blue", "status-grey", "status-success-green"];
                $statusValue  = ["Cancelled", "Pending", "Confirmed", "No Show", "Completed"];
                $statusClass = $statusClass[$reservation->status];
                $statusValue = $statusValue[$reservation->status];

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
                            <a href="" class="btn btn-outlined btn-black">Edit</a>
                            <a href="" class="btn btn-filled btn-error-red">Cancel</a>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>

    </div>

</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>