<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Customers";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Customers";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <?php require APPROOT . "/views/common/customersTable.php" ?>

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>