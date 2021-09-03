  <!--Header(Top Bar)-->
  <header>
     <!--Header left section-->
     <div class="header-left verticalCenter">
        <i class="fas fa-bars fa-2x header-menu_icon"></i>
        <h1 class="header-title"><?php echo $title ?></h1>
     </div>
     <!--End header left section-->

     <!--Header profile section-->
     <div class="header-profile">
        <img class="header-profilepic" src="../../assets/img/person1.jpg"></img>
        <span class="header-username"><?php echo $username ?></span>
        <span class="header-userRole"><?php echo $userLevel ?></span>
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