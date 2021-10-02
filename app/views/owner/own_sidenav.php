<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="recept_calendar.php">
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
            <a class="optionLink <?php if ($selectedMain == "Overview") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/overview">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Overview</div>
            </a>
         </li>
         <!--End Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Analytics") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/analytics">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Analytics</div>
            </a>
         </li>

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Staff Members") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/staff">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Staff Members</div>
            </a>
         </li>
         <!--End Sidebar Item-->
           <!--Sidebar Item-->
           <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Services") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/services">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Services</div>
            </a>
         </li>
         <!--End Sidebar Item-->
         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Resources") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/resources">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Resources</div>
            </a>
         </li>
         <!--End Sidebar Item-->
            <!--Sidebar Item-->
            <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Reservations") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/reservations">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Reservations</div>
            </a>
         </li>
         <!--End Sidebar Item-->
   <!--Sidebar Item-->
   <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Customers") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/customers">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Customers</div>
            </a>
         </li>
         <!--End Sidebar Item-->
   <!--Sidebar Item-->
   <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Salaries") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/salaries">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Salaries</div>
            </a>
         </li>
         <!--End Sidebar Item-->
            <!--Sidebar Item-->
            <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Rates") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/rates">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Rates</div>
            </a>
         </li>
         <!--End Sidebar Item-->
          <!--Sidebar Item-->
          <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Close Salon") echo " selected" ?>" href="<?php echo URLROOT ?>/OwnDashboard/closeSalon">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Close Salon</div>
            </a>
         </li>
         <!--End Sidebar Item-->

      </ul>
      <!--End Sidebar Menu-->
   </nav>
   <!--End Sidebar Navigation-->

</div>
<!--End Sidebar-->