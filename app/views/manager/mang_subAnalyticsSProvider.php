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
      <form class="form filter-options" action="">
         <div class="options-container mang">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="serviceName">Serice Provider</label>
                        <select>
                           <option value="" selected>Select</option>
                           <option value="Service Provider 01">Service Provider 01</option>
                           <option value="Service Provider 02">Service Provider 02</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="serviceProviderFromDate">From</label>
                        <input type="date" name="" id="serviceProviderFromDate" placeholder="--select--">
                     </div>
                     <span class="error"></span>
                  </div>

                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="serviceProviderToDate">To</label>
                        <input type="date" name="" id="serviceProviderToDate" placeholder="--select--">
                     </div>
                     <span class="error"></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a href="" class="btn btn-filled btn-black">Search</a>
               <!-- <button class="btn btn-search">Search</button> -->
            </div>
         </div>
      </form>

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
      <div class="mang-sub-container1 mang">
         <div class="table-head "> 
            <p>Reservation Details</p>
         </div>
      </div>
      <div class="table-container mang">
        <div class="table2 table2-responsive">
           <table class="table2 table2-hover">
              <!--Table head-->
              <thead>
                 <tr>
                    <th class="">Reservation No</th>
                    <th class="">Service</th>
                    <th class="">Customer</th>
                    <th class="column-right-align">Price</th>
                 </tr>
              </thead>
              <!--End of table head-->

              <!--Table body-->
              <tbody>

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service">Service 01</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->
              </tbody>
              <!--End of table body-->
           </table>
        </div>
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
                borderColor: "#b07d62",
                backgroundColor: "#d69f7e",
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
                borderColor: "#f08080",
                backgroundColor: "#f8ad9d",
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
         document.querySelector("#serviceProviderToDate").value = today;

   </script>

   <?php require APPROOT . "/views/inc/footer.php" ?>