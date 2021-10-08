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
        <!---------------------------------------------------------------------------------->
        <!-- Resources Table starts -------------------------------------------------------->
        <!---------------------------------------------------------------------------------->
        <div class="">
  <!--Content-->
  <div class="table-container">  
         <div class="table1 table1-responsive">
            <table class="table1-hover">
               <!--Table head-->
               <thead>
                  <tr>
                     <th class="column-center-align"></th>
                     <!--<th></th>-->
                     <th colspan="2">Staff Member Name</th>
                     <th>Staff ID</th>
                     <th>Staff Type</th>
                     <th class="column-right-align">Salary</th>
                     <th class="column-center-align">Paid Status</th>
                     <th class="column-center-align">Action</th>
                     <th class="column-center-align">More</th>
                  </tr>
               </thead>
               <!--End of table head-->

               <!--Table body-->
               <tbody>

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Owner</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of able row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person3.jpg"/></td>
                     <td data-lable="Staff Member Name">Ruwanthi Munasinghe</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Devin Dissanayake</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person4.jpg"/></td>
                     <td data-lable="Staff Member Name">Pubudu Wijekon</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person5.jpg"/></td>
                     <td data-lable="Staff Member Name">Sumudu Perera</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Owner</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of able row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person3.jpg"/></td>
                     <td data-lable="Staff Member Name">Ruwanthi Munasinghe</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Devin Dissanayake</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" name="chk"/>
                     </td>
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="../../public/imgs/person4.jpg"/></td>
                     <td data-lable="Staff Member Name">Pubudu Wijekon</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="../../public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn black-action-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

               </tbody>
               <!--End of table body-->

            </table>
            <input type="button" class="table-btn check-btn btn-position" onclick='selects()' value="CheckAll"/>  
            <input type="button" class="table-btn uncheck-btn btn-position" onclick='deSelect()' value="UncheckAll"/>
         </div>
      </div>
   <!--End Content-->
        </div>

     
         <!---------------------------------------------------------------------------------->
        <!-- Resources Table ends -------------------------------------------------------->
        <!---------------------------------------------------------------------------------->

        <div class="modal-container normal">
            <div class="modal-box" id="commonModelContainer">

                <!--------------------------------------->
                <!-- Start adding content here for modal -->
                <!--------------------------------------->
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

                <!--------------------------------------->
                <!-- end adding content here for modal -->
                <!--------------------------------------->

            </div>

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
                        <button class="btn btnClose normal ownCancelButton">Cancel</button>
                    </div>
                    <div class="ownResAddBtn2">
                        <button class="btn ownAddGreenButton">Add</button>
                    </div>
                </div>
                <!-- main grid 2 ends -->

            </div>
            <!-- main grid 2 ends -->


            <!--------------------------------------------------------------------------------- Add resource ends ---------------------------------------------------------------->




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
                    <button class="btn btnClose normal">Cancel</button>
                </div>
                <div class="ownResRemBtn2">
                    <button class="btn">Proceed</button>
                </div>
            </div>
            <!-- main grid 2 ends -->


            <!-- ----------------------------------------------------------------------------------Remove resource starts -------------------------------------------------------------->

            <button class="btn btnClose full">Save</button>


            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
            




            <!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>

        </div>
    </div>
    </div>

    <!--End Content-->


    <?php require APPROOT . "/views/inc/footer.php" ?>