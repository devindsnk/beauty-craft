<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Services";
   $selectedSub = "";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Services";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <?php require APPROOT . "/views/common/servicesTable.php" ?>

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>