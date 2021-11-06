<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">
	<!-- New service container -->
	<header class="full-header">
		<div class="header-center verticalCenter">
			<h1 class="header-topic">Update Service</h1>
		</div>
		<div class="header-right verticalCenter">
			<a href="
				<?php
				echo URLROOT;
				if ($userTypeNo == 2) echo "/OwnDashboard/services";
				elseif ($userTypeNo == 3) echo "/MangDashboard/services";
				?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
		</div>
	</header>

	<div class="content contentNewRes">
		<div class="newService-main newservice" id="newServiceMain">

			<form class="form" action="">

				<!-- Basic information -->
				<div class="newService-sub-head">
					<h3>Basic Info</h3>
				</div>

				<div class="newService-sub">
					<!-- <form class="form" action=""> -->

					<!-- service name -->
					<div class="row">
						<div class="column">
							<div class="text-group">
								<label class="labels" for="serviceName"> Service Name</label>
								<input type="text" name="" id="serviceName" placeholder="--Service name here--">
							</div>
							<span class="error"> <?php echo " "; ?></span>
						</div>
						<div class="column">
							<div class="text-group">
								<label class="labels" for="serviceCusCategory">Customer Category</label>
								<select class="dropdownSelectBox" name="serviceCusCategory">
									<option class="unbold" value="val1" option selected="true" disabled="disabled">Select One</option>
									<option value="Gent">Gents</option>
									<option value="Ladies">Ladies</option>
									<option value="Both">Both</option>
								</select>
							</div>
							<span class="error"></span>
						</div>
					</div>
					<!-- end of service name -->

					<!-- service type -->
					<div class="row">

						<div class="column">
							<!-- New service type -->
							<label class="labels" for="serviceType">Service Type</label>
							<select class="dropdownSelectBox">
								<option class="unbold" value="val1" option selected="true" disabled="disabled">Select One</option>
								<option value="val1">Long Hair</option>
								<option value="val2">Short Hair</option>
							</select>
							<!-- end of service type -->

							<!-- Service type button -->
							<div class="row1">
								<label class="labels2" for="servicePrice">OR</label>
								<input type="text" name="sNewType" id="sNewType" placeholder="--Type In--" value="<?php  ?>">

								<span class="error paddingLeft"><?php ?></span>

							</div>
							<!-- End of service type button -->

							<!-- Service price -->
							<div class="row3">
								<label class="labels" for="servicePrice">Price</label>
								<input type="text" name="" placeholder="--Rs.0.00--">
								<span class="error paddingLeft"> <?php echo " error message"; ?></span>
							</div>
							<!-- End of ervice price -->
						</div>

						<!-- Employees -->
						<div class="column">
							<label class="labels" for="serviceEmp">Employee</label>
							<div class="checkbox-div">
								<div class="divIndiv"><input type="checkbox" name="">
									<lable class="lableInDiv">Emp111, Sanjana</lable>
								</div>
								<hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name="">
									<lable class="lableInDiv">Emp111, Sanjana</lable>
								</div>
								<hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name="">
									<lable class="lableInDiv">Emp111, Sanjana</lable>
								</div>
								<hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name="">
									<lable class="lableInDiv">Emp111, Sanjana</lable>
								</div>
								<hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name="">
									<lable class="lableInDiv">Emp111, Sanjana</lable>
								</div>
								<hr class="resHr">
							</div>
						</div>
						<!-- End of employees -->
					</div>


					<!-- New service type model -->
					<div class="modal-container normal">
						<div class="modal-box">
							<div class="new-type-head">
								<h1>New Type</h1>
							</div>
							<label class="labels paddingBottom" for="serviceNewType">Service Type</label>
							<input type="text" name="" placeholder="--Type Here--">
							<div class="new-type-head">
								<button class="btn btnClose normal close-type-btn">Close</button>
								<button class="btn btnClose normal add-type-btn">Add</button>
							</div>
						</div>
					</div>
					<!-- End of New service type model -->

					<!-- </form> -->
				</div>
				<!-- end of Basic information -->

				<!-- Duration and Resources -->
				<div class="newService-sub-head">
					<h3>Duration and Resources</h3>
				</div>
				<div class="timeDurations" id="addDiv">
					<div class="newService-sub">
						<!-- <form class="form" action=""> -->
						<h4 class="paddingBottom">Slot 1</h4>
						<!-- slot 1-->
						<div class="row " id="slotdetails1">
							<!-- duration -->
							<div class="column">
								<label class="labels paddingBottom">Duration</label><br>
								<select class="dropdownSelectBox">
									<option value="val1">1 min</option>
									<option value="val2">2 min</option>
									<option value="val1">3 min</option>
								</select>
							</div>
							<!-- end of duration -->

							<!-- quantity -->
							<div class="column" id="resorceDetails1">
								<label class="labels paddingBottom">Resources & Quantity</label><br>
								<div class="checkbox-div">
									<div class="divIndiv"><label class="lableInDiv" id="checkedItem">Res001, Resource 01</label>
										<select class="dropdownSelectBox-small quantity-align" id="selectcount">
											<option value="val1">0</option>
											<option value="val1">1</option>
											<option value="val2">2</option>
											<option value="val1">3</option>
											<option value="val2">4</option>
											<option value="val1">5</option>
											<option value="val2">6</option>
										</select>
									</div>
									<hr class="resHr">

									<div class="divIndiv"><label class="lableInDiv">Res001, Resource 01</label>
										<select class="dropdownSelectBox-small quantity-align">
											<option value="val1">0</option>
											<option value="val1">1</option>
											<option value="val2">2</option>
											<option value="val1">3</option>
											<option value="val2">4</option>
											<option value="val1">5</option>
											<option value="val2">6</option>
										</select><br>
									</div>
									<hr class="resHr">

									<div class="divIndiv"><label class="lableInDiv">Res002, Resource 02</label>
										<select class="dropdownSelectBox-small quantity-align">
											<option value="val1">0</option>
											<option value="val1">1</option>
											<option value="val2">2</option>
											<option value="val1">3</option>
											<option value="val2">4</option>
											<option value="val1">5</option>
											<option value="val2">6</option>
										</select><br>
									</div>
									<hr class="resHr">
								</div>
								<span class="error paddingLeft"> <?php echo " error message"; ?></span>
							</div>
							<!-- end of quantity -->
						</div>
						<!-- slot 1-->
					</div>
				</div>

				<!-- add another slot -->
				<div class="anotheSlot">
					<p id="add"><a href="#addDiv">+ Add another slot</a></p>
				</div>

				<div class="newService-sub-head">
					<h3>Editing Options</h3>
				</div>
				<div class="newService-sub">
					<div class="hold-service-div">
						<input type="checkbox" class="toglecheckbox">
						<label class="lableInDiv2">Hold the Service</label> <br>
					</div>
				</div>

				<!-- submit service button -->
				<div class="button-Add-Div">
					<button class="buttonAdd btn btn-filled btn-blue">Save</button>
				</div>
		</div>
	</div>

	<?php require APPROOT . "/views/inc/footer.php" ?>