<?php
$selectedOption = "profileSettings";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php
    require APPROOT . "/views/customer/cust_sideNav.php"
    ?>
 
         <div class="container">
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
            <div class="item item2">
                <div class="profname">
                    <label class="proflabel">First Name </label> <br />
                    <div class="fname" contenteditable="true">Devin</div>
                </div>
                <div class="profname">
                    <label class="proflabel">Last Name </label> <br />
                    <div class="fname" contenteditable="true">Dissanayake</div>
                </div>

            </div>
            <div class="item item3">
                <div class="profname">
                    <label class="proflabel">Gender </label> <br />
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
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>