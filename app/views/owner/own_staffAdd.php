<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->
<body class="ownAddstaffBody ">


<div class="ownStaff_allignmentbox own staff">

<div class="ownAddstaffContainer contentBox">
        <div class="ownAddStaff_Formheading">
            <h1>Add New Staff Members</h1>
        </div>
        <form action="<?php echo URLROOT; ?>/staff/addStaff" method="post">
            <div class="ownAddstaff_formWrapper">
                <!------------------------------ Basic Info Starts------------------------------------------------------------------------------->

                <div class="ownAddstaffBasicinfo">
                    <h3 class="ownAddstaffBasicinfoSubHead">Basic Info</h3> <br>
                    <!------------------ maingrid1 start --------------------------------------------------------->
                    <div class="ownAddstaffMaingrid1">

                        <div class="ownAddstaffFormGroupImage">
                            <div class="ownAddstaffBasicinfoFilesubBtn">
                                <label for="ownAddstaffBasicinfoImagesub" class="ownAddstaffBasicinfoImagewrapper">
                                    <input type="file" name="staffImage" id="ownAddstaffBasicinfoImagesub" accept="image/*" >
                                    <img src="<?php echo URLROOT ?>/public/icons/add_graph_report_64px.png" class="ownAddstaffBasicinfoIcon"> <br>
                                    <span class="ownAddstaffBasicinfoImagetitle">Add Image</span>
                                </label>
                            </div>
                        </div>

                        <div class="ownAddstaffFormGroupFname">
                            <label class="ownAddstaffLabels">First Name</label> 
                            <input type="text" name="staffFname" id="ownAddstaffBasicinfoFirstname" placeholder="Your first name here" value="<?php echo $data['staffFname'];?>">
                            <span class="error"><?php echo $data['staffFname_error'];?></span> 
                        </div>
                        <div class="ownAddstaffFormGroupLname">
                            <label class="ownAddstaffLabels">Last Name</label>
                            <input type="text" name="staffLname" name="lastname" id="ownAddstaffLastname" placeholder="Your last name here" value="<?php echo $data['staffLname'];?>" >
                            <span class="error"><?php echo $data['staffLname_error'];?></span>
                        </div>


                        <div class="ownAddstaffFormGroupRadio">
                            <label class="ownAddstaffLabels">Gender</label> 
                            <div class="ownAddstaffBasicinfoRadiowrapper">

                                <input type="radio" name="gender" id="option-1" value="M"<?php if($data['gender']=='M') echo 'checked';?>>
                                <label for="option1"> Male</label> <br>
                                <input type="radio" name="gender" id="option-2" value="F"<?php if($data['gender']=='F') echo 'checked';?>> 
                                <label for="option2">Female</label>
                                <span class="error"><?php echo $data['gender_error'];?></span>

                            </div>

                        </div>
                        <div class="ownAddstaffFormGroupNIC">
                            <label class="ownAddstaffLabels">NIC</label>
                            <input type="text" name="staffNIC" id="NIC" placeholder="Your NIC here" value="<?php echo $data['staffNIC'];?>">
                            <span class="error"><?php echo $data['staffNIC_error'];?></span>
                        </div>
                    </div>
                    <!------------------ maingrid1 end ----------------------------------------------------------->
                    <!------------------ maingrid2 start --------------------------------------------------------->
                    <div class="ownAddstaffMaingrid2">
                        <div class="ownAddstaffFormGroupDOB">
                            <label class="ownAddstaffLabels"> Date Of Birth</label> 
                            <input type="date" name="staffDOB" class="Date" value="<?php echo $data['staffDOB'];?>">

                        </div>
                        <div class="ownAddstaffFormGroupStype">
                            <label class="ownAddstaffLabels">Staff Type</label>
                            <select class="dropdownselectbox" >
                                <option value="V1">Manager</option>
                                <option value="V2">Receptionist</option>
                                <option value="V3">Service Provider</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!------------------ maingrid2 ends --------------------------------------------------------------->
                <!----------------------------------------------- Basic Info ends ---------------------------------------------------------------------------->

                <div class= "ownAddstaffLineContainer">
                    <div class= "ownAddstaffLines">
                    </div>
                </div>


                <!------------------------------------------ Contact Details starts -------------------------------------------------------------------------->
                <div class="ownAddstaffContactdetails">
                    <h3 class="subhead">Contact Details</h3> <br>
                    <!------------------ maingrid3 start ---------------------------------------------------------->
                    <div class="ownAddstaffMaingrid3">
                        <div class="ownAddstaffFormGroupADD">
                            <label class="ownAddstaffLabels">Address</label> 
                            <textarea class="homeAdd" name="staffHomeAdd" rows="4"
                                cols="50" placeholder="Your address here" value="<?php echo $data['staffHomeAdd'];?>"></textarea>
                                <span class="error"><?php echo $data['staffHomeAdd_error'];?></span>
                        </div>
                    </div>
                    <!------------------ maingrid3 ends ---------------------------------------------------------->
                    <!------------------ maingrid4 start ---------------------------------------------------------->
                    <div class="ownAddstaffMaingrid4">
                        <div class="ownAddstaffFormGroupTP">
                            <label class="ownAddstaffLabels">Contact Number</label>
                            <input type="text" name="staffContactNum" id="contactnum" placeholder="Your contact number here" value="<?php echo $data['staffContactNum'];?>">
                            <span class="error"><?php echo $data['staffContactNum_error'];?></span>
                        </div>
                        <div class="ownAddstaffFormGroupMAIL">
                            <label class="ownAddstaffLabels">E-mail</label> 
                            <input type="text" name="staffEmail" id="email" placeholder="Your email here"  value="<?php echo $data['staffEmail'];?>">
                            <span class="error"><?php echo $data['staffEmail_error'];?></span>
                        </div>
                    </div>
                </div>
                <!--------------------------- maingrid4 end --------------------------------------------------------->
                <!---------------------------------------- Contact Details ends ------------------------------------------------------------------------------>

                <div class= "ownAddstaffLineContainer">
                    <div class= "ownAddstaffLines">
                    </div>
                </div>

                <!----------------------------------------- Bank Details starts ------------------------------------------------------------------------------>
                <div class="ownAddstaffBankdetails">
                    <h3 class="subhead">Bank Details</h3> <br>
                    <!------------------ maingrid5 start ---------------------------------------------------------->
                    <div class="ownAddstaffMaingrid5">
                        <div class="ownAddstaffFormGroupACCNUM">
                            <label class="ownAddstaffLabels">Account Number</label> 
                            <input type="text" name="staffAccNum" id="accnum" placeholder="Your account number here" value="<?php echo $data['staffAccNum'];?>">
                            <span class="error"><?php echo $data['staffAccNum_error'];?></span>
                        </div>
                        <div class="ownAddstaffFormGroupACCNAME">
                            <label class="ownAddstaffLabels">Account Holders Name</label> 
                            <input type="text" name="staffAccHold" id="acchold" placeholder="Your account holders name here" value="<?php echo $data['staffAccHold'];?>">
                            <span class="error"><?php echo $data['staffAccHold_error'];?></span>
                        </div>
                        <div class="ownAddstaffFormGroupBankNAME">
                            <label class="ownAddstaffLabels">Bank Name</label> 
                            <input type="text" name="staffAccBank" id="accbank" placeholder="Your bank name here" value="<?php echo $data['staffAccBank'];?>">
                            <span class="error"><?php echo $data['staffAccBank_error'];?></span>
                        </div>
                    </div>
                    <!------------------ maingrid5 end ---------------------------------------------------------------->
                    <!----------------------------------------- Bank Details ends --------------------------------------------------------------------------->
                </div>
            </div>
            <!----------------------------------------- form submit button starts ------------------------------------------------------------------------>
            <div class="ownAddstaffButton">
                <button class="ownAddstaffbutton">Save</button>
            </div> 
            <!----------------------------------------- form submit button ends -------------------------------------------------------------------------->
        </form>

    </div>

</div>



<?php require APPROOT . "/views/inc/footer.php" ?>