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
   <div class="content own Remstaff">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Staff</button>
      <button type="button">
      <a href="<?php echo URLROOT?>/staff/addStaff">Add Staff </a>
      </button>
      <button class="btnOpen" type="button">
      <a href="<?php echo URLROOT?>/staff/updateStaff">Update Staff</a>       
      </button>
      <button class="btnOpen" type="button">
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
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>