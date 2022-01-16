<?php
$selectedOption = "changePassword";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php
    require APPROOT . "/views/customer/cust_sideNav.php"
    ?>
    <div class="container">

        <form action="<?php echo URLROOT; ?>/Customer/changePassword" method="post" class="form">
            <div class="item item10">
                <div class="profname">
                    <label class="proflabel">Current Password </label> <br />
                    <div class="passwordinputlabel">
                        <input type="password" name="currentPassword" class="passwordinput pwd2" placeholder="Current Password" />
                    </div>

                </div>
                <span class="error"><?php echo $data['currentPassword_error'];  ?></span>
            </div>

            <div class="item item7">
                <div class="profname">
                    <label class="proflabel">New Password </label> <br />
                    <div class="passwordinput">
                        <input type="password" name="password1" class="passwordinput1" placeholder="Password" />
                    </div>
                    <span class="error"><?php echo $data['newPassword_error']; ?></span>
                </div>
                <div class="profname">
                    <label class="proflabel">Verify New Password </label> <br />
                    <div class="passwordinput">
                        <input type="password" name="password2" class="passwordinput1" placeholder="Verify Password" />
                    </div>
                    <span class="error"><?php echo $data['confirmPassword_error']; ?></span>
                </div>

            </div>
            <div class="item item11">
                <div class="savebutton">
                    <button class="btn btn-filled btn-theme-red btnSave">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require APPROOT . "/views/customer/cust_footer.php" ?>