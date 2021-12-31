<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">
    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Profile Details</h1>
        </div>

        <div class="header-right verticalCenter">

            <input type="button" value="X" class="" onclick="history.back()">

        </div>
    </header>
    <div class="profview">
        <div class="profileview">
            <!-- <h1 class="profileviewh1">View Profile</h1> -->
            <div class="profilecontent">

                <div class="basicinfo">
                    <div class="item1">
                        <img class="item1img" src="<?php echo URLROOT ?>/public/imgs/person1.jpg"></img>
                    </div>
                    <div class="item2">
                        <span class="item2name"><?php echo $data['profileData'][0]->fName . " " . $data['profileData'][0]->lName; ?></span>
                        <span class="item2type">Service Provider</span>
                    </div>
                    <div class="item3 <?php if ($userTypeNo != 5)
                                        {
                                            echo " hide";
                                        } ?>">
                        <span class="rate">4.5</span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                    <div class="item4">
                        <div class="item4status">Active</div>
                    </div>
                    <div class="item5">
                        <span class="item5staffid">Staff ID</span>
                        <span class="item5id"><?php echo $data['profileData'][0]->staffID; ?></span>
                    </div>
                    <div class="item6">
                        <span class="item6empdate">Employement Date</span>
                        <span class="item6date"><?php echo $data['profileData'][0]->joinedDate; ?></span>
                    </div>
                    <form action="<?php echo URLROOT; ?>/Staff/profile" method="post" class="form">

                        <div class="item7">
                            <button class="btnOpen normal changepw" name="action" type="submit" value="changePassword">Change Password</button>
                        </div>
                    </form>

                </div>
                <div class="contactinfo">
                    <div class="contactinfo1">
                        <div class="listitem1">
                            <div class="listitemleft">Mobile Number</div>
                            <div class="listitemright"><?php echo $data['profileData'][0]->mobileNo; ?></div>
                        </div>
                        <div class="listitem2">
                            <div class="listitemleft">NIC Number</div>
                            <div class="listitemright"><?php echo $data['profileData'][0]->nic; ?></div>
                        </div>
                        <div class="listitem3">
                            <div class="listitemleft">Date of Birth</div>
                            <div class="listitemright"><?php echo $data['profileData'][0]->dob; ?></div>
                        </div>
                        <div class="listitem4">
                            <div class="listitemleft">Gender</div>
                            <div class="listitemright">
                                <?php if ($data['profileData'][0]->gender == 'F')
                                {
                                    echo "Female";
                                }
                                else
                                {
                                    echo "Male";
                                } ?>
                            </div>
                        </div>
                        <div class="listitem5">
                            <div class="listitemleft">E-mail </div>
                            <div class="listitemright"><?php echo $data['profileData'][0]->email; ?></div>
                        </div>
                        <div class="listitem6">
                            <div class="listitemleft add">Address<br></div>
                            <div class="listitemright"><?php echo $data['profileData'][0]->address; ?></div>
                        </div>
                    </div>
                    <div class="contactinfo2">
                        <div class="infoitem">
                            <div class="infoitemleft">Account number</div>
                            <div class="infoitemright"><?php echo $data['profileData'][0]->accountNo; ?></div>
                        </div>
                        <div class="infoitem">
                            <div class="infoitemleft">Account Holder</div>
                            <div class="infoitemright"><?php echo $data['profileData'][0]->holdersName; ?></div>
                        </div>
                        <div class="infoitem">
                            <div class="infoitemleft">Bank Name</div>
                            <div class="infoitemright">
                                <?php echo $data['profileData'][0]->bankName . " - " . $data['profileData'][0]->branchName; ?>
                            </div>
                        </div>

                    </div>


                </div>

            </div>
            <div class="profilecontent<?php if ($userTypeNo != 5)
                                        {
                                            echo " hide";
                                        } ?>">
                <div class="profview-services-list">
                    <span class="assignservices">Assigned Services</span>
                    <?php foreach ($data['serviceslist'] as $service) : ?>
                        <span class="servicelist"><?php echo $service->name . " (" . $service->type . ")"; ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="modal-container normal change-password<?php if ($data['changePasswordModelOpen'] == 1) echo " show" ?>">
                <div class="modal-box addItems">
                    <form action="<?php echo URLROOT; ?>/Staff/profile" method="post" class="form">

                        <h1>Change Password</h1>
                        <div class="pwditem0">
                            <div class="pwditemleft">
                                <span>Current Password</span>
                                <input class="changepwd" type="password" name="currentPassword" placeholder="Current password">
                                <span class=" error"><?php echo $data['currentPassword_error']; ?></span>
                            </div>
                            <div class="pwditemright"></div>
                        </div>
                        <div class="pwditem1">
                            <div class="pwditemleft">
                                <span>New Password</span>
                                <input class="changepwd" type="password" name="password1" placeholder="New password">
                                <span class=" error"><?php echo $data['newPassword_error']; ?></span>
                            </div>
                            <div class="pwditemright">
                                <span>Confirm Password</span>
                                <input class="changepwd" type="password" name="password2" placeholder="Confirm password">
                                <span class=" error"><?php echo $data['confirmPassword_error']; ?></span>
                            </div>
                        </div>
                        <div class="pwditem2">

                            <div class="addItemsModalGrid3">
                                <div class="addItemsModalbtn1">
                                    <button class="btn btnClose normal ModalCancelButton ModalButton" name="action" type="submit" value="cancel">Cancel</button>
                                </div>
                                <div class="addItemsModalbtn2">
                                    <button class="btn ModalGreenButton ModalButton" name="action" type="submit" value="proceed">Proceed</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>