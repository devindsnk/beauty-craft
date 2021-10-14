<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "Leaves";
    require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
   ?>

   <?php
   $title = "Leaves";
   $username = "Ruwanthi Munasinghe";
   $userLevel = "Service Provider";
   
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content serprov leave">
      <div class="cardandbutton">
         <div class="leavecountcard">
            <div class="leavecountcardleft">Remaining Leave Count</div>
            <div class="leavecountcardright">2</div>
         </div>
         <div class="page-top-main-container">
            <button class="btn btn-filled btn-theme-purple btnleaveRequest">Add New</button>
         </div>
      </div>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row statusopt">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select name="cars" id="cars">
                           <option value="" selected>All</option>
                           <option value="volvo">Approved</option>
                           <option value="saab">Pending</option>
                           <option value="mercedes">Rejected</option>
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

                     <td class="column-center-align"><?php echo $leave->leaveDate; ?></td>
                     <td class="column-center-align"><?php echo $leave->requestedDate; ?></td>
                     <td class="column-center-align"><?php echo $leave->respondedStaffID; ?></td>
                     <td class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase"><?php echo $leave->status; ?></button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><i class="ci-edit table-icon"></i></a>
                           <a href="#"><i class="ci-trash table-icon"></i></a>
                        </span>
                     </td>

                  </tr>

                  <?php endforeach; ?>

                  <!-- <tr>
                     
                     <td class="column-center-align">2021-09-08</td>
                     <td class="column-center-align">2021-09-05</td>
                     <td class="column-center-align">2021-09-06</td>
                     <td class="column-center-align">
                           <button type="button" class="table-btn green-status-btn text-uppercase">Approved</button>
                     </td>
                  <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><i class="ci-edit table-icon"></i></a>
                           <a href="#"><i class="ci-trash table-icon"></i></a>
                        </span>
                     </td>
                     
                  </tr>

                  <tr>
                     <td class="column-center-align">2021-09-08</td>
                     <td class="column-center-align">2021-09-09</td>
                     <td class="column-center-align">N/A</td>
                    
                     <td class="column-center-align">
                        <button type="button" class="table-btn yellow-status-btn text-uppercase">pending</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                            <a href="#"><i class="ci-edit table-icon"></i></a>
                           <a href="#"><i class="ci-trash table-icon"></i></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td class="column-center-align">2021-09-05</td>
                     <td class="column-center-align">2021-09-03</td>
                     <td class="column-center-align">2021-09-04</td>
                     
                     <td class="column-center-align">
                        <button type="button" class="table-btn red-status-btn text-uppercase">Rejected</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><i class="ci-edit table-icon"></i></a>
                           <a href="#"><i class="ci-trash table-icon"></i></a>
                        </span>
                     </td>
                  </tr> -->
               </tbody>
            </table>
         </div>
      </div>
      <!-- Request leave model -->
      <div class="modal-container leaverequest <?php if($data['haveErrors']) echo "show"?>">
         <div class="modal-box leave_request">
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
                        <!-- <textarea class="addItemsModalTextArea" id="takeLeaveReason" name="addItemsModalTextArea"  value="<?php echo $data['reason']; ?>" rows="4" cols="50"placeholder="Type the reason here"> </textarea> -->
                        <textarea type="text" name="reason" id="takeLeaveReason" placeholder="-- Type in --" class=""
                           value="<?php echo $data['reason']; ?>"></textarea>
                        <span class="error"> <?php echo $data['reason_error']; ?></span>
                        <!-- <textarea name ="reason" id="takeLeaveReason" placeholder="-- Type in --" class="" require></textarea> -->
                     </div>
                  </div>
               </div>

               <div class="modalbutton">
                  <div class="1">
                     <button type="submit" name="action" value="cancel" class="btn btnClose ">Cancel</button>
                  </div>
                  <div class="2">
                     <button type="submit" name="action" value="addleave" class="confirm-service-btn">Request</button>
                  </div>
                  <!-- <button class="btn btnClose normal confirm-service-btn">Request</button> -->
               </div>

            </form>

         </div>
      </div>
      <!-- End of Take leave model -->


   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>