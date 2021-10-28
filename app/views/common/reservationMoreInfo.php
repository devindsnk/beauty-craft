<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">View Reservation</h1>
      </div>
      <div class="header-right verticalCenter">
         <a href="
			<?php echo URLROOT;
         if ($userTypeNo == 2) echo "/OwnDashboard/analyticsSProvider";
         elseif ($userTypeNo == 3) echo "/MangDashboard/analyticsSProvider";
         elseif ($userTypeNo == 4) echo "/reservations/viewAllReservations";
         ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
      </div>
   </header>

   <div class="recept content resMoreInfo">
      <div class="innerContainer">
         <h3>Reservation Details</h3>
         <div class="contentBox">
            <span class="date"><?php echo $data->date; ?></span>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label for="">Time</label>
                     <p><?php echo $data->startTime; ?></p>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label for="">Service</label>
                     <p><?php echo $data->serviceName; ?></p>
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
                     <label for="">Service Provider</label>
                     <p><?php echo $data->staffFName . " " . $data->staffLName; ?></p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label for="">Remarks</label>
                     <p><?php echo $data->remarks; ?></p>
                  </div>
               </div>
            </div>
         </div>
         <h3>Customer Details</h3>
         <div class="contentBox custDetails">
            <div class="row-2">
               <div class="column">
                  <div class="text-group inner-row">
                     <label for="">CustomerID</label>
                     <p>C<?php echo $data->customerID; ?></p>
                  </div>
                  <div class="text-group inner-row">
                     <label for="">Name</label>
                     <p><?php echo $data->custFName . " " . $data->custLName; ?></p>
                  </div>
                  <div class="text-group inner-row last-row">
                     <label for="">Contact No</label>
                     <p><?php echo $data->mobileNo; ?></p>
                  </div>

               </div>
               <div class="column">
                  <div class="btn-container">
                     <a href="" class="btn btn-outlined btn-grey">Edit</a>
                     <a href="" class="btn btn-outlined btn-error-red">Cancel</a>
                     <a href="" class="btn btn-outlined btn-blue">No Show</a>
                     <a href="" class="btn btn-filled btn-theme-purple btn-last">Checkout</a>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>

   <?php require APPROOT . "/views/inc/footer.php" ?>