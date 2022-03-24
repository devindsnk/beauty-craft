<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">


   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">Purchase Details</h1>
      </div>
      <div class="header-right verticalCenter">
         <a href="<?php echo URLROOT ?>/Resources/viewAllResources" class="top-right-closeBtn"><i
               class="fal fa-times fa-2x "></i></a>
      </div>
   </header>
   <div class="content contentNewRes own ViewCustomer">


      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="manufacturerNameInput">Manufacturer</label>
                        <input type="text" name="" id="manufacturerNameInput"
                           value="<?php echo ($data['typedManufacturer']== "all")? "":$data['typedManufacturer'];  ?>"
                           placeholder="Resource name here">
                     </div>
                  </div>
                  <div class="column">

                  </div>
                  <div class="column">

                  </div>
               </div>
            </div>
            <div class="right-section">
               <a id="allPurchaseRecordsFilterBtn" class="btn btn-filled btn-black "
                  data-resourceid="<?php echo $data['allPurchaseeDetailsList'][0]->resourceID; ?>">Search</a>
            </div>
         </div>
      </form>

      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Product ID</th>
                     <th class="column-center-align col-2">Manufacturer</th>
                     <th class="column-center-align col-3">Model No</th>
                     <th class="column-center-align col-4">Price</th>
                     <th class="column-center-align col-5">Purchase Date</th>
                     <th class="column-center-align col-6">Warranty Expiration Date</th>
                     <th class="col-7"></th>
                  </tr>
               </thead>
               <!-- <?php print_r($data); ?> -->
               <tbody>
                  <?php foreach ($data['allPurchaseeDetailsList'] as $purchaseD) : ?>
                  <tr>

                     <td class="column-center-align">PR<?php echo $purchaseD->purchaseID; ?></td>
                     <td class="column-center-align"><?php echo $purchaseD->manufacturer; ?></td>
                     <td class="column-center-align"><?php echo $purchaseD->modelNo; ?></td>
                     <td class="column-center-align"><?php echo $purchaseD->price; ?></td>
                     <td class="column-center-align"><?php echo $purchaseD->purchaseDate; ?></td>
                     <td class="column-center-align">
                        <?php echo ($purchaseD->warrantyExpDate== "0000-00-00") ? "N/A":$purchaseD->warrantyExpDate ; ?>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>

                           <?php if (Session::getUser('typeText') == "Owner" && $purchaseD->status != 0 ) : ?>
                           <a href="<?php echo URLROOT ?>/resources/updateResource/<?php echo $purchaseD->purchaseID; ?>/<?php echo $purchaseD->resourceID; ?>"
                              onclick="sessionStorage.setItem('returnReferer',window.location.href);"><i 
                                 class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                           <a href="#"><i data-purchaseid="<?php echo $purchaseD->purchaseID; ?>"
                                 data-resourceid="<?php echo $purchaseD->resourceID; ?>"
                                 class="ci-trash table-icon btnRemoveResource img-gap resourceViewMoreTableTrash"></i></a>
                           <?php elseif (Session::getUser('typeText') == "Owner" && $purchaseD->status == 0 ) : ?>
                           <button type="button" class="status-btn text-uppercase red"> Removed </button>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>
                  <?php endforeach; ?>

               </tbody>
            </table>
         </div>
      </div>
   </div>
   </div>
   </div>


   <!-- Remove Purchase Record model -->
   <div class="modal-container remove-resource">
      <div class="modal-box">
         <div class="confirm-model-head">
            <h1>Remove Resource</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to Remove the Resource ? <br> This action cannot be undone after proceeding.</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <a href=" " class="removeResourceAnchorTag"><button
                  class="btn normal ModalButton ModalBlueButton ">proceed</button></a>
         </div>
      </div>
   </div>
   <!-- End of Remove Purchase Record model -->

   <?php require APPROOT . "/views/inc/footer.php" ?>
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeResource.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>