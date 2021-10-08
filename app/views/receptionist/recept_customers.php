<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Customers";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Customers";
   $username = "Devin Dissanayake";
   $userLevel = "Receptionist";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept customers">

      <div class="page-top-main-container">
         <a href="" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
      </div>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Customer Name</label>
                        <input type="text" name="" id="fName" placeholder="Your first name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Contact No</label>
                        <input type="text" name="" id="fName" placeholder="Your first name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select>
                           <option value="" selected>Any</option>
                           <option value="volvo">Active</option>
                           <option value="saab">Inactive</option>
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
                  <tr>
                     <td data-lable="Customer ID" class="column-center-align">C000001</td>
                     <td data-lable="Customer Name" class="column-left-align">Ravindu Madhubhashana</td>
                     <td data-lable="Contact No" class="column-center-align">011123456789</td>
                     <td data-lable="Gender" class="column-center-align">M</td>
                     <td data-lable="Registered Date" class="column-center-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><i class="ci-view-more table-icon"></i></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Customer ID" class="column-center-align">C000001</td>
                     <td data-lable="Customer Name" class="column-left-align">Ravindu Madhubhashana</td>
                     <td data-lable="Contact No" class="column-center-align">011123456789</td>
                     <td data-lable="Gender" class="column-center-align">M</td>
                     <td data-lable="Registered Date" class="column-center-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><i class="ci-view-more table-icon"></i></a>
                        </span>
                     </td>
                  </tr>

               </tbody>
            </table>
         </div>
      </div>


   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>