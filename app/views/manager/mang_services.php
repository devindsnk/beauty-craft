<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Services";
   $selectedSub = "";
   require APPROOT . "/views/manager/mang_sideNav.php"
   ?>

   <?php
   $title = "Services";
   $username = "Sanjana Rajapaksha";
   $userLevel = "Manager";
   require APPROOT . "/views/inc/headerBar.php"
   ?>
   
   <!--Content-->
   <div class="content">
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
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn not-paid-btn text-uppercase">Not Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

               </tbody>
               <!--End of table body-->
               <!--Table row-->
               <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn not-paid-btn text-uppercase">Not Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn not-paid-btn text-uppercase">Not Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

               </tbody>
               <!--End of table body-->
               <!--Table row-->
               <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn not-paid-btn text-uppercase">Not Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

               </tbody>
               <!--End of table body-->
               <!--Table row-->
               <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->
                  <!--Table row-->
               <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->

                  <!--Table row-->
                  <tr>
                     <td data-lable="" class="column-center-align">
                        <input type="checkbox" class="" name="chk"/>
                     </td>
                     <td data-lable="" class="column-left-align"><img  class="img-profile-picture" src="<?php echo URLROOT ?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn paid-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT ?>/public/icons/delete.png"></a>
                        </span>
                     </td>
                     <td data-lable="More" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn pay-now-btn text-uppercase">Pay Now</button></a>
                     </td>             
                  </tr>
                  <!--End of table row-->
               </tbody>
               <!--End of table body-->
            </table>
            <input type="button" class="table-btn pay-now-btn btn-position" onclick='selects()' value="CheckAll"/>  
            <input type="button" class="table-btn pay-now-btn btn-position" onclick='deSelect()' value="UncheckAll"/>
         </div>
      </div>

      <h3>This is main option 1</h3>
      <a href="<?php echo URLROOT ?>/services/addService"><button>New Service</button></a>
      <a href="<?php echo URLROOT ?>/services/addService2"><button>New Service2</button></a>
      <a href="<?php echo URLROOT ?>/services/viewService"><button>View Service</button></a>
      <a href="<?php echo URLROOT ?>/services/updateService"><button>Update Service</button></a>
      <button class="btnOpen normal">Delete Service</button></a>
      
   </div>

   <!-- New service type model -->
   <div class="modal-container normal">
      <div class="modal-box">
            <div class="new-type-head">
               <h1>Delete Service</h1>
            </div>
            <div class="new-type-head">
               <p>Are you sure the.........!!!</p>
            </div>
            <div class="new-type-head">
            <button class="btn btnClose normal close-type-btn">Close</button>
            <button class="btn btnClose normal close-type-btn">Confirm</button>
            </div>
      </div>
   </div>
   <!-- End of New service type model -->

   <!--End Content-->

   <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>