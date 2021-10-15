<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Close Salon";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Close Salon";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own close-salon">
 
   <div class="page-top-main-container">
      <!-- <a href="#" class="btn btn-filled btn-theme-purple btn-main btnAddCloseDate">Add New</a> -->
   </div>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group ownTableFormDate">
                        <label class="label" for="fName">Month</label>
                        <input type="month" name="" >
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
            <a href="#" class="btn btn-filled btn-theme-purple btn-main btnAddCloseDate">Add New</a>
      </div>
         </div>
      </form>

      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Close Date</th>
                     <th class="column-left-align col-2">Reason</th>
                     <th class="col-7"></th>
                  </tr>
               </thead>

               <tbody>
                  <tr>
                     <td class="column-center-align">2020.12.12</td>
                     <td class="column-left-align">Sample reason</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <?php if ($userLevel == "Owner") : ?>
                           <a href="#"><i class="ci-trash table-icon btnRemoveCloseDate"></i></a>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td class="column-center-align">2020.12.12</td>
                     <td class="column-left-align">Sample reason</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <?php if ($userLevel == "Owner") : ?>
                           <a href="#"><i class="ci-trash table-icon btnRemoveCloseDate"></i></a>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td class="column-center-align">2020.12.12</td>
                     <td class="column-left-align">Sample reason</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <?php if ($userLevel == "Owner") : ?> 
                           <a href="#"><i class="ci-trash table-icon btnRemoveCloseDate"></i></a>
                           <?php endif; ?>  
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td class="column-center-align">2020.12.12</td>
                     <td class="column-left-align">Sample reason</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <?php if ($userLevel == "Owner") : ?>
                           <a href="#"><i class="ci-trash table-icon btnRemoveCloseDate"></i></a>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>




<!-- Remove close date model -->
<div class="modal-container remove-closeDate">>
        <div class="modal-box">
                <div class="confirm-model-head">
                    <h1>Remove Resource</h1>
                </div>
                <div class="confirm-model-head">
                    <p>Are you sure you want to Remove the Resource? <br> This action cannot be undone after proceeding.</p>
                </div>
                <div class="confirm-model-head">
                    <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                    <button class="btn btnClose normal ModalButton ModalBlueButton">proceed</button>
                </div>
        </div>
    </div>
<!-- End of Remove close date model -->





      <!------------------------------------------------- Modal starts ----------------------------------------------------->
      <div class="modal-container add-closeDate">
         <div class="modal-box addItems">
            <h1 class="addItemsModalHead">Close Salon</h1>
            <!-- start main grid 1 -->

            <div class="addItemsModalGrid1">
               <div class="addItemsModalDetail1">
                  <label class="addItemsModalLable">Date</label> <br>
                  <input type="date" class="addItemsModalDate">
               </div>
               <div class="addItemsModalDetail2">
                  <label class="addItemsModalLable">Reason</label>
                  <textarea class="addItemsModalTextArea" name="addItemsModalTextArea" rows="4" cols="50"
                     placeholder="Type the reason here"> </textarea>
               </div>
            </div>

            <!-- main grid 1 ends -->

            <!-- main grid 2 starts -->
            <div class="addItemsModalGrid2">
               <div class="addItemsModalError">
                  <label class="addItemsModalErrortext">Cannot proceed. Has upcoming reservations</label>
                  <a href="#" class="addItemsModalErrorAnchortag"> <label class="addItemsModalErrorLable">View
                        Reservaions</label></a>
               </div>
               <div class="addItemsModalRecallMessage">
                  <span class="addItemsModalMessage">Recall requests will be sent if you proceed.</span>
               </div>
            </div>
            <!-- main grid 2 ends -->

            <!-- main grid 3 starts -->
            <div class="addItemsModalGrid3">
               <div class="addItemsModalbtn1">
                  <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
               </div>
               <div class="addItemsModalbtn2">
                  <button class="btn ModalGreenButton ModalButton">Proceed</button>
               </div>
            </div>
            <!-- main grid 3 ends -->
         </div>
      </div>
      <!-- ----------------------------------------------------------------------------------------------------------------------- -->


   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>