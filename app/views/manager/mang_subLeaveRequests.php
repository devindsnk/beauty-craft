<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Leaves";
   $selectedSub = "LeaveRequests";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Leave Requests";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <a href="<?php echo URLROOT ?>/leaves/leaveRequest"><button>Leave Request</button></a>
      <button class="btnOpen normal">Delete Leave Request</button></a>

      <!-- Leave request delete model -->
      <div class="modal-container normal">
         <div class="modal-box">
               <div class="leave-model-head">
                  <h1>Delete Leave Request ?</h1>
               </div>
               <div class="leave-model-head">
                  <p>Are you sure you want to delete the leave request? <br> This action cannot be undone after proceeding.</p>
               </div>
               <div class="leave-model-head">
                  <button class="btn btnClose normal leave-model-btn close-leave-model-btn">Close</button>
                  <button class="btn btnClose normal leave-model-btn proceed-leave-model-btn">proceed</button>
               </div>
         </div>
      </div>
      <!-- End of Leave request delete model -->

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>