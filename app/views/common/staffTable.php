<?php if ($userLevel == "Owner") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/staff/addStaff" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
   </div>
<?php endif; ?>

<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Name</label>
                  <input type="text" name="" id="fName" placeholder="Your first name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>

            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Staff Type</label>
                  <select>
                     <option value="" selected>Any</option>
                     <option value="volvo">Active</option>
                     <option value="saab">Inactive</option>
                  </select>
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Status</label>
                  <select>
                     <option value="" selected>Any</option>
                     <option value="volvo">Active</option>
                     <option value="saab">Inactive</option>
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

<div class="table-container staff-table">
   <div class="table2 table2-responsive">
      <table class="table2-hover">

         <thead>
            <tr>
               <th class="column-center-align col-1">Staff ID</th>
               <th class="column-center-align col-2">Name</th>
               <th class="column-center-align col-3">Staff Type</th>
               <th class="column-center-align col-4">Contact No</th>
               <th class="column-center-align col-5">Gender</th>
               <th class="column-center-align col-6">Joined Date</th>
               <th class="column-center-align col-7">Status</th>
               <th class="col-8"></th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <td data-lable="Staff ID" class="column-center-align">R000001</td>
               <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
               <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
               <td data-lable="Contact No" class="column-left-align">0717679714</td>
               <td data-lable="Gender" class="column-left-align">M</td>
               <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/staff/viewStaff"><i class="ci ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner") : ?>
                        <a href="<?php echo URLROOT ?>/staff/updateStaff"><i class="ci ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci ci-trash table-icon btnRemoveStaff"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Staff ID" class="column-center-align">R000001</td>
               <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
               <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
               <td data-lable="Contact No" class="column-left-align">0717679714</td>
               <td data-lable="Gender" class="column-left-align">M</td>
               <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/staff/viewStaff"><i class="ci ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner") : ?>
                        <a href="<?php echo URLROOT ?>/staff/updateStaff"><i class="ci ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci ci-trash table-icon btnRemoveStaff"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td data-lable="Staff ID" class="column-center-align">R000001</td>
               <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
               <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
               <td data-lable="Contact No" class="column-left-align">0717679714</td>
               <td data-lable="Gender" class="column-left-align">M</td>
               <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
               <td data-lable="Status" class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/staff/viewStaff"><i class="ci ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner") : ?>
                        <a href="<?php echo URLROOT ?>/staff/updateStaff"><i class="ci ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci ci-trash table-icon btnRemoveStaff"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

         </tbody>
      </table>
   </div>
</div>


<!------------------- Remove Staff modal starts ----------------------------->
<div class="modal-container remove-staff">
   <div class="modal-box " id="ownRemstaffWrapper">
      <div class="ownRemstaffContainer">
         <h1 class="ownRemStaffHead">Remove Staff</h1>

         <!-- start main grid 1 -->
         <div class="staffDetails">
            <div class="staffDetail1">
               <label class="staffLable">Staff Id</label>
               <span class="staffData">M001</span>
            </div>
            <div class="staffDetail2">
               <label class="staffLable">Type</label>
               <span class="staffData">Service Provider</span>
            </div>
            <div class="staffDetail3">
               <label class="staffLable">Name</label>
               <span class="staffData">Ravindu Madhubhashana</span>
            </div>
         </div>
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="remStaffError">
            <label class="remStaffErrortext">Cannot proceed. Has upcoming reservations</label>
            <a href="#" class="remStaffErrorAnchortag"> <label class="remStaffErrorViewReservaions">View
                  Reservaions</label></a>
         </div>
         <!-- main grid 2 ends -->

         <!-- main grid 3 starts -->
         <div class="remButtons">
            <div class="ownRemStaffbtn1">
               <button class="btn btnClose ownCancelButton">Cancel</button>
            </div>
            <div class="ownRemStaffbtn2">
               <button class="btn ownProceedBlueButton">Proceed</button>
            </div>
         </div>
         <!-- main grid 3 ends -->

      </div>
   </div>
</div>

<!------------------- Remove Staff Container ends ----------------------------->