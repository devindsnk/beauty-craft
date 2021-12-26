<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Close Salon";
   $selectedSub = "";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Close Salon";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own close-salon">

      <div class="page-top-main-container">
         <!-- <a href="#" class="btn btn-filled btn-theme-purple btn-main btnAddCloseDate">Add New</a> -->
      </div>

      <?php
// Set the new timezone
// date_default_timezone_set('Asia/Kolkata');
$date = date('y/m/d');
$currenttime= strtotime($date);
echo $currenttime;
?>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group ownTableFormDate">
                        <label class="label" for="fName">Month</label>
                        <input type="month" name="" value="">
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
               <?php foreach ($data['closeDates'] as $closeSalonD) : ?>
                  <tr>
                     <td class="column-center-align"><?php echo $closeSalonD->date; ?></td>
                     <td class="column-left-align"><?php echo $closeSalonD->note; ?></td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <?php if ($userType == "Owner") : ?>
                           <a href="#"><i data-closedateid = "<?php echo $closeSalonD->defKey; ?>" class="ci-trash table-icon btnRemoveCloseDate removeCloseDatetrash"></i></a>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>
                  
      <!-- Remove close date model -->
      <div class="modal-container remove-closeDate">
         <div class="modal-box">
            <div class="confirm-model-head"> 
               <h1>Remove Close Date</h1> 
            </div>
            <div class="confirm-model-head">
               <p>Are you sure you want to Remove the Close date ? <br> This action cannot be undone after proceeding.
               </p>
            </div>
            <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <a href="" class="closeDateAnchorTag"><button class="btn normal ModalButton ModalBlueButton">proceed</button></a>
            </div>
         </div>
      </div>
      <!-- End of Remove close date model -->
      
                  <?php endforeach; ?>
               </tbody>
              
            </table>
         </div>
      </div>





      <!------------------------------------------------- Modal starts ----------------------------------------------------->
      <div class="modal-container add-closeDate  <?php if ($data['haveErrors']) echo ' show'; ?>">
         <div class="modal-box addItems">
         <form action="<?php echo URLROOT; ?>/OwnDashboard/closeSalon/ " method="post">
            <h1 class="addItemsModalHead">Close Salon</h1>
            <!-- start main grid 1 -->

            <div class="addItemsModalGrid1">
              
                  <div class="addItemsModalDetail1">
                     <label class="addItemsModalLable">Date</label> <br> 
                     <input type="date" class="addItemsModalDate closeDate" name="closeDate"
                        value="<?php echo $data['closeDate']; ?>"> <br>
                     <span class="error"><?php echo $data['closeDate_error']; ?></span>
                  </div>
                  <div class="addItemsModalDetail2">
                     <label class="addItemsModalLable">Reason</label>
                     <textarea class="addItemsModalTextArea" rows="4" cols="50" placeholder="Type the reason here"
                        name="closeSalonReason" value="<?php echo $data['closeSalonReason']; ?>"> </textarea> <br>
                     <span class="error"><?php echo $data['closeSalonReason_error']; ?></span>
                  </div>
            </div>

            <!-- main grid 1 ends -->

            <!-- main grid 2 starts -->
            
               <div class="addItemsModalGrid2 closeSalonReservationRecallAndErrorText"> 
               <div class="addItemsModalError"> 
                  <label class="addItemsModalErrortext">Cannot proceed. Has upcoming reservations</label>
                  <a href="<?php echo URLROOT ?>/closeDates/closeDateReservtaions" target="_blank" class="addItemsModalErrorAnchortag closeSalonViewReservations"> <label class="addItemsModalErrorLable ">View
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
                  <button class="btn btnClose normal ModalCancelButton ModalButton" name="action" value="cancel">Cancel</button>
               </div>
               <div class="addItemsModalbtn2">
               <button class="btn ModalGreenButton ModalButton"  name="action" value= "addCloseDate" >Proceed</button>

               <!-- <?php if ( $data['checked']== 1 && $data['reservationCount']>0 ) echo '<button class="btn ModalGreenButton ModalButton"  name="action" value= "addCloseDateWithRecall" >Proceed</button>'; ?> -->
                 
               </div>
            </div>
            
            <!-- main grid 3 ends -->
            </form>
         </div>
      </div>
      <!-- ----------------------------------------------------------------------------------------------------------------------- -->


   </div>
   <!--End Content-->

   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/closeSalon.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeCloseDate.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>