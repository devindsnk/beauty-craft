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
      <h3>This is main option 1</h3>
      <a href="<?php echo URLROOT ?>/services/addService"><button>New Service</button></a>
      <a href="<?php echo URLROOT ?>/services/addService2"><button>New Service2</button></a>
      <a href="<?php echo URLROOT ?>/services/viewService"><button>View Service</button></a>
      <a href="<?php echo URLROOT ?>/services/updateService"><button>Update Service</button></a>
      <button class="btnOpen normal">Delete Service</button></a>
   </div>

   <!-- New service type model -->
   <div class="modal-container normal">
      <div class="modal-box">
            <div class="new-type-head">
               <h1>Delete Service</h1>
            </div>
            <div class="new-type-head">
               <p>Are you sure the.........!!!</p>
            </div>
            <div class="new-type-head">
            <button class="btn btnClose normal close-type-btn">Close</button>
            <button class="btn btnClose normal close-type-btn">Confirm</button>
            </div>
      </div>
   </div>
   <!-- End of New service type model -->

   <!--End Content-->

   <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>