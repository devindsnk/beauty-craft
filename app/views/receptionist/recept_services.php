<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Services";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Services";
   $username = "Devin Dissanayake";
   $userLevel = "Receptionist";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept services">
      <div class="top-container">
         <button class="btn btn-main">Add New</button>
      </div>


      <form class="form" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="fName">Service Name</label>
                        <input type="text" name="" id="fName" placeholder="Your first name here">
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Category</label>
                        <select name="cars" id="cars">
                           <option value="" selected>All</option>
                           <option value="volvo">Hair Cuts</option>
                           <option value="saab">Skin Treatments</option>
                           <option value="mercedes">Nail Treatments</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select name="cars" id="cars">
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
               <button class="btn btn-search">Search</button>
            </div>
         </div>

      </form>


      <div class="table-container">
         <div class="table-responsive">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>Service Name</th>
                     <th>Category</th>
                     <th>Total Duration</th>
                     <th class="column-center-align">Price</th>
                     <th class="column-center-align">Status</th>
                     <th class="column-center-align">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <td data-lable="Service Name">Hair Cut- Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                  </tr>
                  <tr>
                     <td data-lable="Service Name">Hair Cut- Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                  </tr>
                  <tr>
                     <td data-lable="Service Name">Hair Cut- Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                  </tr>
                  <tr>
                     <td data-lable="Service Name">Hair Cut- Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                  </tr>
                  <tr>
                     <td data-lable="Service Name">Hair Cut-Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                  </tr>
                  <tr>
                     <td data-lable="Service Name">Hair Cut- Gents</td>
                     <td data-lable="Category">Hair Cuts</td>
                     <td data-lable="Total Duration">40mins</td>
                     <td data-lable="Price">750.00 LKR</td>
                     <td data-lable="Status" class="column-center-align">
                        <a href="#"><button type="button" class="btn paid-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
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