<?php if ($userType == "Receptionist") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/reservations/addNew" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
   </div>
<?php endif; ?>

<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Service</label>
                  <select>
                     <option value="" selected>Any</option>
                     <option value="volvo">Active</option>
                     <option value="saab">Inactive</option>
                  </select>
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Date</label>
                  <input type="text" name="" id="fName" placeholder="Your first name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Customer Name</label>
                  <input type="text" name="" id="fName" placeholder="Your first name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>

            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Status</label>
                  <select>
                     <option value="" selected>Any</option>
                     <option value="">Active</option>
                     <option value="">Inactive</option>
                  </select>
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
         </div>
      </div>
      <div class="right-section">
         <a href="" class="btn btn-filled btn-black">Search</a>
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
            <?php foreach ($data as $reservation) : ?>
               <?php
               $statusClassList = ["red-status-btn", "yellow-status-btn", "blue-status-btn", "grey-status-btn", "green-status-btn"];
               $statusValueList  = ["Cancelled", "Pending", "Confirmed", "No Show", "Completed"];
               $statusClass = $statusClassList[$reservation->status];
               $statusValue = $statusValueList[$reservation->status];

               $startTime = $reservation->startTime;
               $timeH24 = $startTime / 60;
               $suffix;
               if ($timeH24 >= 12) $suffix = "PM";
               else $suffix = "AM";
               if ($timeH24 == 12) $timeH = '12';
               else $timeH = str_pad($timeH24 % 12, 2, "0", STR_PAD_LEFT);
               $timeM = str_pad($startTime % 60, 2, "0", STR_PAD_LEFT);
               ?>


               <tr>
                  <td data-lable="Reservation ID" class="column-center-align font-numeric">R<?php echo $reservation->reservationID; ?></td>
                  <td data-lable="Date" class="column-center-align"><?php echo $reservation->date; ?></td>
                  <td data-lable="Time" class="column-center-align font-numeric"><?php echo $timeH . ":" . $timeM . " " . $suffix; ?></td>
                  <td data-lable="Service" class="column-left-align"><?php echo $reservation->serviceName; ?></td>
                  <td data-lable="Service Provider" class="column-left-align"><?php echo $reservation->staffFName . " " . $reservation->staffLName; ?></td>
                  <td data-lable="Customer" class="column-left-align"><?php echo $reservation->custFName . " " . $reservation->custLName; ?></td>
                  <td data-lable="Status" class="column-center-align">
                     <button type="button" class="table-btn text-uppercase <?php echo $statusClass; ?> "><?php echo $statusValue ?></button>
                  </td>
                  <td class="column-center-align">
                     <span>
                        <a href="<?php echo URLROOT ?>/ReceptDashboard/reservationMoreInfo"><i class="ci-view-more table-icon img-gap"></i></a>
                        <?php if ($userType == "Receptionist") : ?>
                           <a href="#"><i class="ci-edit table-icon img-gap"></i></a>
                           <a href="#"><i class="ci-trash table-icon img-gap"></i></a>
                        <?php endif; ?>
                     </span>
                  </td>
               </tr>
            <?php endforeach; ?>
         </tbody>
      </table>
   </div>
</div>