<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "DailyView";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Daily View";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept daily-view">
      <div class="page-top-main-container">
         <a href="<?php echo URLROOT ?>/reservations/addNew" class="btn btn-filled btn-theme-purple btn-main">Add
            New</a>
      </div>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Provider</label>
                        <select>
                           <option value="" selected>All</option>
                           <?php foreach ($data['serviceProvidersList'] as $serviceProvider) : ?>
                              <option value=""><?php echo $serviceProvider->fName . " " . $serviceProvider->lName; ?></option>
                           <?php endforeach; ?>
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


      <div class="res-card-container">
         <!-- <div class="titleBox">
            <div class="service-column">Service</div>
            <div class="service-prov-column">Service Provider</div>
            <div class="customer-column">Customer</div>
            <div class="contact-column">Contact No</div>
         </div> -->
         <div class="contentBox res-card">
            <div class="time-box column">09:30 am</div>
            <div class="service-name-box column">Hair Cuts - Ladies</div>
            <div class="service-prov-box column">Service Provider Name</div>
            <div class="customer-box column">Customer Name</div>
            <div class="contact-box column">0717679714</div>
            <div class="status-box column">
               <span class="status-tag status-success-green">Cancelled</span>
            </div>
            <div class="opt-box">
               <a href="#"><i class="ci-3dots-vertical table-icon"></i></a>
            </div>
         </div>
         <div class="contentBox res-card">
            <div class="time-box column">09:30 am</div>
            <div class="service-name-box column">Hair Cuts - Ladies</div>
            <div class="service-prov-box column">Service Provider Name</div>
            <div class="customer-box column">Customer Name</div>
            <div class="contact-box column">0717679714</div>
            <div class="status-box column">
               <span class="status-tag status-success-green">Cancelled</span>
            </div>
            <div class="opt-box">
               <a href="#"><i class="ci-3dots-vertical table-icon"></i></a>
            </div>
         </div>
         <div class="contentBox res-card">
            <div class="time-box column">09:30 am</div>
            <div class="service-name-box column">Hair Cuts - Ladies</div>
            <div class="service-prov-box column">Service Provider Name</div>
            <div class="customer-box column">Customer Name</div>
            <div class="contact-box column">0717679714</div>
            <div class="status-box column">
               <span class="status-tag status-success-green">Cancelled</span>
            </div>
            <div class="opt-box">
               <a href="#"><i class="ci-3dots-vertical table-icon"></i></a>
            </div>
         </div>
         <div class="contentBox res-card">
            <div class="time-box column">09:30 am</div>
            <div class="service-name-box column">Hair Cuts - Ladies</div>
            <div class="service-prov-box column">Service Provider Name</div>
            <div class="customer-box column">Customer Name</div>
            <div class="contact-box column">0717679714</div>
            <div class="status-box column">
               <span class="status-tag status-success-green">Cancelled</span>
            </div>
            <div class="opt-box">
               <a href="#"><i class="ci-3dots-vertical table-icon"></i></a>
            </div>
         </div>
         <div class="contentBox res-card">
            <div class="time-box column">09:30 am</div>
            <div class="service-name-box column">Hair Cuts - Ladies</div>
            <div class="service-prov-box column">Service Provider Name</div>
            <div class="customer-box column">Customer Name</div>
            <div class="contact-box column">0717679714</div>
            <div class="status-box column">
               <span class="status-tag status-success-green">Cancelled</span>
            </div>
            <div class="opt-box">
               <a href="#"><i class="ci-3dots-vertical table-icon"></i></a>
            </div>
         </div>
      </div>
   </div>
   <!--End Content-->

   <?php require APPROOT . "/views/inc/footer.php" ?>