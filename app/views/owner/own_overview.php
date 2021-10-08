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
   <div class="content own overview">
      <!-- owner overview Container starts -->
      <div class="ownOverviewContainer">
         <div class="ownOverviewCardContainer">
            <!-- owner overview available managers card starts -->

            <div class="ownOverviewContainerCard1">
               <!-- <div class="sub-container-card"> -->
               <div class="CardTitle" mang-sub-container-card-title>
                  <P>Available Managers</P>
               </div>
               <div class="CardAmmount mang-sub-container-card-amount">
                  <p>5</p>
                  <!-- </div> -->
               </div>
            </div>
            <!-- owner overview available managers card ends -->

            <!-- owner overview total income card starts -->
            <div class="ownOverviewContainerCard2">               
                  <div class="CardTitle mang-sub-container-card-title">
                     <P>Total Income</P>
                  </div>
                  <div class="CardAmmount mang-sub-container-card-amount">
                     <p>4000000.00 LKR</p>
                  </div>
            </div>
            <!-- owner overview total income card ends -->

            <!-- owner overview resource card starts -->
            <div class="ownOverviewContainerCard3">
               <div class="sub-container-card">
                  <div class="resource bar">
                     <!-- ------------------------------------------------------------------------------------- -->
                     <!-- <div class="menu-wrapper">
                        <ul class="menu">
                           <li class="item">
                              <span>Resource 1</span>
                              <span>4</span>
                           </li>
                           <li class="item">
                              <span>Resource 1</span>
                              <span>4</span>
                           </li>
                           <li class="item">
                              <span>Resource 1</span>
                              <span>4</span>
                           </li>
                           <li class="item">
                              <span>Resource 1</span>
                              <span>4</span>
                           </li>
                           
                        </ul>

                        <div class="paddles">
                           <button class="left-paddle paddle hidden">
                              < </button> <button class="right-paddle paddle">
                                 >
                           </button>
                        </div>

                     </div> -->

                  </div>
               </div>
            </div>
            <!-- owner overview resource card ends -->
         </div>

         <!-- owner overview charts card starts -->
         <div class="ownOverviewCharts">

            <!-- owner overview chart1 card starts -->
            <div class="ownOverviewChart">
               <canvas id="ownOverviewChartAvailableEmployees"></canvas>
            </div>
            <!-- owner overview chart1 card ends -->

            <!-- owner overview chart2 card starts -->
            <div class="ownOverviewChart">
               <canvas id="ownOverviewChartIncome"></canvas>
            </div>
            <!-- owner overview chart2 card ends -->

            <!-- owner overview chart3 card starts -->
            <div class="ownOverviewChart">
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
