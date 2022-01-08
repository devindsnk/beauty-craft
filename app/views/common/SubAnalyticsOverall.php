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
         <p>Last month prograss</p>
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
                     <!-- <tr>
                        <td>Sanjana Rajapaksha</td>
                        <td class="align-right">50,000.00 LKR</td>
                     </tr>
                     <tr>
                        <td>Ruwanthi Munasinghe</td>
                        <td class="align-right">75,000.00 LKR</td>
                     </tr>
                     <tr>
                        <td>Devin Dissanayake</td>
                        <td class="align-right">45,000.00 KR</td>
                     </tr>
                     <tr>
                        <td>Ravindu Madhubhashana</td>
                        <td class="align-right">78,000.00 KR</td>
                     </tr> -->
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
                     <!-- <tr>
                        <td>Service 01</td>
                        <td class="align-right">150,000.00 LKR</td>
                     </tr>
                     <tr>
                        <td>Service 02</td>
                        <td class="align-right">75,000.00 LKR</td>
                     </tr>
                     <tr>
                        <td>Service 03</td>
                        <td class="align-right">145,000.00 KR</td>
                     </tr>
                     <tr>
                        <td>Service 04</td>
                        <td class="align-right">78,000.00 KR</td>
                     </tr> -->
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
         <p>Annual prograss</p>
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

   <script>
      //mychart3
      // var ctx = document.getElementById('myChart1').getContext('2d');
      // var myChart = new Chart(ctx, {
      //    type: 'doughnut',
      //    data: {
      //    labels: ["Online", "Walk-in"],
      //    datasets: [{ 
      //          data: [490,100],
      //          label: "No of Reservations",
      //          borderColor:[ 
      //                      "#9163cb",
      //                      "#6247aa",
      //       ],
      //          backgroundColor:[

      //          "#b185db",
      //          "#815ac0 ",
      //          ],
      //          borderWidth:2
      //       }
      //    ]
      //    },
      //    options: {
      //    scales: {
      //       xAxes: [{ 
      //          stacked: true    
      //       }],
      //       yAxes: [{
      //          stacked:true
      //       }],
      //       }
      //    },
      // });

      //mychart4
      // var ctx = document.getElementById('myChart2').getContext('2d');
      // var myChart = new Chart(ctx, {
      //    type: 'line',
      //    data: {
      //    labels: ["week 01", "week 02", "week 03", "week 04"],
      //    datasets: [{ 
      //       lineTension: 0,
      //       data: [119,120,150,160],
      //       label: "No of customers",
      //       borderColor: "rgb(196,88,80)",
      //       backgroundColor: "rgb(196,88,80,0.1)",
      //       }
      //    ]
      //    },
      //    options: {
      //    bezierCurve : false,
      //    },
      // });

      //mychart1
      // var ctx = document.getElementById('myChart3').getContext('2d');
      // var myChart = new Chart(ctx, {
      //       type: 'bar',
      //       data: {
      //       labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //       datasets: [{ 
      //             data: [35000,11400,50600,30600,40700,11100,13300,45000,42000.23500,17500,12400],
      //             label: "Income",
      //             borderColor: "#e5989b",
      //             backgroundColor: "#ffd166",
      //          }
      //       ]
      //       },
      //    });
      //mychart2
      // var ctx = document.getElementById('myChart4').getContext('2d');
      // var myChart = new Chart(ctx, {
      //    type: 'bar',
      //    data: {
      //    labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //    datasets: [{ 
      //          data: [70,90,44,60,83,90,100,30,80.35,45,39],
      //          label: "No of reservations",
      //          borderColor: "#b392ac",
      //          backgroundColor: "#8d99ae",
      //          borderWidth:2
      //       }
      //    ]
      //    },
      //    options: {
      //    scales: {
      //       xAxes: [{ 
      //          stacked: true    
      //       }],
      //       yAxes: [{
      //          stacked:true
      //       }],
      //       }
      //    },
      // });
   </script>

   <?php require APPROOT . "/views/inc/footer.php" ?>