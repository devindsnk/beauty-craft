<?php require "../header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "OverallAnalytics";
   require "./mang_sideNav.php"
   ?>

   <?php
   $title = "Overall Analytics";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require "../headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <!--sub-container1-->
      <div class="sub-container1">
         <!--card1-->
         <div class="sub-container-card">
            <div class="sub-container-card-title"> 
               <p>Total Reservations</p>
            </div>
            <div class="sub-container-card-amount"> 
               <p>450</p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="sub-container-card">
            <div class="sub-container-card-title"> 
               <p>Total Income</p>
            </div>
            <div class="sub-container-card-amount"> 
               <p>400,000.00 LKR</p>
            </div>
         </div>
         <!--End of card2-->

         <!--card3-->
         <div class="sub-container-card">
            <div class="sub-container-card-title"> 
               <p>Total Services</p>
            </div>
            <div class="sub-container-card-amount"> 
               <p>25</p>
            </div>
         </div>
         <!--End of card3-->

         <!--card4-->
         <div class="sub-container-card">
            <div class="sub-container-card-title"> 
               <p>No of Service Providers</p>
            </div>
            <div class="sub-container-card-amount"> 
               <p>30</p>
            </div>
         </div>
         <!--End of card4-->
      </div>
      <!--End of sub-container1-->

      <!--sub-container2-->
      <div class="sub-container2">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Total Reservations</p>
            </div>
            <canvas id="myChart1" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Total Income</p>
            </div>
            <canvas id="myChart2" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->

      <!--sub-container2-->
      <div class="sub-container2">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Reservation Overview</p>
            </div>
            <canvas id="myChart3" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Customer Population</p>
            </div>
            <canvas id="myChart4" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->

      <div class="sub-container3">
         <div class="table-container">
            <div class="table-head"> 
               <p>Top 5 Employees</p>
            </div>
            <div class="table-cont">
               <table class="top-5-table">
                  <thead>
                     <tr>
                        <th>Employee</th>
                        <th class="align-right">Income</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
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
                     </tr>
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
                        <th>Services</th>
                        <th class="align-right">Income</th>
                     </tr>
                  </thead>
                  <tbody>
                     <tr>
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
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
   <!--End Content-->

   <script>
      //mychart1
      var ctx = document.getElementById('myChart1').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
            datasets: [{ 
                data: [35000,11400,50600,30600,40700,11100,13300,45000,42000.23500,17500,12400],
                label: "No of reservations",
                borderColor: "rgb(62,149,205)",
                backgroundColor: "rgb(62,149,205,0.1)",
              }
            ]
          },
        });
         //mychart2
         var ctx = document.getElementById('myChart2').getContext('2d');
         var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
            datasets: [{ 
                data: [70,90,44,60,83,90,100,30,80.35,45,39],
                label: "Income",
                borderColor: "#3cba9f",
                backgroundColor: "#71d1bd",
                borderWidth:2
              }
            ]
          },
          options: {
            scales: {
               xAxes: [{ 
                stacked: true    
               }],
               yAxes: [{
                stacked:true
               }],
             }
           },
        });

        //mychart3
        var ctx = document.getElementById('myChart3').getContext('2d');
         var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
            labels: ["On-call", "Online", "Walk-in"],
            datasets: [{ 
                data: [200,490,100],
                label: "No of Reservations",
                borderColor:[ "#3cba9f",
                              "#ffa500",
                              "#c45850",
               ],
                backgroundColor:[
                  "rgb(60,186,159,0.1)",
                  "rgb(255,165,0,0.1)",
                  "rgb(196,88,80,0.1)",
                ],
                borderWidth:2
              }
            ]
          },
          options: {
            scales: {
               xAxes: [{ 
                stacked: true    
               }],
               yAxes: [{
                stacked:true
               }],
             }
           },
        });

        //mychart4
         var ctx = document.getElementById('myChart4').getContext('2d');
         var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
            datasets: [{ 
                data: [119,120,150,160,154,170,171,169,175,175,172,170],
                label: "No of customers",
                borderColor: "rgb(196,88,80)",
                backgroundColor: "rgb(196,88,80,0.1)",
              }
            ]
          },
        });
    </script>
   