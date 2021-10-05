<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Leaves";
   $selectedSub = "TakeLeave";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Take Leave";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <button class="btnOpen normal">Take Leave</button></a>
      <button class="btnOpen normal">Edit Leave</button></a>

      <!-- Take leave model -->
      <div class="modal-container normal">
         <div class="modal-box leave-request">
               <div class="new-type-head">
                  <h1>Take a Leave</h1>
               </div>
               <form action="" class="form">

                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Date</label><br>
                              <input type="date" name="" id="takeLeaveDate" placeholder="--Select a date--">
                           </div>
                           <span class="error"> <?php echo "Limit has exceeded for the date "; ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Reason</label><br>
                              <textarea id="takeLeaveReason" placeholder="-- Type in --" class="" name="" rows="4" cols="50"></textarea>
                           </div>
                     </div>
                  </div>

                  <div class="new-type-head">
                     <button class="btn btnClose normal close-type-btn">Close</button>
                     <button class="btn btnClose normal confirm-service-btn">Take</button>
                  </div>

               </form>
         </div>
      </div>
      <!-- End of Take leave model -->


      <!-- Edit taken leave model -->
      <div class="modal-container normal">
         <div class="modal-box leave-request">
               <div class="new-type-head">
                  <h1>Edit Leave</h1>
               </div>
               <form action="" class="form">

                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Date</label><br>
                              <input type="date" name="" id="takeLeaveDate" placeholder="--Select a date--">
                           </div>
                           <span class="error"> <?php echo "Limit has exceeded for the date "; ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Reason</label><br>
                              <textarea id="takeLeaveReason" class="" name="" rows="4" cols="50">Go to Hospital.......</textarea>
                           </div>
                     </div>
                  </div>

                  <div class="new-type-head">
                     <button class="btn btnClose normal close-type-btn">Close</button>
                     <button class="btn btnClose normal confirm-service-btn">Take</button>
                  </div>

               </form>
         </div>
      </div>
      <!-- End of Edit taken leave model -->

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>