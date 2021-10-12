<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Salaries";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Salaries";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own salaries">

   <button class="btnOpen" type="button">
      <a href="<?php echo URLROOT?>/staff/salaryReport">View Salary Report</a>       
      </button>


      <!-- ######################################################################################################## -->



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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Owner</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person3.jpg"/></td>
                     <td data-lable="Staff Member Name">Ruwanthi Munasinghe</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Devin Dissanayake</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person4.jpg"/></td>
                     <td data-lable="Staff Member Name">Pubudu Wijekon</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person5.jpg"/></td>
                     <td data-lable="Staff Member Name">Sumudu Perera</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person2.jpg"/></td>
                     <td data-lable="Staff Member Name">Sanjana Rajapaksha</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Manager</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25195.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <button type="button" class="table-btn green-status-btn text-uppercase">Paid</button>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Ravindu Madhubhashana</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Owner</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person3.jpg"/></td>
                     <td data-lable="Staff Member Name">Ruwanthi Munasinghe</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person1.jpg"/></td>
                     <td data-lable="Staff Member Name">Devin Dissanayake</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Receptionist</td>
                     <td data-lable="Salary" class="column-right-align">Rs.25000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn green-status-btn text-uppercase">Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
                        </<?php echo URLROOT?>
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
                     <td data-lable="" class="column-center-align"><img  class="img-profile-picture" src="<?php echo URLROOT?>/public/imgs/person4.jpg"/></td>
                     <td data-lable="Staff Member Name">Pubudu Wijekon</td>
                     <td data-lable="Staff ID">S001</td>
                     <td data-lable="Staff Type">Service Provider</td>
                     <td data-lable="Salary" class="column-right-align">Rs.124000.00</td>
                     <td data-lable="Paid Status" class="column-center-align">
                        <a href="#"><button type="button" class="table-btn red-status-btn text-uppercase">Not Paid</button></a>
                     </td>
                     <td data-lable="Action" class="column-center-align">
                        <span>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/view.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/edit.png"></a>
                           <a href="#"><img class="img-view-edit-update" src="<?php echo URLROOT?>/public/icons/delete.png"></a>
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





      <!-- ################################################################################################################### -->

    </div>

   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>