<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->
<body class="ownAddstaffBody">


<div class="ownStaff_allignmentbox">

<div class="ownAddstaffContainer contentBox"> 
        <div class="ownAddStaff_Formheading">
            <h1>Add New Staff Members</h1>
        </div>
        <form action="#">
            <div class="ownAddstaff_formWrapper">
                <!------------------------------ Basic Info Starts------------------------------------------------------------------------------->

                <div class="ownAddstaffBasicinfo">
                    <h3 class="ownAddstaffBasicinfoSubHead">Basic Info</h3> <br>
                    <!------------------ maingrid1 start --------------------------------------------------------->
                    <div class="ownAddstaffMaingrid1">

                        <div class="ownAddstaffFormGroupImage">
                            <div class="ownAddstaffBasicinfoFilesubBtn">
                                <label for="ownAddstaffBasicinfoImagesub" class="ownAddstaffBasicinfoImagewrapper">
                                    <input type="file" id="ownAddstaffBasicinfoImagesub" accept="image/*">
                                    <img src="<?php echo URLROOT ?>/public/icons/add_graph_report_64px.png" class="ownAddstaffBasicinfoIcon"> <br>
                                    <span class="ownAddstaffBasicinfoImagetitle">Add Image</span>
                                </label>
                            </div>
                        </div>

                        <div class="ownAddstaffFormGroupFname">
                            <label class="ownAddstaffLabels">First Name</label> 
                            <input type="text" name="firstname" id="ownAddstaffBasicinfoFirstname" placeholder="Your first name here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                        <div class="ownAddstaffFormGroupLname">
                            <label class="ownAddstaffLabels">Last Name</label>
                            <input type="text" name="lastname" id="ownAddstaffLastname" placeholder="Your last name here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>



                        <div class="ownAddstaffFormGroupRadio">
                            <label class="ownAddstaffLabels">Gender</label> 
                            <div class="ownAddstaffBasicinfoRadiowrapper">

                                <input type="radio" name="select" id="option-1">
                                <label for="option1"> Male</label> <br>
                                <input type="radio" name="select" id="option-2">
                                <label for="option2">Female</label>

                            </div>

                        </div>
                        <div class="ownAddstaffFormGroupNIC">
                            <label class="ownAddstaffLabels">NIC</label>
                            <input type="text" name="NIC" id="NIC" placeholder="Your NIC here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                    </div>
                    <!------------------ maingrid1 end ----------------------------------------------------------->
                    <!------------------ maingrid2 start --------------------------------------------------------->
                    <div class="ownAddstaffMaingrid2">
                        <div class="ownAddstaffFormGroupDOB">
                            <label class="ownAddstaffLabels"> Date Of Birth</label> 
                            <input type="date" class="Date">

                        </div>
                        <div class="ownAddstaffFormGroupStype">
                            <label class="ownAddstaffLabels">Staff Type</label>
                            <select class="dropdownselectbox">
                                <option value="val1">Value 1</option>
                                <option value="val2">Value 2</option>
                                <option value="val3">Value 3</option>
                                <option value="val4">Value 4</option>
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
                            <label class="ownAddstaffLabels">Home Address</label> 
                            <textarea class="homeAdd" name="homeAdd" rows="4"
                                cols="50" placeholder="Your home address here"></textarea>
                                <span class="error">Sorry, that user name is taken </span>
                        </div>
                    </div>
                    <!------------------ maingrid3 ends ---------------------------------------------------------->
                    <!------------------ maingrid4 start ---------------------------------------------------------->
                    <div class="ownAddstaffMaingrid4">
                        <div class="ownAddstaffFormGroupTP">
                            <label class="ownAddstaffLabels">Contact Number</label>
                            <input type="text" name="contactnum" id="contactnum" placeholder="Your contact number here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                        <div class="ownAddstaffFormGroupMAIL">
                            <label class="ownAddstaffLabels">E-mail</label> 
                            <input type="text" name="email" id="email" placeholder="Your email here">
                            <span class="error">Sorry, that user name is taken </span>
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
                            <input type="text" name="accnum" id="accnum" placeholder="Your account number here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                        <div class="ownAddstaffFormGroupACCNAME">
                            <label class="ownAddstaffLabels">Account Holders Name</label> 
                            <input type="text" name="acchold" id="acchold" placeholder="Your account holders name here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                        <div class="ownAddstaffFormGroupBankNAME">
                            <label class="ownAddstaffLabels">Bank Name</label> 
                            <input type="text" name="acchold" id="acchold" placeholder="Your bank name here">
                            <span class="error">Sorry, that user name is taken </span>
                        </div>
                    </div>
                    <!------------------ maingrid5 end ---------------------------------------------------------------->
                    <!----------------------------------------- Bank Details ends --------------------------------------------------------------------------->

                </div>

                <div class= "ownAddstaffLineContainer">
                    <div class= "ownAddstaffLines">
                    </div>
                    </div>

            
            <div class="ownUpdateStaffFormGroupDisable">
            <div class="ownUpdateStaffFormGroupDisableLable">
                    <h3 class="subhead">Disable Staff member</h3>
                    </div>
                    <div class="ownUpdateStaffFormGroupDisableTogle">
                    <input type="checkbox" class="toglecheckbox">
                    </div>
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