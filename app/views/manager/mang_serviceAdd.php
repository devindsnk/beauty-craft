<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
    <!-- New service container -->
	<form class="form" action="<?php echo URLROOT; ?>/services/addNewService" method="post">

        <div class="btn-remove-service mang">
            <!-- <a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()">X</span></a> -->
			<a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()"><i class='fas fa-arrow-left fa-2x'></i></span></a><br/>
        </div>

		<div class="newService-main newservice" id="newServiceMain">
			<div class="newService-main-head">
				<h1>New Service</h1>
			</div>
			
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
                                <input type="text" name="" id="sName" placeholder="--Enter the service name here--" value="<?php echo $data['sName']; ?>">
                            </div>
                            <span class="error"> <?php echo " "; ?></span>
                        </div>
                    </div>
					<!-- end of service name -->

					<!-- service type -->
                    <div class="row">

                        <div class="column">
							<!-- New service type -->
                            <label class="labels" for="serviceType">Service Type</label>
                            <select class="dropdownSelectBox">
                                <option class="unbold" value="val1" option selected="true" disabled="disabled" >Select One</option>
                                <option value="val1">Long Hair</option>
                                <option value="val2">Short Hair</option>
                            </select>
							<!-- end of service type -->

							<!-- Service type button -->
                            <div class="row2 quantity-align">
                                <button class="buttonNew  btnOpen normal">New</button>
                            </div>
							<!-- End of service type button -->

							<!-- Service price -->
                            <div class="row3">
                                <label class="labels" for="servicePrice">Price</label>
                                <input type="text" name="sPrice" placeholder="--Rs.0.00--"> value="<?php echo $data['sPrice']; ?>"
                                <span class="error paddingLeft"> <?php echo " error message"; ?></span>
                            </div>
							<!-- End of ervice price -->
                        </div>

						<!-- Employees -->
                        <div class="column">
							<label class="labels" for="serviceEmp">Employee</label>
							<div class="checkbox-div">
								<div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
								<div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
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
				<div class="newService-sub" >
					<form class="form" action="">
					<h4 class="paddingBottom">Slot 1</h4>
						<!-- slot 1-->
						<div class="row " id="slotdetails1">
		                	

							<div class="column">
								<!-- duration -->
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
					<!-- </form> -->
				</div>
			</div>

			<!-- add another slot -->
			<div class="anotheSlot">
				<p id="add"><a href="#addDiv">+ Add another slot</a></p>
			</div>

			<!-- submit service button -->
			<div class="button-Add-Div">
	    		<button class="buttonAdd">Add</button>
	    	</div>

		</div>
    <?php require APPROOT . "/views/inc/footer.php" ?>

	<!-- <div class="newService-sub" id="fullSlotDetail'+j+'">
		<div class="btn-remove quantity-align"> 
			<a href="#slotdetails'+j+'" name="remove" id="'+i+'" class="close-slot">X</a>
		</div> 

		<div class="newService-sub-sub" >      
			<h4>'+i+'</h4>
			<div class="row">
				<div class="column">

					<div class="row2" id="intervaldetails'+j+'">
						<label class="labels">Interval Duration</label><br>
						<select class="dropdownSelectBox">
							<option value="val1">1 min</option>
							<option value="val2">2 min</option>
							<option value="val1">3 min</option>
						</select>
					</div>

					<div class="row3" id="slotdetails'+i+'">
						<label class="labels">Slot Duration</label><br>
						<select class="dropdownSelectBox"> 
							<option value="val1">1 min</option>
							<option value="val2">2 min</option>
						</select>
					</div>
					
				</div>
				
				<div class="column" id="resorcedetails'+i+'">
				<label>Resources and Quantity</label>
					<div class="checkbox-div">
						<div class="divIndiv">
							<label class="labels">Res111, Resource1</label>
							<select class="dropdownSelectBox-small quantity-align">
								<option value="val1">0</option>
								<option value="val1">1</option>
								<option value="val2">2</option>
								<option value="val1">3</option>
							</select>
						</div>
						<hr class="resHr">
						<div class="divIndiv">
							<label class="labels">Res111, Resource1</label>
							<select class="dropdownSelectBox-small quantity-align">
								<option value="val1">0</option>
								<option value="val1">1</option>
								<option value="val2">2</option>
								<option value="val1">3</option>
							</select>
						</div>
						<hr class="resHr">
						<div class="divIndiv">
							<label class="labels">Res111, Resource1</label>
							<select class="dropdownSelectBox-small quantity-align">
								<option value="val1">0</option>
								<option value="val1">1</option>
								<option value="val2">2</option>
								<option value="val1">3</option>
							</select>
						</div>
						<hr class="resHr">
					</div>
				</div>
			</div>
		</div>      
	</div> -->