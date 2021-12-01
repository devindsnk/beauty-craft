<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php $selectedMain = "Leaves";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>
   <?php $title = "Leaves";
   require APPROOT . "/views/inc/headerBar.php"
   ?>
   <!-- Content -->
      <div class="content recept leaves">
        <?php require APPROOT . "/views/common/leaveRequestTable.php" ?>  
      </div>
      <?php require APPROOT . "/views/inc/footer.php" ?>