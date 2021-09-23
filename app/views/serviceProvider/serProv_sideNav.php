<!--Sidebar-->
<div class="sidebar">
   <!--Sidebar Header-->
   <div class="header">
      <a href="serProv_overview.php">
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
            <a class="optionLink <?php if ($selectedMain == "Overview") echo " selected" ?>" href="./serProv_overview.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Overview</div>
            </a>
         </li>
         <!--End Sidebar Item--

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Reservations") echo " selected" ?>" href="./serProv_reservation.php">
               <div class="optionIcon">
                  <img src="../../../public/icons/overview-white.png" />
               </div>
               <div class="optionTitle">Reservations</div>
            </a>
         </li>
         <!--End Sidebar Item-->

         <!--Sidebar Item-->
         <li class="mainOption menuOption">
            <a class="optionLink <?php if ($selectedMain == "Leaves") echo " selected" ?>" href="./serProv_leaves.php">
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