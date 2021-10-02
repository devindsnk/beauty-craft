<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
    <!-- New service container -->
        <!-- <div class="btn-remove-service quantity-align mang">
            <i class="fa fa-close blue-color " ></i>
            <a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()">X</span></a>
        </div> -->

        <div class="containerclose zoom_invert quantity-align mang"><div class="close_icon zoom_invert" onclick="Previous()"></div></div>

		<div class="newService-main newservice" id="newServiceMain">
			<div class="newService-main-head">
				<h1>New Service</h1>
			</div>
			
			<!-- Basic information -->
			<div class="newService-sub-head">
				<h3>Basic Info</h3>
			</div>

			<div class="newService-sub">
				<form class="form" action="">
					<!-- service name -->
					<div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label class="label" for="fName">First Name</label>
                                <input type="text" name="" id="fName" placeholder="Your first name here">
                            </div>
                            <span class="error"> <?php echo " "; ?></span>
                        </div>
                    </div>
					<!-- end of service name -->

					<!-- service type -->
                    <div class="row">

                        <div class="column">
                            <label class="labels"><h4>Service Type</h4></label>
                            <select class="dropdownSelectBox">
                                <option class="unbold" value="val1" option selected="true" disabled="disabled" >Select One</option>
                                <option value="val1">Long Hair</option>
                                <option value="val2">Short Hair</option>
                            </select>
                            <div class="row2">
                                <button class="buttonNew quantity-align btnOpen normal">New</button>
                            </div>
                            <div class="row3">
                                <label><h4>Price</h4></label>
                                <input type="text" name="" placeholder="--Rs.0.00--">
                                <span class="error paddingLeft"> <?php echo " error message"; ?></span>
                            </div>
                        </div>

                        <div class="column">
                        <label><h4>Employee</h4></label>
                            <div class="checkbox-div">
                                <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                                <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                                <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                                <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                                <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                            </div>
                        </div>
                    </div>


                    <!-- New service type model -->
                    <div class="modal-container normal">
                        <div class="modal-box">
                            <div class="new-type-head">
                                <h1>New Type</h1>
                            </div>
                            <label class="paddingBottom"><h4>Service Type</h4></label>
                            <input type="text" name="" placeholder="--Type Here--">
                            <div class="new-type-head">
                                <button class="btn btnClose normal close-type-btn">Close</button>
                                <button class="btn btnClose normal add-type-btn">Add</button>
                            </div>
                        </div>
                    </div>
                    <!-- End of New service type model -->
                    
					<!-- end of service type -->

					<!-- employees -->
	                <!-- <div class="newService-sub-sub">
		                <label><h4>Employee</h4></label>
		                <div class="checkbox-div">
                            <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                            <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                            <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                            <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
                            <div class="divIndiv"><input type="checkbox" name=""><lable class="lableInDiv">Emp111, Sanjana</lable></div><hr class="resHr">
		                </div>
	                </div> -->
					<!-- end of employees -->

					<!-- price -->
	                <!-- <div class="newService-sub-sub">
	                	<label><h4>Price</h4></label>
						<input type="text" name="" placeholder="--Rs.0.00--">
                        <span class="error paddingLeft"> <?php echo " error message"; ?></span>
	                </div> -->
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
					<form class="form" action="">
						<!-- slot 1-->
						<div class="newService-sub-sub " id="slotdetails1">
		                	<h4>Slot 1</h4>
							<div class="dropdown-Div">
								<!-- duration -->
								<div class="newService-sub-sub">
									<label class="labels paddingBottom">Duration</label><br>
				                    <select class="dropdownSelectBox">
				                        <option value="val1">1 min</option>
				                        <option value="val2">2 min</option>
				                        <option value="val1">3 min</option>
				                    </select>
								</div>
								<!-- end of duration -->

								<!-- quantity -->
								<div class="newService-sub-sub">
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
						</div>
						<!-- slot 1-->
					</form>
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
