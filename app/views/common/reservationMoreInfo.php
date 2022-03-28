<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
   <header class="full-header">
      <div class="header-center">
         <h1 class="header-topic">View Reservation</h1>
         <h3 class="header-subtopic">R<?php echo $data["reservationID"]; ?></h3>
      </div>
      <div class="header-right verticalCenter">
         <span class="top-right-closeBtn" onclick="history.back()">
            <i class=" fal fa-times fa-2x "></i>
         </span>
      </div>
   </header>

   <div class="recept content resMoreInfo">
      <div class="innerContainer">

         <h3>Reservation Details</h3>
         <div class="contentBox resDetails">

            <div class="date-status">
               <span class="date">
                  <?php echo DateTimeExtended::dateToShortMonthFormat($data["date"], "X"); ?>
               </span>
               <?php
               $statusClassList = ["status-error-red", "status-blue", "status-success-green", "status-grey", "status-grey", "status-warning-yellow"];
               $statusValueList  = ["Cancelled", "Pending", "Confirmed", "No Show", "Completed", "Recalled"];
               $statusClass = $statusClassList[$data["status"]];
               $statusValue = $statusValueList[$data["status"]];
               ?>
               <span class="status-tag <?php echo  $statusClass; ?>"><?php echo  $statusValue; ?></span>
            </div>

            <div class="sub-res-container">


               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label for="">Time</label>
                        <p><?php echo DateTimeExtended::minsToTime($data["startTime"]); ?> </p>
                     </div>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label for="">Service</label>
                        <p><?php echo $data["serviceName"]; ?></p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label for="">Duration</label>
                        <p><?php echo DateTimeExtended::minsToDuration($data["totalDuration"]); ?></p>
                     </div>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label for="">Service Provider</label>
                        <p><?php echo $data["staffFName"] . " " . $data["staffLName"]; ?></p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label for="">Price</label>
                        <p><?php echo $data["price"]; ?> LKR</p>
                     </div>
                  </div>
               </div>


            </div>
            <hr class="separator">
            <div class="text-group">
               <p for="">Remarks</p>
               <label><?php echo $data["remarks"]; ?></label>
            </div>
         </div>

         <div class="bottom-container">
            <div class="left-section">
               <h3>Customer Details</h3>
               <div class="contentBox custDetails">
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">CustomerID</label>
                           <p>C<?php echo $data["customerID"]; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Name</label>
                           <p><?php echo $data["custFName"] . " " . $data["custLName"]; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="text-group">
                        <label for="">Contact No</label>
                        <p><?php echo $data["mobileNo"]; ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <?php $btnDisabledStatus = ($data["status"] == 1 || $data["status"] == 2) ? "" : "disabled"; ?>
            <?php
            $curDate = DateTimeExtended::getCurrentDate();
            $btnSpecDisabled = ($data["date"] > $curDate) ? "disabled" : ""; ?>
            <div class="right-section btn-container">
               <a href="<?php echo URLROOT ?>/Reservations/reservationEditRecept/<?php echo $data['reservationID']; ?>" class="btn btn-outlined btn-grey" <?php echo $btnDisabledStatus; ?>>Edit</a>
               <button class="btn btn-outlined btn-error-red btnResCancel" <?php echo $btnDisabledStatus; ?> data-id=<?php echo $data["reservationID"]; ?>>Cancel</button>
               <button class="btn btn-outlined btn-blue btnResNoShow" <?php echo $btnDisabledStatus;  ?> <?php echo $btnSpecDisabled; ?> data-id=<?php echo $data["reservationID"]; ?>>No Show</button>
               <button class="btn btn-filled btn-theme-purple btn-last btnResCheckout" <?php echo $btnDisabledStatus; ?> <?php echo $btnSpecDisabled; ?> data-id=<?php echo $data["reservationID"]; ?>>Checkout</button>
            </div>
         </div>
      </div>

   </div>

   <!-- Res Cancellation modal -->
   <div class="modal-container reservation-cancel">
      <div class="modal-box size-confirmation">
         <div class="confirm-model-head">
            <h1>Cancel Reservation</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to cancel the reservation?</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="cancelReservation(this);">Yes, Cancel</button>
         </div>
      </div>
   </div>
   <!-- End of Res Cancellation modal -->

   <!-- Res NoShow modal -->
   <div class="modal-container reservation-noShow">
      <div class="modal-box size-confirmation">
         <div class="confirm-model-head">
            <h1>Mark as No Show</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to mark the reservation<br>as a No Show?</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalBlueButton proceedBtn" onclick="markReservationNoShow(this);">Yes</button>
         </div>
      </div>
   </div>
   <!-- End of Res NoShow modal -->

   <!-- Res Checkout modal -->
   <div class="modal-container reservation-checkout">
      <div class="modal-box size-confirmation">
         <div class="confirm-model-head">
            <h1>Checkout the reservation</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want checkout the reservation<br>and generate an invoice?</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalPurpleButton proceedBtn" onclick="checkoutReservation(this);">Yes, Checkout</button>
         </div>
      </div>
   </div>
   <!-- End of Res Checkout modal -->

   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationOperations.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>
