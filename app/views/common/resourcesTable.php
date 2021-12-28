<?php if (Session::getUser("typeText") == "Owner") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/resources/addResource" class="btn btn-filled btn-theme-purple btn-main btnAddResource">Add New</a>
   </div>
<?php endif; ?>


<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource Type</label>
                  <input type="text" name="" id="fName" placeholder="Resource name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource ID</label>
                  <input type="text" name="" id="fName" placeholder="Resource ID here">
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
               <th class="column-center-align col-1">Resource ID</th>
               <th class="column-center-align col-2">Resource Type</th>
               <th class="column-center-align col-3">Quantity</th>
               <th class="column-center-align col-4">Status</th>
               <th class="col-7"></th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <?php foreach ($data as $resourceD) : ?>
                  <td class="column-center-align"><?php echo $resourceD->resourceID; ?></td>
                  <td class="column-center-align"><?php echo $resourceD->name; ?></td>
                  <td class="column-center-align"><?php echo $resourceD->quantity; ?></td>
                  <td data-lable="Status" class="column-center-align">
                     <?php if ($resourceD->status == 0) : ?>
                        <button type="button" class="table-btn red-status-btn text-uppercase "> Removed </button>
                     <?php elseif ($resourceD->status == 1) : ?>
                        <button type="button" class="table-btn green-status-btn text-uppercase"> Active </button>
                     <?php endif; ?> 
                  </td>  
                  <td data-lable="Action" class="column-center-align">
                     <span>
                     
                        <!-- <a href="#" class="removeResourceTypeAnchor"><i  class="ci-trash table-icon btnRemoveResourceType img-gap"></i></a> -->
                     
                           <a href="<?php echo URLROOT ?>/resources/viewResources/<?php echo $resourceD->resourceID; ?>"><i class="ci ci-view-more table-icon img-gap"></i></a>
                     </span>
                  </td>
            </tr>
         <?php endforeach; ?>

         </tbody>
      </table>
   </div>
</div>


<!-- Remove Resource model -->
<!-- <div class="modal-container remove-resource-type">
   <div class="modal-box">
      <div class="confirm-model-head">
         <h1>Remove Resource</h1>
      </div>
      <div class="confirm-model-head">
         <p>Are you sure you want to Remove the Resource Type? <br> This action cannot be undone after proceeding.</p>
      </div>
      <div class="ownRemCusError removeResourceType">
         <label class="ownRemCusErrortext">Cannot proceed. Has upcoming reservations</label>
      </div>
      <div class="confirm-model-head">
         <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
         <button class="btn normal ModalButton ModalBlueButton removeCustomer">proceed</button>
      </div>
   </div>
</div> -->
<!-- End of Remove Resource model -->

<script src="<?php echo URLROOT ?>/public/js/fetchRequests/resources.js"></script>
