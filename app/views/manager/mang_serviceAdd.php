<?php require APPROOT . "/views/inc/header.php" ?>

<body class="">
    <!-- New service container -->
	<form class="form" action="<?php echo URLROOT; ?>/services/addNewService" method="post">

		<div class="btn-remove-service quantity-align mang">
			<a href="#newServiceMain" name="remove" id="" class="close-service-window"><span onclick="Previous()"><i class='fas fa-times fa-2x'></i></span></a><br/>
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
                                <input type="text" name="sName" id="sName" placeholder="--Type In--" value="<?php echo $data['sName']; ?>">
                            </div>
                            <span class="error"><?php echo $data['sName_error']; ?></span>
                        </div>
                    </div>
					<!-- end of service name -->

					<!--  -->
                    <div class="row">

                        <div class="column">
							<!-- New service type -->
                            <label class="labels" for="serviceType">Service Type</label>
                            <select class="dropdownSelectBox" name="serviceType">
                                <option class="unbold" value="val1" option selected="true" disabled="disabled" >Select One</option>

								<?php foreach($data['sTypesArray'] as $sType) : ?>
									
									<option value="<?php echo $sType->type; ?>"><?php echo $sType->type; ?></option>

								<?php endforeach; ?>

                            </select>

							<div class="row1">
								<label class="labels2" for="servicePrice">OR</label>
								<input type="text" name="sNewType" id="sNewType" placeholder="--Type In--" value="<?php echo $data['sNewType']; ?>">
								
                                <span class="error paddingLeft"><?php echo $data['sSelectedAllType_error']; ?></span>

							</div>
							<!-- end of service type -->

							<!-- Service price -->
                            <div class="row3">
                                <label class="labels" for="servicePrice">Price</label>
                                <input type="text" name="sPrice" placeholder="--Type In--" value="<?php echo $data['sPrice']; ?>">
                                <span class="error paddingLeft"> <?php echo $data['sPrice_error']; ?></span>
                            </div>
							<!-- End of ervice price -->
                        </div>

						<!-- Service Providers -->
                        <div class="column">
							<label class="labels" for="serviceEmp">Service Provider</label>
							<div class="checkbox-div">

								<?php foreach($data['sProvArray'] as $sProv) : ?>
									<div class="divIndiv"><input type="checkbox" name="serProvCheckbox[]" value="<?php echo $sProv->staffID; ?>">
										<lable class="lableInDiv">
											<?php echo $sProv->staffID; ?> - <?php echo $sProv->fName; ?> <?php echo $sProv->lName; ?>
										</lable>
									</div><hr class="resHr">
								<?php endforeach; ?>

							</div>
							<span class="error paddingLeft"><?php echo $data['sSelectedSProve_error']; ?></span>

                        </div>
						<!-- End of Service Providers -->

                    </div>


                    <!-- New service type model -->
                    <div class="modal-container normal">
                        <div class="modal-box">
                            <div class="new-type-head">
                                <h1>New Type</h1>
                            </div>
                            <label class="labels paddingBottom" for="serviceNewType">Service Type</label>
                            <input type="text" name="serviceNewType" placeholder="--Type Here--">
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
								<label class="labels paddingBottom">Duration (mins) </label><br>
								<select class="dropdownSelectBox" name="slot1Duration">
									<option class="unbold" value="val0" option selected="true" disabled="disabled" >Select duration</option>
									<!-- <option value=15>15</option>
									<option value=30>30</option>
									<option value=45>45</option>
									<option value=60>60</option>
									<option value=75>75</option> -->

									<?php for ($i=10; $i <= 120; $i+=10): ?>

										<?php if ($i == 60 || $i == 120):?>
											<option value="<?php echo $i; ?>"> <?php echo ($i/60) ; ?> h </option>
										<?php elseif ($i > 60 && $i < 120 ): ?>
											<option value="<?php echo $i; ?>"> <?php echo ($i/$i) ; ?> h <?php echo ($i %  60) ; ?> mins</option>
										<?php else :?>
											<option value="<?php echo $i; ?>"> <?php echo $i; ?> mins </option>
										<?php endif; ?>

									<?php endfor; ?>

								</select>
								<span class="error paddingLeft"><?php echo $data['sSlot1Duration_error']; ?></span>

							</div>
							<!-- end of duration -->

							<!-- quantity -->
							<div class="column" id="resorceDetails1">
								<label class="labels paddingBottom">Resources & Quantity</label><br>
								<div class="checkbox-div">
									
									<?php foreach($data['sResArray'] as $sResource) : ?>

										<div class="divIndiv">
											<?php  $findResource = 1; ?>
											<input type="checkbox" name="resourceCheckbox[]" value="<?php echo $sResource->resourceID; ?>">

											<label class="lableInDiv" id="checkedItem">
												<?php echo $sResource->resourceID; ?> - <?php echo $sResource->name; ?> 
											</label>
											
											<?php $resName =  $sResource->resourceID ?>

											<select class="dropdownSelectBox-small quantity-align resCount" name="<?php $resName ?>">
												<option class="unbold" value="0" option selected="true" >0</option>

													<?php $Qcount= $sResource->quantity;?>

													<?php for ($i=1; $i <= $Qcount; $i++): ?>
													
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>

													<?php endfor; ?>

											</select>
										</div>
										<hr class='resHr'>

									<?php endforeach; ?>

								</div>
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

			<!-- submit service button -->
			<div class="button-Add-Div">
	    		<button type="submit" class="buttonAdd btn btn-filled btn-blue" name="action" value="addService">Add</button>
	    	</div>

		</div>
	</form>
	
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