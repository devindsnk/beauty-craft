<?php if ($userLevel == "Receptionist") : ?>
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

<div class="table-container">
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
            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Reservation ID" class="column-center-align">C000001</td>
               <td data-lable="Date" class="column-center-align">2021-10-07</td>
               <td data-lable="Time" class="column-center-align">09:30 AM</td>
               <td data-lable="Service" class="column-left-align">Hair Cut - Mens</td>
               <td data-lable="Service Provider" class="column-left-align">Devin Dissanayake</td>
               <td data-lable="Customer" class="column-left-align">Ravindu Madhubhashana</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="#"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Receptionist") : ?>
                        <a href="#"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

         </tbody>
      </table>
   </div>
</div>