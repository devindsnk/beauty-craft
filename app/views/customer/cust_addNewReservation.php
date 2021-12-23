<?php require APPROOT . "/views/customer/cust_headerBar.php"; ?>
<!-- Configure this using session variables later -->
<?php $userID = Session::getUser("id"); ?>

<div class="content cust new-res">
   <div class="main-container">
      <button class="btn btn-filled btn-black goBackBtn" onclick="history.back()">Go back!</button>
      <h1>New Reservation</h1>

      <form action="<?php echo URLROOT; ?>/reservations/newReservationCust" method="post" class="form">
         <div class="text-group date">
            <label class="label" for="fName">Date</label>
            <input type="date" id="date_picker" name="date" value="<?php echo $data['date']; ?>" class="dateSelect">
            <span class="error date-error">
               <!-- <?php echo $data['date_error']; ?> -->
            </span>
            <span class="info-line">*A reservation can be placed upto maximum of two months ahead. </span>

         </div>
         <div class="contentBox service-container">
            <div class="top-container">
               <!-- <div class="row">
                  <div class="column"> -->
               <div class="dropdown-group left-box start-time">
                  <label class="label" for="lName">Start Time</label>
                  <select name="startTime" id="">
                     <option value="" selected disabled>Select</option>
                     <?php for ($i = 9; $i <= 18; $i += 1) : ?>
                        <?php for ($j = 0; $j <= 50; $j += 10) : ?>
                           <option value="<?php echo $i * 60 + $j; ?>" class=font-numeric <?php if ($data['startTime'] == $i * 60 + $j) echo "selected"; ?>>
                              <?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT); ?>

                           </option>
                        <?php endfor; ?>
                     <?php endfor; ?>
                  </select>
                  <span class="error"><?php echo $data['startTime_error']; ?></span>
               </div>
               <!-- </div> -->
               <!-- <div class="column"> -->
               <div class="dropdown-group right-box service">
                  <label class="label" for="lName">Service</label>
                  <select name="serviceID" id="" class="serviceSelect">
                     <option value="" selected disabled>Select</option>
                     <?php foreach ($data['servicesList'] as $service) : ?>
                        <option value="<?php echo $service->serviceID ?>"><?php echo $service->name ?></option>
                     <?php endforeach; ?>
                  </select>
                  <span class="error"><?php echo $data['serviceID_error']; ?></span>
               </div>
               <!-- </div> -->
               <!-- </div> -->
               <!-- <div class="row"> -->
               <!-- <div class="column"> -->
               <div class="text-group left-box duration">
                  <label class="label" for="fName">Duration</label>
                  <input type="text" name="duration" id="fName" disabled class="durationBox">
               </div>
               <!-- </div> -->
               <!-- <div class="column"> -->
               <div class="dropdown-group right-box ser-provider">
                  <label class="label" for="lName">Service Provider</label>
                  <select name="staffID" id="" class="serviceProviderSelect">
                     <option value="" selected disabled>Select service first</option>
                  </select>
                  <span class="error"><?php echo $data['staffID_error']; ?></span>
               </div>

               <!-- </div> -->
               <!-- </div> -->
            </div>

            <div class="text-group last-group">
               <label class="label" for="fName">Remarks</label>
               <textarea name="remarks" id="" maxlength="200" class="remarks"></textarea>
            </div>
            <span class="error"><?php echo $data['remarks_error']; ?></span>
         </div>

         <span class="another-service">+ Add another service</span>

         <div class="contentBox summary-container">
            <label class="title">Summary</label>
            <div>
               <label>Service Name 1</label>
               <span> 888.00 LKR</span>
            </div>
            <div>
               <label>Service Name 1</label>
               <span> 888.00 LKR</span>
            </div>
            <div>
               <label>Service Name 1</label>
               <span> 888.00 LKR</span>
            </div>
            <button type="submit" class="btn btn-filled btn-theme-red addResBtn">Add Reservation</button>
         </div>

         <!-- <div class="row hideElement">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Customer</label>
                  <input type="text" name="customerID" id="fName" value="<?php echo Session::getUser("id"); ?>">
               </div>
            </div>
         </div> -->
      </form>
   </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> -->
<!-- <script src="<?php echo URLROOT ?>/public/js/jquery-3.6.0.min.js"></script> -->
<!-- <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<script language="javascript">
   console.log(new Date().toISOString().split('T')[0]);

   var today = new Date().toISOString().split('T')[0];
   var maxDate = new Date();
   month = new Date().getMonth();
   maxDate.setMonth(maxDate.getMonth() + 2);
   maxDate = maxDate.toISOString().split('T')[0];
   console.log(maxDate);
   document.getElementById("date_picker").setAttribute('min', today);
   document.getElementById("date_picker").setAttribute('max', maxDate);
</script>
<script src="<?php echo URLROOT ?>/public/js/fetchRequests.js"></script>
<script src="<?php echo URLROOT ?>/public/js/fetchRequests/newReservation.js"></script>

</body>

</html>