<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceProviderAnalytics";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Service Provider Analytics";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <div class="mang-sub-container1-head mang">
         <form action="" class="form">
         <!-- <div class="select-box-container">
            <form action="">
               <label class="label" for="serviceName">Employee</label>
               <select name="services" id="services">
                     <option value="" disabled selected>--Select--</option>
                     <option value="volvo">Employee 01</option>
                     <option value="saab">Employee 02</option>
                     <option value="mercedes">Employee 03</option>
                     <option value="audi">Employee 04</option>
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
            <button class="searching-btn align-right">Search</button>
         </div> -->

         <div class="row">
               <div class="column">
                  <div class="dropdown-group">
                     <label class="labels" for="serviceProviderName">Service Provider</label>
                     <select name="serviceProvider" id="serviceProvider">
                        <option value="" disabled selected>--Select--</option>
                        <option value="ServiceProvider 01">Service Provider 01</option>
                        <option value="ServiceProvider 02">Service Provider 02</option>
                        <option value="ServiceProvider 03">Service Provider 03</option>
                        <option value="ServiceProvider 04">Service Provider 04</option>
                     </select>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceProviderFromDate">From</label>
                     <input type="date" name="" id="serviceProviderFromDate" placeholder="--select--">
                  </div>
                  <span class="error"></span>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="labels" for="serviceProviderToDate">To</label>
                     <input type="date" name="" id="serviceProviderToDate" placeholder="--select--">
                  </div>
                  <span class="error"></span>
               </div>
               <div class="column">
                  <div class="select-box-container">
                     <button class="searching-btn align-right">Search</button>
                  </div>
               </div>
            </div>
         </form>
      </div>

         <!--sub-container1-->
         <div class="mang-sub-container1 mang">
            <!--card1-->
            <div class="mang-sub-container-card">
               <div class="mang-sub-container-card-title"> 
                  <p>Total Reservation</p>
               </div>
               <div class="mang-sub-container-card-amount"> 
                  <p>400</p>
               </div>
            </div>
            <!--End of card1-->

            <!--card2-->
            <div class="mang-sub-container-card">
               <div class="mang-sub-container-card-title"> 
                  <p>Total Income</p>
               </div>
               <div class="mang-sub-container-card-amount"> 
                  <p>45,000.00 LKR</p>
               </div>
            </div>
            <!--End of card2-->
         </div>
         <!--End of sub-container1-->

         <!--sub-container2-->
         <div class="mang-sub-container2 mang">
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

   <?php require APPROOT . "/views/inc/footer.php" ?>