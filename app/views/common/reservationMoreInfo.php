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
         elseif ($userTypeNo == 4) echo "/receptDashboard/reservations";
         ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
      </div>
   </header>

   <div class="recept content resMoreInfo">
      <div class="innerContainer">
         <h3>Reservation Details</h3>
         <div class="contentBox">
            <span class="date">Monday 24th August 2021</span>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label for="">Time</label>
                     <p>12:30 PM</p>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label for="">Service</label>
                     <p>Hair Cuts - Mens</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label for="">Duration</label>
                     <p>30 mins</p>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label for="">Service Provider</label>
                     <p>Ravindu Madhubhashana</p>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label for="">Remarks</label>
                     <p>30 mins</p>
                  </div>
               </div>
            </div>
         </div>
         <h3>Customer Details</h3>
         <div class="contentBox">
            <div class="row-2">
               <div class="column">
                  <div class="text-group inner-row">
                     <label for="">CustomerID</label>
                     <p>C000022</p>
                  </div>
                  <div class="text-group inner-row">
                     <label for="">Name</label>
                     <p>Devin Dissanayake</p>
                  </div>
                  <div class="text-group inner-row">
                     <label for="">Contact No</label>
                     <p>0717679714</p>
                  </div>

               </div>
               <div class="column">
                  <div class="btn-container">
                     <a href="" class="btn btn-outlined btn-grey">Edit</a>
                     <a href="" class="btn btn-outlined btn-error-red">Cancel</a>
                     <a href="" class="btn btn-outlined btn-blue">No Show</a>
                     <a href="" class="btn btn-filled btn-grey btn-last">Checkout</a>
                  </div>
               </div>
            </div>

         </div>
      </div>

   </div>

   <?php require APPROOT . "/views/inc/footer.php" ?>