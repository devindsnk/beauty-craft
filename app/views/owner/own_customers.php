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
   <div class="content own customers">


      <?php require APPROOT . "/views/common/customersTable.php" ?>


   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>