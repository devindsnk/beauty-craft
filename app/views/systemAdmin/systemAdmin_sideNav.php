<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="systemAdmin_systemlog.php">
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
            <a class="optionLink <?php if ($selectedMain == "SystemLog") echo " selected" ?>" 
            href="<?php echo URLROOT ?>/SysAdminDashboard/systemlog">
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">System Log</div>
            </a>
         </li>
         <!--End Sidebar Item--

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "CreateAccount") echo " selected" ?>" >
               <div class="optionIcon">
                  <img src="<?php echo URLROOT ?>/public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Create Account</div>
               <div class="optionArrow <?php if ($selectedMain == "CreateAccount") echo " rotated180" ?>">
                  <img src="<?php echo URLROOT ?>/public/icons/expand-white.png" />
               </div>
            </a>
            <!--Sidebar Sub Menu-->
            <ul class="subMenu <?php if ($selectedMain == "CreateAccount") echo " expanded" ?>">
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "Staff") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/SysAdminDashboard/staff">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Staff</div>
                  </a>
               </li>
               <!--End Sidebar Sub Item-->
               <!--Sidebar Sub Item-->
               <li class="menuOption subOption">
                  <a class="optionLink <?php if ($selectedSub == "Customer") echo " selected" ?>"
                     href="<?php echo URLROOT ?>/SysAdminDashboard/Customer">
                     <!-- <div class="sidebar-menu_item-icon"></div> -->
                     <div class="optionTitle">Customer</div>
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