<!--Content-->
<div class="content">

<div class="page-top-main-container-spanalytics">
   <a href="<?php echo URLROOT ?>/services/serviceProviderReport" class="btn btn-filled btn-theme-purple btn-main">Generate Service Provider Report</a>
</div>

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



//mychart2
var ctx = document.getElementById('myChart7').getContext('2d');
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
//mychart1
var ctx = document.getElementById('myChart8').getContext('2d');
var myChart = new Chart(ctx, {
      type: 'line',
      data: {
      labels: ["January", "February", "March", "April", "May", "June", "August", "September", "October", "November", "December"],
      datasets: [{ 
            lineTension: 0,
            data: [21200,19400,25000,30600,32000,15100,16300,23000,30000,23500,17500,12400],
            label: "No of reservations",
            borderColor: "#b07d62",
            backgroundColor: "#d69f7e",
         }
      ]
      },
   });

   let today = new Date().toISOString().substr(0, 10);
   document.querySelector("#serviceProviderToDate").value = today;

</script>