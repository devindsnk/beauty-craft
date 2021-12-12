<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Staff Members";
   $selectedSub = "";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>


   <?php
   $title = "Staff Members";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->

   <!----------------------- temporary buttons --------------------------------------->

   <div class="content own Remstaff">
      <?php require APPROOT . "/views/common/staffTable.php" ?>
   </div>

   <!--End Content-->

   <?php require APPROOT . "/views/inc/footer.php" ?>