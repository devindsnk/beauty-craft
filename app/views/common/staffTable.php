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
                     <option value="" selected>Receptionist</option>
                     <option value="volvo">Manager</option>
                     <option value="saab">Service Provider</option>
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
               <th class="column-center-align col-4">Mobile No</th>
               <th class="column-center-align col-5">Gender</th>
               <th class="column-center-align col-6">Joined Date</th>
               <th class="column-center-align col-7">Status</th>
               <th class="col-8"></th>
            </tr>
         </thead>

         <tbody>

            <?php foreach($data['staff'] as $staffD) : ?>
            <tr>
               <td data-lable="Staff ID" class="column-center-align"><?php echo $staffD->staffID; ?></td>
               <td data-lable="Name" class="column-left-align"><?php echo $staffD->fName; ?>
                  <?php echo $staffD->lName; ?></td>
               <td data-lable="Staff Type" class="column-center-align">
               <?php if($staffD->staffType == 3){ 
                        echo 'Manager';}
                     elseif($staffD->staffType == 4){
                        echo 'Receptionist';}
                     elseif($staffD->staffType == 5){
                        echo 'Service Provider';}?>
               </td>
               <td data-lable="Contact No" class="column-center-align"><?php echo $staffD->mobileNo; ?></td>
               <td data-lable="Gender" class="column-center-align">
                  <?php if($staffD->gender == 'M'){ 
                           echo 'Male';}
                        elseif($staffD->gender == 'F'){
                           echo 'Female';}?>
               </td>
               <td data-lable="Joined Date" class="column-center-align"><?php echo $staffD->joinedDate; ?></td>
               <td data-lable="Status" class="column-center-align">
                  <!-- Staff memeber states >> Removed = 0 Active =1 Disabled =2 -->
                  <?php if($staffD->status== 0) :?>
                  <button type="button" class="table-btn red-status-btn text-uppercase "> Removed </button>
                  <?php elseif ($staffD->status == 1) : ?>
                  <button type="button" class="table-btn green-status-btn text-uppercase"> Active </button>
                  <?php elseif ($staffD->status == 2) : ?>
                  <button type="button" class="table-btn yellow-status-btn text-uppercase "> Disabled </button>
                  <?php endif; ?>
               </td>
               <td class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/staff/viewStaff/<?php echo $staffD->staffID ?>"><i
                           class="ci ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner") : ?>
                     <a href="<?php echo URLROOT ?>/staff/updateStaff"><i class="ci ci-edit table-icon"></i></a>
                     <a href="#"><i class="ci ci-trash table-icon btnRemoveStaff"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>
            <?php endforeach; ?>


         </tbody>
      </table>
   </div>
</div>


<!------------------- Remove Staff modal starts ----------------------------->
<div class="modal-container remove-staff">
   <div class="modal-box " id="ownRemstaffWrapper">
      <div class="ownRemstaffContainer">
         <h1 class="confirm-model-head confirm-model-head">Remove Staff</h1>

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
            <a href="<?php echo URLROOT ?>/staff/RemStaffReservations" class="remStaffErrorAnchortag"> <label class="remStaffErrorViewReservaions">View
                  Reservaions</label></a>
         </div>
         <!-- main grid 2 ends -->

         <!-- main grid 3 starts -->
         <div class="remButtons">
            <div class="ownRemStaffbtn1">
               <button class="btn btnClose normal ModalButton ModalCancelButton">Cancel</button>
            </div>
            <div class="ownRemStaffbtn2">
               <button class="btn normal ModalButton ModalBlueButton">Proceed</button>
            </div>
         </div>
         <!-- main grid 3 ends -->

      </div>
   </div>
</div>

<!------------------- Remove Staff Container ends ----------------------------->