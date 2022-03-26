<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "RecallRequests";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Recall Requests";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept recall-request">
      <div class="main-container">

         <?php foreach ($data as $recallRequest) : ?>
            <div class="sub-container contentBox">
               <div class="row">
                  <div class="left-section">
                     <div class="row-inner">
                        <div class="column">
                           <div class="text-group">
                              <span class=title>Service</span>
                              <span class=content><?php echo $recallRequest->serviceName ?></span>
                           </div>
                        </div>
                        <div class="column">
                           <div class="text-group">
                              <span class=title>Service Provider</span>
                              <span class=content>
                                 <?php echo $recallRequest->staffFName . " " . $recallRequest->staffLName ?>
                              </span>
                           </div>
                        </div>
                     </div>
                     <div class="row-inner">
                        <div class="column">
                           <div class="text-group">
                              <span class=title>Customer</span>
                              <span class=content>
                                 <?php echo $recallRequest->custFName . " " . $recallRequest->custLName ?>
                              </span>
                           </div>
                        </div>
                        <div class="column">
                           <div class="text-group">
                              <span class=title>Customer Contact No</span>
                              <span class=content>
                                 <?php echo $recallRequest->mobileNo ?>
                              </span>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="right-section">
                     <div class="date-box">
                        <span class="time">
                           <?php echo DateTimeExtended::minsToTime($recallRequest->startTime); ?>
                        </span>
                        <span class="mondate">
                           <?php echo DateTimeExtended::dateToShortMonthFormat($recallRequest->date, "M") . " " . DateTimeExtended::dateToShortMonthFormat($recallRequest->date, "D"); ?>
                        </span>
                        <span class="year"><?php echo DateTimeExtended::dateToShortMonthFormat($recallRequest->date, "Y"); ?>
                        </span>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="left-section desc-container">
                     <div class="text-group">
                        <span class="content">Recall Note</span>
                        <span class="description">
                           <?php echo $recallRequest->reason ?>
                        </span>
                     </div>
                  </div>
                  <div class="right-section btn-container">
                     <a class="btn btn-outlined btn-black btn-top">Edit</a>
                     <a class="btn btn-filled btn-error-red btnResCancel" data-id=<?php echo $recallRequest->reservationID ?>>Cancel</a>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>

         <!-- Cancellation modal -->
         <div class="modal-container reservation-cancel">
            <div class="modal-box">
               <div class="confirm-model-head">
                  <h1>Cancel Reservation</h1>
               </div>
               <div class="confirm-model-head">
                  <p>Are you sure you want to cancel the reservation?</p>
               </div>
               <div class="confirm-model-head">
                  <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                  <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="recallCancelReservation(this);">Yes, Cancel</button>
               </div>
            </div>
         </div>

      </div>
      <!--End Content-->
   </div>
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationOperations.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>
