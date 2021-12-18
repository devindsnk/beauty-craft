<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">
    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic"></h1>
        </div>
        
        <div class="header-right verticalCenter">
           
            <input type="button" value="X" class="" onclick="history.back()">

        </div>
    </header>
<div class="changepawword-content">



            <div class="change-password-container">
                <div class="addItems">
                    <h1>Change Password</h1>
                    <div class="profile-details">
                        <div class="name">
                            <span>Name</span>
                            <input class="changepwd" value="Pasindu Munasinghe"  name="cpw" required readonly>
                        </div>
                        <div class="contactNumber">
                             <span>Mobile Number</span>
                            <input class="changepwd" value="<?php echo$data['mobileNo']; ?>"  name="cpw" required readonly>
                        </div>
                    </div>
                    <hr>
                    <form action="<?php echo URLROOT; ?>/Staff/changePassword" method="post" class="form">
                    <div class="pwditem0">
                        <div class="pwditemleft">
                            <span>Current Password</span>
                            <input class="changepwd" type="password" name="currentPassword" placeholder="Current password" name="cpw" >
                            <span class=" error"><?php echo$data['currentPassword_error'];  ?></span>
                        </div>
                        <div class="pwditemright"></div>
                    </div>
                    <div class="pwditem1">
                        <div class="pwditemleft">
                            <span>New Password</span>
                            <input class="changepwd" type="password" name="password1" placeholder="New password" name="cpw" >
                            <span class=" error"><?php echo$data['newPassword_error']; ?></span>
                        </div>
                        <div class="pwditemright">
                            <span>Confirm Password</span>
                            <input class="changepwd" type="password"  name="password2" placeholder="Confirm password" name="cpw" >
                            <span class=" error"><?php echo$data['confirmPassword_error']; ?></span>
                        </div>
                    </div>
                    <div class="pwditem2">

                        <div class="addItemsModalGrid3">
                            
                            <div class="addItemsModalbtn2">
                                <button class="btn ModalGreenButton ModalButton submitbtn">Proceed</button>
                            </div>
                        </div>

                    </div>
                    </form>
                </div>
            </div>
</div>


<?php require APPROOT . "/views/inc/footer.php" ?>