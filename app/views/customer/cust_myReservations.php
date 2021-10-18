<?php require APPROOT . "/views/customer/cust_headerBar.php" ?>
<div class="content">
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
    <div class="container">
        Customer-My reservation
    </div>

</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>