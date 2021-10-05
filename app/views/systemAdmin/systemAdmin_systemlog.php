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
   <div class="content systemlogdownload">
<div class="systemlog">
<a href=""><button><i class="fa fa-download"></i>Download Now</button></a>
</div>

   </div>
   <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>