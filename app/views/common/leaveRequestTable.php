<div class="leaverequesttable">
   <div class="cardandbutton">
      <div class="leavecountcard">
         <div class="leavecountcardleft">Remaining Leaves</div>
         <div class="leavecountcardright">
            <?php
            echo $data['remainingCount'];

            ?></div>
      </div>
      <div class="page-top-main-container">
         <button class="btn btn-filled btn-theme-purple btnleaveRequest">Add New</button>
      </div>
   </div>
   <span class="leavelimitmsg">
      <?php
      if ($data['remainingCount'] < 0) echo "Your Leave limit exceed";
      ?>
   </span>
   <form class="form filter-options" action="">
      <div class="options-container">
         <div class="left-section">
            <div class="row statusopt">
               <div class="column">
                  <div class="dropdown-group">
                     <label class="label" for="lName">Status</label>
                     <select name="lstatus" id="lstatus">
                        <option value="All" selected>All</option>
                        <option value="Approved">Approved</option>
                        <option value="Pending">Pending</option>
                        <option value="Rejected">Rejected</option>
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
         <table class="table2-hover" id="leaveReqTable">

            <thead>
               <tr>
                  <th class="column-center-align col-1">Leave Date</th>
                  <th class="column-center-align col-2">Requested date</th>
                  <th class="column-center-align col-3">Responded Staff ID</th>
                  <th class="column-center-align col-4">Type</th>
                  <th class="column-center-align col-4">Status</th>
                  <th class="column-center-align col-5">Options</th>

               </tr>
            </thead>

            <tbody>
               <?php foreach ($data['tableData'] as $leave) : ?>
                  <tr>

                     <td data-lable="Leave Date" class="column-center-align"><?php echo $leave->leaveDate; ?></td>
                     <td data-lable="Requested date" class="column-center-align"><?php echo $leave->requestedDate; ?></td>
                     <td data-lable="Responded Staff ID" class="column-center-align">
                        <?php echo $leave->respondedStaffID; ?><?php if (!($leave->respondedStaffID)) echo 'Not yet Responded' ?>
                     </td>
                     <!-- leave Approved=1 pending=0 rejected=2 -->
                     <td data-lable="Type" class="column-center-align">
                        <?php if ($leave->leaveType == 1)
                        {
                           echo "General";
                        }
                        elseif ($leave->leaveType == 2)
                        {
                           echo "Medical";
                        }
                        ?>

                     </td>
                     <td data-lable="Status" class="column-center-align">
                        <?php if ($leave->status == 2) : ?>
                           <button type="button" class="status-btn yellow text-uppercase " value="Pending"> Pending
                           </button>
                        <?php elseif ($leave->status == 1) : ?>
                           <button type="button" class="status-btn green text-uppercase" value="Approved"> Approved
                           </button>
                        <?php else : ?>
                           <button type="button" class="status-btn red text-uppercase value=" Rejected"> Rejected
                           </button>
                        <?php endif; ?>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <button class="editicon btnEditLeave"><a href="#" data-a=""><i class="ci-edit table-icon"></i></a></button>
                           <button class="editicon btnDeleteLeave"><a><i class="ci-trash table-icon"></i></a></button>
                        </span>
                     </td>

                  </tr>

               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <!-- Request leave model -->
   <div class="modal-container edit-leave">
      <div class="modal-box addItems leave_request ">
         <div class="new-type-head">
            <h1>Edit Leave Request</h1>
         </div>
         <form action="<?php echo URLROOT; ?>/Leaves/leaves" class="form" method="POST">
            <div class="leaverequest-form-content">

               <div class="reqleave-date-section">
                  <!-- <p class="test-class">Bla bla</p> -->
                  <div class="leave-date-section">
                     <div class="text-group">
                        <label class="labels" for="serviceName">Date</label><br>
                        <input class="addItemsModalLeaveRequestDate" type="date" name="date" id="date_picker" placeholder="--Select a date--" value="<?php echo $data['date']; ?>">
                     </div>
                     <span class="error date-error">
                        <?php if ($data['date_error'])
                        {
                           echo $data['date_error'];
                        }
                        else echo $data['dateValidationMsg']; ?>
                     </span>
                     <!-- <input class="dateValidationMsg"> -->
                  </div>
                  <div class="reqleave-type-section">
                     <label class="labels" for="serviceName">Type</label><br>
                     <div class="dropdown-group">

                        <select name="leavetype" id="lstatus">
                           <!-- <option value="All" selected></option> -->
                           <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                           <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>General</option>
                           <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>

                        </select>
                     </div>
                     <span class="error date-error">
                        <?php if ($data['type_error'])
                        {
                           echo $data['type_error'];
                        } ?>
                     </span>
                  </div>
               </div>

               <div class="reqleave-reason-section">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Reason</label><br>

                     <textarea type="text" name="reason" id="takeLeaveReason" placeholder="-- Type in --" class="addItemsModalTextArea" value="<?php echo $data['reason']; ?>"><?php echo $data['reason']; ?></textarea>
                  </div>
                  <span class="error"> <?php echo $data['reason_error']; ?></span>


               </div>
               <div class="reqleave-button-section">
                  <div class="modalbutton">
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
                  <!-- <p class="test-class">Bla bla</p> -->
                  <div class="leave-date-section">
                     <div class="text-group">
                        <label class="labels" for="serviceName">Date</label><br>
                        <input class="addItemsModalLeaveRequestDate" type="date" name="date" id="takeLeaveDate" placeholder="--Select a date--" value="">
                     </div>
                     <span class="error date-error">
                        <?php if ($data['date_error'])
                        {
                           echo $data['date_error'];
                        }
                        else echo $data['dateValidationMsg']; ?>
                     </span>
                     <!-- <input class="dateValidationMsg"> -->
                  </div>
                  <div class="reqleave-type-section">
                     <label class="labels" for="serviceName">Type</label><br>
                     <div class="dropdown-group">

                        <select name="leavetype" id="lstatus" class="dropdowntype">
                           <!-- <option value="All" selected></option> -->
                           <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                           <option value=1 <?php if ($data['leavetype'] == 1) echo 'selected'; ?>>General</option>
                           <option value=2 <?php if ($data['leavetype'] == 2) echo 'selected'; ?>>Medical</option>

                        </select>
                     </div>
                     <span class="error date-error">
                        <?php if ($data['type_error'])
                        {
                           echo $data['type_error'];
                        } ?>
                     </span>
                  </div>
               </div>

               <div class="reqleave-reason-section">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Reason</label><br>

                     <textarea type="text" name="reason" id="takeLeaveReason" placeholder="-- Type in --" class="addItemsModalTextArea" value="<?php echo $data['reason']; ?>"><?php echo $data['reason']; ?></textarea>
                  </div>
                  <span class="error"> <?php echo $data['reason_error']; ?></span>


               </div>
               <div class="reqleave-button-section">
                  <div class="modalbutton">
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



   <div class="modal-container edit-leave">
      <div class="modal-box leave_request">
         <div class="new-type-head">
            <h1>Edit Leave</h1>
         </div>
         <form>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceName">2021-10-05</label><br>
                     <input type="date" vale="2021-10-15" placeholder="Because of sickness" value="">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Reason</label><br>

                     <textarea type="text" placeholder="-- Type in --" value="<?php echo $data['reason']; ?>">Because of sickness</textarea>

                  </div>
               </div>
            </div>

            <div class="modalbutton">
               <div class="btn1">
                  <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
               </div>
               <div class="btn2">
                  <button type="submit" name="action" value="addleave" class="edit-leave confirm-service-btn">Save
                     Changes</button>
               </div>
            </div>

         </form>

      </div>

   </div>

   <!-- end edit leave model -->

   <!-- delete leave Request model -->
   <div class="modal-container delete-leave">
      <div class="modal-box leave_delete">
         <h2>Delete Leave Request</h2>
         <div class="confirmationmsg-container">
            <span>Are you sure you want to delete this service?</span>
         </div>
         <div class="modalbutton">
            <div class="btn1">
               <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
            </div>
            <div class="btn2">
               <button type="submit" name="action" value="deleteLeave" class="delete leave confirm-service-btn btn btn-filled btn-blue">Delete</button>
            </div>
         </div>

      </div>

   </div>

   <!-- end delete leave request model -->
</div>




<script src="<?php echo URLROOT ?>/public/js/tableFilter.js"></script>
<script src="<?php echo URLROOT ?>/public/js/fetchRequests/leaveRequest.js"></script>