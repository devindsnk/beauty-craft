<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Services";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Services";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">


      <?php require APPROOT . "/views/common/servicesTable.php" ?>



      <h3>This is main option 1</h3>
      <a href="<?php echo URLROOT ?>/services/addService"><button>New Service</button></a>
      <a href="<?php echo URLROOT ?>/services/addService2"><button>New Service2</button></a>
      <button class="btnOpen normal">Delete Service</button></a>

   </div>


   <!-- End of New service type model -->

   <!--End Content-->

   <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>