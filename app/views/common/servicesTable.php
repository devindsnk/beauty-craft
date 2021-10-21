<?php if ($userType == "Owner" || $userType == "Manager") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/services/addNewService" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
   </div>
<?php endif; ?>


<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Service Name</label>
                  <input type="text" name="" id="fName" placeholder="Your first name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Category</label>
                  <select name="cars" id="cars">
                     <option value="" selected>All</option>
                     <option value="volvo">Hair Cuts</option>
                     <option value="saab">Skin Treatments</option>
                     <option value="mercedes">Nail Treatments</option>
                  </select>
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="dropdown-group">
                  <label class="label" for="lName">Status</label>
                  <select name="cars" id="cars">
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

<div class="table-container">
   <div class="table2 table2-responsive">
      <table class="table2-hover">

         <thead>
            <tr>
               <th class="column-center-align col-1">Servie ID</th>
               <th class="column-left-align col-2">Service</th>
               <th class="column-left-align col-3">Type</th>
               <th class="column-center-align col-4">Total Duration</th>
               <th class="column-right-align col-5">Price</th>
               <th class="column-center-align col-6">Status</th>
               <th class="col-7"></th>
            </tr>
         </thead>

         <tbody>
            <?php foreach ($data['services'] as $sDetails) : ?>

               <tr>
                  <td data-lable="Servie ID" data-lable="" class="column-center-align"><?php echo $sDetails->serviceID; ?></td>

                  <td data-lable="Service" class="column-left-align"><?php echo $sDetails->name; ?></td>

                  <td data-lable="Type" class="column-left-align"><?php echo $sDetails->type; ?></td>

                  <?php $i = $sDetails->totalDuration; ?>
                  <?php if ($i == 60 || $i == 120) : ?>
                     <td data-lable="Total Duration" class="column-center-align"><?php echo ($i / 60); ?> h</td>

                  <?php elseif ($i > 60 && $i < 120) : ?>
                     <td data-lable="Total Duration" class="column-center-align"><?php echo ($i / $i); ?> h <?php echo ($i %  60); ?> mins</td>

                  <?php else : ?>
                     <td data-lable="Total Duration" class="column-center-align"><?php echo $i; ?> mins</td>

                  <?php endif; ?>

                  <td data-lable="Price" class="column-right-align"><?php echo number_format($sDetails->price, 2, '.', ' '); ?> LKR</td>

                  <td data-lable="Status" class="column-center-align">
                     <?php if ($sDetails->status == 0) : ?>
                        <button type="button" class="table-btn red-status-btn text-uppercase">
                           Removed
                        </button>
                     <?php elseif ($sDetails->status == 1) : ?>
                        <button type="button" class="table-btn green-status-btn text-uppercase">
                           Active
                        </button>
                     <?php elseif ($sDetails->status == 2) : ?>
                        <button type="button" class="table-btn yellow-status-btn text-uppercase">
                           Disabled
                        </button>
                     <?php endif; ?>
                  </td>

                  <td data-lable="" class="column-center-align">
                     <span>
                        <a href="<?php echo URLROOT ?>/services/viewService/<?php echo $sDetails->serviceID; ?>"><i class="ci-view-more table-icon img-gap"></i></a>
                        <?php if ($userType == "Owner" || $userType == "Manager") : ?>
                           <a href="<?php echo URLROOT ?>/services/updateService"><i class="ci-edit table-icon img-gap"></i></a>
                           <a href="#"><i class="ci-trash table-icon btnRemoveService img-gap"></i></a>
                        <?php endif; ?>
                     </span>
                  </td>

               </tr>

            <?php endforeach; ?>

         </tbody>
      </table>
   </div>
</div>

<!-- Service delete model -->
<div class="modal-container remove-service">
   <div class="modal-box">
      <div class="confirm-model-head">
         <h1>Delete Service</h1>
      </div>
      <div class="confirm-model-head">
         <p>Are you sure you want to delete the service? <br> This action cannot be undone after proceeding.</p>
      </div>
      <div class="confirm-model-head">
         <button class="btn btnClose ModalButton ModalCancelButton">Close</button>
         <button class="btn btnClose ModalButton ModalBlueButton">Confirm</button>
      </div>
   </div>
</div>
<!-- End of Service delete model -->

<!-- service status 

Removed = 0
Active = 1
Hold = 2

-->