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
<!-- <?php print_r($data)?> -->

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Staff Member Name</label>
                        <input type="text" name="" id="staffNameInput"value="<?php echo ($data["nameTyped"]== "all")? "": $data['nameTyped'];?>" placeholder="Resource name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Staff ID</label>
                        <input type="text" name="" id="staffIDInput" value="<?php echo ($data["staffIDSelected"]== "all")? "": $data['staffIDSelected'];?>" placeholder="Resource name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="sType">Paid Status</label>
                        <select id="paidTypeSelector">
                           <option value="all" selected>Any</option>
                           <option value="1" <?php echo ($data["paidTypeSelected"] == '1') ? "selected" : "" ?>>Paid</option>
                           <option value="0" <?php echo ($data["paidTypeSelected"] == '0') ? "selected" : "" ?>>Not Piad</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group ownTableFormDate">
                        <label class="label" for="fName">Month</label>
                        <input type="month" name="" id="sMonthSelector" value="<?php echo $data["selectedMonth"]?>" placeholder="Month here" class="salaryMonth">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a class="btn btn-filled btn-black" id="allSalaryFilterBtn">Search</a>
               <a href="#" class="btn btn-filled btn-theme-purple btnSalaryPayMultiple"></i> Mark As Paid</a>
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
                     <th class="column-right-align">Salary(LKR)</th>
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
                  <?php foreach ($data['allStaffSalaryDetailsList'] as $staffD) : ?>
                     <tr>
                        <td data-lable="" class="column-center-align">
                           <input type="checkbox" name="chk" class = "payNowCheckbox" data-staffid = "<?php echo $staffD->staffID; ?>" data-month = "<?php echo $staffD->month; ?>" <?php echo  ($staffD->status==1)? " disabled": "" ?>/>
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
                        <td data-lable="Salary" class="column-right-align"><?php echo number_format($staffD->amount , 2, '.', ' ') ?></td>
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
                        </td>
                        <?php print_r($staffD->mobileNo); ?>
                        <td data-lable="More" class="column-center-align">
                           <a class="btnSalaryPayment" class="">
                              <button data-staffid = "<?php echo $staffD->staffID; ?>" data-month = "<?php echo $staffD->month; ?>" data-mobileno = "<?php echo $staffD->mobileNo; ?>" type="button" class="<?php echo  ($staffD->status==1)?   "table-btn gray-action-btn text-uppercase" : "table-btn black-action-btn text-uppercase btnSalaryPay" ?>" >Pay Now</button>
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
   <div class="modal-container salary-payment-multiple">
      <div class="modal-box">
         <div class="confirm-model-head">
            <h1>Salary Payment</h1>
         </div>
         <div class="confirm-model-head">
            <p>Are you sure you want to mark this as paid?</p>
         </div>
         <div class="confirm-model-head">
            <button class="btn btnClose normal ModalButton ModalCancelButton">Cancel</button>
            <a href="" class="salaryPayMultipleAnchorTag"><button class="btn normal ModalButton ModalBlueButton">Proceed</button></a>
         </div>
      </div>
   </div>
   <!-- End of Validate the salary payment model -->

   <!-- Salary pay modal -->
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
            <a href=" " class="salaryPayAnchorTag"><button class="btn normal ModalButton ModalBlueButton ">proceed</button></a>
         </div>
      </div>
   </div>
   <!-- End of Remove close date model -->
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/salary.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/fetchRequests/salaryPayMultipleStaffMembers.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
   
   <?php require APPROOT . "/views/inc/footer.php" ?>