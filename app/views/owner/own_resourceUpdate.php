<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->

<body class="ownAddstaffBody layout-template-2">

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Update Resource</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/resources/viewResources" class="top-right-closeBtn"><i
                    class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">

    
        <div class="ownStaff_allignmentbox own staff resources"> 

            <div class="ownAddstaffContainer contentBox"> 
                <form action="<?php echo URLROOT; ?>/resources/addResources" method="post"> 
                    <div class="ownAddstaff_formWrapper">
                        <!------------------------------ Basic Info Starts------------------------------------------------------------------------------->

                        <div class="Basicinfo">
                            <h3 class="ownAddstaffBasicinfoSubHead">Basic Info</h3> <br>

                            <div class="Maingrid1">
                                <div class="manufacturer">
                                    <label class="ownAddstaffLabels">Manufacturer</label>
                                    <input type="text" name="staffMobileNo" id="contactnum"
                                        placeholder="Resource manufacturer here"
                                        value="">
                                    <span class="error">Error text here</span>
                                </div>
                                <div class="modelNumber">
                                    <label class="ownAddstaffLabels">Model Number</label>
                                    <input type="text" name="staffEmail" id="email" placeholder="Resource model number here"
                                        value="">
                                    <span class="error">Error text here</span>
                                </div>
                                </div>

                                <div class="Maingrid2">
                                <div class="warrantyExpDate"> 
                                    <label class="ownAddstaffLabels">Warranty Expiration Date</label> 
                                    <input type="date" name="warrantyExpDate" class="Date" value=""> 
                                    <span class="error">Error text here</span> 
                                </div>
                                <div class="addType">
                                <div class="selectType">
                                    <label class="ownAddstaffLabels">Type</label>
                                    <select name="" class="dropdownselectbox">
                                        <option class="unbold" value="0" option selected="true" disabled="disabled" >Select</option>
                                        <option value=5 >Hair trimmer</option>
                                        <option value= 4 >Hair Straightner</option>
                                        <option value= 3 >Comb</option>
                                    </select>
                                    <span class="error">Error text here</span>
                                </div>
                                    <div class="addNewTypeButton">
                                    <button type="submit" class="AddResourceTypebutton btn btn-filled btn-black">Add</button>
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
                                    <input type="text" name="staffMobileNo" id="contactnum"
                                        placeholder="Resource price here"
                                        value="">
                                    <span class="error">Error text here</span>
                                </div>
                                <div class="purchaseDateUpdate">
                                    <label class="ownAddstaffLabels">Purchase Date</label>
                                    <input type="date" name="staffDOB" class="Date" value="">
                                    <span class="error">Error text here</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!----------------------------------------- form submit button starts ------------------------------------------------------------------------>
                    <div class="ownAddstaffButton">
                        <button type="submit" class="ownAddstaffbutton btn btn-filled btn-theme-purple">Save</button>
                    </div>
                    <!----------------------------------------- form submit button ends -------------------------------------------------------------------------->
                </form>

            </div>

        </div>



        <?php require APPROOT . "/views/inc/footer.php" ?>