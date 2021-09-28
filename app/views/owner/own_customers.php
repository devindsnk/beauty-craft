<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Customers";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Customers";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Customer</button>
   </div>
   <!------------------- Remove Staff Container starts ----------------------------->
      <div class="modal-container normal">
      <div class="modal-box">
         <h1 class="ownRemCusHead">Remove Customer</h1>
         <!-- start main grid 1 -->
         <div class= "ownRemCusDetails">
             
             <label class = "ownRemCusLabel1">Customer Id</label>
             <span class="ownRemCusData1">M001</span>
             <br>
             <label class= "ownRemCusLabel2">Name</label>
             <span class="ownRemCusData2">Ravindu Madhubhashana</span>
             <br>
         </div>
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="ownRemCusError">
                <label class="ownRemCusErrortext">Cannot proceed. Has upcoming reservations</label>
         </div>
         <!-- main grid 2 ends -->
         <!-- main grid 3 starts -->
         <div class="ownRemCusButtons">
            <div class="ownRemCusbtn1">
            <button class="btn btnClose normal">Cancel</button>
            </div>
            <div class="ownRemCusbtn2">
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




   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>