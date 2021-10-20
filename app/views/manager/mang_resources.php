<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Resources";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Resources";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content resources">
   <?php require APPROOT . "/views/common/resourcesTable.php" ?>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>