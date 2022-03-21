<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="recept_calendar.php">
         <div>
            <img src="<?php echo URLROOT ?>/public/logo/logo-white.png" alt="BeautyCraft" class="full-logo">
            <img src="<?php echo URLROOT ?>/public/logo/iconAllWhiteNoBg.png" alt="BeautyCraft" class="icon-logo">
         </div>

      </a>
   </div>
   <!--End Sidebar Header-->

   <!--Sidebar Navigation-->
   <nav class="nav">
      <!--Sidebar Menu-->
      <ul class="mainMenu">

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "DailyView") echo " selected" ?>" href="<?php echo URLROOT ?>/ReceptDashboard/dailyView/<?php echo DateTimeExtended::getCurrentDate(); ?>">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-calendar"></i>
               </div>
               <div class="optionTitle">Daily View</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Reservations") echo " selected" ?>" href="<?php echo URLROOT ?>/Reservations/viewAllReservations/all/all/all">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-tasks"></i>
               </div>
               <div class="optionTitle">Reservations</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "RecallRequests") echo " selected" ?>" href="<?php echo URLROOT ?>/ReceptDashboard/recallRequests">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-refresh-left"></i>
               </div>
               <div class="optionTitle">Recall Requests</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Sales") echo " selected" ?>" href="<?php echo URLROOT ?>/ReceptDashboard/sales/all">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-receipt"></i>
               </div>
               <div class="optionTitle">Sales</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Services") echo " selected" ?>" href="<?php echo URLROOT ?>/Services/viewAllServices">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-elements "></i>
               </div>
               <div class="optionTitle">Services</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Customers") echo " selected" ?>" href="<?php echo URLROOT ?>/Customer/viewAllCustomers">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-people"></i>
               </div>
               <div class="optionTitle">Customers</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Staff Members") echo " selected" ?>" href="<?php echo URLROOT ?>/Staff/viewAllStaffMembers">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-briefcase "></i>
               </div>
               <div class="optionTitle">Staff Members</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Leaves") echo " selected" ?>" href="<?php echo URLROOT ?>/Leaves/leaves">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-save-remove "></i>
               </div>
               <div class="optionTitle">Leaves</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Test") echo " selected" ?>" href="<?php echo URLROOT ?>/ReceptDashboard/test">
               <div class="optionIcon">
                  <i class="sidenav-icon ci-save-remove "></i>
               </div>
               <div class="optionTitle">Daily Update</div>
            </a>
         </li>
         <!--End Sidebar Item-->

      </ul>
      <!--End Sidebar Menu-->
   </nav>
   <!--End Sidebar Navigation-->

</div>
<!--End Sidebar-->
