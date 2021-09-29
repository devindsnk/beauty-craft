<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
    <!-- New service container -->
        <div class="btn-remove-service">
            <a href="#" name="remove" id="'+i+'" class="close-newservice-window">X</a>
        </div>
		<div class="newService-main newservice" >
			<div>
				<h1>New Service</h1>
			</div>
			

			<!-- Basic information -->
			<div class="newService-sub-head">
				<h3>Basic Info</h3>
			</div>

			<div class="newService-sub">
				<form>
					<!-- service name -->
					<div class="newService-sub-sub">
						<label><h4>Service Name</h4></label><br>
						<input type="text" name="" placeholder="--Type Here--">
					</div>
					<!-- end of service name -->

					<!-- service type -->
					<div class="newService-sub-sub">
	                    <label class="labels"><h4>Service Type</h4></label><br>
	                    <select class="dropdownSelectBox">
	                    	<option class="unbold" value="val1" option selected="true" disabled="disabled" >Select One</option>
	                        <option value="val1">Long Hair</option>
	                        <option value="val2">Short Hair</option>
	                    </select>
	                    <button class="buttonNew">New</button>
	                </div>
					<!-- end of service type -->

					<!-- employees -->
	                <div class="newService-sub-sub">
		                <label><h4>Employee</h4></label><br>
		                <div class="checkbox-div">
		                	<input type="checkbox" name=""><span>Emp111, Sanjana</span><br>
		                	<input type="checkbox" name=""><span>Emp111, Sanjana</span><br>
		                	<input type="checkbox" name=""><span>Emp111, Sanjana</span><br>
		                	<input type="checkbox" name=""><span>Emp111, Sanjana</span><br>
		                	<input type="checkbox" name=""><span>Emp111, Sanjana</span><br>
		                </div>
	                </div>
					<!-- end of employees -->

					<!-- price -->
	                <div class="newService-sub-sub">
	                	<label><h4>Price</h4></label>
						<input type="text" name="" placeholder="--Rs.0.00--">
	                </div>
					<!-- end of price -->
				</form>
			</div>
			<!-- end of Basic information -->

			<!-- Duration and Resources -->
			<div class="newService-sub-head">
				<h3>Duration and Resources</h3>
			</div>
			<div class="timeDurations" id="addDiv">
				<div class="newService-sub" >
					<form>

						<!-- slot 1-->
						<div class="newService-sub-sub " id="slotdetails1">
		                	<h4>Slot 1</h4>
							<div class="dropdown-Div">
								<!-- duration -->
								<div class="newService-sub-sub">
									<label class="labels">Duration</label><br>
				                    <select class="dropdownSelectBox">
				                        <option value="val1">1 min</option>
				                        <option value="val2">2 min</option>
				                        <option value="val1">3 min</option>
				                    </select>
								</div>
								<!-- end of duration -->

								<!-- resources -->
								<!-- <div class="newService-sub-sub">
									<label>Resorces</label><br>
			                		<div class="checkbox-div">
					                	<input type="checkbox" class="reschkbx" name=""><span>Res001, Resource 01</span><br>
					                	<input type="checkbox" class="reschkbx" name=""><span>Res002, Resource 02</span><br>
					                	<input type="checkbox" class="reschkbx" name=""><span>Res003, Resource 03</span><br>
					                	<input type="checkbox" class="reschkbx" name=""><span>Res004, Resource 04</span><br>
					                	<input type="checkbox" class="reschkbx" name=""><span>Res005, Resource 05</span><br>
				                	</div>
								</div> -->
								<!-- end of resources -->

								<!-- quantity -->
								<div class="newService-sub-sub">
									<label>Resources & Quantity</label><br>
			                		<div class="checkbox-div">
					                	<label class="labels" id="checkedItem">Res001, Resource 01</label>
					                    <select class="dropdownSelectBox-small quantity-align" id="selectcount">
											<option value="val1">0</option>
					                        <option value="val1">1</option>
					                        <option value="val2">2</option>
					                        <option value="val1">3</option>
					                        <option value="val2">4</option>
					                        <option value="val1">5</option>
					                        <option value="val2">6</option>
					                    </select><br>
					                    <hr class="resHr">

					                    <label class="labels">Res001, Resource 01</label>
					                    <select class="dropdownSelectBox-small quantity-align">
											<option value="val1">0</option>
					                        <option value="val1">1</option>
					                        <option value="val2">2</option>
					                        <option value="val1">3</option>
					                        <option value="val2">4</option>
					                        <option value="val1">5</option>
					                        <option value="val2">6</option>
					                    </select><br>
					                    <hr class="resHr">

					                    <label class="labels">Res002, Resource 02</label>
					                    <select class="dropdownSelectBox-small quantity-align">
											<option value="val1">0</option>
					                        <option value="val1">1</option>
					                        <option value="val2">2</option>
					                        <option value="val1">3</option>
					                        <option value="val2">4</option>
					                        <option value="val1">5</option>
					                        <option value="val2">6</option>
					                    </select><br>
					                    <hr class="resHr">
					                </div>
								</div>
								<!-- end of quantity -->
							</div>
						</div>
						<!-- slot 1-->
						

						<!-- interval -->
						<!-- <div class="newService-sub-sub interval" id="intervaldetails">
							<div><span class="close">x</span></div>
							<h4>Interval 1</h4>
		                	<div class="dropdown-Div">
			                	<div class="newService-sub-sub">
			                		<label class="labels">Duration</label><br>
				                    <select class="dropdownSelectBox">
				                        <option value="val1">1 min</option>
				                        <option value="val2">2 min</option>
				                        <option value="val1">3 min</option>
				                    </select>
			                	</div>
		                	</div>
						</div> -->
						<!-- end of interval -->

					</form>
				</div>
				
			</div>
			<!-- add another slot -->
			<div class="anotheSlot">
				<p id="add"><a href="#">+ Add another slot</a></p>
			</div>
			<!-- submit service button -->
			<div class="button-Add-Div">
	    		<button class="buttonAdd">Add</button>
	    	</div>
		</div>
   <?php require APPROOT . "/views/inc/footer.php" ?>
