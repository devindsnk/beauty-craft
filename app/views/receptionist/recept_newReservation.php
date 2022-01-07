<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">New Reservation</h1>
      </div>
      <div class="header-right verticalCenter">
         <a onclick="history.back()" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
      </div>
   </header>

   <div class="recept content newRes">


      <form action="<?php echo URLROOT; ?>/reservations/newReservationCust" method="post" class="form">

         <div class="inner-container">

            <h3>Customer Details</h3>
            <div class="contentBox cust-container">

               <div class="text-group">
                  <label class="label" for="fName">Customer Name / Contact No</label>
                  <input type="text" name="" id="fName" placeholder="Search">
               </div>

               <div class="profile-info">
                  <div class="img-container">
                     <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/person1.jpg"></img>
                  </div>
                  <div class="text-container">
                     <label for="" class="cust-name">Ravindu Madhubhashana</label>
                     <label for="" class="contact-no">0717679714</label>
                  </div>
                  <i class="fal fa-times profile-remove"></i>
               </div>
            </div>



            <h3>Reservation Details</h3>

            <div class="contentBox service-container">
               <div class="top-container">
                  <div class="text-group date">
                     <label class="label" for="fName">Date</label>
                     <input type="date" id="date_picker" name="date" value="<?php /* echo $data['date']; */ ?>" class="dateSelect">
                     <span class="error date-error">
                        <!-- <?php echo $data['date_error']; ?> -->
                     </span>
                     <span class="info-line">*A reservation can be placed upto maximum of two months ahead. </span>
                  </div>

                  <div class="dropdown-group left-box start-time">
                     <label class="label" for="lName">Start Time</label>
                     <select name="startTime" class="startTimeSelect">
                        <option value="" selected disabled>Select</option>
                        <?php for ($i = 9; $i <= 18; $i += 1) : ?>
                           <?php for ($j = 0; $j <= 50; $j += 10) : ?>
                              <option value="<?php echo $i * 60 + $j; ?>" class="font-numeric" <?php if ($data['startTime'] == $i * 60 + $j) echo " selected"; ?>>
                                 <?php
                                 if ($i < 12)
                                    echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " AM";
                                 else if ($i == 12)
                                    echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " PM";
                                 else
                                    echo str_pad($i - 12, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " PM";
                                 ?>
                              </option>
                           <?php endfor; ?>
                        <?php endfor; ?>
                     </select>
                     <span class="error"><?php /* echo $data['startTime_error']; */ ?></span>
                  </div>

                  <div class="dropdown-group right-box service">
                     <label class="label" for="lName">Service</label>
                     <select name="serviceID" id="" class="serviceSelect">
                        <option value="" selected disabled>Select</option>
                        <?php /* foreach ($data['servicesList'] as $service) : ?>
                     <option value="<?php echo $service->serviceID ?>"><?php echo $service->name ?></option>
                  <?php endforeach;*/ ?>
                     </select>
                     <span class="error"><?php /*echo $data['serviceID_error'];*/ ?></span>
                  </div>

                  <div class="text-group left-box duration">
                     <label class="label" for="fName">Duration</label>
                     <input type="text" name="duration" id="fName" disabled class="durationBox">
                  </div>

                  <div class="dropdown-group right-box ser-provider">
                     <label class="label" for="lName">Service Provider</label>
                     <select name="staffID" id="" class="serviceProviderSelect">
                        <option value="" selected disabled>Select service first</option>
                     </select>
                     <span class="error"><?php /*echo $data['staffID_error'];*/ ?></span>
                  </div>

               </div>


               <div class="text-group last-group">
                  <label class="label" for="fName">Remarks</label>
                  <textarea name="remarks" id="" maxlength="200" class="remarks"></textarea>
               </div>
               <span class="error"><?php /* echo $data['remarks_error']; */ ?></span>

            </div>

         </div>
         <div class="btn-container">
            <a href="" class="btn btn-filled btn-theme-purple btn-main">Place Reservation</a>
         </div>

      </form>
      <!-- ///////////////////////////////////////////////////////////////////////////// -->

   </div>

   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/newReservation.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>