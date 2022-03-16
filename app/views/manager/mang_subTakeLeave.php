<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Leaves";
   $selectedSub = "TakeLeave";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Take Leave";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <div class="mang-leaves-top-container">
         <div class="mang-leaves-top-left-container">
            <div class="contentBox mang-leave-card">
               <p>Medical Leaves</p>
               <p class="count-color"><?php echo $data['remainingMedical'] ?></p>
            </div>
            <div class="contentBox mang-leave-card">
               <p>Casual Leaves</p>
               <p class="count-color"><?php echo $data['remainingCasual'] ?></p>
            </div>
         </div>
         <div class="mang-leaves-top-right-container">
            <button class="btn btn-filled btn-theme-purple btn-main btnTakenLeave">Take Leave</button>
         </div>
      </div>
      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section mang">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="">Leave Type</label>
                        <select name="leaveTypeSelector" id="leaveTypeSelector">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data["selectedLeaveType"] == '1') ? "selected" : "" ?>>Casual</option>
                           <option value="2" <?php echo ($data["selectedLeaveType"] == '2') ? "selected" : "" ?>>Medical</option>
                        </select>
                     </div>
                     <!-- <span class="error"> <?php echo " "; ?></span> -->
                  </div>

                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="leaveDate">Leave Date</label>
                        <!-- <input type="date" name="" id="leaveDate" placeholder="--select--"> -->
                        <input type="date" name="" id="leaveDateSelector" placeholder="--select--" <?php if ($data["selectedLeaveDate"]) : ?> value="<?php echo $data["selectedLeaveDate"] ?>" <?php else : ?> value="all" <?php endif; ?>>
                     </div>
                     <!-- <span class="error"></span> -->
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="markedDate">Marked Date</label>
                        <!-- <input type="date" name="" id="markedDate" placeholder="--select--"> -->
                        <input type="date" name="" id="markedDateSelector" placeholder="--select--" <?php if ($data["selectedmarkedDate"]) : ?> value="<?php echo $data["selectedmarkedDate"] ?>" <?php else : ?> value="all" <?php endif; ?>>
                     </div>
                     <!-- <span class="error"></span> -->
                  </div>

               </div>
            </div>
            <div class="right-section">
               <!-- <a href="" class="btn btn-filled btn-black">Search</a> -->
               <button type="button" id="allTakenLeavesFilterBtn" class="btn btn-filled btn-black">Search</button>
            </div>
         </div>
      </form>
      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Leave Date</th>
                     <th class="column-center-align col-2">Leave Type</th>
                     <th class="column-center-align col-3">Marked Date</th>
                     <th class="column-center-align col-4 column-center-align">Reason</th>
                     <th class="col-4"></th>
                  </tr>
               </thead>

               <tbody>
                  <!-- <?php print_r($data); ?> -->
                  <?php foreach ($data['managerLeaveDetails'] as $managerLeaveDetails) : ?>
                     <tr>
                        <td data-lable="Leave Date" class="column-center-align"><?php echo $managerLeaveDetails->leaveDate; ?></td>
                        <td data-lable="Leave Type" class="column-center-align">
                           <?php if ($managerLeaveDetails->leaveType == 1) : ?>
                              Casual
                           <?php elseif ($managerLeaveDetails->leaveType == 2) : ?>
                              Medical
                           <?php endif; ?>
                        </td>
                        <td data-lable="Marked Date" class="column-center-align"><?php echo $managerLeaveDetails->markedDate; ?></td>
                        <td data-lable="Reason" class="column-center-align"><?php echo $managerLeaveDetails->reason; ?></td>
                        <td class="column-center-align">
                           <span>
                              <?php
                              date_default_timezone_set("Asia/Colombo");
                              $today = date('Y-m-d');
                              ?>
                              <?php if ($managerLeaveDetails->leaveDate > $today) : ?>
                                 <a href="#"><i data-columns1="<?php echo $managerLeaveDetails->leaveDate; ?>" class="ci-edit btnEditTakenLeave table-icon img-gap editMangLeave"></i></a>
                                 <a href="#"><i data-columns3="<?php echo $managerLeaveDetails->leaveDate; ?>" class="ci-trash btnDeleteTakenLeave table-icon img-gap deleteMangLeave"></i></a>
                              <?php else : ?>
                                 <i class="ci-edit-disable  table-icon img-gap"></i>
                                 <i class="ci-trash-disable  table-icon img-gap"></i>
                              <?php endif; ?>
                           </span>
                        </td>
                     </tr>
                  <?php endforeach; ?>

               </tbody>
            </table>
         </div>
      </div>

      <!-- Take leave model -->
      <div class="modal-container take-leave <?php if ($data['haveErrors']) echo "show" ?>">
         <div class="modal-box addItems">
            <h1 class="addItemsModalHead">Take Leave</h1>
            <form action="<?php echo URLROOT; ?>/MangDashboard/takeLeave" class="form" method="POST">
               <!-- start main grid 1 -->
               <div class="addItemsModalGrid1">
                  <div class="row">
                     <div class="column">
                        <label class="addItemsModalLable">Date</label><br>
                        <input type="date" name="mangDate" class="addItemsModalDate mangSelectedDate" value="<?php echo $data['date']; ?>"><br>
                        <span class="error paddingBottom mangDateError">
                           <?php
                           if ($data['date_error'])
                           {
                              echo $data['date_error'];
                           }
                           else echo $data['dateValidationMsg'];
                           ?>
                        </span>
                     </div>
                     <div class="column">
                        <label class="addItemsModalLable">Leave Type</label><br>
                        <select name="mangLeaveType" id="" class="mangSelecedLeaveType">
                           <option class="unbold" value=0 option selected="true" disabled="disabled">Select</option>
                           <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>Casual</option>
                           <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>
                        </select>
                        <span class="error paddingBottom mangTypeError">
                           <?php
                           if ($data['type_error'])
                           {
                              echo $data['type_error'];
                           }
                           ?>
                        </span>
                     </div>
                  </div>
                  <div class="row">
                     <label class="addItemsModalLable">Reason</label>
                     <textarea class="addItemsModalTextArea" name="mangLeaveReason" rows="4" cols="50" placeholder="Type the reason here" value="<?php echo $data['reason']; ?>"> <?php echo $data['reason']; ?></textarea>
                     <span class="error paddingBottom"><?php echo $data['reason_error']; ?></span>
                  </div>
               </div>
               <!-- main grid 1 ends -->
               <!-- main grid 3 starts -->
               <div class="addItemsModalGrid3">
                  <div class="addItemsModalbtn1">
                     <button type="submit" name="action" value="cancel" class="btn btnClose ModalCancelButton ModalButton">Cancel</button>
                  </div>
                  <div class="addItemsModalbtn2">
                     <button type="submit" name="action" id="takeLeaveProceed" value="addleave" class="btn  ModalGreenButton ModalButton">Proceed</button>
                  </div>
               </div>
               <!-- main grid 3 ends -->
            </form>
         </div>
      </div>
      <!-- End of take leave model -->

      <!-- Edit Taken leave model -->
      <div class="modal-container edit-taken-leave <?php if ($data['haveErrors2']) echo "show" ?>">
         <div class="modal-box addItems">
            <h1 class="addItemsModalHead">Edit Leave</h1>
            <form action="" id="updateForm" class="form" method="POST">
               <!-- start main grid 1 -->
               <div class="addItemsModalGrid1">
                  <div class="row">
                     <div class="column">
                        <label class="addItemsModalLable">Date</label><br>
                        <input type="date" name="mangDate" id="mangLeaveDate" class="addItemsModalDate mangSelectedDate2" value="<?php echo $data['date']; ?>"><br>
                        <span class="error paddingBottom mangDateError2">
                           <?php
                           if ($data['date_error'])
                           {
                              echo $data['date_error'];
                           }
                           else echo $data['dateValidationMsg'];
                           ?>
                        </span>
                     </div>
                     <div class="column">
                        <label class="addItemsModalLable">Leave Type</label><br>
                        <select name="mangLeaveType2" id="mangLeaveType" class="mangSelecedLeaveType2">
                           <option class="unbold" value=0 option selected="true" disabled="disabled">Select</option>
                           <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>Casual</option>
                           <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>
                        </select>
                        <span class="error paddingBottom mangTypeError2">
                           <?php
                           if ($data['type_error'])
                           {
                              echo $data['type_error'];
                           }
                           ?>
                        </span>
                     </div>
                  </div>
                  <div class="row">
                     <label class="addItemsModalLable">Reason</label>
                     <textarea class="addItemsModalTextArea" id="mangLeaveReason" name="mangLeaveReason" rows="4" cols="50" placeholder="Type the reason here" value="<?php echo $data['reason']; ?>"> <?php echo $data['reason']; ?></textarea>
                     <span class="error paddingBottom"><?php echo $data['reason_error']; ?></span>
                  </div>
               </div>
               <!-- main grid 1 ends -->
               <!-- main grid 3 starts -->
               <div class="addItemsModalGrid3">
                  <div class="addItemsModalbtn1">
                     <button type="submit" name="action" value="cancel" class="btn btnClose ModalCancelButton ModalButton">Cancel</button>
                  </div>
                  <div class="addItemsModalbtn2">
                     <button type="submit" name="action" value="updateleave" id="editLeaveProceed" class="btn ModalGreenButton ModalButton proceedBtn">Proceed</button>
                  </div>
               </div>
               <!-- main grid 3 ends -->
            </form>
         </div>
      </div>
      <!-- End of edit taken leave model -->

      <!-- Leave delete model -->
      <div class="modal-container delete-taken-leave">
         <div class="modal-box">
            <div class="confirm-model-head">
               <h1 id="deleteLeaveHead">Delete Leave</h1>
            </div>
            <div class="confirm-model-head">
               <p id="warningMsgDeleteLeave">Are you sure you want to delete the leave? <br> This action cannot be undone after proceeding.</p>
            </div>
            <div class="confirm-model-head">
               <button class="btn btnClose ModalButton ModalCancelButton">Close</button>
               <a href="#" class="deleteConfirmHref"><button class="btn btnClose ModalButton ModalBlueButton deleteProceedBtn">proceed</button>
            </div>
         </div>
      </div>
      <!-- End of Leave delete model -->

   </div>
   <!--End Content-->

   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>