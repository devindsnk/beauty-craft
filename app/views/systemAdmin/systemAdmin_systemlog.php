<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "SystemLog";
   $selectedSub = "";
   require APPROOT . "/views/systemAdmin/systemAdmin_sideNav.php"
   ?>

   <?php
   $title = "system Log";
   $username = "Ruwanthi Munasinghe";
   $userLevel = "System admin";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is System Log</h3>




   </div>
   <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>