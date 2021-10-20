<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">
    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Profile Details</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="
            <?php echo URLROOT;
            if ($userTypeNo == 1) echo "/SysAdminDashboard/overview";
            else if ($userTypeNo == 2) echo "/OwnDashboard/overview";
            elseif ($userTypeNo == 3) echo "/MangDashboard/overview";
            elseif ($userTypeNo == 4) echo "/ReceptDashboard/overview";
            elseif ($userTypeNo == 5) echo "/SerProvDashboard/overview";
            ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
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
                        <span class="item2name">Ruwanthi Munasinghe</span>
                        <span class="item2type">Service Provider</span>
                    </div>
                    <div class="item3">
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
                        <span class="item5id">000023</span>
                    </div>
                    <div class="item6">
                        <span class="item6empdate">Employement Date</span>
                        <span class="item6date">2021.05.08</span>
                    </div>
                    <div class="item7">
                        <button class="btnOpen normal changepw">Change Password</button>
                    </div>
                </div>
                <div class="contactinfo">
                    <div class="contactinfo1">
                        <div class="listitem1">
                            <div class="listitemleft">Mobile Number</div>
                            <div class="listitemright">07123456789</div>
                        </div>
                        <div class="listitem2">
                            <div class="listitemleft">NIC Number</div>
                            <div class="listitemright">123456789V</div>
                        </div>
                        <div class="listitem3">
                            <div class="listitemleft">Date of Birth</div>
                            <div class="listitemright">2002.01.01</div>
                        </div>
                        <div class="listitem4">
                            <div class="listitemleft">Gender</div>
                            <div class="listitemright">Female</div>
                        </div>
                        <div class="listitem5">
                            <div class="listitemleft">E-mail </div>
                            <div class="listitemright">abc@gmail.com</div>
                        </div>
                        <div class="listitem6">
                            <div class="listitemleft add">Address<br></div>
                            <div class="listitemright">255A,Galle Road <br> Dehiwala.</div>
                        </div>
                    </div>
                    <div class="contactinfo2">
                        <div class="infoitem">
                            <div class="infoitemleft">Account number</div>
                            <div class="infoitemright">0000146984435</div>
                        </div>
                        <div class="infoitem">
                            <div class="infoitemleft">Account Holder</div>
                            <div class="infoitemright">H. D. R. M. Munasinghe</div>
                        </div>
                        <div class="infoitem">
                            <div class="infoitemleft">Bank Name</div>
                            <div class="infoitemright">People’s Bank</div>
                        </div>

                    </div>


                </div>
            </div>
            <div class="profilecontent">
                <div class="profview-services-list">
                    <span class="assignservices">Assigned Services</span>
                    <span class="servicelist">Childrens hair cut</span>
                    <span class="servicelist">Men’s hair colorl</span>
                    <span class="servicelist">Men’s hair conditioning treatment</span>
                </div>
            </div>

            <div class="modal-container normal change-password">
                <div class="modal-box addItems">
                    <h1>Change Password</h1>
                    <div class="pwditem0">
                        <div class="pwditemleft">
                            <span>Current Password</span>
                            <input class="changepwd" type="password" placeholder="Current password" name="cpw" required>
                        </div>
                        <div class="pwditemright"></div>
                    </div>
                    <div class="pwditem1">
                        <div class="pwditemleft">
                            <span>New Password</span>
                            <input class="changepwd" type="password" placeholder="New password" name="cpw" required>
                        </div>
                        <div class="pwditemright">
                            <span>Confirm Password</span>
                            <input class="changepwd" type="password" placeholder="Confirm password" name="cpw" required>
                        </div>
                    </div>
                    <div class="pwditem2">

                        <div class="addItemsModalGrid3">
                            <div class="addItemsModalbtn1">
                                <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
                            </div>
                            <div class="addItemsModalbtn2">
                                <button class="btn ModalGreenButton ModalButton">Proceed</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>