<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

		<header class="full-header">
			<div class="header-center verticalCenter">
				<h1 class="header-topic">Services Report</h1>
			</div>
			<div class="header-right verticalCenter">
				<a href="<?php echo URLROOT ?>/MangDashboard/analyticsService" class="top-right-closeBtn"><i
						class="fal fa-times fa-2x "></i></a>
			</div>
		</header>

		<div class="content serviceReport">
		<form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">		
				<div class="report-month-selector">
					<div class="row">
						<div class="column">
							<div class="text-group">
								<label class="label" for="">Month</label>
								<input type="month" name="" id="" placeholder="Date" value="2021-10">
							</div>
							<span class="error"> <?php echo " "; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="right-section">
               <a href="" class="btn btn-filled btn-black">Search</a>
               <!-- <button class="btn btn-search">Search</button> -->
            </div>
			</div>
		</form>
		<div class="table-container">
        <div class="table2 table2-responsive">
           <table class="table2-hover">
              <!--Table head-->
              <thead>
                 <tr>
                    <th class="">Service ID</th>
                    <th class="">Service Name</th>
					<th class="column-center-align">No of service providers</th>
                    <th class="column-center-align">No of reservations</th>
                    <th class="column-right-align ">Income</th>
                 </tr>
              </thead>
              <!--End of table head-->

              <!--Table body-->
              <tbody>

                <!--Table row-->
				<tr>
				<td data-lable="Service ID">S0001</td>
				<td data-lable="Service Name">Service 01</td>
				<td data-lable="No of service providers" class="column-center-align">3</td>
				<td data-lable="No of reservations" class="column-center-align">23</td>
				<td data-lable="Income" class="column-right-align">250.00 LKR</td>
				</tr>
				<!--End of table row-->
				<!--Table row-->
				<tr>
				<td data-lable="Service ID">S0001</td>
				<td data-lable="Service Name">Service 01</td>
				<td data-lable="No of service providers" class="column-center-align">3</td>
				<td data-lable="No of reservations" class="column-center-align">23</td>
				<td data-lable="Income" class="column-right-align">250.00 LKR</td>
				</tr>
				<!--End of table row-->
				<!--Table row-->
				<tr>
				<td data-lable="Service ID">S0001</td>
				<td data-lable="Service Name">Service 01</td>
				<td data-lable="No of service providers" class="column-center-align">3</td>
				<td data-lable="No of reservations" class="column-center-align">23</td>
				<td data-lable="Income" class="column-right-align">250.00 LKR</td>
				</tr>
				<!--End of table row-->
				<!--Table row-->
				<tr>
				<td data-lable="Service ID">S0001</td>
				<td data-lable="Service Name">Service 01</td>
				<td data-lable="No of service providers" class="column-center-align">3</td>
				<td data-lable="No of reservations" class="column-center-align">23</td>
				<td data-lable="Income" class="column-right-align">250.00 LKR</td>
				</tr>
				<!--End of table row-->
				<!--Table row-->
				<tr>
				<td data-lable="Service ID">S0001</td>
				<td data-lable="Service Name">Service 01</td>
				<td data-lable="No of service providers" class="column-center-align">3</td>
				<td data-lable="No of reservations" class="column-center-align">23</td>
				<td data-lable="Income" class="column-right-align">250.00 LKR</td>
				</tr>
				<!--End of table row-->

				
			   <!--Table row-->
			   <tr>
                  <td class="text-special">Total</td>
                  <td ></td>
                  <td ></td>
				  <td class="column-center-align text-special">250</td>
                  <td  class="column-right-align text-special">250.00 LKR</td>
               </tr>
               <!--End of table row-->

               
              </tbody>
              <!--End of table body-->

           </table>
        </div>
      </div>
		</div>

   <?php require APPROOT . "/views/inc/footer.php" ?>
