<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">

   <!-- TODO: provide relevent sideNav by checking logged in user -->
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceProviderAnalytics";
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
   $title = "Service Provider Analytics";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">

      <div class="page-top-main-container-spanalytics">
         <a href="<?php echo URLROOT ?>/services/serviceProviderReport" class="btn btn-filled btn-theme-purple btn-main">Generate Service Provider Report</a>
      </div>

      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="serviceName">Serice Provider</label>
                        <select class="serviceProvSelectDropDown">

                           <option value=0 selected>All Service Providers</option>
                           <?php foreach ($data as $serviceProvs) : ?>

                              <option value="<?php echo $serviceProvs->staffID; ?>">
                                 <?php echo $serviceProvs->staffID; ?> - <?php echo $serviceProvs->fName; ?> <?php echo $serviceProvs->lName; ?>
                              </option>

                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error serviceProvSelectError"> <?php echo " "; ?></span>
                  </div>
                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="serviceProviderFromDate">From</label>
                        <input type="month" name="serviceProviderFromDate" id="serviceProviderFromDate" class="serviceProviderFromDate">
                     </div>
                     <span class="error serviceProvFromError"></span>
                  </div>

                  <div class="column">
                     <div class="text-group">
                        <label class="label" for="serviceProviderToDate">To</label>
                        <input type="month" name="serviceProviderToDate" id="serviceProviderToDate" class="serviceProviderToDate">
                     </div>
                     <span class="error serviceProvToError"></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a href="#" class="btn btn-filled btn-black serviceProvSearchBtn">Search</a>
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
               <p id="totResCount2"></p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Income</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p id="totIncome2"></p>
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
            <canvas id="myChart7" width="290" height="200"></canvas>
         </div>
         <!--End od chart-container-->

         <!--chart-container-->
         <div class="chart-container">
            <div class="chart-head">
               <p>Income</p>
            </div>
            <canvas id="myChart8" width="290" height="200"></canvas>
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
                     <th class="column-left-align">Reservation No</th>
                     <th class="column-left-align">Service</th>
                     <th class="column-left-align">Customer</th>
                     <th class="column-left-align">Price</th>
                  </tr>
               </thead>
               <!--End of table head-->

               <!--Table body-->
               <tbody id="rows2">

               </tbody>
               <!--End of table body-->
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->

   <script>
      //mychart2
      // var ctx = document.getElementById('myChart7').getContext('2d');
      // var myChart = new Chart(ctx, {
      //    type: 'bar',
      //    data: {
      //    labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //    datasets: [{ 
      //          data: [70,90,44,60,83,90,100,30,80.35,45,39],
      //          label: "No of reservations",
      //          borderColor: "#f08080",
      //          backgroundColor: "#f8ad9d",
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
      //mychart1
      // var ctx = document.getElementById('myChart8').getContext('2d');
      // var myChart = new Chart(ctx, {
      //       type: 'line',
      //       data: {
      //       labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //       datasets: [{ 
      //             lineTension: 0,
      //             data: [21200,19400,25000,30600,32000,15100,16300,23000,30000,23500,17500,12400],
      //             label: "Income",
      //             borderColor: "#b07d62",
      //             backgroundColor: "#d69f7e",
      //          }
      //       ]
      //       },
      //    });

      // let today = new Date().toISOString().substr(0, 10);
      // let yesterday = new Date(new Date().getTime() - 24 * 60 * 60 * 1000).toISOString().substr(0, 10);
      // document.querySelector("#serviceProviderToDate").value = today;
      // document.querySelector("#serviceProviderFromDate").value = yesterday;
   </script>

   <?php require APPROOT . "/views/inc/footer.php" ?>