<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Staff Member Details</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php
                        echo URLROOT;
                        if ($userTypeNo == 2) echo "/OwnDashboard/staff";
                        elseif ($userTypeNo == 3) echo "/MangDashboard/staffMembers";
                        elseif ($userTypeNo == 4) echo "/ReceptDashboard/staffMembers";
                        ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">
        <div class="ownViewStaffContainer">

            <!-------------------------------- View staff container starts ------------------------------------->

            <!------------------------------------ Card container starts ---------------------------------------------->
            <div class="ownViewStaffCards">
                <!----------------------------------------------------- Profile details starts --------------------------------->

                 
                <div class="ownViewStaffProfileDetails">
                    <!-- Basic Info Details Head  -->
                    <div class="ownViewStaffProfileDetailsHead">
                        <h3 class="ownViewStaffCardHeadLabel">Profile</h3>
                    </div>
                    <!-- Basic Info Details  -->

                    <!-- section break line starts -->
                    <div class="ownAddstaffLineContainer">
                        <div class="ownAddstaffLines">
                        </div>  
                    </div>
                    <!-- section break line endss -->
                    <div class="ownViewStaffProfileGrid">
                        <div class="ownViewStaffProfileDetailsImg">
                            <img src="<?php echo URLROOT;?><?php echo "/public/imgs/staffImgs/$data->imgUrl"?>" alt="Avatar"
                                class="ownViewStaffProfileDetailsImgCircle">
                        </div>
                        <div class="ownViewStaffProfileDetailsInfo">
                            <span class="ownViewStaffProfileDetailsName"><?php echo $data->fName ?>
                                <?php echo $data->lName; ?></span> <br>
                            <span class="ownViewStaffProfileDetailsStaffId">Staff ID :
                                <?php echo $data->staffID; ?></span>
                        </div>
                    </div>
                </div>
                <!----------------------------------------------------- Profile details ends --------------------------------->

                <!-- "<?php echo URLROOT ?>/public//imgs/img_avatar.png" -->
                <!--------------------------------- Basic Info Details Card starts ---------------------------------------------->
                <div class="ownViewStaffCard1">
                    <!-- Basic Info Details Head  -->
                    <div class="ownViewStaffCard1Head">
                        <h3 class="ownViewStaffCardHeadLabel">Basic Info</h3>
                    </div>
                    <!-- Basic Info Details  -->

                    <!-- section break line starts -->
                    <div class="ownAddstaffLineContainer">
                        <div class="ownAddstaffLines">
                        </div>
                    </div>
                    <!-- section break line endss -->

                    <div class="ownViewStaffCard1Details">


                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    First Name
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->fName; ?>
                                </span>
                            </div>
                        </div>


                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Last Name
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->lName; ?>
                                </span>
                            </div>
                        </div>


                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Gender
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php if ($data->gender == 'M')
                                    {
                                        echo 'Male';
                                    }
                                    elseif ($data->gender == 'F')
                                    {
                                        echo 'Female';
                                    } ?>
                                </span>
                            </div>
                        </div>


                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Staff Type
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php if ($data->staffType == 3)
                                    {
                                        echo 'Manager';
                                    }
                                    elseif ($data->staffType == 4)
                                    {
                                        echo 'Receptionist';
                                    }
                                    elseif ($data->staffType == 5)
                                    {
                                        echo 'Service Provider';
                                    } ?>
                                </span>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    NIC
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->nic; ?>
                                </span>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    DOB
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->dob; ?>
                                </span>
                            </div>
                        </div>


                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Employee Date
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->joinedDate; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------------------- Basic Info Details Card ends ---------------------------------------------->



                <!--------------------------------- Contact Details Card starts ---------------------------------------------->
                <div class="ownViewStaffCard2">
                    <!-- Contact Details Head  -->
                    <div class="ownViewStaffCard2Head">
                        <h3 class="ownViewStaffCardHeadLabel">Contact Details</h3>
                    </div>
                    <!-- Contact Details  -->

                    <!-- section break line starts -->
                    <div class="ownAddstaffLineContainer">
                        <div class="ownAddstaffLines">
                        </div>
                    </div>
                    <!-- section break line endss -->

                    <div class="ownViewStaffCard2Details">

                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Home Address
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <div class="ownViewStaffCardDetailsValue">
                                    <p>
                                        <?php echo $data->address; ?>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">

                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Contact Number
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->mobileNo; ?>
                                </span>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">
                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    E-mail
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->email; ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <!--------------------------------- Contact Details Card ends ---------------------------------------------->


                <!--------------------------------- Bank Details Card starts ---------------------------------------------->
                <div class="ownViewStaffCard3">
                    <!-- Bank Details Head  -->
                    <div class="ownViewStaffCard3Head">
                        <h3 class="ownViewStaffCardHeadLabel">Bank Details</h3>
                    </div>
                    <!-- Bank Details  -->

                    <!-- section break line starts -->
                    <div class="ownAddstaffLineContainer">
                        <div class="ownAddstaffLines">
                        </div>
                    </div>
                    <!-- section break line endss -->

                    <div class="ownViewStaffCard3Details">
                        <div class="ownViewStaffCardrow">
                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Bank Name
                                </label>
                            </div>

                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->bankName; ?>
                                </span>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">
                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Bank Account Number
                                </label>
                            </div>

                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->accountNo; ?>
                                </span>
                            </div>
                        </div>

                        <div class="ownViewStaffCardrow">
                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Account Holders Name
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->holdersName; ?>
                                </span>
                            </div>
                        </div>
                        <div class="ownViewStaffCardrow">
                            <div class="ownViewStaffCardcolumn">
                                <label class="ownViewStaffCardDetailsLabel">
                                    Branch Name
                                </label>
                            </div>
                            <div class="ownViewStaffCardcolumn">
                                <span class="ownViewStaffCardDetailsValue">
                                    <?php echo $data->branchName; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!--------------------------------- Contact Details Card starts ---------------------------------------------->

            <!--------------------------------- Bank Details Card ends ---------------------------------------------->

            <!------------------------------------ Card container ends ---------------------------------------------->

            <!-------------------------------- View staff container ends ------------------------------------->

        </div>




        <?php require APPROOT . "/views/inc/footer.php" ?>