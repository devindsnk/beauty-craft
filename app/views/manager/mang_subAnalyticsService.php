<?php require "../header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceAnalytics";
   require "./mang_sideNav.php"
   ?>

   <?php
   $title = "Service Analytics";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require "../headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <div class="sub-container1">
         <div class="select-box-container">
            <form action="">
               <label class="label" for="serviceName">Service</label>
               <select name="services" id="services">
                     <option value="" disabled selected>--Select--</option>
                     <option value="volvo">Service 01</option>
                     <option value="saab">Service 02</option>
                     <option value="mercedes">Service 03</option>
                     <option value="audi">Service 04</option>
                  </select>
            </form>
         </div>

         <div class="select-box-container">
            <form action="">
               <label class="label" for="serviceFromDate">From</label>
               <input type="date" name="" id="serviceFromDate" placeholder="--select--">
            </form>
         </div>

         <div class="select-box-container">
            <form action="">
               <label class="label" for="serviceFromDate">To</label>
               <input type="date" name="" id="serviceFromDate" placeholder="--select--">
            </form>
         </div>

         <div class="select-box-container">
            <button class="search-btn align-right">Search</button>
         </div>
      </div>

      <div class="sub-container2">
         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Reservations</p>
            </div>
            <canvas id="myChart5" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head"> 
               <p>Income</p>
            </div>
            <canvas id="myChart6" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->
      </div>
      <!--End of sub-container2-->

      <div class="sub-container2">
         
      </div>
   </div>
   <!--End Content-->

   <script>
      

      //mychart1
      var ctx = document.getElementById('myChart5').getContext('2d');
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
         var ctx = document.getElementById('myChart6').getContext('2d');
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

         let today = new Date().toISOString().substr(0, 10);
         document.querySelector("#serviceFromDate").value = today;

         document.querySelector("#serviceToDate").valueAsDate = new Date();
   </script>
   