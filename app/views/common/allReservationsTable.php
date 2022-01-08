<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">

   <!-- TODO: provide relevent sideNav by checking logged in user -->
   <?php
   $selectedMain = "Reservations";
   $selectedSub = "";
   switch (Session::getUser("type"))
   {

      case "2":
         require APPROOT . "/views/owner/own_sideNav.php";
         break;
      case "3":
         require APPROOT . "/views/manager/mang_sideNav.php";
         break;
      case "4":
         require APPROOT . "/views/receptionist/recept_sideNav.php";
   }

   ?>

   <?php
   $title = "Reservations";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept reservations">
      <?php if ($userTypeNo == 4) : ?>
         <div class="page-top-main-container">
            <a href="<?php echo URLROOT ?>/reservations/addNewResRecept" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
         </div>
      <?php endif; ?>
      <!-- <?php var_dump($data) ?> -->
      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Type</label>
                        <select id="sTypeSelector">
                           <option value="all" selected>All</option>
                           <?php foreach ($data['serviceTypesList'] as $serviceType) : ?>
                              <option value="<?php echo $serviceType->type ?>" <?php echo ($data["selectedType"] ==  $serviceType->type) ? "selected" : "" ?>><?php echo $serviceType->type; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Provider</label>
                        <select id="staffSelector">
                           <option value="all" selected>All</option>
                           <?php foreach ($data['serviceProvidersList'] as $sProvider) : ?>
                              <option value="<?php echo $sProvider->staffID; ?>" <?php echo ($data["selectedStaffID"] ==  $sProvider->staffID) ? "selected" : "" ?>><?php echo $sProvider->fName . " " . $sProvider->lName; ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select id="statusSelector">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data["selectedStatus"] == '1') ? "selected" : "" ?>>Pending</option>
                           <option value="2" <?php echo ($data["selectedStatus"] == '2') ? "selected" : "" ?>>Confirmed</option>
                           <option value="4" <?php echo ($data["selectedStatus"] == '4') ? "selected" : "" ?>>Completed</option>
                           <option value="0" <?php echo ($data["selectedStatus"] == '0') ? "selected" : "" ?>>Cancelled</option>
                           <option value="3" <?php echo ($data["selectedStatus"] == '3') ? "selected" : "" ?>>No Show</option>
                           <option value="5" <?php echo ($data["selectedStatus"] == '5') ? "selected" : "" ?>>Recalled</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo ""; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <button type="button" id="allResFilterBtn" class="btn btn-filled btn-black">Search</button>
               <!-- <button class="btn btn-search">Search</button> -->
            </div>
         </div>

      </form>

      <div class="table-container reservations-table">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Reservation ID</th>
                     <th class="column-center-align col-2">Date</th>
                     <th class="column-center-align col-3">Time</th>
                     <th class="column-center-align col-4">Service</th>
                     <th class="column-center-align col-5">Service Provider</th>
                     <th class="column-center-align col-6">Customer</th>
                     <th class="column-center-align col-7">Status</th>
                     <th class="col-8"></th>
                  </tr>
               </thead>

               <tbody>
                  <?php foreach ($data['reservationsList'] as $reservation) : ?>
                     <?php
                     $statusClassList = ["red", "blue", "green", "grey", "grey", "yellow"];
                     $statusValueList  = ["Cancelled", "Pending", "Confirmed", "No Show", "Completed", "Recalled"];
                     $statusClass = $statusClassList[$reservation->status];
                     $statusValue = $statusValueList[$reservation->status];
                     ?>


                     <tr>
                        <td data-lable="Reservation ID" class="column-center-align font-numeric">R<?php echo $reservation->reservationID; ?></td>
                        <td data-lable="Date" class="column-center-align"><?php echo $reservation->date; ?></td>
                        <td data-lable="Time" class="column-center-align font-numeric"><?php echo DateTimeExtended::minsToTime($reservation->startTime); ?></td>
                        <td data-lable="Service" class="column-left-align"><?php echo $reservation->serviceName; ?></td>
                        <td data-lable="Service Provider" class="column-left-align"><?php echo $reservation->staffFName . " " . $reservation->staffLName; ?></td>
                        <td data-lable="Customer" class="column-left-align"><?php echo $reservation->custFName . " " . $reservation->custLName; ?></td>
                        <td data-lable="Status" class="column-center-align">
                           <button type="button" class="status-btn text-uppercase <?php echo $statusClass; ?> "><?php echo $statusValue ?></button>
                        </td>
                        <td class="column-center-align">
                           <span>
                              <a href="<?php echo URLROOT ?>/Reservations/reservationMoreInfo/<?php echo $reservation->reservationID; ?>"><i class="ci-view-more table-icon img-gap"></i></a>
                              <?php if (Session::getUser("typeText") == "Receptionist") : ?>
                                 <a href="#"><i class="ci-edit table-icon img-gap"></i></a>
                                 <!-- <a href="#"><i class="ci-trash table-icon img-gap"></i></a> -->
                              <?php endif; ?>
                           </span>
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->

   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>