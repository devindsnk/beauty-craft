<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="<?php echo URLROOT ?>/MangDashboard/mang_overview">
         <div>
            <img src="<?php echo URLROOT ?>/public/imgs/logo-white.png" alt="BeautyCraft">
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
            <a class="optionLink <?php if ($selectedMain == "Overview") echo " selected" ?>" href="<?php echo URLROOT ?>/MangDashboard/overview">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Overview</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Reservations") echo " selected" ?>"
               href="<?php echo URLROOT ?>/MangDashboard/reservations">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Reservations</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "StaffMembers") echo " selected" ?>"
               href="<?php echo URLROOT ?>/MangDashboard/staffMembers">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Staff Members</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Customers") echo " selected" ?>"
               href="<?php echo URLROOT ?>/MangDashboard/customers">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Customers</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Services") echo " selected" ?>"
               href="<?php echo URLROOT ?>/MangDashboard/services">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Services</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Resources") echo " selected" ?>"
               href="<?php echo URLROOT ?>/MangDashboard/resources">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Resources</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Leaves") echo " selected" ?>" >
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Leaves</div>
               <div class="optionArrow <?php if ($selectedMain == "Leaves") echo " rotated180" ?>">
                  <img src="<?php echo URLROOT ?>/public/icons/expand-white.png" />
               </div>
            </a>
            <!--Sidebar Sub Menu-->
            <ul class="subMenu <?php if ($selectedMain == "Leaves") echo " expanded" ?>">
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "LeaveRequests") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/MangDashboard/subLeaveRequests">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Leave Requests</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "TakeLeave") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/MangDashboard/subTakeLeave">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Take Leave</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
            </ul>
            <!--End Sidebar Sub Menu-->
         </li>
         <!--End Sidebar Item-->
         
         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Analytics") echo " selected" ?>" >
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Analytics</div>
               <div class="optionArrow <?php if ($selectedMain == "Analytics") echo " rotated180" ?>">
                  <img src="<?php echo URLROOT ?>/public/icons/expand-white.png" />
               </div>
            </a>
            <!--Sidebar Sub Menu-->
            <ul class="subMenu <?php if ($selectedMain == "Analytics") echo " expanded" ?>">
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "OverallAnalytics") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/MangDashboard/subAnalyticsOverall">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Overall</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "ServiceAnalytics") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/MangDashboard/subAnayticsService">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Service's</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "ServiceProviderAnalytics") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/MangDashboard/subAnayticsSProvider">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Service Provider's</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
            </ul>
            <!--End Sidebar Sub Menu-->
         </li>
         <!--End Sidebar Item-->
      </ul>
      <!--End Sidebar Menu-->

         
   </nav>
   <!--End Sidebar Navigation-->

</div>
<!--End Sidebar-->