<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Salaries";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Salaries";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own salaries">

   <button class="btnOpen" type="button">
      <a href="<?php echo URLROOT?>/staff/salaryReport">View Salary Report</a>       
      </button>

    </div>

   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>