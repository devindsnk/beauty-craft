<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Reservations";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Reservations";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <?php require APPROOT . "/views/common/reservationsTable.php" ?>




   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>