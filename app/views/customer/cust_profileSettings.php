<?php
$selectedOption = "profileSettings";
require APPROOT . "/views/customer/cust_headerBar.php";
?>
<div class="content main-content-template">
    <?php
    require APPROOT . "/views/customer/cust_sideNav.php"
    ?>

    <div class="container">


        <form action="<?php echo URLROOT; ?>/CustDashboard/profileSettings" method="post" class="form" enctype="multipart/form-data">
            <div class="item item1">
                <label for="custimage" class="ownAddstaffBasicinfoImagewrapper">
                    <div class="imgUploadSection">
                        <div class="profileimg">





                            <?php if (!empty($data['imgPath']) && $data['haveError'] == 1) : ?>
                                <img src="<?php echo URLROOT ?>/public/imgs/customerImgs/<?php echo $data['oldProfImg']; ?> " id='profileImg' height="160px" width="160px" borderRadious='50%'> <br>
                            <?php elseif ($data['oldProfImg']) : ?>
                                <img src="<?php echo URLROOT ?>/public/imgs/customerImgs/<?php echo $data['oldProfImg']; ?> " id='profileImg' height="160px" width="160px" borderRadious='50%'> <br>
                            <?php else : ?>
                                <img src="<?php echo URLROOT ?>/public/imgs/customerImgs/custProfileUpdate.png" id="profileImg" class="custImgDefault"><br>
                                <!-- <img class="ownAddstaffBasicinfoIcon" id='profileImg' height="160px" width="160px" borderRadious='50%'> -->
                            <?php endif; ?>


                        </div>
                        <div class="profbutton">

                            <span class="custImgUploadBtn">Upload new picture <input type="file" name="custimage" id="custimage" accept="image/*"></span>

                        </div>
                    </div>
                </label>


            </div>
            <div class="removebtncontainer">
                <a class="removebtn">Remove picture</a>
            </div>



            <div class="row custProfileSettings">
                <div class="column">
                    <div class="text-group-name">
                        <label class="label" for="fName">First Name</label>
                        <input type="text" name="fName" value="<?php echo $data['fName']; ?>" maxlength="35" />
                        <span class="error"><?php echo $data['fNameError']; ?></span>
                    </div>
                </div>
                <div class="column spec">
                    <div class="text-group-name">
                        <label class="label" for="lName">Last Name</label>
                        <input type="text" name="lName" value="<?php echo $data['lName']; ?>" maxlength="35">
                        <span class="error"><?php echo $data['lNameError']; ?></span>
                    </div>
                </div>
            </div>

            <div class="item item3">
                <div class="profname">
                    <label class="label" for="gender">Gender</label>
                    <div class="radiobutton custProfileSettings">
                          <input type="radio" id="gender" name="gender" value="M" <?php if ($data['gender'] == 'M')
                                                                                    {
                                                                                        echo 'checked';
                                                                                    } ?>>
                          <label for="male">Male</label>
                          <input type="radio" id="css" name="gender" value="F" <?php if ($data['gender'] == 'F')
                                                                                {
                                                                                    echo 'checked';
                                                                                } ?>>
                          <label for="female">Female</label>
                    </div>
                    <span class="error"></span>
                </div>

            </div>

            <div class="row custProfileSettings">
                <div class="column">
                    <div class="text-group-name">
                        <label class="proflabel">Mobile Number </label> <br />
                        <input type="text" name="mobileNo" value="<?php echo $data['mobileNo']; ?>" maxlength="35">
                        <span class="error"><?php echo 'hhh'; ?></span>
                    </div>
                </div>
                <div class="column spec otpcolumn">
                    <div class="text-group-name">
                        <p id="countdown"></p>
                        <button type="submit" name="action" value="getOTP" id="getOTPBtn" class="btn btn-filled btn-black middle">Get OTP</button>
                    </div>
                </div>
            </div>

            <div class="item item4">
                <div class="profname">
                    <label class="proflabel">OTP </label> <br />
                    <input type="text" name="OTP" value=" " maxlength="6" class="OTP" placeholder="OTP">
                </div>
                <span class="error"><?php  ?></span>
            </div>

            <div class="item item5">
                <div class="savebutton">
                    <button class="btn btn-filled btn-theme-red btnSave" type="submit" name="action" value="updatedata">Save</button>
                </div>
            </div>
        </form>

    </div>
</div>
<div class="modal-container img-remove">
    <div class="modal-box size-confirmation">
        <div class="confirm-model-head">
            <h1>Remove Picture</h1>
        </div>
        <div class="confirm-model-head">
            <p>Are you sure you want to remove the picture?</p>
        </div>
        <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="removeCustImg(this);">Yes, Remove</button>
        </div>
    </div>
</div>
<script>
    custimage.onchange = evt => {
        const [file] = custimage.files
        if (file) {
            profileImg.src = URL.createObjectURL(file)
        }
    }
</script>
<script src="<?php echo URLROOT ?>/public/js/modals.js"></script>
<script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeCustImg.js"></script>
<!-- <script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeCustImgs.js"></script> -->
<?php require APPROOT . "/views/customer/cust_footer.php" ?>