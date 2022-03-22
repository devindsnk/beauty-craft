<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->

<body class="ownAddstaffBody layout-template-2">

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Update Resource</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/resources/viewResources/<?php echo $data['purchaseDetails']->resourceID; ?>" class="top-right-closeBtnSpecial"><i class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">
        <div class="ownStaff_allignmentbox own staff resources">
            
            <div class="ownAddstaffContainer contentBox">
                <form action="<?php echo URLROOT; ?>/resources/updateResource/<?php echo $data['purchaseID']; ?>/<?php echo $data['currentResourceID']; ?>" method="post">
                    <div class="ownAddstaff_formWrapper">
                        <!------------------------------ Basic Info Starts------------------------------------------------------------------------------->

                        <div class="Basicinfo">
                            <h3 class="ownAddstaffBasicinfoSubHead">Basic Info</h3> <br>

                            <div class="Maingrid1">
                                <div class="manufacturer">
                                    <label class="ownAddstaffLabels">Manufacturer</label>
                                    <input type="text" name="manufacturer" id="contactnum" placeholder="Resource manufacturer here" value="<?php echo $data['manufacturer']; ?>">
                                    <span class="error"><?php echo $data['manufacturer_error']; ?></span>
                                </div>
                                <div class="modelNumber">
                                    <label class="ownAddstaffLabels">Model Number</label>
                                    <input type="text" name="modelNo" id="email" placeholder="Resource model number here" value="<?php echo $data['modelNo']; ?>">
                                    <span class="error"><?php echo $data['modelNo_error']; ?></span>
                                </div>
                            </div>

                            <div class="Maingrid2">
                                <div class="warrantyExpDate">
                                    <label class="ownAddstaffLabels">Warranty Expiration Date</label>
                                    <input type="date" name="warrantyExpDate" class="Date" value="<?php echo $data['warrantyExpDate']; ?>">
                                    <span class="error"><?php echo $data['warrantyExpDate_error']; ?></span>
                                </div>
                                <div class="addType">
                                    <div class="selectType">
                                        <label class="ownAddstaffLabels">Type</label>
                                        <select name="nameSelected" class="dropdownselectbox resourceTypes">
                                            <option class="unbold" value="0" option selected="true" disabled="disabled">Select</option>
                                            <?php foreach ($data['resourceTypes'] as $resourceTypeD) : ?>
                                                <option value="<?php echo $resourceTypeD->resourceID; ?>  " <?php if ($data['currentResourceID'] == $resourceTypeD->resourceID) echo ' selected'; ?>><?php echo $resourceTypeD->name; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                        <span class="error"><?php echo $data['nameSelected_error']; ?></span>
                                    </div>
                                    <div class="addNewTypeButton">
                                        <a href="#"><i class="AddResourceTypebutton btn btn-filled btn-black btnAddResourceType">Add</i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------------ maingrid2 ends --------------------------------------------------------------->
                        <!----------------------------------------------- Basic Info ends ---------------------------------------------------------------------------->

                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>


                        <!------------------------------------------ Contact Details starts -------------------------------------------------------------------------->
                        <div class="purachseDetails">
                            <h3 class="subhead">Purchase Details</h3> <br>

                            <div class="Maingrid4Update">
                                <div class="price">
                                    <label class="ownAddstaffLabels">Price</label>
                                    <input type="text" name="price" id="contactnum" placeholder="Resource price here" value="<?php echo $data['price']; ?>">
                                    <span class="error"><?php echo $data['price_error']; ?></span>
                                </div>
                                <div class="purchaseDateUpdate">
                                    <label class="ownAddstaffLabels">Purchase Date</label>
                                    <input type="date" name="purchaseDate" class="Date" value="<?php echo $data['purchaseDate']; ?>">
                                    <span class="error"><?php echo $data['purchaseDate_error']; ?></span>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                    <!----------------------------------------- form submit button starts ------------------------------------------------------------------------>
                    <div class="ownAddstaffButton">
                        <button type="submit" name="action" value="addResource" class="ownAddstaffbutton btn btn-filled btn-theme-purple">Save</button>
                    </div>
                    <!----------------------------------------- form submit button ends -------------------------------------------------------------------------->
                    <!--------------------------------------------------------------------------------- Add resource starts ---------------------------------------------------------------->
                    <div class="modal-container add-resource-type <?php if ($data['haveErrors']) echo ' show'; ?>">
                        <div class="modal-box addItems " id="ownResAddContainer">
                            <form action="<?php echo URLROOT; ?>/resources/updateResource" method="post">
                                <h1 class="addItemsModalHead">Add Resources</h1>
                                <!-- start main grid 1 -->

                                <div class="addItemsModalGrid1 ownResAddDetails">
                                    <div class="ownResAddDetail1">
                                        <label class="addItemsModalLable">Resource Name</label> <br>
                                        <input type="text" name="name" class="ownResAddLabeltext" placeholder="--Type in--" value="<?php echo $data['name']; ?>" maxlength="40">
                                        <br>
                                        <span class="error"><?php echo $data['name_error']; ?></span>
                                    </div>
                                </div>

                                <!-- main grid 1 ends -->

                                <!-- main grid 3 starts -->
                                <div class="addItemsModalGrid3">
                                    <div class="addItemsModalbtn1">
                                        <button class="btn btnClose normal ModalCancelButton ModalButton " name="action" value="cancel">Cancel</button>
                                    </div>
                                    <div class="addItemsModalbtn2">
                                        <button class="btn ModalGreenButton ModalButton" name="action" value="addType">Add</button>
                                    </div>
                                </div>
                                <!-- main grid 3 ends -->
                            </form>
                        </div>
                    </div>


                    <!--------------------------------------------------------------------------------- Add resource ends ---------------------------------------------------------------->
                </form>

            </div>

        </div>


        <script src="<?php echo URLROOT ?>/public/js/fetchRequests/resources.js"></script>
        <?php require APPROOT . "/views/inc/footer.php" ?>