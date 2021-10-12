<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
   $selectedMain = "Resources";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

    <?php
   $title = "Resources";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

    <!--Content-->
    <div class="content own resources">
        <h3>This is main option 1</h3>
        <div class="container">
            <button class="btnOpen normal" type="button">Remove Resources</button>
            <button class="btnOpen normal" type="button">Add Resources</button>
            <button class="btnOpen normal" type="button">Update Resources</button>
        </div>

        <div class="modal-container normal">
            <div class="modal-box" id="commonModelContainer">

                <!----------------------------------------->
                <!-- Start adding content here for modal -->
                <!----------------------------------------->


                <h1 class="ownResAddHead">Add Resources</h1>
                <!-- main grid 1 starts -->
                <div class="ownResAddDetails">
                    <div class="ownResAddDetail1">
                        <label class="ownResAddLabel1">Resource Name</label> <br>
                        <input type="text" class="ownResAddLabeltext" placeholder="--Type in--">
                    </div>
                    <div class="ownResAddDetail2">
                        <label class="ownResAddLabel2">Quantity</label> <br>
                        <select id="ownResAddQuantity" name="ownResAddQuantity">
                            <option value="one">1</option>
                            <option value="two">2</option>
                            <option value="three">3</option>
                            <option value="four">4</option>
                            <option value="five">5</option>
                            <option value="six">6</option>
                            <option value="seven">7</option>
                            <option value="eight">8</option>
                            <option value="nine">9</option>
                            <option value="ten">10</option>
                        </select>
                    </div>
                </div>
                <!-- main grid 1 ends -->
                <!-- main grid 2 starts -->
                <div class="ownResAddButtons">
                    <div class="ownResAddBtn1">
                        <button class="btn btnClose normal ModalCancelButton  ModalButton ">Cancel</button>
                    </div>
                    <div class="ownResAddBtn2">
                        <button class="btn  ModalGreenButton ModalButton">Add</button>
                    </div>
                </div>
                <!-- main grid 2 ends -->

            </div>
            <!-- main grid 2 ends -->


            
            <!--------------------------------------->
            <!-- end adding content here for modal -->
            <!--------------------------------------->

        </div>
  <!---------------------------------------------------------------------------------->
  <!-- Resources Table starts -------------------------------------------------------->
  <!---------------------------------------------------------------------------------->
        
<!--Content-->
<div class="table-container">
         <div class="table1 table1-responsive">
            <table class="table1-hover">
               <!--Table head-->
               <thead>
                  <tr>            
                    
                     <th>Resource Name</th>
                     <th>Resource ID</th>
                     <th class="column-center-align">Quantity</th>
                     <th class="column-center-align">Action</th>
                  </tr>
               </thead>
               <!--End of table head-->

               <!--Table body-->
               <tbody>

                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>                  
                     <td data-lable="Staff ID">Resource 1</td>
                     <td data-lable="Staff Type">R001</td>
                     <td data-lable="Staff Type" class="column-center-align">20</td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </span>
                     </td>            
                  </tr>
                  <!--End of table row-->

                 

               </tbody>
               <!--End of table body-->

            </table>
            <!-- <input type="button" class="table-btn check-btn btn-position" onclick='selects()' value="CheckAll"/>  
            <input type="button" class="table-btn uncheck-btn btn-position" onclick='deSelect()' value="UncheckAll"/> -->
         </div>
      </div>
   <!--End Content-->


        <!---------------------------------------------------------------------------------->
        <!-- Resources Table ends -------------------------------------------------------->
        <!---------------------------------------------------------------------------------->


    </div>



    <div class="modal-container full">
        <div class="modal-box">
            <!--------------------------------------------------------------------------------- Add resource starts ---------------------------------------------------------------->
            <h1 class="ownResAddHead">Add Resources</h1>
            <!-- main grid 1 starts -->
            <div class="ownResAddDetails">
                <div class="ownResAddDetail1">
                    <label class="ownResAddLabel1">Resource Name</label> <br>
                    <input type="text" class="ownResAddLabeltext" placeholder="--Type in--">
                </div>
                <div class="ownResAddDetail2">
                    <label class="ownResAddLabel2">Quantity</label> <br>
                    <select id="ownResAddQuantity" name="ownResAddQuantity">
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="five">5</option>
                        <option value="six">6</option>
                        <option value="seven">7</option>
                        <option value="eight">8</option>
                        <option value="nine">9</option>
                        <option value="ten">10</option>
                    </select>
                </div>
            </div>
            <!-- main grid 1 ends -->
            <!-- main grid 2 starts -->
            <div class="ownResAddButtons">
                <div class="ownResAddBtn1">
                    <button class="btn btnClose normal ModalGreenButton  ModalButton ">Cancel</button>
                </div>
                <div class="ownResAddBtn2">
                    <button class="btn ModalCancelButton ModalButton">Add</button>
                </div>
            </div>
            <!-- main grid 2 ends -->

        </div>
        <!-- main grid 2 ends -->


        <!--------------------------------------------------------------------------------- Add resource ends ---------------------------------------------------------------->

        <div class="commonModelContainer">
            <h1 class="commonModelHead">Title</h1>
            <!-- main grid 1 starts -->

            <div class="commonModelDetails">
                <span class="commonModelDetailsLabel">Subtitle</span>
                <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet voluptate molestias non,
                    quisquam expedita ratione ex deserunt, maiores aliquam tempora cum cupiditate? Veritatis
                    laboriosam vitae consectetur impedit sit, eius odit.</p>
            </div>

            <!-- main grid 1 ends -->
            <!-- main grid 2 starts -->
            <div class="commonModelButtons">
                <div class="commonModelBtn1">
                    <button class="btn btnClose normal ownCancelButton">Cancel</button>
                </div>
                <div class="commonModelBtn2">
                    <button class="btn ownAddGreenButton">Add</button>
                </div>
            </div>
            <!-- main grid 2 ends -->
        </div>


        <!--------------------------------------------------------------------------------- Remove resource starts ---------------------------------------------------------------->


        <h1 class="ownRemResHead">Remove Resources</h1>
        <!-- start main grid 1 -->
        <div class="ownResRem_ResourceDeatils">

            <span class="staffDetai1">Are You sure you want to remove this resource ?</span>

        </div>
        <!-- main grid 1 ends -->

        <!-- main grid 2 starts -->
        <div class="ownResRemButtons">
            <div class="ownResRemBtn1">
                <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
            </div>
            <div class="ownResRemBtn2">
                <button class="btn ModalBlueButton ModalButton">Proceed</button>
            </div>
        </div>
        <!-- main grid 2 ends -->


        <!-- ----------------------------------------------------------------------------------Remove resource ends -------------------------------------------------------------->

        <button class="btn btnClose full">Save</button>


        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>





        <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

    </div>

    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>