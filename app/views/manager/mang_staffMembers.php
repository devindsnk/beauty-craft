<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "StaffMembers";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Staff Members";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">
               <!--Table head-->
              <thead>
                 <tr>
                    <th class="">Reservation No</th>
                    <th class="">Service Provider</th>
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
                    <td data-lable="Service Provider">Sanjana Rajapaksha</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service Provider">Sethni Nimesha</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->
               
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service Provider">Ravindu Madhubashana</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service Provider">Devin Dissanayake</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service Provider">Ruwanthi Munasinghe</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service Provider">Sumudu Perera</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->
                 
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service Provider">Sanjana Rajapaksha</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service Provider">Sethni Nimesha</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->
               
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service Provider">Ravindu Madhubashana</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->
                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0001</td>
                    <td data-lable="Service Provider">Devin Dissanayake</td>
                    <td data-lable="Customer">Ruwanthi Munasinghe</td>
                    <td data-lable="Price" class="column-right-align">250.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0002</td>
                    <td data-lable="Service Provider">Ruwanthi Munasinghe</td>
                    <td data-lable="Customer">Kamal Perera</td>
                    <td data-lable="Price" class="column-right-align">350.00 LKR</td>
                 </tr>
                 <!--End of table row-->

                 <!--Table row-->
                 <tr>
                    <td data-lable="Reservation No">Res0003</td>
                    <td data-lable="Service Provider">Sumudu Perera</td>
                    <td data-lable="Customer">Sarith Karunarathne</td>
                    <td data-lable="Price" class="column-right-align">150.00 LKR</td>
                 </tr>
                 <!--End of table row-->
                 
              </tbody>
              <!--End of table body-->
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>