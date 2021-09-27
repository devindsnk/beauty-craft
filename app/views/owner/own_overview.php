<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Overview";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Overview";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <!-- owner overview Container starts -->
      <div class="ownOverviewContainer">
      <div class="ownOverviewCardContainer">
         <!-- owner overview available managers card starts -->
         
         <div class ="ownOverviewContainerCard1">
         <div class="sub-container-card">
            <div class="sub-container-card-title">
            <label>Available Managers</label>
            </div>
            <div class="sub-container-card-amount">
            <span>2/5</span>
            </div>
            </div>
         </div>
            <!-- owner overview available managers card ends -->

         <!-- owner overview total income card starts -->
         <div class ="ownOverviewContainerCard2">
         <div class="sub-container-card">
            <div class="sub-container-card-title">
            <label class="ownOverviewCard2Heading">Total Income(LKR)</label>
            </div>
            <div class="sub-container-card-amount">
            <span>1.56M</span>
            </div>
         </div>
         </div>
         <!-- owner overview total income card ends -->

         <!-- owner overview resource card starts -->
         <div class ="ownOverviewContainerCard3">
         <div class="sub-container-card">
               <div class="resource bar">
                    data will be added
               </div>
         </div>
         </div>
         <!-- owner overview resource card ends -->
         </div>
         
         <!-- owner overview charts card starts -->
         <div class="ownOverviewCharts">

            <!-- owner overview chart1 card starts -->
            <div class="ownOverviewChart1">
            <canvas id="ownOverviewChartAvailableEmployees"></canvas>
            </div>
            <!-- owner overview chart1 card ends -->

            <!-- owner overview chart2 card starts -->
            <div class="ownOverviewChart2">
            <canvas id="ownOverviewChartIncome"></canvas>
            </div>
            <!-- owner overview chart2 card ends -->

            <!-- owner overview chart3 card starts -->
            <div class="ownOverviewChart3">
            <canvas id="ownOverviewChartSalaryStatus"></canvas>
            </div>
            <!-- owner overview chart3 card ends -->

         </div>
         <!-- owner overview charts card ends -->

         </div>
      <!-- owner overview Container ends -->
      </div>

     

   </div>
   <!--End Content-->
   


   <?php require APPROOT . "/views/inc/footer.php" ?>