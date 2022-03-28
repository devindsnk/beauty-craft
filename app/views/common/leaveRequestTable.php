<div class="leaverequesttable">
   <div class="cardandbutton">

      <div class="leavecountcard general">
         <div class="left-container-leave"></div>
         <div class="leavecountcardleft">Remaining Casual Leaves</div>
         <div class="leavecountcardright">
            <?php
            if ($data['remainingGCount'] < 0)
            {
               echo 0;
            }
            else
            {
               echo $data['remainingGCount'];
            }


            ?></div>
      </div>
      <div class="leavecountcard medical">
         <div class="left-container-leave"></div>
         <div class="leavecountcardleft">Remaining Medical Leaves</div>
         <div class="leavecountcardright">
            <?php
            echo $data['remainingMCount'];

            ?></div>
      </div>

      <div class="page-top-main-container">
         <button class="btn btn-filled btn-theme-purple btnleaveRequest">Add New</button>
      </div>
   </div>

   <span class="leavelimitmsg">
      <?php
      if ($data['remainingGCount'] < -1) echo "You have already taken " . $data['remainingGCount'] * (-1) . " leaves more than the casual leave limit.";
      if ($data['remainingGCount'] == -1) echo "You have already taken " . $data['remainingGCount'] * (-1) . " leave more than the casual leave limit.";
      ?>
   </span>


   <form class="form filter-options" action="">
      <div class="options-container">
         <div class="left-section">
            <div class="row statusopt">
               <div class="column">
                  <div class="dropdown-group">
                     <label class="label" for="lName">Leave Type</label>
                     <select name="lstatus" id="lTypeLeaveData" onchange="initializeLeavestatusSelector()">
                        <option value="all" selected>All</option>
                        <option value="1" <?php echo ($data["lType"] ==  1) ? "selected" : ""; ?>>Casual</option>
                        <option value="2" <?php echo ($data["lType"] ==  2) ? "selected" : ""; ?>>Medical</option>

                     </select>
                  </div>
                  <span class="error"> <?php echo " "; ?></span>
               </div>

               <div class="column">
                  <div class="dropdown-group">
                     <label class="label" for="lName">Status</label>
                     <select name="lstatus" id="lStatusLeaveData">
                        <option value="all" selected>All</option>
                        <option value="1" <?php echo ($data["lStatus"] == '1') ? "selected" : "" ?>>Approved</option>
                        <option value="2" <?php echo ($data["lStatus"] == '2') ? "selected" : "" ?>>Pending</option>
                        <option value="0" <?php echo ($data["lStatus"] == '0') ? "selected" : "" ?>>Rejected</option>
                        <option value="3" <?php echo ($data["lStatus"] == '3') ? "selected" : "" ?>>Rejected Medical</option>
                     </select>
                  </div>
                  <span class="error"> <?php echo " "; ?></span>
               </div>
            </div>

         </div>
         <div class="right-section">
            <a class="btn btn-filled btn-black" id="SPleaveFilteerBtn" onclick="filterLeavesSpAndRecep(this);">Search</a>
            <!-- <button class="btn btn-search">Search</button> -->
         </div>
      </div>
   </form>

   <div class="table-container">
      <div class="table2 table2-responsive">
         <table class="table2-hover" id="leaveReqTable">
            <thead>
               <tr>
                  <th class="column-center-align col-1">Leave Date</th>
                  <th class="column-center-align col-2">Requested Date</th>
                  <th class="column-center-align col-3">Responded Staff ID</th>
                  <th class="column-center-align col-4">Type</th>
                  <th class="column-center-align col-4">Status</th>
                  <th class="column-center-align col-5">Options</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($data['tableData'] as $leave) : ?>
                  <tr>
                     <td data-lable="Leave Date" class="column-center-align"><?php echo DateTimeExtended::dateToShortMonthFormat($leave->leaveDate, "F"); ?></td>
                     <td data-lable="Requested date" class="column-center-align"><?php echo DateTimeExtended::dateToShortMonthFormat($leave->requestedDate, "F"); ?></td>
                     <td data-lable="Responded Staff ID" class="column-center-align">
                        <?php echo $leave->respondedStaffID; ?><?php if (!($leave->respondedStaffID)) echo 'Not yet Responded' ?>
                     </td>
                     <!-- leave Approved=1 pending=0 rejected=2 -->
                     <td data-lable="Type" class="column-center-align">
                        <?php if ($leave->leaveType == 1)
                        {
                           echo "Casual";
                        }
                        elseif ($leave->leaveType == 2)
                        {
                           echo "Medical";
                        }
                        ?>

                     </td>
                     <td data-lable="Status" class="column-center-align">
                        <?php if ($leave->status == 3) : ?>
                           <button type="button" class="status-btn blue text-uppercase " value="Pending"> MRejected
                           </button>
                        <?php elseif ($leave->status == 2) : ?>
                           <button type="button" class="status-btn yellow text-uppercase " value="Pending"> Pending
                           </button>
                        <?php elseif ($leave->status == 1) : ?>
                           <button type="button" class="status-btn green text-uppercase" value="Approved"> Approved
                           </button>
                        <?php elseif ($leave->status == 0) : ?>
                           <button type="button" class="status-btn red text-uppercase value=" Rejected"> Rejected
                           </button>
                        <?php endif; ?>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <button class="editicon btnViewLeave" data-id="<?php echo $leave->leaveDate; ?>" data-status="<?php echo $leave->status; ?>" onclick="viewLeaveRequest(this);"><a href="#" data-id="<?php echo $leave->leaveDate; ?>"><i class="ci-view-more table-icon" data-id="<?php echo $leave->leaveDate; ?>"></i></a></button>

                           <?php if ($leave->status == 2) : ?>
                              <button class="editicon btnEditLeave" data-id="<?php echo $leave->leaveDate; ?>" data-status="<?php echo $leave->status; ?>" onclick="editLeaveRequest(this);"><a href="#" data-id="<?php echo $leave->leaveDate; ?>"><i class="ci-edit table-icon" data-id="<?php echo $leave->leaveDate; ?>"></i></a></button>
                           <?php else : ?>
                              <button class="editicon btnEditLeave" data-id="<?php echo $leave->leaveDate; ?>" disabled><a data-id="<?php echo $leave->leaveDate; ?>"><i class="ci-edit-disable table-icon" data-id="<?php echo $leave->leaveDate; ?>"></i></a></button>
                           <?php endif; ?>

                           <?php if ($leave->status == 2) : ?>
                              <button class="editicon btnDeleteLeave" data-id="<?php echo $leave->leaveDate; ?>"><a data-id="<?php echo $leave->leaveDate; ?>"><i class=" ci-trash table-icon" data-id="<?php echo $leave->leaveDate; ?>"></i></a></button>
                           <?php else : ?>
                              <button class="editicon btnDeleteLeave" disabled><a><i class=" ci-trash-disable table-icon "></i></a></button>
                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <!-- Request leave model -->

   <!-- End of Take leave model -->

   <!--  leave Request model -->
   <div class="modal-container normal leaverequest <?php if ($data['haveErrors']) echo "show" ?>">
      <div class="modal-box addItems leave_request ">
         <div class="new-type-head">
            <h1>Request Leave</h1>
         </div>
         <form action="<?php echo URLROOT; ?>/Leaves/leaves" class="form" method="POST">
            <div class="leaverequest-form-content">
               <div class="reqleave-date-section">
                  <div class="leave-date-section">
                     <div class="text-group">
                        <label class="labels" for="serviceName">Date</label><br>
                        <input class="LeaveRequestDate" type="date" name="date" id="takeLeaveDate" placeholder="--Select a date--">
                     </div>
                     <span class="error dateEmpty">
                        <?php echo $data['date_error']; ?>
                     </span>
                  </div>
                  <div class="reqleave-type-section">
                     <label class="labels" for="serviceName">Type</label><br>
                     <div class="dropdown-group">

                        <select name="leavetype" id="lstatus" class="dropdowntype">
                           <!-- <option value="All" selected></option> -->
                           <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                           <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>Casual</option>
                           <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>

                        </select>
                        <span class="error typeEmpty">
                           <?php if ($data['type_error'])
                           {
                              echo $data['type_error'];
                           } ?>
                        </span>
                     </div>
                  </div>
               </div>
               <span class="error request-date-error1"></span>
               <div class="reqleave-reason-section">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Reason</label><br>
                     <textarea type="text" name="reason" id="takeLeaveReason" placeholder="-- Type in --" class="addItemsModalTextArea" value="<?php echo $data['reason']; ?>"><?php echo $data['reason']; ?></textarea>
                  </div>
                  <span class="error"> <?php echo $data['reason_error']; ?></span>
               </div>
               <div class="reqleave-button-section">
                  <div class="leaveSPRES modalbutton">
                     <div class="btn1">
                        <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
                     </div>
                     <div class="btn2">
                        <button type="submit" name="action" value="addleave" class="confirm-service-btn">Request</button>
                     </div>
                  </div>
               </div>
            </div>
         </form>

      </div>
   </div>
   <!-- edit leave model -->
   <div class=" modal-container edit-leave request">
      <div class="modal-box addItems leave_request ">
         <div class="new-type-head">
            <h1>Edit Leave Request</h1>
         </div>
         <div class="leaverequest-form-content form">
            <div class="reqleave-date-section">
               <!-- <p class="test-class">Bla bla</p> -->
               <div class="leave-date-section">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Date</label><br>
                     <form>
                        <input class="editLeaveRequestDate" type="date" name="date" id="date_pickeredit" disabled>
                     </form>
                  </div>
                  <span class="error date-error">
                     <?php if ($data['date_error'])
                     {
                        echo $data['date_error'];
                     }
                     else echo $data['dateValidationMsg']; ?>
                  </span>
               </div>
               <div class="reqleave-type-section">
                  <label class="labels" for="serviceName">Type</label><br>
                  <div class="dropdown-group">
                     <select name="leavetype" class="editleavetype" id="lstatusedit" onchange="editleaveRequestSaveChanges(this);">
                        <option class=" unbold" value="0" option selected="true" disabled="disabled">Select</option>
                        <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>Casual</option>
                        <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>
                     </select>
                  </div>
               </div>
            </div>
            <span class="error request-date-error">

            </span>
            <div class="reqleave-reason-section">
               <div class="text-group">
                  <label class="labels" for="serviceName">Reason</label><br>

                  <textarea type="text" name="reason" id="takeLeaveReasonedit" placeholder="-- Type in --" class="editTextArea" value="<?php echo $data['reason']; ?>"><?php echo $data['reason']; ?></textarea>
               </div>
               <span class="error edit-type-error"> <?php echo $data['reason_error']; ?></span>
            </div>

            <div class="reqleave-button-section">
               <div class="modalbutton">
                  <div class="btn1">
                     <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
                  </div>
                  <div class="btn2">
                     <button type="submit" name="action" value="edit" class="confirm-service-btn editleaveProceedBtn proceedBtn" onclick="leaveRequestSaveChanges(this);">Save Changes</button>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
   <!-- end edit leave model -->
   <!-- delete leave Request model -->
   <div class="modal-container delete-leave">
      <div class="modal-box leave_delete">
         <form>
            <h2>Cancel Leave Request</h2>
            <div class="confirmationmsg-container">
               <span>Are you sure you want to cancel this leave request?</span>
            </div>
            <div class="modalbutton">
               <div class="btn1">
                  <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
               </div>
               <div class="btn2">
                  <button type="submit" name="action" value="deleteLeave" class="delete leave  btn btn-filled btn-error-red proceedBtn" onclick="cancelLeaveRequest(this);">Yes, Cancel</button>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- end delete leave request model -->
   <!-- view leave Request -->
   <div class=" modal-container view-leave request">
      <div class="modal-box addItems leave_request ">
         <div class="new-type-head">
            <h1>View Leave Request</h1>
         </div>
         <div class="leaverequest-form-content">
            <div class="reqleave-date-section">
               <!-- <p class="test-class">Bla bla</p> -->
               <div class="leave-date-section">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Date</label><br>
                     <form>
                        <input class="editLeaveRequestDate" type="date" name="date" id="date_pickerview" disabled>
                     </form>
                  </div>
                  <span class="error date-error">
                     <?php if ($data['date_error'])
                     {
                        echo $data['date_error'];
                     }
                     else echo $data['dateValidationMsg']; ?>
                  </span>
               </div>
               <div class="reqleave-type-section">
                  <label class="labels" for="serviceName">Type</label><br>
                  <div class="dropdown-group">
                     <select name="leavetype" disabled="disabled" class="editleaveDropdownType" id="lstatusview">
                        <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                        <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>Casual</option>
                        <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>
                     </select>
                  </div>
               </div>
            </div>
            <span class="error request-date-error">
            </span>
            <div class="reqleave-reason-section">
               <div class="text-group">
                  <label class="labels" for="serviceName">Reason</label><br>

                  <textarea type="text" disabled="disabled" name="reason" id="takeLeaveReasonview" placeholder="-- Type in --" class="editTextArea" value="<?php echo $data['reason']; ?>"><?php echo $data['reason']; ?></textarea>
               </div>
               <span class="error"> <?php echo $data['reason_error']; ?></span>
            </div>
            <div class="reqleave-button-section">
               <div class="modalbutton view">
                  <div class="btn1">
                     <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- end view leave Request -->
</div>

<script language="javascript">
   const datePicker = document.getElementById("takeLeaveDate");

   let today = new Date().toISOString().split('T')[0];
   let maxDate = new Date();
   month = new Date().getMonth();
   maxDate.setMonth(maxDate.getMonth() + 2);
   maxDate = maxDate.toISOString().split('T')[0];

   datePicker.setAttribute('min', today);
   datePicker.setAttribute('max', maxDate);
   datePicker.setAttribute('format', 'yyyy-MM-dd')
</script>

<script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
<script src="<?php echo URLROOT ?>/public/js/tableFilter.js"></script>
<script src="<?php echo URLROOT ?>/public/js/fetchRequests/leaveRequest.js"></script>