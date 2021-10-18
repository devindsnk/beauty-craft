<?php require APPROOT . "/views/customer/cust_headerBar.php" ?>
<div class="content main-content-template">
    <div class="sidebar">
        <div class="sidebarcontent">
            <div class="list">
                <div class="sidenavbtn1">
                    <a href="<?php echo URLROOT ?>/custDashboard/myReservations">
                        <button class="sidenavbttn selected">My Reservations</button>
                    </a>
                </div>
                <div class="sidenavbtn2">
                    <a href="<?php echo URLROOT ?>/custDashboard/profileSettings">
                        <button class="sidenavbttn">Profile Settings</button>
                    </a>
                </div>
                <div class="sidenavbtn3">
                    <a href="<?php echo URLROOT ?>/Customer/changePassword">
                        <button class="sidenavbttn ">Change Password</button>
                    </a>
                </div>

            </div>
            <div class="line"></div>
        </div>

    </div>
    <div class="container cust my-reservations">
        <a href="<?php echo URLROOT ?>/custDashboard/newReservation" class="btn btn-filled btn-theme-red"> New Reservation </a>
        <div class="main-container">

            <div class="sub-container contentBox">
                <div class="row">
                    <div class="left-section">
                        <div class="row-inner">
                            <div class="column">
                                <div class="text-group">
                                    <span class=title>Service</span>
                                    <span class=content>Hair Cut - Mens</span>
                                </div>
                            </div>
                            <div class="column">
                                <div class="text-group">
                                    <span class=title>Service Provider</span>
                                    <span class=content>Ravindu Madhubhashana</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right-section">
                        <div class="date-box">
                            <span class="mondate">Sept 20</span>
                            <span class="year">2021</span>
                        </div>
                        <div class="status-box column">
                            <span class="status-tag status-success-green">Cancelled</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="left-section desc-container">
                        <div class="text-group">
                            <span class="content">Remarks</span>
                            <span class="description">I have applied for a leave and will not be able provide the
                                service</span>
                        </div>
                    </div>
                    <div class="right-section btn-container">
                        <a href="" class="btn btn-outlined btn-black">Edit</a>
                        <a href="" class="btn btn-filled btn-error-red">Cancel</a>
                    </div>
                </div>
            </div>
            <!-- Cancellation modal -->
        </div>
    </div>

</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>