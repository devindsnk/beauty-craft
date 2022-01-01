<!DOCTYPE html>
<html>

<head>
   <!--Meta-->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale = 1.0" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/logo/miniIcon.ico">
   <title>Beauty Craft - Home</title>

   <!--Style Sheets-->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/home.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css">
   <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/homeSanjana.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/homePageFooter.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/homeRuwanthi.css" /> -->
   <!-- <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/whychooseUs.css" /> -->

</head>

<body id="home" class="landingPage customerPages">
   <header>
      <nav>
         <div class="logo">
            <a href="index.html">
               <img src="<?php echo URLROOT ?>/public/logo/logoTextWhite.png" alt="logo">
            </a>
         </div>
         <div class="links">
            <i class="ci ci-x-white closeBtn"></i>
            <ul>
               <li><a href="#home">Home</a></li>
               <li><a href="#services">Services</a></li>
               <li><a href="#staff">Staff</a></li>
               <li><a href="#gallery">Gallery</a></li>
               <li><a href="#contact">Contact</a></li>
            </ul>
         </div>

         <div class="buttons">
            <?php if (Session::hasLoggedIn()) : ?>
               <div class="profileIcon">
                  <img src="<?php echo URLROOT ?>/public/imgs/stylist-4.jpg" alt="">
               </div>

            <?php else : ?>
               <a href="<?php echo URLROOT ?>/user/signin" class="btn-landing btnLogin">
                  <span>Sign In</span>
               </a>
               <a href="<?php echo URLROOT ?>/customer/register" class="btn-landing btnRegister">
                  <span>Register</span>
               </a>
            <?php endif; ?>

            <i class="ci ci-menu-white menuBtn"></i>
         </div>
      </nav>
      <div class="bottom">
         <div class="text">
            <span>Redefining Your </span><span class="red">BEAUTY</span>
         </div>
         <div class="break"></div>
         <div>
            <a href="
            <?php
            if (Session::hasLoggedIn()) echo URLROOT . "/reservations/newReservationCust";
            else echo URLROOT . "/user/signin" ?>
            " class="btn-landing btnMakeRes"> Make a Reservation </a>
         </div>
      </div>
      <div class="profile_menu">
         <ul>
            <li>
               <?php if (Session::getUser("type") == 6) : ?>
                  <i class="far fa-user"></i>
                  <a href="<?php echo URLROOT ?>/custDashboard/myReservations">My Reservations</a>
               <?php else : ?>
                  <i class="far fa-user"></i>
                  <a href="<?php echo URLROOT ?>/user/provideIntialView">Dashboard</a>
               <?php endif; ?>
            </li>
            <li>
               <i class="far fa-cog"></i>
               <a href="<?php echo URLROOT ?>/custDashboard/profileSettings">Profile Settings</a>
            </li>
            <li>
               <i class="far fa-sign-out"></i>
               <a href="<?php echo URLROOT ?>/user/signout">Sign Out</a>
            </li>
         </ul>
      </div>
   </header>

   <div class="features sub-section">
      <span class="title">WHY CHOOSE US</span>

      <div class="card_container">
         <div class="card">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, alias dolore molestiae consectetur cupiditate debitis ex cumque necessitatibus, commodi expedita officia, laborum omnis aliquam inventore perferendis cum dignissimos maxime! Laborum?
         </div>

      </div>
   </div>

   <div id="services" class="testimonials sub-section">
      <span class="title">WHAT THEY SAY</span>
      <div class="comment-container">
         <img src="<?php echo URLROOT ?>/public/imgs/stylist-1.jpg" alt="">
         <span class="description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum inventore ab tenetur possimus quisquam odit recusandae similique iusto ipsa in! Alias aperiam quo, ea fugiat unde tempore officia nostrum vel?
         </span>
         <span class="name"> Sanajana Rajapaksha </span>
      </div>
   </div>

   <div id="staff" class="sub-section team">
      <span class="title">Our Team</span>
      <div class="card-container">
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/stylist-1.jpg" alt="">
               <h3>Sanajana Rajapaksha</h3>
               <span>Role Here</span>
            </div>
         </div>
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/stylist-2.jpg" alt="">
               <h3>Name Here</h3>
               <span>Role Here</span>
            </div>
         </div>
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/stylist-3.jpg" alt="">
               <h3>Name Here</h3>
               <span>Role Here</span>
            </div>
         </div>
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/stylist-4.jpg" alt="">
               <h3>Name Here</h3>
               <span>Role Here</span>
            </div>
         </div>
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/stylist-5.jpg" alt="">
               <h3>Name Here</h3>
               <span>Role Here</span>
            </div>
         </div>
         <div class="card-outer">
            <div class="card">
               <img src="<?php echo URLROOT ?>/public/imgs/person1.jpg" alt="">
               <h3>Name Here</h3>
               <span>Role Here</span>
            </div>
         </div>
      </div>
   </div>

</body>

<footer id="contact">
   <div class="logo-section section">
      <img class="logo" src="<?php echo URLROOT ?>/public/logo/logoTextWhite.png">
      <span class="description">We aim at elevating our guests inside and out. Be your best self, live your best life.</span>
      <div class="social-icon-container">
         <img src="<?php echo URLROOT ?>/public/icons/facebook.png" alt="" class="social-icon">
         <img src="<?php echo URLROOT ?>/public/icons/instagram.png" alt="" class="social-icon">
         <img src="<?php echo URLROOT ?>/public/icons/twitter.png" alt="" class="social-icon">
      </div>

   </div>
   <div class="contact-section section">
      <h2>Stay Connected</h2>
      <ul>
         <li>
            <i class="ci-location footer-icon"></i>
            <span>No 25, Horana Road, Kottawa.</span>
         </li>
         <li>
            <i class="ci-call footer-icon"></i>
            <span>011 2 844 233</span>
         </li>
         <li>
            <i class="ci-mail footer-icon"></i>
            <span>beautycraft@gmail.com</span>
         </li>
      </ul>
   </div>
   <div class="time-section section">
      <h2>Opening Hours</h2>
      <ul>
         <li> <span>Monday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Tuesday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Wednesday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Thursday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Friday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Staurday</span><span>9 AM - 8 PM</span> </li>
         <li> <span>Sunday</span><span>9 AM - 8 PM</span> </li>
      </ul>
   </div>
</footer>

<script src="<?php echo URLROOT ?>/public/js/jquery-3.6.0.min.js"></script>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>

</html>