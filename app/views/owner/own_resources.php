<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
   $selectedMain = "Resources";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

    <?php
   $title = "Resources";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

    <!--Content-->
    <div class="content resources">
    <?php require APPROOT . "/views/common/resourcesTable.php" ?>
    </div>

    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>