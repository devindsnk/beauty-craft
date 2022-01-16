<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Overview";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Overview";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <!--sub-container1-->
      <div class="mang-sub-container1 mang">
         <!--card1-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Income</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo number_format($data['totalIncome'][0]->totalIncome, 2, '.', ' '); ?> LKR</p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Upcomming Reservations</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['upcommingReservations'][0]->upacommingReservations; ?></p>
            </div>
         </div>
         <!--End of card2-->

         <!--card3-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Available Services</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['availableServices']; ?></p>
            </div>
         </div>
         <!--End of card3-->

         <!--card4-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Available Service Providers</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['availableServiceProviders'][0]->serProvCount; ?></p>
            </div>
         </div>
         <!--End of card4-->
      </div>
      <!--End of sub-container1-->

      <!--sub-container1-->
      <div class="mang-sub-container1 mang">
         <!--card5-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>No of Customers</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['activeCustomers']; ?></p>
            </div>
         </div>
         <!--End of card5-->

         <!--card6-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>No of Receptionists</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['activeReceptionists']; ?></p>
            </div>
         </div>
         <!--End of card6-->

         <!--card7-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>No of Managers</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['activeManagers']; ?></p>
            </div>
         </div>
         <!--End of card7-->

         <!--card8-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Pending Leave Requests</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['pendingLeaveRequests']; ?></p>
            </div>
         </div>
         <!--End of card8-->
      </div>
      <!--End of sub-container1-->

      <!--sub-container2-->
      <div class="mang-sub-container2 mang">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Annual Income</p>
            </div>
            <canvas id="mangChart1" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Annual Reservations</p>
            </div>
            <canvas id="mangChart2" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->
   </div>
   <!--End Content-->

   <script src="<?php echo URLROOT ?>/public/js/mang_charts.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>