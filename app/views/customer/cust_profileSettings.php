<?php require APPROOT . "/views/customer/cust_headerBar.php" ?>
<div class="content main-content-template">
    <div class="sidebar">
        <div class="sidebarcontent">
            <div class="list">
                <div class="sidenavbtn1">
                    <a href="<?php echo URLROOT ?>/custDashboard/myReservations">
                        <button class="sidenavbttn option">My Reservations</button>
                    </a>
                </div>
                <div class="sidenavbtn2">
                    <a href="<?php echo URLROOT ?>/custDashboard/profileSettings">
                        <button class="sidenavbttn selected">Profile Settings</button>
                    </a>
                </div>
                <div class="sidenavbtn3"><a href="<?php echo URLROOT ?>/Customer/changePassword">
                        <button class="sidenavbttn option">Change Password</button></a>
                </div>

            </div>
            <div class="line"></div>
        </div>
    </div>
    <div class="container">
        <div class="item item1">
            <div class="profileimg">
                <img src="https://www.pngall.com/wp-content/uploads/5/Profile-PNG-Clipart.png">
            </div>
            <div class="profbutton">
                <button class="upload">Upload new picture</button>
                <button class="remove">Remove picture</button>
            </div>
            <!-- <div class="profbutton">
                    <button class="remove">Remove picture</button>
                </div> -->
        </div>
        <div class="item item2">
            <div class="profname">
                <label class="proflabel">First Name </label> <br />
                <div class="fname" contenteditable="true">Ruwanthi</div>
            </div>
            <div class="profname">
                <label class="proflabel">Last Name </label> <br />
                <div class="fname" contenteditable="true">Munasinghe</div>
            </div>

        </div>
        <div class="item item3">
            <div class="profname">
                <label class="proflabel">Gender </label> <br />
                <div class="radiobutton">
                      <input type="radio" id="gender" name="gender" value="Male">
                      <label for="male">Male</label>
                      <input type="radio" id="css" name="gender" value="Female">
                      <label for="female">Female</label>
                </div>
            </div>

        </div>
        <div class="item item4">
            <div class="profname">
                <label class="proflabel">Mobile Number </label> <br />
                <div class="fname" contenteditable="true">0703807405</div>
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