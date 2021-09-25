<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="recept_calendar.php">
         <div>
            <img src="../../../public/imgs/logo-white.png" alt="BeautyCraft">
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
            <a class="optionLink <?php if ($selectedMain == "Calendar") echo " selected" ?>" href="./recept_calendar.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Calendar</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Reservations") echo " selected" ?>" href="./recept_reservations.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Reservations</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "RecallRequests") echo " selected" ?>" href="./recept_recallRequests.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Recall Requests</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Sales") echo " selected" ?>" href="./recept_sales.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Sales</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Services") echo " selected" ?>" href="./recept_services.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Services</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "Customers") echo " selected" ?>" href="./recept_customers.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Customers</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption">
            <a class="optionLink <?php if ($selectedMain == "StaffMembers") echo " selected" ?>" href="./recept_staffMembers.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Staff Members</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Leaves") echo " selected" ?>" href="./recept_leaves.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Leaves</div>
            </a>
         </li>
         <!--End Sidebar Item-->

      </ul>
      <!--End Sidebar Menu-->
   </nav>
   <!--End Sidebar Navigation-->

</div>
<!--End Sidebar-->