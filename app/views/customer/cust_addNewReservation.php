<?php require APPROOT . "/views/customer/cust_headerBar.php"; ?>
<!-- Configure this using session variables later -->
<?php $userID = Session::getUser("id"); ?>

<div class="content cust new-res">
   <div class="main-container">
      <button class="btn btn-filled btn-black goBackBtn" onclick="history.back()">Go back!</button>
      <h1>New Reservation</h1>

      <div class="form">

         <div class="contentBox service-container">
            <div class="top-container">
               <div class="dropdown-group left-box service">
                  <label class="label" for="lName">Service</label>
                  <select name="serviceID" id="" class="serviceSelect">
                     <option value="" selected disabled>Select</option>
                     <?php foreach ($data['servicesList'] as $service) : ?>
                        <option value="<?php echo $service->serviceID ?>"><?php echo $service->name ?></option>
                     <?php endforeach; ?>
                  </select>
                  <span class="error service-error"></span>
               </div>

               <div class="dropdown-group right-box duration">
                  <label class="label" for="fName">Duration</label>
                  <input type="text" name="duration" id="fName" disabled class="durationBox">
               </div>

               <div class="text-group left-box date">
                  <label class="label" for="fName">Date</label>
                  <input type="date" id="date_picker" name="date" value="" class="dateSelect">
                  <span class="error date-error"></span>
                  <span class="info-line">*A reservation can be placed upto maximum of two months ahead. </span>
               </div>

               <div class="dropdown-group right-box start-time">
                  <label class="label" for="lName">Time</label>
                  <select name="startTime" class="startTimeSelect">
                     <option value="" selected disabled>Select</option>
                     <?php for ($i = 9; $i <= 19; $i += 1) : ?>
                        <?php for ($j = 0; $j <= 50; $j += 10) : ?>
                           <option value="<?php echo $i * 60 + $j; ?>" class="font-numeric">
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
                  <span class="error sTime-error"></span>
               </div>

               <div class="text-group ser-provider">
                  <label class="label" for="lName">Service Provider</label>
                  <select name="staffID" id="" class="serviceProviderSelect">
                     <option value="" selected disabled>Select service first</option>
                  </select>
                  <span class="error sProv-error"></span>
               </div>
            </div>

            <div class="text-group last-group">
               <label class="label" for="fName">Remarks</label>
               <textarea name="remarks" id="" maxlength="200" class="remarks"></textarea>
            </div>
            <span class="error remarks-error"></span>
         </div>

         <button class="btn btn-filled btn-theme-red addResBtnCust">Place Reservation</button>

      </div>
   </div>
</div>

<script language="javascript">
   const datePicker = document.getElementById("date_picker");

   let today = new Date().toISOString().split('T')[0];
   let maxDate = new Date();
   month = new Date().getMonth();
   maxDate.setMonth(maxDate.getMonth() + 2);
   maxDate = maxDate.toISOString().split('T')[0];

   datePicker.setAttribute('min', today);
   datePicker.setAttribute('max', maxDate);
   datePicker.setAttribute('format', 'yyyy-MM-dd')
</script>

<script src="<?php echo URLROOT ?>/public/js/fetchRequests/newReservation.js"></script>

<?php require APPROOT . "/views/customer/cust_footer.php" ?>
