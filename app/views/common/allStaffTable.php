<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Staff Members";
   $selectedSub = "";
   switch (Session::getUser("type"))
   {
      case "2":
         require APPROOT . "/views/owner/own_sidenav.php";
         break;
      case "3":
         require APPROOT . "/views/manager/mang_sidenav.php";
         break;
      case "4":
         require APPROOT . "/views/receptionist/recept_sidenav.php";
         // break;  
   }
   ?>

   <?php
   $title = "Staff Members";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->

   <!----------------------- temporary buttons --------------------------------------->

   <div class="content own Remstaff">



      <?php if (Session::getUser('typeText') == "Owner") : ?>
      <div class="page-top-main-container">
         <a href="<?php echo URLROOT ?>/staff/addStaff" class="btn btn-filled btn-theme-purple btn-main"
            onclick="sessionStorage.setItem('returnReferer',window.location.href);">Add New</a>
      </div>
      <?php endif; ?>

      <form class=" form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Type</label>
                        <select id="sTypeSelector">
                           <option value="all" selected>All</option>
                           <option value="3" <?php echo ($data["selectedType"] == '3') ? "selected" : "" ?>>Managaer
                           </option>
                           <option value="4" <?php echo ($data["selectedType"] == '4') ? "selected" : "" ?>>Receptionist
                           </option>
                           <option value="5" <?php echo ($data["selectedType"] == '5') ? "selected" : "" ?>>Service
                              Provider</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="fName">Staff Member</label>
                        <input type="text" name="staffName" value="" id="staffNameSelector" placeholder="Your first name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select id="statusSelector">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data["selectedStatus"] == '1') ? "selected" : "" ?>>Active
                           </option>
                           <option value="2" <?php echo ($data["selectedStatus"] == '2') ? "selected" : "" ?>>Disabled
                           </option>
                           <option value="4" <?php echo ($data["selectedStatus"] == '4') ? "selected" : "" ?>>Removed
                           </option>
                        </select>
                     </div>
                     <span class="error"> <?php echo ""; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <button type="button" id="allStaffFilterBtn" class="btn btn-filled btn-black">Search</button>
            </div>
         </div>

      </form>

      <div class="table-container staff-table">
         <div class="table2 table2-responsive">
            <table class="table2-hover">

               <thead>
                  <tr>
                     <th class="column-center-align col-1">Staff ID</th>
                     <th class="column-center-align col-2">Name</th>
                     <th class="column-center-align col-3">Staff Type</th>
                     <th class="column-center-align col-4">Mobile No</th>
                     <th class="column-center-align col-5">Gender</th>
                     <th class="column-center-align col-6">Joined Date</th>
                     <th class="column-center-align col-7">Status</th>
                     <th class="col-8"></th>
                  </tr>
               </thead>

               <tbody>

                  <?php foreach ($data['allStaffDetailsList'] as $staffD) : ?>
                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">SM<?php echo $staffD->staffID; ?></td>
                     <td data-lable="Name" class="column-left-align"><?php echo $staffD->fName; ?>
                        <?php echo $staffD->lName; ?></td>
                     <td data-lable="Staff Type" class="column-center-align">
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
                     <td data-lable="Contact No" class="column-center-align"><?php echo $staffD->mobileNo; ?></td>
                     <td data-lable="Gender" class="column-center-align">
                        <?php if ($staffD->gender == 'M')
                           {
                              echo 'Male';
                           }
                           elseif ($staffD->gender == 'F')
                           {
                              echo 'Female';
                           } ?>
                     </td>
                     <td data-lable="Joined Date" class="column-center-align">
                        <?php echo DateTimeExtended::dateToShortMonthFormat($staffD->joinedDate, "F"); ?></td>
                     <td data-lable="Status" class="column-center-align">
                        <!-- Staff memeber states >> Removed = 0 Active =1 Disabled =2 -->
                        <?php if ($staffD->status == 0) : ?>
                        <button type="button" class="status-btn text-uppercase red"> Removed </button>
                        <?php elseif ($staffD->status == 1) : ?>
                        <button type="button" class="status-btn text-uppercase green"> Active </button>
                        <?php elseif ($staffD->status == 2) : ?>
                        <button type="button" class="status-btn text-uppercase yellow"> Disabled </button>
                        <?php endif; ?>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="<?php echo URLROOT ?>/staff/viewStaff/<?php echo $staffD->staffID ?>"><i
                                 class="ci ci-view-more table-icon img-gap"></i></a>
                           <?php if (Session::getUser('typeText') == "Owner") : ?>

                           <?php if ($staffD->status == 0) : ?>
                           <a href="<?php echo URLROOT ?>/staff/updateStaff/<?php echo $staffD->staffID ?>"
                              onclick="sessionStorage.setItem('returnReferer',window.location.href);"><i class="ci ci-edit-disable table-icon img-gap "></i></a>
                           <?php endif; ?>
                           <?php if ($staffD->status != 0) : ?>
                           <a href="<?php echo URLROOT ?>/staff/updateStaff/<?php echo $staffD->staffID ?>"
                              onclick="sessionStorage.setItem('returnReferer',window.location.href);"><i class="ci ci-edit table-icon img-gap "></i></a>
                           <?php endif; ?>

                           <?php if ($staffD->status == 0) : ?>
                           <a href="#" class="removeStaffAnchor"><i
                                 data-staffmobileno="<?php echo $staffD->mobileNo; ?>"
                                 data-staffid="<?php echo $staffD->staffID; ?>"
                                 data-staffstatus="<?php echo $staffD->status; ?>"
                                 data-staffname="<?php echo $staffD->fName; ?> <?php echo $staffD->lName; ?>"
                                 data-stafftype="<?php if ($staffD->staffType == 3)
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
                               } ?> "
                                 class="ci ci-trash-disable table-icon btnRemoveStaff removeStafftrash img-gap"></i></a>
                           <?php endif; ?>

                           <?php if ($staffD->status != 0) : ?>
                           <a href="#" class="removeStaffAnchor"><i
                                 data-staffmobileno="<?php echo $staffD->mobileNo; ?>"
                                 data-staffid="<?php echo $staffD->staffID; ?>"
                                 data-staffstatus="<?php echo $staffD->status; ?>"
                                 data-staffname="<?php echo $staffD->fName; ?> <?php echo $staffD->lName; ?>"
                                 data-stafftype="<?php if ($staffD->staffType == 3)
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
                               } ?> "
                                 class="ci ci-trash table-icon btnRemoveStaff removeStafftrash img-gap"></i></a>
                           <?php endif; ?>

                           <?php endif; ?>
                        </span>
                     </td>
                  </tr>
                  <?php endforeach; ?>


               </tbody>
            </table>
         </div>
      </div>


      <!------------------- Remove Staff modal starts ----------------------------->
      <div class="modal-container remove-staff">
         <div class="modal-box " id="ownRemstaffWrapper">
            <div class="ownRemstaffContainer">
               <h1 class="confirm-model-head confirm-model-head">Remove Staff</h1>

               <!-- start main grid 1 -->
               <div class="staffDetails">
                  <div class="staffDetail1">
                     <label class="staffLable">Staff Id</label>
                     <span class="staffData staffID">M001</span>
                  </div>
                  <div class="staffDetail2">
                     <label class="staffLable">Type</label>
                     <span class="staffData staffType">Service Provider</span>
                  </div>
                  <div class="staffDetail3">
                     <label class="staffLable">Name</label>
                     <span class="staffData staffName">Ravindu Madhubhashana</span>
                  </div>
               </div>
               <!-- main grid 1 ends -->

               <!-- main grid 2 starts -->
               <div class="remStaffError">
                  <label class="remStaffErrortext">Staff member has upcoming reservations.</label> <br>
                  <span class="remStaffErrorViewReservaions">Select the check box to send recall requests.</span> <input
                     type="checkbox" class="remStaffReservationRecallCheckBox">
                  <!-- <a href="<?php echo URLROOT ?>/staff/RemStaffReservations" class="remStaffErrorAnchortag"> <label class="remStaffErrorViewReservaions">View 
                  Reservaions</label></a> -->
               </div>
               <!-- main grid 2 ends -->

               <!-- main grid 3 starts -->
               <div class="remButtons">
                  <div class="ownRemStaffbtn1">
                     <button class="btn btnClose normal ModalButton ModalCancelButton">Cancel</button>
                  </div>
                  <div class="ownRemStaffbtn2">
                     <a href="" class="removeStaffAnchorTag"><button
                           class="btn normal ModalButton ModalBlueButton removeStaffBtn">Proceed</button></a>
                  </div>
               </div>
               <!-- main grid 3 ends -->

            </div>
         </div>
      </div>


      <!------------------- Remove Staff Container ends ----------------------------->
      <script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeStaff.js"></script>
      <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

   </div>

   <!--End Content-->

   <?php require APPROOT . "/views/inc/footer.php" ?>