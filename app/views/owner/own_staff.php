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

<!----------------------- temporary buttons --------------------------------------->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Staff</button>
      <button type="button">
      <a href="<?php echo URLROOT?>/staff/addStaff">Add Staff </a>
      </button>
      <button class="btnOpen" type="button">
      <a href="<?php echo URLROOT?>/staff/updateStaff">Update Staff</a>       
      </button>
      <button class="btnOpen full" type="button">
      <a href="<?php echo URLROOT?>/staff/viewStaff">  View Staff</a>       
      </button>
   </div>


   <!------------------- Remove Staff modal starts ----------------------------->
      <div class="modal-container normal">
      <div class="modal-box " id="ownRemstaffWrapper">
        <div class="ownRemstaffContainer">
         <h1 class="ownRemStaffHead">Remove Staff</h1>
         <!-- start main grid 1 -->
         
         <div class= "staffDetails">
             <div class="staffDetail1">
             <label class = "staffLable">Staff Id</label> 
             <span class="staffData">M001</span>
             </div>
             <div class="staffDetail2">
             <label class= "staffLable">Type</label>
             <span class="staffData">Service Provider</span>            
             </div>
             <div class="staffDetail3">
             <label class= "staffLable">Name</label>
             <span class="staffData">Ravindu Madhubhashana</span>
             </div>
         </div>
      
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="remStaffError">
                <label class="remStaffErrortext">Cannot proceed. Has upcoming reservations</label>
                <a href="#" class="remStaffErrorAnchortag"> <label class="remStaffErrorViewReservaions">View Reservaions</label></a>
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
   </div>
    <!------------------- Remove Staff Container ends ----------------------------->



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