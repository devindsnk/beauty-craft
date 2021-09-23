<?php require "../header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Staff Members";
   require "./own_sidenav.php"
   ?>

   <?php
   $title = "Staff Members";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require "../headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Staff</button>
      <button class="btnOpen full" type="button">Add Staff</button>
      <button class="btnOpen full" type="button">Update Staff</button>
   </div>
   <!------------------- Remove Staff Container starts ----------------------------->
      <div class="modal-container normal">
      <div class="modal-box">
         <h1>Remove Staff</h1>
         <!-- start main grid 1 -->
         <div class= "staffDetails">
             
             <label class= "staffLabel1">Staff Id</label>
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
            <div class="btn1">
            <button class="btn btnClose normal">Cancel</button>
            </div>
            <div class="btn2">
            <button class="btn">Proceed</button>
            </div>
        </div>
        <!-- main grid 3 ends -->

        
      </div>
   </div>
    <!------------------- Remove Staff Container ends ----------------------------->
     <!------------------- Add Staff Container starts ----------------------------->
     <div class="modal-container full">
      <div class="modal-box">
         <h1>This is a full modal</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam iste enim odit, nulla consequuntur corporis
            provident sint magni necessitatibus animi molestias quas eos perspiciatis doloribus porro? Fugit amet
            recusandae distinctio.</p>
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



   </div>
   <!--End Content-->


   <?php require "../footer.php" ?>