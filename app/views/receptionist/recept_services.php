<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Services";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Services";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept services">

      <?php require APPROOT . "/views/common/servicesTable.php" ?>

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>