<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "Leaves";
    require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
   ?>

   <?php
   $title = "Leaves";
   $username = "Ruwanthi Munasinghe";
   $userLevel = "Service Provider";
   
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content serprov leave">
            <?php require APPROOT . "/views/common/leaveRequestTable.php" ?>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>