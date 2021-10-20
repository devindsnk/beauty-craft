<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceProviderAnalytics";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Service Provider Analytics";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
    <?php require APPROOT . "/views/common/SubAnalyticsSProvider.php" ?>
    </div>

    <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>