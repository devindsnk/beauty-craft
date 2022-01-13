<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "DailyView";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Daily View";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept daily-view">
      <div class="page-top-main-container">
         <a href="<?php echo URLROOT ?>/reservations/addNew" class="btn btn-filled btn-theme-purple btn-main">Add
            New</a>
      </div>

      <form class="form filter-options" action="">
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
      </form>


      <div class="res-card-container">
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

      </div>
   </div>
   <!--End Content-->
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>