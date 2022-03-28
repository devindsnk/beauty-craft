<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">

   <!-- TODO: provide relevent sideNav by checking logged in user -->
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "OverallAnalytics";
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
   $title = "Overall Analytics";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <!--sub-container1-->
      <div class="mang-sub-container1">
         <!--card1-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Reservations</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['totalRes'][0]->resCount; ?></p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Income</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo number_format($data['totalRes'][0]->totalIncome, 2, '.', ' '); ?> LKR</p>
            </div>
         </div>
         <!--End of card2-->

         <!--card3-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Services</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['availableServices']; ?></p>
            </div>
         </div>
         <!--End of card3-->

         <!--card4-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Service Providers</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p><?php echo $data['availableServiceProviders'][0]->serProvCount; ?></p>
            </div>
         </div>
         <!--End of card4-->
      </div>
      <!--End of sub-container1-->
      <div class="main-head">
         <p>Last month progress</p>
         <hr class="head-hr">
      </div>
      <div class="mang-sub-container3 mang">

         <div class="table-container">
            <div class="table-head">
               <p>Top 5 Employees</p>
            </div>
            <div class="table-cont">
               <table class="top-5-table">
                  <thead>
                     <tr>
                        <th class="column-left-align">Employee</th>
                        <th class="column-right-align">Income</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data['top5SProvs'] as $topSerProvs) : ?>
                        <tr>
                           <td><?php echo $topSerProvs->fName; ?> <?php echo $topSerProvs->lName; ?></td>
                           <td class="align-right"><?php echo $topSerProvs->totIncome; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <div class="table-container">
            <div class="table-head">
               <p>Top 5 Services</p>
            </div>
            <div class="table-cont">
               <table class="top-5-table">
                  <thead>
                     <tr>
                        <th class="column-left-align">Services</th>
                        <th class="column-right-align ">Income</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data['top5Services'] as $topServices) : ?>
                        <tr>
                           <td><?php echo $topServices->name; ?></td>
                           <td class="align-right"><?php echo $topServices->totIncome; ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>

      <!--sub-container2-->
      <div class="mang-sub-container2 mang">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Reservation Overview</p>
            </div>
            <canvas id="myChart1" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Customer Population</p>
            </div>
            <canvas id="myChart2" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->

      <div class="main-head">
         <p>Annual progress</p>
         <hr class="head-hr">
      </div>

      <!--sub-container2-->
      <div class="mang-sub-container2 mang">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Total Income</p>
            </div>
            <canvas id="myChart3" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Total Reservations</p>
            </div>
            <canvas id="myChart4" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->




   </div>
   <!--End Content-->

   <?php require APPROOT . "/views/inc/footer.php" ?>