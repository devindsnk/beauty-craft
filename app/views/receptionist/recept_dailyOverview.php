<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "DailyOverview";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Daily Overview";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept daily-view">
      <div class="page-top-main-container">
         <a href="<?php echo URLROOT ?>/reservations/newReservationRecept" class="btn btn-filled btn-theme-purple btn-main">Add
            New</a>
      </div>

      <div class="sProvHeadersContainer">
         <div class="arrow arrowLeft" onclick="arrowClick(0)"><i class="dOverview-icon ci ci-arrowCircleLeft"></i></div>
         <div class="sProvHeader">
            <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/IMG-61cfaba71ac052.86263460.jpg"></img>
            <span></span>
         </div>
         <div class="sProvHeader">
            <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/IMG-61cfaba71ac052.86263460.jpg"></img>
            <span></span>
         </div>
         <div class="sProvHeader">
            <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/IMG-61cfaba71ac052.86263460.jpg"></img>
            <span></span>
         </div>
         <div class="sProvHeader">
            <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/IMG-61cfaba71ac052.86263460.jpg"></img>
            <span></span>
         </div>
         <div class="sProvHeader">
            <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/staffImgs/IMG-61cfaba71ac052.86263460.jpg"></img>
            <span></span>
         </div>
         <div class="arrow arrowRight" onclick="arrowClick(1)"><i class="dOverview-icon ci ci-arrowCircleRight"></i></div>
      </div>
      <div class="mainResContainer">
         <div class="timeVals">


            <?php for ($i = 9; $i <= 19; $i += 1) : ?>
               <?php
               $hour = "";
               $suf = "";
               if ($i < 12)
               {
                  $hour = $i;
                  $suf = "AM";
               }
               else if ($i == 12)
               {
                  $hour = $i;
                  $suf = "PM";
               }
               else
               {
                  $hour = $i - 12;
                  $suf = "PM";
               }
               ?>
               <div class="timeBox">
                  <?php echo str_pad($hour, 2, "0", STR_PAD_LEFT) . " $suf"; ?>
               </div>
            <?php endfor; ?>
         </div>
         <div class="sProvResContainer">
            <!-- <div class="resBox res0">
               <div class="resBoxInner">
                  <div class="statusSection"></div>
                  <div class="infoSection">
                     <span class="time">09:00 AM - 09:40 AM</span>
                     <span class="service">Ladies HairTrim</span>
                  </div>
                  <div class="idSection">
                     <span class="alphanumeric">R0000001</span>
                  </div>
               </div>
            </div> -->
            <!-- <div class="resBox res1">
               <div class="resBoxInner">
                  <div class="statusSection"></div>
                  <div class="infoSection">
                     <span class="time">09:00 AM - 09:40 AM</span>
                     <span class="service">Ladies HairTrim</span>
                  </div>
                  <div class="idSection">
                     <span class="alphanumeric">R0000001</span>
                  </div>
               </div>
            </div>
            <div class="resBox res2">
               <div class="resBoxInner">
                  <div class="statusSection"></div>
                  <div class="infoSection">
                     <span class="time">09:00 AM - 09:40 AM</span>
                     <span class="service">Ladies HairTrim</span>
                  </div>
                  <div class="idSection">
                     <span class="alphanumeric">R0000001</span>
                  </div>
               </div>
            </div>
            <div class="resBox res3">
               <div class="resBoxInner">
                  <div class="statusSection"></div>
                  <div class="infoSection">
                     <span class="time">09:00 AM - 09:40 AM</span>
                     <span class="service">Ladies HairTrim</span>
                  </div>
                  <div class="idSection">
                     <span class="alphanumeric">R0000001</span>
                  </div>
               </div>
            </div> -->
         </div>
         <div class="sProvResContainer">
            <!-- <div class="resBox res0">
               <div class="resBoxInner">
                  <div class="statusSection"></div>
                  <div class="infoSection">
                     <span class="time">09:00 AM - 09:40 AM</span>
                     <span class="service">Ladies HairTrim</span>
                  </div>
                  <div class="idSection">
                     <span class="alphanumeric">R0000001</span>
                  </div>
               </div>
            </div> -->
         </div>
         <div class="sProvResContainer"></div>
         <div class="sProvResContainer"></div>
         <div class="sProvResContainer"></div>


      </div>



      <!-- <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Date</label>
                        <input type="date" name="" id="datePicker" value="<?php echo $data["selectedDate"] ?>">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Provider</label>
                        <select id="staffSelector">
                           <option value="" selected>All</option>
                           <?php foreach ($data['serviceProvidersList'] as $sProvider) : ?>
                              <option value="<?php echo $sProvider->staffID ?>" <?php echo ($data["selectedStaffID"] ==  $sProvider->staffID) ? "selected" : ""; ?>><?php echo $sProvider->fName . " " . $sProvider->lName; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <button type="button" id="filterDailyViewBtn" class="btn btn-filled btn-black">Search</button>
            </div>
         </div>
      </form> -->


      <!-- <div class="res-card-container">
         <?php foreach ($data["reservations"] as $reservation) : ?>
            <div class="contentBox res-card">
               <div class="time-box column"><?php echo DateTimeExtended::minsToTime($reservation->startTime); ?></div>
               <div class="service-name-box column"><?php echo $reservation->serviceName; ?></div>
               <div class="service-prov-box column"><?php echo $reservation->staffFName . " " . $reservation->staffLName; ?></div>
               <div class="customer-box column"><?php echo $reservation->custFName . " " . $reservation->custLName ?></div>
               <div class="contact-box column"><?php echo $reservation->custMobileNo; ?></div>
               <div class="status-box column">
                  <span class="status-tag status-success-green">Cancelled</span>
               </div>
               <div class="opt-box">
                  <a href="#"><i class="ci-view-more table-icon img-gap"></i></a>
               </div>
            </div>
         <?php endforeach; ?>

      </div> -->
   </div>
   <!--End Content-->
   <script src="<?php echo URLROOT ?>/public/js/dailyOverview.js"></script>
   <!-- <script src="<?php echo URLROOT ?>/public/js/filters.js"></script> -->

   <?php require APPROOT . "/views/inc/footer.php" ?>
