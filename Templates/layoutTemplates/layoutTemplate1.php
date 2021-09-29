<!DOCTYPE html>
<html>

<head>
   <!--Meta-->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale = 1.0" />

   <title>layoutTemplate1</title>

   <!--Style Sheet-->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="../../public/css/style.css" />
   <link rel="stylesheet" href="../../public/css/sideNav.css" />
   <link rel="stylesheet" href="../../public/css/layoutTemplate1.css" />

</head>

<body class="layout-template-1">
   <!--Sidebar-->
   <div class="sidebar">
      <!--Sidebar Header-->
      <div class="header">
         <a href="receptionistDashboard.html">
            <div>
               <img src="../../public/imgs/logoAllWhite.png" alt="BeautyCraft">
            </div>
         </a>
      </div>
      <!--End Sidebar Header-->

      <!--Sidebar Navigation-->
      <nav class="nav">
         <!--Sidebar Menu-->
         <ul class="mainMenu">

            <!--Sidebar Item-->
            <li class="mainOption tdsdsd">
               <a class="optionLink selected" href="./layoutTemplate1.html">
                  <div class="optionIcon">
                     <img src="../../public/icons/overview-white.png" />
                  </div>
                  <div class="optionTitle">Main Option 1</div>
               </a>
            </li>
            <!--End Sidebar Item-->

            <!--Sidebar Item-->
            <li class="mainOption menuOption">
               <a class="optionLink" href="#">
                  <div class="optionIcon">
                     <img src="../../public/icons/overview-white.png" />
                  </div>
                  <div class="optionTitle">Main Option 2</div>
                  <div class="optionArrow">
                     <img src="../../public/icons/expand-white.png" />
                  </div>
               </a>
               <!--Sidebar Sub Menu-->
               <ul class="subMenu">
                  <!--Sidebar Sub Item-->
                  <li class="menuOption subOption">
                     <a class="optionLink" href="#">
                        <!-- <div class="sidebar-menu_item-icon"></div> -->
                        <div class="optionTitle">Sub Option 1</div>
                     </a>
                  </li>
                  <!--End Sidebar Sub Item-->
                  <!--Sidebar Sub Item-->
                  <li class="menuOption subOption">
                     <a class="optionLink" href="#">
                        <!-- <div class="sidebar-menu_item-icon"></div> -->
                        <div class="optionTitle">Sub Option 2</div>
                     </a>
                  </li>
                  <!--End Sidebar Sub Item-->
               </ul>
               <!--End Sidebar Sub Menu-->
            </li>
            <!--End Sidebar Item-->

            <!--Sidebar Item-->
            <li class="mainOption menuOption">
               <a class="optionLink" href="#">
                  <div class="optionIcon">
                     <img src="../../public/icons/overview-white.png" />
                  </div>
                  <div class="optionTitle">Main Option 2</div>
                  <div class="optionArrow">
                     <img src="../../public/icons/expand-white.png" />
                  </div>
               </a>

               <!--Sidebar Sub Menu-->
               <ul class="subMenu">
                  <!--Sidebar Sub Item-->
                  <li class="menuOption subOption">
                     <a class="optionLink" href="#">
                        <!-- <div class="sidebar-menu_item-icon"></div> -->
                        <div class="optionTitle">Sub Option 1</div>
                     </a>
                  </li>
                  <!--End Sidebar Sub Item-->
                  <!--Sidebar Sub Item-->
                  <li class="menuOption subOption">
                     <a class="optionLink" href="#">
                        <!-- <div class="sidebar-menu_item-icon"></div> -->
                        <div class="optionTitle">Sub Option 2</div>
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

   <!--Header(Top Bar)-->
   <header>
      <!--Header left section-->
      <div class="header-left verticalCenter">
         <i class="fas fa-bars fa-2x header-menu_icon"></i>
         <h1 class="header-topic">Layout Template 1</h1>
      </div>
      <!--End header left section-->

      <!--Header profile section-->
      <div class="header-profile">
         <img class="header-profilepic" src="../../public/imgs/person1.jpg"></img>
         <span class="header-username">Devin Dissanayake</span>
         <span class="header-userRole">Receptionist</span>
         <div class="header-profile-arrow">
            <i class="fas fa-chevron-down"></i>
         </div>
      </div>
      <!--Header profile menu-->
      <div class="profile_menu">
         <ul>
            <li>
               <i class="far fa-user"></i>
               <a href="#">My Profile</a>
            </li>
            <li>
               <i class="far fa-cog"></i>
               <a href="#">Account Settings</a>
            </li>
            <li>
               <i class="far fa-sign-out"></i>
               <a href="#">Sign Out</a>
            </li>
         </ul>
      </div>
      <!--End header profile menu-->
   </header>
   <!--End Header(Top Bar)-->

   <!--Content-->
   <div class="content">
   </div>
   <!--End Content-->

   <!--Footer-->
   <footer>
      <P>
         Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, ducimus laboriosam saepe numquam veniam velit
         dolorem rem debitis fugit quasi illum nostrum, aliquid quam nulla labore necessitatibus excepturi culpa soluta!
      </P>
   </footer>
   <!--End Footer-->

   <script src="../../public/js/jquery-3.6.0.min.js"></script>
   <script src="../../public/js/sideNav.js"></script>
   <script src="../../public/js/headerBar.js"></script>
</body>

</html>