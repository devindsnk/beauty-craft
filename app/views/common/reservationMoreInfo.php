<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">View Reservation</h1>
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
                  <?php echo getDateFullFormat($data->date); ?>
                  <!-- Tuesday, 24 June 2021 -->
               </span>
               <span class="status-tag status-error-red">Cancelled</span>
            </div>

            <div class="sub-res-container">
               <div class="left-section">
                  <div class="text-group">
                     <!-- <label for="">Time</label> -->
                     <p>
                        <!--<?php echo $data->startTime; ?>-->08:30 AM
                     </p>
                  </div>
               </div>
               <div class="right-section">
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">Service</label>
                           <p><?php echo $data->serviceName; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Service Provider</label>
                           <p><?php echo $data->staffFName . " " . $data->staffLName; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">Duration</label>
                           <p><?php echo $data->totalDuration; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Price</label>
                           <p><?php echo $data->totalDuration; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="text-group">
                     <p for="">Remarks</p>
                     <label><?php echo $data->remarks; ?>Lorem ipsum dolor sit amet consectetur adipisicing elit. </label>
                  </div>
               </div>
            </div>
            <hr class="separator">

            <div class="sub-res-container">
               <div class="left-section">
                  <div class="text-group">
                     <!-- <label for="">Time</label> -->
                     <p>
                        <!--<?php echo $data->startTime; ?>-->08:30 AM
                     </p>
                  </div>
               </div>
               <div class="right-section">
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">Service</label>
                           <p><?php echo $data->serviceName; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Service Provider</label>
                           <p><?php echo $data->staffFName . " " . $data->staffLName; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">Duration</label>
                           <p><?php echo $data->totalDuration; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Price</label>
                           <p><?php echo $data->totalDuration; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="text-group">
                     <p for="">Remarks</p>
                     <label><?php echo $data->remarks; ?>Lorem ipsum dolor sit amet consectetur adipisicing elit. </label>
                  </div>
               </div>
            </div>

            <hr class="separator">
            <label>Total Duration</label>
            <p><?php echo $data->totalDuration; ?></p>
            <label>Total Price</label>
            <p><?php echo $data->totalDuration; ?></p>
         </div>

         <div class="bottom-container">
            <div class="left-section">
               <h3>Customer Details</h3>
               <div class="contentBox custDetails">
                  <div class="row">
                     <div class="column">
                        <div class="text-group">
                           <label for="">CustomerID</label>
                           <p>C<?php echo $data->customerID; ?></p>
                        </div>
                     </div>
                     <div class="column">
                        <div class="text-group">
                           <label for="">Name</label>
                           <p><?php echo $data->custFName . " " . $data->custLName; ?></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="text-group">
                        <label for="">Contact No</label>
                        <p><?php echo $data->mobileNo; ?></p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="right-section btn-container">
               <a href="" class="btn btn-outlined btn-grey">Edit</a>
               <a href="" class="btn btn-outlined btn-error-red">Cancel</a>
               <a href="" class="btn btn-outlined btn-blue">No Show</a>
               <a href="" class="btn btn-filled btn-theme-purple btn-last">Checkout</a>
            </div>
         </div>
      </div>

   </div>

   <?php require APPROOT . "/views/inc/footer.php" ?>