<?php require APPROOT . "/views/inc/header.php" ?>

<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceAnalytics";
   require APPROOT . "/views/owner/own_sideNav.php"
   ?>

   <?php
   $title = "Service Analytics";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

    <!--Content-->
    <div class="content">
    <?php require APPROOT . "/views/common/SubAnalyticsService.php" ?>
    </div>

    <!--End Content-->
   <?php require APPROOT . "/views/inc/footer.php" ?>