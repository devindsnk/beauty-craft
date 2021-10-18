<?php require APPROOT . "/views/customer/cust_headerBar.php" ?>
<div class="content main-content-template">
    <div class="sidebar">
        <div class="sidebarcontent">
            <div class="list">
                <div class="sidenavbtn1">
                    <a href="<?php echo URLROOT ?>/custDashboard/myReservations">
                        <button class="sidenavbttn">My Reservations</button>
                    </a>
                </div>
                <div class="sidenavbtn2">
                    <a href="<?php echo URLROOT ?>/custDashboard/profileSettings">
                        <button class="sidenavbttn">Profile Settings</button>
                    </a>
                </div>
                <div class="sidenavbtn3">
                    <button class="sidenavbttn selected">Change Password</button>
                </div>

            </div>
            <div class="line"></div>
        </div>

    </div>
    <div class="container">
        <div class="item item6">
            <div class="profname">
                <label class="proflabel">Current Password </label> <br />
                <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput" placeholder="Current Password" />
                </div>
            </div>
        </div>
        <div class="item item7">
            <div class="profname">
                <label class="proflabel">New Password </label> <br />
                <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput" placeholder="Password" />
                </div>
            </div>
            <div class="profname">
                <label class="proflabel">Verify New Password </label> <br />
                <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput" placeholder="Verify Password" />
                </div>
            </div>

        </div>
        <div class="item item5">
            <div class="savebutton">
                <button>Save</button>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>