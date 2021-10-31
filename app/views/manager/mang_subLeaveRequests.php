<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Leaves";
   $selectedSub = "LeaveRequests";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Leave Requests";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section mang">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="staffID">Staff ID</label>
                        <input type="text" name="" id="staffID" placeholder="StaffID here">
                     </div>
                     <!-- <span class="error"> <?php echo " "; ?></span> -->
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="leaaveDate">Leave Date</label>
                        <input type="date" name="" id="leaaveDate" placeholder="--select--">
                     </div>
                     <!-- <span class="error"></span> -->
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="respStaffID">Responded Staff ID</label>
                        <input type="text" name="" id="respStaffID" placeholder="Responded StaffID here">
                     </div>
                     <!-- <span class="error"> <?php echo " "; ?></span> -->
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select>
                           <option value="" selected>Any</option>
                           <option value="">Approved</option>
                           <option value="">Pending</option>
                           <option value="">Rejected</option>
                        </select>
                     </div>
                     <!-- <span class="error"> <?php echo " "; ?></span> -->
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
                     <th class="column-center-align col-1">Staff ID</th>
                     <th class="column-center-align col-2">Leave Date</th>
                     <th class="column-center-align col-3">Responded Staff ID</th>
                     <th class="column-center-align col-4">Requested Date</th>
                     <th class="column-center-align col-5 column-center-align">Reason</th>
                     <th class="column-center-align col-6">Status</th>
                     <th class="col-8"></th>
                     <th class="col-9"></th>
                  </tr>
               </thead>

               <tbody>
                  <?php foreach ($data['leaves'] as $leaveDetails) : ?>
                     <form class="form" action="<?php echo URLROOT; ?>/leaves/responceForLeaveRequest/<?php echo $leaveDetails->staffID; ?>" method="post">
                        <tr>
                           <td data-lable="Staff ID" class="column-center-align"><?php echo $leaveDetails->staffID; ?></td>
                           <td data-lable="Leave Date" class="column-center-align"><?php echo $leaveDetails->leaveDate; ?></td>
                           <td data-lable="Responded Staff ID" class="column-center-align">
                              <?php if(empty($leaveDetails->respondedStaffID)): ?>
                                 - 
                              <?php else: ?>
                                 <?php echo $leaveDetails->respondedStaffID; ?>
                              <?php endif; ?>
                           </td>
                           <td data-lable="Requested Date" class="column-center-align"><?php echo $leaveDetails->requestedDate; ?></td>
                           <td data-lable="Reason" class="column-center-align"><?php echo $leaveDetails->reason; ?></td>
                           <td data-lable="Status" class="column-center-align">
                              <?php if ($leaveDetails->status == 0) : ?>
                                 <button type="button" class="table-btn red-status-btn text-uppercase">Rejected</button>
                              <?php elseif ($leaveDetails->status == 1) : ?>
                                 <button type="button" class="table-btn green-status-btn text-uppercase">Approved</button>
                              <?php elseif ($leaveDetails->status == 2) : ?>
                                 <button type="button" class="table-btn yellow-status-btn text-uppercase">Pending</button>
                              <?php endif; ?>
                           </td>
                           <td class="column-center-align">
                              <span>
                                 <a href="<?php echo URLROOT ?>/leaves/oneleaveRequest/<?php echo $leaveDetails->staffID; ?>"><i class="ci-view-more table-icon img-gap"></i></a>
                              </span>
                           </td>
                           <td class="column-center-align">
                              <?php if ($leaveDetails->status == 0 || $leaveDetails->status == 1) : ?>
                                 <a href="#"><button type="button" class="table-btn gray-action-btn">Approve</button></a>
                              <?php elseif ($leaveDetails->status == 2) : ?>
                                 <a href="#"><button type="submit" class="table-btn black-action-btn" name="action" value="approve">Approve</button></a>
                              <?php endif; ?>
                           </td>
                        </tr>
                     </form>
                  <?php endforeach; ?>

               </tbody>
            </table>
         </div>
      </div>

   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>