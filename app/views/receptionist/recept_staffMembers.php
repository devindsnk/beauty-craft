<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "StaffMembers";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Staff Members";
   $username = "Devin Dissanayake";
   $userLevel = "Receptionist";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept staff-members">
      <h3>This is main option 1</h3>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>