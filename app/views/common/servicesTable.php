<?php if ($userLevel == "Owner" || $userLevel == "Manager") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/services/addService2" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
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
               <th class="column-center-align col-2">Service</th>
               <th class="column-center-align col-3">Type</th>
               <th class="column-center-align col-4">Total Duration</th>
               <th class="column-center-align col-5">Price</th>
               <th class="column-center-align col-6">Status</th>
               <th class="col-7"></th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <td class="column-center-align">S000001</td>
               <td class="column-center-align">Hair Cut - Mens</td>
               <td class="column-center-align">Hair Cuts</td>
               <td class="column-center-align">1 h 20 mins</td>
               <td class="column-right-align">900 LKR</td>
               <td class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/services/viewService"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner" || $userLevel == "Manager") : ?>
                        <a href="<?php echo URLROOT ?>/services/updateService"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveService"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td class="column-center-align">S000001</td>
               <td class="column-center-align">Hair Cut - Mens</td>
               <td class="column-center-align">Hair Cuts</td>
               <td class="column-center-align">1 h 20 mins</td>
               <td class="column-right-align">900 LKR</td>
               <td class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/services/viewService"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner" || $userLevel == "Manager") : ?>
                        <a href="<?php echo URLROOT ?>/services/updateService"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveService"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td class="column-center-align">S000001</td>
               <td class="column-center-align">Hair Cut - Mens</td>
               <td class="column-center-align">Hair Cuts</td>
               <td class="column-center-align">1 h 20 mins</td>
               <td class="column-right-align">900 LKR</td>
               <td class="column-center-align">
                  <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
               </td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                     <a href="<?php echo URLROOT ?>/services/viewService"><i class="ci-view-more table-icon"></i></a>
                     <?php if ($userLevel == "Owner" || $userLevel == "Manager") : ?>
                        <a href="<?php echo URLROOT ?>/services/updateService"><i class="ci-edit table-icon"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveService"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>
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
         <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
         <button class="btn btnClose normal ModalButton ModalBlueButton">Confirm</button>
      </div>
   </div>
</div>
<!-- End of Service delete model -->