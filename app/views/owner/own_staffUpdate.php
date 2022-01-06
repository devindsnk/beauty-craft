<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->

<body class="ownAddstaffBody layout-template-2">

    <!-- ########################################################################################################################### -->

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Update Staff Member</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/Staff/viewAllStaffMembers" class="top-right-closeBtn"><i
                    class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">






        <div class="ownStaff_allignmentbox">

            <div class="ownAddstaffContainer contentBox">
                <!-- <div class="ownAddStaff_Formheading">
            <h1>Update Staff Member</h1>
        </div> -->
                <form action="<?php echo URLROOT; ?>/staff/updateStaff/<?php echo $data['staffID']; ?>"
                    method="post" enctype="multipart/form-data">

                    <div class="ownAddstaff_formWrapper">
                        <!------------------------------ Basic Info Starts------------------------------------------------------------------------------->

                        <div class="ownAddstaffBasicinfo">
                            <h3 class="ownAddstaffBasicinfoSubHead">Basic Info</h3> <br>
                            <!------------------ maingrid1 start --------------------------------------------------------->
                            <div class="ownAddstaffMaingrid1">

                            <div class="ownAddstaffFormGroupImage">
                                    <div class="ownAddstaffBasicinfoFilesubBtn">
                                        <label for="ownAddstaffBasicinfoImagesub"
                                            class="ownAddstaffBasicinfoImagewrapper">
                                            <input type="file" name="staffimage" id="ownAddstaffBasicinfoImagesub" >
                                            <img src="<?php echo URLROOT ?>/public/icons/add_graph_report_64px.png"
                                                class="ownAddstaffBasicinfoIcon"> <br>
                                            <span class="ownAddstaffBasicinfoImagetitle">Add Image</span>
                                        </label>
                                    </div>
                                    <span class="error"><?php echo $data['staffimagePath_error']; ?></span>
                                </div>

                                <div class="ownAddstaffFormGroupFname">
                                    <label class="ownAddstaffLabels">First Name</label>
                                    <input type="text" name="fName" id="ownAddstaffBasicinfoFirstname"
                                        value="<?php echo $data['fName']; ?> ">
                                    <span class="error"><?php echo $data['fName_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupLname">
                                    <label class="ownAddstaffLabels">Last Name</label>
                                    <input type="text" name="lName" id="ownAddstaffLastname"
                                        value="<?php echo $data['lName']; ?> ">
                                    <span class="error"><?php echo $data['lName_error']; ?></span>
                                </div>


                                <div class="ownAddstaffFormGroupRadio">
                                    <label class="ownAddstaffLabels">Gender</label>
                                    <div class="ownAddstaffBasicinfoRadiowrapper">

                                        <input type="radio" name="gender" id="option-1" value="M"
                                            <?php if ($data['gender'] == 'M') echo 'checked'; ?>>
                                        <label for="option1"> Male</label> <br>
                                        <input type="radio" name="gender" id="option-2" value="F"
                                            <?php if ($data['gender'] == 'F') echo 'checked'; ?>>
                                        <label for="option2">Female</label>
                                        <br>
                                        <span class="error"><?php echo $data['gender_error']; ?></span>
                                    </div>

                                </div>
                                <div class="ownAddstaffFormGroupNIC">
                                    <label class="ownAddstaffLabels">NIC</label>
                                    <input type="text" name="nic" id="NIC"
                                        value="<?php echo $data['nic']; ?>">
                                    <span class="error"><?php echo $data['nic_error']; ?></span>
                                </div>
                            </div>
                            <!------------------ maingrid1 end ----------------------------------------------------------->
                            <!------------------ maingrid2 start --------------------------------------------------------->
                            <div class="ownAddstaffMaingrid2">
                                <div class="ownAddstaffFormGroupDOB">
                                    <label class="ownAddstaffLabels"> Date Of Birth</label>
                                    <input type="date" name="dob" class="Date"
                                        value="<?php echo $data['dob']; ?>">
                                    <span class="error"><?php echo $data['dob_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupStype">
                                    <label class="ownAddstaffLabels">Staff Type</label>
                                    <select name="staffType" class="dropdownselectbox"  disabled>
                                        <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                                        <option value=5 <?php if ($data['staffdetails']->staffType == 5) echo 'selected'; ?>>Service Provider</option>
                                        <option value=4 <?php if ($data['staffdetails']->staffType == 4) echo 'selected'; ?>>Receptionist</option>
                                        <option value=3 <?php if ($data['staffdetails']->staffType == 3) echo 'selected'; ?>>Manager</option>
                                    </select>  
                                </div>  
                            </div> 
                        </div> 
                        <!------------------ maingrid2 ends --------------------------------------------------------------->
                        <!----------------------------------------------- Basic Info ends ---------------------------------------------------------------------------->
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>

                        <!------------------------------------------ Contact Details starts -------------------------------------------------------------------------->
                        <div class="ownAddstaffContactdetails">
                            <h3 class="subhead">Contact Details</h3> <br>
                            <!------------------ maingrid3 start ---------------------------------------------------------->
                            <div class="ownAddstaffMaingrid3">
                                <div class="ownAddstaffFormGroupADD">
                                    <label class="ownAddstaffLabels">Home Address</label>
                                    <textarea class="homeAdd" name="address" rows="4" cols="50"
                                        value="<?php echo $data['address']; ?>"> <?php echo $data['address'] ; ?> </textarea>
                                    <span class="error"><?php echo $data['address_error']; ?></span>
                                </div>
                            </div>
                            <!------------------ maingrid3 ends ----------------------------------------------------------> 
                            <!------------------ maingrid4 start ---------------------------------------------------------->
                            <div class="ownAddstaffMaingrid4"> 
                                <div class="ownAddstaffFormGroupTP">
                                    <label class="ownAddstaffLabels">Contact Number</label>
                                    <input type="text" name="mobileNo" id="contactnum"
                                        value="<?php echo $data['mobileNo']; ?>">
                                    <span class="error"><?php echo $data['mobileNo_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupMAIL"> 
                                    <label class="ownAddstaffLabels">E-mail</label> 
                                    <input type="text" name="email" id="email" 
                                        value="<?php echo $data['email']; ?>"> 
                                    <span class="error"><?php echo $data['email_error']; ?></span> 
                                </div>
                            </div>
                        </div>
                        <!--------------------------- maingrid4 end --------------------------------------------------------->
                        <!---------------------------------------- Contact Details ends ------------------------------------------------------------------------------>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <!----------------------------------------- Bank Details starts ------------------------------------------------------------------------------>
                        <div class="ownAddstaffBankdetails">
                            <h3 class="subhead">Bank Details</h3> <br>
                            <!------------------ maingrid5 start ---------------------------------------------------------->
                            <div class="ownAddstaffMaingrid5">
                                <div class="ownAddstaffFormGroupACCNUM">
                                    <label class="ownAddstaffLabels">Account Number</label>
                                    <input type="text" name="accountNo" id="accnum"
                                        value="<?php echo $data['accountNo']; ?> ">
                                    <span class="error"><?php echo $data['accountNo_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupACCNAME">
                                    <label class="ownAddstaffLabels">Account Holders Name</label>
                                    <input type="text" name="holdersName" id="acchold"
                                        value="<?php echo $data['holdersName']; ?> ">
                                    <span class="error"><?php echo $data['holdersName_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupBankNAME">
                                    <label class="ownAddstaffLabels">Bank Name</label>
                                    <input type="text" name="bankName" id="acchold"
                                        value="<?php echo $data['bankName']; ?> ">
                                    <span class="error"><?php echo $data['bankName_error']; ?></span>
                                </div>
                                <div class="ownAddstaffFormGroupBranchNAME">
                                    <label class="ownAddstaffLabels">Branch Name</label>
                                    <input type="text" name="branchName" id="accbranch"
                                        value="<?php echo $data['branchName'];?> "
                                        maxlength="40" maxlength="40">
                                    <span class="error"><?php echo $data['branchName_error']; ?></span>
                                </div>
                            </div>
                            <!------------------ maingrid5 end ---------------------------------------------------------------->
                            <!----------------------------------------- Bank Details ends --------------------------------------------------------------------------->
                        </div>

                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>

                        <div class="ownUpdateStaffFormGroupDisable">
                            <div class="ownUpdateStaffFormGroupDisableLable">
                                <h3 class="subhead">Temporarily Disable</h3>
                            </div>
                            <div class="ownUpdateStaffFormGroupDisableTogle">
                                <input type="checkbox"  name = "status" class="toglecheckbox" value = 2 <?php if($data['status']== 2) echo 'checked'; ?>>
                                <!-- <?php if ($data['staffdetails']->status == 5) echo 'selected'; ?> <?php if ($data['staffType'] == 5) echo 'selected'; ?> -->
                            </div>
                        </div>
                    </div>
                    <!----------------------------------------- form submit button starts ------------------------------------------------------------------------>
                    <div class="ownAddstaffButton">
                        <button class="ownAddstaffbutton btn btn-filled btn-theme-purple" >Save</button>
                    </div>
                    <!----------------------------------------- form submit button ends -------------------------------------------------------------------------->
                </form>

            </div>

        </div>








    </div>


    <!-- ################################################################################################################################## -->



    <?php require APPROOT . "/views/inc/footer.php" ?>