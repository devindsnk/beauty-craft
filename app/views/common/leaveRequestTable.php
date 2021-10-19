<div class="leaverequesttable">
   <div class="cardandbutton">
      <div class="leavecountcard">
         <div class="leavecountcardleft">Remaining Leaves</div>
         <div class="leavecountcardright">
            <?php if($userLevel=="Service Provider"){echo $data['remainingCount'];} else echo 2; ?></div>
      </div>
      <div class="page-top-main-container">
         <button class="btn btn-filled btn-theme-purple btnleaveRequest">Add New</button>
      </div>
   </div>
   <span
      class="leavelimitmsg"><?php if($userLevel=="Service Provider"){if($data['remainingCount']<0) echo "Your Leave limit exceed";} ?></span>
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
                  <th class="column-center-align col-4">Status</th>
                  <th class="column-center-align col-5">Options</th>

               </tr>
            </thead>

            <tbody>
               <?php foreach($data['tableData'] as $leave) :?>
               <tr>

                  <td data-lable="Leave Date" class="column-center-align"><?php echo $leave->leaveDate; ?></td>
                  <td data-lable="Requested date" class="column-center-align"><?php echo $leave->requestedDate; ?></td>
                  <td data-lable="Responded Staff ID" class="column-center-align">
                     <?php echo $leave->respondedStaffID; ?><?php if(!($leave->respondedStaffID)) echo 'Not yet Responded' ?>
                  </td>
                  <!-- leave Approved=1 pending=0 rejected=2 -->
                  <td data-lable="Status" class="column-center-align">
                     <?php if($leave->status==0) :?>
                     <button type="button" class="table-btn yellow-status-btn text-uppercase " value="Pending"> Pending
                     </button>
                     <?php elseif ($leave->status == 1) : ?>
                     <button type="button" class="table-btn green-status-btn text-uppercase" value="Approved"> Approved
                     </button>
                     <?php else: ?>
                     <button type="button" class="table-btn red-status-btn text-uppercase value=" Rejected"> Rejected
                     </button>
                     <?php endif; ?>
                  </td>
                  <td data-lable="Action" class="column-center-align">
                     <span>
                        <button class="editicon btnEditLeave"><a href="#" data-a=""><i
                                 class="ci-edit table-icon"></i></a></button>

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
   <div class="modal-container leaverequest <?php if($data['haveErrors']) echo "show"?>">
      <div class="modal-box leave_request ">
         <div class="new-type-head">
            <h1>Request Leave</h1>
         </div>
         <form action="<?php echo URLROOT; ?>/SerProvDashboard/leaves" class="form" method="POST">

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Date</label><br>
                     <input type="date" name="date" id="takeLeaveDate" placeholder="--Select a date--"
                        value="<?php echo $data['date']; ?>">
                  </div>
                  <span class="error"> <?php echo $data['date_error']; ?></span>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceName">Reason</label><br>

                     <textarea type="text" name="reason" id="takeLeaveReason" placeholder="-- Type in --" class=""
                        value="<?php echo $data['reason']; ?>"></textarea>
                     <span class="error"> <?php echo $data['reason_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="modalbutton">
               <div class="btn1">
                  <button type="submit" name="action" value="cancel"
                     class="close-type-btn btn btnClose ">Cancel</button>
               </div>
               <div class="btn2">
                  <button type="submit" name="action" value="addleave" class="confirm-service-btn">Request</button>
               </div>
            </div>

         </form>

      </div>
   </div>
   <!-- End of Take leave model -->

   <!-- edit leave Request model -->
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

                     <textarea type="text" placeholder="-- Type in --" value="<?php echo $data['reason']; ?>">Because of sickness
 </textarea>

                  </div>
               </div>
            </div>

            <div class="modalbutton">
               <div class="btn1">
                  <button type="submit" name="action" value="cancel"
                     class="close-type-btn btn btnClose ">Cancel</button>
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
         <h4>Delete leave modal</h4>
         <div class="modalbutton">
            <div class="btn1">
               <button type="submit" name="action" value="cancel" class="close-type-btn btn btnClose ">Cancel</button>
            </div>
            <div class="btn2">
               <button type="submit" name="action" value="deleteLeave"
                  class="delete leave confirm-service-btn">Proceed</button>
            </div>
         </div>

      </div>

   </div>

   <!-- end delete leave request model -->
</div>




<script src="<?php echo URLROOT ?>/public/js/tableFilter.js"></script>