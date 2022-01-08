<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

	<header class="full-header">
		<div class="header-center verticalCenter">
			<h1 class="header-topic">Service Providers Report</h1>
		</div>
		<div class="header-right verticalCenter">
			<span class="top-right-closeBtn" onclick="history.back()">
				<i class=" fal fa-times fa-2x "></i>
			</span>
		</div>
	</header>

	<div class="content serviceProvReport">
		<form class="form filter-options" action="">
			<div class="options-container">
				<div class="left-section">
					<div class="report-month-selector">
						<div class="row">
							<div class="column">
								<div class="text-group">
									<label class="label" for="">Month</label>
									<input type="month" name="" class="serviceProvSelectedMonth" id="" placeholder="Date" value="<?= date('Y-m') ?>">
								</div>
								<span class="error"> <?php echo " "; ?></span>
							</div>
						</div>
					</div>
				</div>
				<!-- <div class="right-section">
					<a href="" class="btn btn-filled btn-black">Search</a>
				</div> -->
			</div>
		</form>
		<div class="table-container">
			<div class="table2 table2-responsive">
				<table class="table2-hover" id="serviceProvTable">
					<!--Table head-->
					<thead>
						<tr>
							<th class="column-left-align">Service Provider ID</th>
							<th class="column-left-align">Service Provider Name</th>
							<th class="column-center-align">No of services</th>
							<th class="column-center-align">No of reservations</th>
							<th class="column-right-align ">Income</th>
						</tr>
					</thead>
					<!--End of table head-->

					<!--Table body-->
					<tbody>
						<?php for ($i = 0; $i < $data; $i++) : ?>
							<!--Table row-->
							<tr>
								<td data-lable="Service ID"></td>
								<td data-lable="Service Name"></td>
								<td data-lable="No of services" class="column-center-align"></td>
								<td data-lable="No of reservations" class="column-center-align"></td>
								<td data-lable="Income" class="column-right-align"></td>
							</tr>
							<!--End of table row-->
						<?php endfor; ?>

						<!--Table row-->
						<tr>
							<td class="text-special">Total</td>
							<td></td>
							<td></td>
							<td class="column-center-align text-special"></td>
							<td class="column-right-align text-special"></td>
						</tr>
						<!--End of table row-->


					</tbody>
					<!--End of table body-->

				</table>
			</div>
		</div>
	</div>

	<?php require APPROOT . "/views/inc/footer.php" ?>