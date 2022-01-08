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

      <!-- Service delete model -->
      <!-- <div class="modal-container remove-service">
         <div class="modal-box">
               <div class="confirm-model-head">
                  <h1>Delete Service</h1>
               </div>
               <div class="confirm-model-head">
                  <p>Are you sure you want to delete the service? <br> This action cannot be undone after proceeding.</p>
               </div>
               <div class="confirm-model-head">
                  <button class="btn btnClose remove-service ModalButton ModalCancelButton">Close</button>
                  <button class="btn btnClose remove-service ModalButton ModalBlueButton">Confirm</button>
               </div>
         </div>
      </div> -->
      <!-- End of Service delete model -->

   </div>
   <!--End Content-->

   <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>