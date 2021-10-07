<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "StaffMembers";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Staff Members";
   $username = "Devin Dissanayake";
   $userLevel = "Receptionist";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept staff-members">
      <div class="top-container">

         <!-- <div > -->
         <a href="" class="btn btn-filled btn-theme-purple btn-main">Add New</a>
         <!-- </div> -->
      </div>

      <form class="form" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Name</label>
                        <input type="text" name="" id="fName" placeholder="Your first name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Staff Type</label>
                        <select>
                           <option value="" selected>Any</option>
                           <option value="volvo">Active</option>
                           <option value="saab">Inactive</option>
                        </select>
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
                     <th class="column-center-align col-1">Staff ID</th>
                     <th class="column-center-align col-2">Name</th>
                     <th class="column-center-align col-3">Staff Type</th>
                     <th class="column-center-align col-4">Contact No</th>
                     <th class="column-center-align col-5">Gender</th>
                     <th class="column-center-align col-6">Joined Date</th>
                     <th class="column-center-align col-7">Status</th>
                     <th class="col-8"></th>
                  </tr>
               </thead>

               <tbody>
                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <tr>
                     <td data-lable="Staff ID" class="column-center-align">R000001</td>
                     <td data-lable="Name" class="column-center-align">Devin Dissanayake</td>
                     <td data-lable="Staff Type" class="column-center-align">Receptionist</td>
                     <td data-lable="Contact No" class="column-left-align">0717679714</td>
                     <td data-lable="Gender" class="column-left-align">M</td>
                     <td data-lable="Joined Date" class="column-left-align">2021-10-07</td>
                     <td data-lable="Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Active</button>
                     </td>
                     <td class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                        </span>
                     </td>
                  </tr>

                  <style>
                     .table-container {
                        height: 100vh;
                     }
                  </style>

               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>