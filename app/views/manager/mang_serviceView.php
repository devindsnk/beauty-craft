<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
	<div class="btn-remove-service quantity-align mang">
	<a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()"><i class='fas fa-times fa-2x'></i></span></a><br/>
	</div>
	<div class="newService-main" >
		<div class="newService-main-head">
			<h1>Service 01</h1>
		</div>
		
		<div class="newService-sub-head">
			<h3>Basic Info</h3>
		</div>

		<div class="newService-sub">
			<div class="newService-sub-sub">
				<h4>Service Type</h4>
				<div class="view-Div">
					<p>Type 01</p>
				</div>

				<h4>Employees</h4>
				<div class="view-Div">
					<p>Employee 01</p>
					<!-- <hr class="resHr"> -->
					<p>Employee 02</p>
					<p>Employee 03</p>
				</div>

				<h4>Price</h4>
				<div class="view-Div">
					<p>Rs.500.00</p>
				</div>
			</div>
		</div>

		<div class="newService-sub-head">
			<h3>Duration and Resources</h3>
		</div>

		<div class="newService-sub">
			
			<div class="newService-sub-sub">
				<h3>Slot 1</h3>
				<div class="dropdown-Div">
					<h4>Duration</h4>
					<div class="view-Div">
						<p>13 min</p>
					</div>

					<h4>Resorces & Quantity</h4>
					<div class="view-Div">
						<p class="resource-align">Resource 01
							<lable class="quantity-align">20</lable>
						</p>
						<p class="resource-align">Resource 02
							<lable class="quantity-align">30</lable>
						</p>
						<p class="resource-align">Resource 03
							<lable class="quantity-align">70</lable>
						</p>
					</div>
				</div>
			</div>
		</div>
		<div class="newService-sub">
			<div class="newService-sub-sub">
			<h3>Interval 01</h3>
				<div class="dropdown-Div">
					<h4>Duration</h4>
					<div class="view-Div">
						<p>5 min</p>
					</div>
				</div>
			</div>
		
			<div class="newService-sub-sub">
				<h3>Slot 01</h3>
				<div class="dropdown-Div">
					<h4>Duration</h4>
					<div class="view-Div">
						<p>15 min</p>
					</div>

					<h4>Resorces & Quantity</h4>
					<div class="view-Div">
						<p class="resource-align">Resource 01
							<lable class="quantity-align">20</lable>
						</p>
						<p class="resource-align">Resource 02
							<lable class="quantity-align">30</lable>
						</p>
						<p class="resource-align">Resource 03
							<lable class="quantity-align">70</lable>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
   <?php require APPROOT . "/views/inc/footer.php" ?>
