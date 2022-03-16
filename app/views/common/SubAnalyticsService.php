<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">

   <!-- TODO: provide relevent sideNav by checking logged in user -->
   <?php
   $selectedMain = "Analytics";
   $selectedSub = "ServiceAnalytics";
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
   $title = "Service Analytics";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <div class="page-top-main-container-sanalytics">
         <a href="<?php echo URLROOT ?>/services/serviceReport" class="btn btn-filled btn-theme-purple btn-main">Generate Service Report</a>
      </div>
      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="serviceName">Service</label>
                        <select class="serviceSelectDropDown">
                           <option value=0 selected>All services</option>
                           <?php foreach ($data as $services) : ?>

                              <option value="<?php echo $services->serviceID; ?>">
                                 <?php if ($services->status == 0) : ?>
                                    <?php echo $services->serviceID; ?> - <?php echo $services->name;  ?> (REMOVED)
                                 <?php else : ?>
                                    <?php echo $services->serviceID; ?> - <?php echo $services->name; ?>
                                 <?php endif; ?>
                              </option>

                           <?php endforeach; ?>
                        </select>
                     </div>
                     <span class="error serviceSelectError"> <?php echo " "; ?></span>
                  </div>
                  <div class="column analytics-report-month-selector">
                     <div class="text-group">
                        <label class="label" for="serviceFromDate">From</label>
                        <input type="month" name="serviceFromDate" id="serviceFromDate" class="serviceFromDate analytics-month-selector">
                     </div>
                     <span class="error serviceFromError"></span>
                  </div>

                  <div class="column analytics-report-month-selector">
                     <div class="text-group">
                        <label class="label" for="serviceToDate">To</label>
                        <input type="month" name="serviceToDate" id="serviceToDate" class="serviceToDate analytics-month-selector">
                     </div>
                     <span class="error serviceToError"></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <a href="#" class="btn btn-filled btn-black serviceSearchBtn">Search</a>
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
               <p id="totResCount"></p>
            </div>
         </div>
         <!--End of card1-->

         <!--card2-->
         <div class="mang-sub-container-card">
            <div class="mang-sub-container-card-title">
               <p>Total Income</p>
            </div>
            <div class="mang-sub-container-card-amount">
               <p id="totIncome"></p>
            </div>
         </div>
         <!--End of card2-->
      </div>
      <!--End of sub-container1-->

      <div class="mang-sub-container2 mang">
         <!--chart-container-->
         <div class="chart-container" id="chart-container">
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
            <table class="table2 table2-hover" id="serviceAnalyResTable">
               <!--Table head-->
               <thead>
                  <tr>
                     <th class="column-left-align">Reservation No</th>
                     <th class="column-left-align">Service Provider</th>
                     <th class="column-left-align">Customer</th>
                     <th class="column-left-align">Price</th>
                  </tr>
               </thead>
               <!--End of table head-->

               <!--Table body-->
               <tbody id="rows1">

               </tbody>
               <!--End of table body-->
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->

   <script>
      //mychart2
      // var ctx = document.getElementById('myChart5').getContext('2d');
      // var myChart = new Chart(ctx, {
      //    type: 'bar',
      //    data: {
      //    labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //    datasets: [{ 
      //          data: [70,90,44,60,83,90,100,30,80.35,45,39],
      //          label: "No of reservations",
      //          borderColor: "#00b4d8",
      //          backgroundColor: "#90e0ef",
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

      // //mychart1
      // var ctx = document.getElementById('myChart6').getContext('2d');
      // var myChart = new Chart(ctx, {
      //       type: 'line',
      //       data: {
      //       labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      //       datasets: [{ 
      //             lineTension: 0,
      //             data: [35000,21400,30600,30600,32700,21100,23300,35000,32000,23500,27500,22400],
      //             label: "Income",
      //             borderColor: "#87986a",
      //             backgroundColor: "#b5c99a",
      //          }
      //       ]
      //       },
      //    });

      // let today = new Date().toISOString().substr(0, 10);
      // let yesterday = new Date(new Date().getTime() - 12*24 * 60 * 60 * 1000).toISOString().substr(0, 10);
      // document.querySelector("#serviceToDate").value = today;
      // document.querySelector("#serviceFromDate").value = yesterday;
   </script>

   <?php require APPROOT . "/views/inc/footer.php" ?>