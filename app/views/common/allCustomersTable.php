<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Customers";
   $selectedSub = "";
   switch (Session::getUser("type"))
   {

      case "2":
         require APPROOT . "/views/owner/own_sideNav.php";
         break;
      case "3":
         require APPROOT . "/views/manager/mang_sideNav.php";
         break;
      case "4":
         require APPROOT . "/views/receptionist/recept_sideNav.php";
   }
   ?>

   <?php
   $title = "Customers";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Customer Name</label>
                        <input type="text" name="" id="cusNameInput"value="<?php echo ($data["cusName"]=="all")?"":$data['cusName'];?>" placeholder="Type Customer name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Contact No</label>
                        <input type="text" name="" id="cusContactInput" value="<?php echo ($data["cusContact"]=="all")?"":$data['cusContact'];?>" placeholder="Type contact number here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select id="statusSelector">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data["status"] == '1') ? "selected" : "" ?>>Active</option>
                           <option value="0" <?php echo ($data["status"] == '0') ? "selected" : "" ?>>Inactive</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a class="btn btn-filled btn-black" id="allCustomersFilterBtn">Search</a>
            </div>
         </div>

      </form>

      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">
               <thead>
                  <tr>
                     <th class="column-center-align col-1">Customer ID</th>
                     <th class="column-center-align col-2">Name</th>
                     <th class="column-center-align col-3">Contact No</th>
                     <th class="column-center-align col-4">Gender</th>
                     <th class="column-center-align col-5">Registered Date</th>
                     <th class="column-center-align col-6">Status</th>
                     <th class="col-7"></th>
                  </tr>
               </thead>
               <tbody>

                  <?php foreach ($data['allCustomerDetailsList'] as $customerD) : ?>
                     <tr>
                        <td data-lable="Customer ID" class="column-center-align">C<?php echo $customerD->customerID; ?></td>
                        <td data-lable="Customer Name" class="column-left-align"><?php echo $customerD->fName; ?>
                           <?php echo $customerD->lName; ?></td>
                        <td data-lable="Contact No" class="column-center-align"><?php echo $customerD->mobileNo; ?></td>
                        <td data-lable="Gender" class="column-center-align"><?php echo ($customerD->gender=="M")?"Male":"Female"; ?></td>
                        <td data-lable="Registered Date" class="column-center-align"> <?php echo DateTimeExtended::dateToShortMonthFormat($customerD->registeredDate, "F"); ?></td>
                        <td data-lable="Status" class="column-center-align">
                           <?php if($customerD->status==1):?>
                           <button type="button" class="status-btn green text-uppercase">Active</button>
                           <?php elseif ($customerD->status==0):?>
                              <button type="button" class="status-btn red text-uppercase">Removed</button>
                           <?php endif; ?>
                        </td>
                        <td class="column-center-align">
                           <a href="<?php echo URLROOT ?>/customer/cusDetailView/<?php echo $customerD->customerID ?>"><i class="ci-view-more table-icon img-gap"></i></a>
                           <?php if (Session::getUser("typeText") == "Owner") : ?>
                              <?php if($customerD->status==1):?>
                              <a href="#"><i data-cusid="<?php echo $customerD->customerID; ?>" data-cusmobileno="<?php echo $customerD->mobileNo; ?>" data-cusname="<?php echo $customerD->fName; ?> <?php echo $customerD->lName; ?>" class="ci-trash table-icon btnRemoveCustomer removeCustomerAnchor img-gap"></i></a>
                              <?php endif; ?>
                              <?php if($customerD->status==0):?>
                              <a href="#"><i data-cusid="<?php echo $customerD->customerID; ?>" data-cusmobileno="<?php echo $customerD->mobileNo; ?>" data-cusname="<?php echo $customerD->fName; ?> <?php echo $customerD->lName; ?>" class="ci-trash-disable table-icon btnRemoveCustomer removeCustomerAnchor img-gap"></i></a>
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
   </div>

   <!------------------- Remove Customer Container starts ----------------------------->
   <div class="modal-container remove-customer  own customers">
      <div class="modal-box">
         <h1 class="ownRemCusHead own">Remove Customer</h1>
         <!-- start main grid 1 -->
         <div class="ownRemCusDetails">

            <label class="ownRemCusLabel1">Customer Id</label>
            <span class="ownRemCusData1">M001</span>
            <br>
            <label class="ownRemCusLabel2">Name</label>
            <span class="ownRemCusData2">Ravindu Madhubhashana</span>
            <br>
         </div>
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="ownRemCusError">
            <label class="ownRemCusErrortext">Customer has upcoming reservations. Reservations will be cancelled if you
               proceed.</label>
         </div>
         <!-- main grid 2 ends -->
         <!-- main grid 3 starts -->
         <div class="ownRemCusButtons">
            <div class="ownRemCusbtn1">
               <button class="btn btnClose normal ModalCancelButton ModalButton ">Cancel</button>
            </div>
            <div class="ownRemCusbtn2">
               <a href="" class="removeCustomer"><button class="btn ModalBlueButton ModalButton removeCustomerBtn">Proceed</button></a>
            </div>
         </div>
         <!-- main grid 3 ends -->
      </div>
      <script src="<?php echo URLROOT ?>/public/js/fetchRequests/removeCustomer.js"></script>
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>
   </div>
   <!------------------- Remove Customer Container ends ----------------------------->


   
   <?php require APPROOT . "/views/inc/footer.php" ?>