<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "Leaves";
   require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
   ?>

   <?php
   $title = "Leaves";

   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content serprov leave">
      <?php require APPROOT . "/views/common/leaveRequestTable.php" ?>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>