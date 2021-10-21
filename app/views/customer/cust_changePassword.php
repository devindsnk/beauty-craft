<?php
$selectedOption = "changePassword";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php
    require APPROOT . "/views/customer/cust_sideNav.php"
    ?>
        <div class="container">
            <div class="item10">
                <div class="profname">
                    <label class="proflabel">Current Password </label> <br />
                      <div class="passwordinputlabel">
                    <input type="password" name="password" class="passwordinput pwd2" placeholder="Current Password" />
                    </div>
                </div>
            </div>
            <div class="item item7">
                <div class="profname">
                    <label class="proflabel">New Password </label> <br />
                    <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput1" placeholder="Password" />
                    </div>
                </div>
                <div class="profname">
                    <label class="proflabel">Verify New Password </label> <br />
                     <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput1" placeholder="Verify Password" />
                    </div>
                </div>

            </div>
            <div class="item item5">
                <div class="savebutton">
                <button class="btn btn-filled btn-theme-red btnSave">Save</button>
                </div>
            </div>
        </div>
</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>