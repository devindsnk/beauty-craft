<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Staff Members";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>
   

   <?php
   $title = "Staff Members";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Staff</button>
      <button class="btnOpen full" type="button">Add Staff</button>
      <button class="btnOpen full" type="button">Update Staff</button>
   </div>
   <!------------------- Remove Staff modal starts ----------------------------->
      <div class="modal-container normal">
      <div class="modal-box">
         <h1 class="ownRemStaffHead">Remove Staff</h1>
         <!-- start main grid 1 -->
         <div class= "staffDetails">
             
             <label class = "staffLabel1">Staff Id</label>
             <span class="staffData1">M001</span>
             <br>
             <label class= "staffLabel2">Name</label>
             <span class="staffData2">Ravindu Madhubhashana</span>
             <br>
             <label class= "staffLabel3">Type</label>
             <span class="staffData3">Manager</span>
         </div>
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="remStaffError">
                <label class="remStaffErrortext">Cannot proceed. Has upcoming reservations</label>
                <a href="#"> <label class="viewReservaions">View Reservaions</label></a>
         </div>
         <!-- main grid 2 ends -->
         <!-- main grid 3 starts -->
         <div class="remButtons">
            <div class="ownRemStaffbtn1">
            <button class="btn btnClose normal">Cancel</button>
            </div>
            <div class="ownRemStaffbtn2">
            <button class="btn">Proceed</button>
            </div>
        </div>
        <!-- main grid 3 ends -->

        
      </div>
   </div>
    <!------------------- Remove Staff Container ends ----------------------------->



<!-------------------------------------------------------------------------------------------------------------------------------------------------->
<!------------------- Add Staff Container starts --------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------------->

     <div class="modal-container full">
      <div class="modal-box" id="ownViewStaffContainer">
<!------------------- Add Staff form container starts ------------------>

<div class="ownAddstaffContainer">
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
                                <label for="option1"> Male</label>
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
                    </div>
                    <!------------------ maingrid5 end ---------------------------------------------------------------->
                    <!----------------------------------------- Bank Details ends --------------------------------------------------------------------------->
                </div>
            </div>
            <!----------------------------------------- form submit button starts ------------------------------------------------------------------------>
            <div class="ownAddstaffButton">
                <button class="ownAddstaffbutton">Submit</button>
            </div>
            <!----------------------------------------- form submit button ends -------------------------------------------------------------------------->
        </form>

    </div>



<!--------------------- Add staff form container ends -------------------------->


      <button class="btn btnClose full">Save</button>

      </div>

      
   </div>

    <!------------------- Add Staff Container ends ----------------------------->

    <!------------------- Update Staff Container starts ----------------------------->
    <div class="modal-container full">
      <div class="modal-box">
         <h1>This is a full modal</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam iste enim odit, nulla consequuntur corporis
            provident sint magni necessitatibus animi molestias quas eos perspiciatis doloribus porro? Fugit amet
            recusandae distinctio.</p>
         <button class="btn btnClose full">Save</button>

      </div>

      
   </div>
    <!------------------- Update Staff Container ends ----------------------------->

    <!-------------------------------- View staff container starts ------------------------------------->
      <span class="ownViewStaffContainerHead">Staff Member Details</span>
                  <div class="ownViewStaffProfileDetails sub-container-card">
                     <div class="ownViewStaffProfileDetailsImg">
                               image  
                     </div>
                     <div class="ownViewStaffProfileDetailsInfo">
                        <span class="ownViewStaffProfileDetailsName">Ravindu Madhubhashana</span>
                         <span class="ownViewStaffProfileDetailsStaffId">Staff ID : C00001</span>
                     </div>

                  </div>
                  <div class="ownViewStaffCard1 sub-container-card">
                     <label class="ownViewStaffTotalIncomeLabel">Total Income</label>
                     <span class="ownViewStaffTotalIncomeValue">Rs.55600.00</span>
                  </div>
                  <div class="ownViewStaffCard2 sub-container-card">
                     <label class="ownViewStaffAllAppointmentHead">All Appointment</label>
                     <span class="ownViewStaffAllAppointmentHeadValue">250</span> 
                     <br>
                  <label class="ownViewStaffAllAppointmentlabels">Completed</label>
                     <span class="ownViewStaffAllAppointmentValues">100</span>
                     <br>
                     <label class="ownViewStaffAllAppointmentlabels">Recalled</label>
                     <span class="ownViewStaffAllAppointmentValues">100</span>
                     <br>
                     <label class="ownViewStaffAllAppointmentlabels">Cancelled</label>
                     <span class="ownViewStaffAllAppointmentValues">100</span>
                  </div>
                  <div class="ownViewStaffCard3 sub-container-card">
                  <label class="ownViewStaffBasicInfoHead">Basic Info</label>
                  </div>
                  <div class="ownViewStaffCard3 sub-container-card">
                  <label class="ownViewStaffBasicInfolabels">First Name</label>
                  <span class="ownViewStaffBasicInfoValues">Ravindu</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">Last Name</label>
                  <span class="ownViewStaffBasicInfoValues">Madhubhashana</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">Gender</label>
                  <span class="ownViewStaffBasicInfoValues">Male</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">Contact Number</label>
                  <span class="ownViewStaffBasicInfoValues">0711234567</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">NIC</label>
                  <span class="ownViewStaffBasicInfoValues">981234566V</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">DOB</label>
                  <span class="ownViewStaffBasicInfoValues">12/12/1998</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">Account Number</label>
                  <span class="ownViewStaffBasicInfoValues">8765432</span>
                  <br>
                  <label class="ownViewStaffBasicInfolabels">Employement Date</label>
                  <span class="ownViewStaffBasicInfoValues">16/7/2020</span>
                  </div>
   <!-------------------------------- View staff container ends ------------------------------------->




   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>