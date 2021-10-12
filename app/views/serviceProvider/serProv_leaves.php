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
       <a href="" class="btn btn-filled btn-theme-purple btn-main" id="addnewbtn">Add New</a>
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
                     <th class="column-center-align col-3">Responded Date</th>
                     <th class="column-center-align col-4">Status</th>
                     <th class="column-center-align col-5">Options</th>
                     
                  </tr>
               </thead>

               <tbody>
                  <tr>
                     
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
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
            <!-- Take leave model -->
      <!-- <div class="modal-container normal leaverequstmodal"> -->
         <div class="modal-box leave_request">
               <div class="new-type-head">
                  <h1>Take a Leave</h1>
               </div>
               <form action="<?php echo URLROOT; ?>/SerProvDashboard/leaves" class="form" method="POST">

                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Date</label><br>
                              <input type="date" name="date" id="takeLeaveDate" placeholder="--Select a date--" value="<?php echo $data['date']; ?>">
                           </div>
                           <span class="error"> <?php echo $data['date_error']; ?></span>
                     </div>
                  </div>
                  <div class="row">
                     <div class="column">
                           <div class="text-group">
                              <label class="labels" for="serviceName">Reason</label><br>
                              <input type="text" name ="reason" id="takeLeaveReason" placeholder="-- Type in --" class="" value="<?php echo $data['reason']; ?>">
                                <span class="error"> <?php echo $data['reason_error']; ?></span>
                              <!-- <textarea name ="reason" id="takeLeaveReason" placeholder="-- Type in --" class="" require></textarea> -->
                           </div>
                     </div>
                  </div>

                  <div class="new-type-head">
                     <button class="btn btnClose normal close-type-btn">Close</button>
                     <input type="submit" value ="Request"  class="btn btnClose normal confirm-service-btn">
                     <!-- <button class="btn btnClose normal confirm-service-btn">Request</button> -->
                  </div>

               </form>
         </div>
      <!-- </div> -->
      <!-- End of Take leave model -->


   </div>
   <!--End Content-->


 <?php require APPROOT . "/views/inc/footer.php" ?>