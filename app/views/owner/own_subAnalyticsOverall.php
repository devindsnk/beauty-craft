<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "OverallAnalytics";
   require APPROOT . "/views/owner/own_sideNav.php"
   ?>

   <?php
   $title = "Overall Analytics";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->

   <div class="content">
      <?php require APPROOT . "/views/common/SubAnalyticsOverall.php" ?>
   </div>

   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>