<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Overview";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Overview";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
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
               <p>400000.00 LKR</p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>Upcomming Reservations</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>20</p>
            </div>
         </div>
         <!--End of card2-->

         <!--card3-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>Available Service Providers</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>21</p>
            </div>
         </div>
         <!--End of card3-->

         <!--card4-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>Pending Leave Requests</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>15</p>
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
               <p>260</p>
            </div>
         </div>
         <!--End of card5-->

         <!--card6-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>No of Service Providers</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>50</p>
            </div>
         </div>
         <!--End of card6-->

         <!--card7-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>No of Managers</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>5</p>
            </div>
         </div>
         <!--End of card7-->

         <!--card8-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title"> 
               <p>Total Services</p>
            </div>
            <div class="mang-sub-container-card-amount"> 
               <p>25</p>
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
               <p>Total Yearly Income</p>
            </div>
            <canvas id="myChart1" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Total Yearly Reservations</p>
            </div>
            <canvas id="myChart2" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->
   </div>
   <!--End Content-->

   <script>
      var ctx = document.getElementById('myChart1').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
            datasets: [{ 
                data: [35000,11400,50600,30600,40700,11100,13300,45000,42000.23500,17500,12400],
                label: "Total Income",
                borderColor: "rgb(62,149,205)",
                backgroundColor: "rgb(62,149,205,0.1)",
              }
            ]
          },
        });

         var ctx = document.getElementById('myChart2').getContext('2d');
         var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
            datasets: [{ 
                data: [70,90,44,60,83,90,100,30,80.35,45,39],
                label: "No of Reservations",
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
    </script>
   <?php require APPROOT . "/views/inc/footer.php" ?>