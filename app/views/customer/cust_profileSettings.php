<?php
$selectedOption = "profileSettings";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php
    require APPROOT . "/views/customer/cust_sideNav.php"
    ?>

    <div class="container">
        <form action="" method="post" class="form">
            <div class="item item1">
                <div class="profileimg">
                    <img src="<?php echo URLROOT ?>/public/imgs/custProfileUpdate.png">
                </div>
                <div class="profbutton">
                    <button class="upload">Upload new picture</button>
                    <button class="remove">Remove picture</button>
                </div>
                <!-- <div class="profbutton">
                    <button class="remove">Remove picture</button>
                </div> -->
            </div>

            <div class="row">
                <div class="column">
                    <div class="text-group">
                        <label class="label" for="fName">First Name</label>
                        <input type="text" name="fName" value="" maxlength="35" />
                        <span class="error"></span>
                    </div>
                </div>
                <div class="column spec">
                    <div class="text-group">
                        <label class="label" for="lName">Last Name</label>
                        <input type="text" name="lName" value="" maxlength="35">
                        <span class="error"></span>
                    </div>
                </div>
            </div>

            <div class="item item3">
                <div class="profname">
                    <label class="label" for="gender">Gender</label>
                    <div class="radiobutton">
                          <input type="radio" id="gender" name="gender" value="Male" checked>
                          <label for="male">Male</label>
                          <input type="radio" id="css" name="gender" value="Female">
                          <label for="female">Female</label>
                    </div>
                </div>

            </div>
            <div class="item item4">
                <div class="profname">
                    <label class="proflabel">Mobile Number </label> <br />
                    <div class="fname">0717679714</div>
                </div>
            </div>
            <div class="item item5">
                <div class="savebutton">
                    <button class="btn btn-filled btn-theme-red btnSave">Save</button>
                </div>
            </div>
    </div>
</div>

<?php require APPROOT . "/views/customer/cust_footer.php" ?>