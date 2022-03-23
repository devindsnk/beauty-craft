<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Overview";
   $selectedSub = "";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Overview";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own overview">
      <!-- owner overview Container starts -->
      <div class="ownOverviewContainer">
         <div class="ownOverviewCardContainer">
            <!-- owner overview available managers card starts -->
            <div class="ownOverviewContainerCard1">
               <div class="mang-sub-container-card-title">
                  <p>Available Managers</p>
               </div>
               <div class="mang-sub-container-card-amount">
                  <p><?php echo $data['activeManagers'][0]->mangCount?></p>
               </div>
            </div>
            <!-- owner overview available managers card ends -->


            <!-- owner overview total income card starts -->
            <div class="ownOverviewContainerCard2">
               <div class="mang-sub-container-card-title">
                  <p>Total Income</p>
               </div>
               <div class="mang-sub-container-card-amount">
                  <p> <?php echo $data['totalIncome'][0]->totalIncome?> LKR</p>
               </div>
            </div>
            <!-- owner overview total income card ends -->

            <!-- <div class="ownOverviewContainerCard3">
               <div class="wrapper">
               <div class="item">Box 1</div>
               <div class="item">Box 2</div>
               <div class="item">Box 3</div>
               <div class="item">Box 4</div>
               <div class="item">Box 5</div>
               <div class="item">Box 6</div>
               </div>
            </div> -->
            <!-- owner overview available managers card starts -->
            <div class="ownOverviewContainerCard3">
               <div class="mang-sub-container-card-title">
                  <p>Total Customers</p>
               </div>
               <div class="mang-sub-container-card-amount">
                  <p><?php echo $data['activeCustomers']?></p>
               </div>
            </div>

         </div>

         <!-- owner overview charts card starts -->
         <div class="ownOverviewCharts">

            <!-- owner overview chart1 card starts -->

            <div class="ownOverviewChart1">
               <div class="chartHead">
                  <p> Staff Members </p>
               </div>
               <canvas id="ownOverviewChartAvailableEmployees"></canvas>
            </div>
            <!-- owner overview chart1 card ends -->

            <!-- owner overview chart2 card starts -->
            <div class="ownOverviewChart2">
               <div class="chartHead">
                  <p>Income </p>
               </div>
               <canvas id="ownOverviewChartIncome"></canvas>
            </div>
            <!-- owner overview chart2 card ends -->

            <!-- owner overview chart3 card starts -->
            <!-- <div class="ownOverviewChart3">
            <div class="chartHead"> 
               <p>Income</p>
            </div>
               <canvas id="ownOverviewChartSalaryStatus"></canvas>
            </div> -->
            <!-- owner overview chart3 card ends -->

         </div>
         <!-- owner overview charts card ends -->

      </div>
      <!-- owner overview Container ends -->
   </div>

   </div>
   <!--End Content-->

   <?php require APPROOT . "/views/inc/footer.php" ?>