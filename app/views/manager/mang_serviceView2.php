<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
	<div class="btn-remove-service quantity-align mang">
		<a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()"><i class='fas fa-times fa-2x'></i></span></a><br/>
	</div>
	<div class="newService-main newservice" id="newServiceMain">

		<form class="form" action="">

			<div class="newService-main-head">
				<h1>Service 01</h1>
			</div>
			
			<!-- Basic information -->
			<div class="newService-sub-head">
				<h3>Basic Info</h3>
			</div>

			<div class="newService-sub">
				<!-- service name -->
				<div class="row">
					<div class="column">
						<div class="text-group">
							<div class="labels"><label class="labels" for="serviceName"> Service Name</label></div>
							<input type="text" name="" id="serviceName" placeholder="Service 01" disabled>
						</div>
					</div>
				</div>
				<!-- end of service name -->

				<!-- service type -->
				<div class="row">
					<div class="column">
						<!-- New service type -->
						<div class="labels"><label class="labels" for="serviceType">Service Type</label></div>
						<input type="text" name="" id="serviceType" placeholder="Service Type 01" disabled>
						<!-- end of service type -->

						
						<!-- Service price -->
						<div class="row3">
							<div class="labels"><label class="labels" for="servicePrice">Price</label></div>
							<input type="text" name="" id="servicePrice" placeholder="Rs.500.00" disabled>
						</div>
						<!-- End of ervice price -->
					</div>

					<!-- Employees -->
					<div class="column">
						<div class="labels"><label class="labels" for="serviceEmp">Employee</label></div>
						<div class="checkbox-div">
							<div class="divIndiv"><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
							<div class="divIndiv"><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
							<div class="divIndiv"><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
							<div class="divIndiv"><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
							<div class="divIndiv"><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
						</div>
					</div>
					<!-- End of employees -->
				</div>
			</div>
			<!-- end of Basic information -->

			<!-- Duration and Resources -->
			<div class="newService-sub-head">
				<h3>Duration and Resources</h3>
			</div>
			<div class="timeDurations" id="addDiv">
				<div class="newService-sub" >
					<h4 class="paddingBottom">Slot 1</h4>
					<!-- slot 1-->
					<div class="row " id="slotdetails1">
						
						<!-- duration -->
						<div class="column">
							<div class="labels"><label class="labels paddingBottom">Duration</label></div>
							<input type="text" name="" id="" placeholder="30 min" disabled>
						</div>
						<!-- end of duration -->

						<!-- quantity -->
						<div class="column" id="resorceDetails1">
							<div class="labels"><label class="labels paddingBottom">Resources & Quantity</label></div>
							<div class="checkbox-div">
								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">
							</div>
						<!-- end of quantity -->
						</div>
						<!-- slot 1-->	
					</div>
				</div>
				<div class="newService-sub" id="">
					
					<h4 class="paddingBottom">Slot 2</h4>
					<div class="row">
						<div class="column">
							<div class="row2" id="">
								<div class="labels"><label class="labels">Interval Duration</label></div>
								<input type="text" name="" id="" placeholder="10 min" disabled>
							</div>
							<div class="row3" id="">
								<div class="labels"><label class="labels">Slot Duration</label></div>
								<input type="text" name="" id="" placeholder="30 min" disabled>
							</div>
						</div>
						<div class="column" id="resorceDetails'+i+'">
							<div class="labels"><label>Resources and Quantity</label></div>
							<div class="checkbox-div">
							<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">

								<div class="divIndiv">
									<p class="resource-align">Resource 01
										<lable class="quantity-align">20</lable>
									</p>
								</div>
								<hr class="resHr">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
   <?php require APPROOT . "/views/inc/footer.php" ?>
