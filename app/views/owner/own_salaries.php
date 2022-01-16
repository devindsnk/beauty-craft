<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Salaries";
   $selectedSub = "";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Salaries";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own salaries">


      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Staff Member Name</label>
                        <input type="text" name="" id="fName" placeholder="Resource name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Staff ID</label>
                        <input type="text" name="" id="fName" placeholder="Resource name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Staff Type</label>
                        <select>
                           <option value="" selected>Receptionist</option>
                           <option value="volvo">Manager</option>
                           <option value="saab">Service Provider</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group ownTableFormDate">
                        <label class="label" for="fName">Month</label>
                        <input type="month" name="" id="fName" placeholder="Month here" class="salaryMonth">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a href="" class="btn btn-filled btn-black">Search</a>
               <a href="#" class="btn btn-filled btn-theme-purple btnSalaryPay"></i> Mark As Paid</a>
            </div>
         </div>
      </form>

      <!-- <?php print_r($data); ?> -->

      <!--Content-->
      <div class="table-container">
         <div class="table1 table1-responsive">
            <table class="table1-hover">
               <!--Table head-->
               <thead>
                  <tr>
                     <th colspan="2" >Staff Member Name</th>
                     <th>Staff ID</th>
                     <th class="column-left-align">Staff Type</th>
                     <th class="column-right-align">Salary</th>
                     <th class="column-center-align">Paid Status</th>
                     <th class="col-7"></th>
                     <th class="column-center-align">More</th>
                  </tr>
               </thead>
               <!--End of table head-->
               
               <!--Table body-->
               <tbody>

                  <!--Table row-->
                <!-- <?php print_r($data); ?> -->
                  <?php foreach ($data as $staffD) : ?>
                     <tr>
                        <td data-lable="" class="column-center-align">
                           <input type="checkbox" class="" name="chk" />
                        </td>
                        <!-- <td data-lable="" class="column-center-align"><img class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg" /></td> -->
                        <td data-lable="Staff Member Name"><?php echo $staffD->fName ?> <?php echo $staffD->lName ?></td>
                        <td data-lable="Staff ID" class="column-center-align" >SN<?php echo $staffD->staffID ?></td>
                        <td data-lable="Staff Type" class="column-left-align">
                           <?php if ($staffD->staffType == 3)
                           {
                              echo 'Manager';
                           }
                           elseif ($staffD->staffType == 4)
                           {
                              echo 'Receptionist';
                           }
                           elseif ($staffD->staffType == 5)
                           {
                              echo 'Service Provider';
                           } ?>
                        </td>
                        <td data-lable="Salary" class="column-right-align"><?php echo $staffD->amount ?></td>
                        <td data-lable="Paid Status" class="column-center-align">
                        <?php if($staffD->status==1)
                              {
                                 echo '<button type="button" class="status-btn green text-uppercase">Paid</button>';
                              }
                              else
                              {
                                 echo '<button type="button" class="status-btn red text-uppercase">Not Paid</button>';
                              }
                              ?>
                        </td>
                        <td data-lable="Action" class="column-center-align">
                           <span>
                              <a href="<?php echo URLROOT ?>/salary/salaryReport/<?php echo $staffD->staffID ?>/<?php echo $staffD->staffType ?>" class="salaryReportViewAncorTag"><i class="img-view-edit-update ci-view-more table-icon salaryReportViewIcon" data-staffid="<?php echo $staffD->staffID ?>"></i></a>
                           </span>
                           <!-- <?php echo URLROOT ?>/salary/salaryReport/<?php echo $staffD->staffID ?>/<?php echo $staffD->staffType ?> -->
                        </td>
                        <td data-lable="More" class="column-center-align">
                           <a class="btnSalaryPayment" class="">
                              <button type="button" class="table-btn black-action-btn text-uppercase btnSalaryPay">Pay Now</button>
                           </a>
                        </td>
                     </tr>
                     <!--End of table row-->
                  <?php endforeach; ?>
               </tbody>
               <!--End of table body-->

            </table>
            <input type="button" class="table-btn check-btn btn-position" onclick='selects()' value="CheckAll" />
            <input type="button" class="table-btn uncheck-btn btn-position" onclick='deSelect()' value="UncheckAll" />
         </div>
      </div>
      <!--End Content-->


   </div>

   <!--End Content-->

   <!-- Validate the salary payment model -->
   <div class="modal-container ">
      <div class="modal-box">
         <div class="confirm-model-head">
            <h1>Salary Payment</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to mark this as paid?</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Cancel</button>
            <button class="btn normal ModalButton ModalBlueButton">Proceed</button>
         </div>
      </div>
   </div>
   <!-- End of Validate the salary payment model -->

   <!-- Remove close date model -->
   <div class="modal-container salary-payment">>
      <div class="modal-box">
         <div class="confirm-model-head">
            <h1>Salary Payment</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to mark this as paid?<br> This action cannot be undone after proceeding.</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
            <button class="btn normal ModalButton ModalBlueButton">proceed</button>
         </div>
      </div>
   </div>
   <!-- End of Remove close date model -->
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/salaryGetMonth.js"></script>
   <?php require APPROOT . "/views/inc/footer.php" ?>