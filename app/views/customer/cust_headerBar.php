<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/home.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer.css" />
</head>

<body class=customerPages>
   <nav class=nav-black>
      <div class="logo">
         <a href="../index.html">
            <img src="<?php echo URLROOT ?>/public/imgs/logoTextWhite.png" alt="logo">
         </a>
      </div>
      <div class="links">
         <i class="ci ci-x-white closeBtn"></i>
         <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Services</a></li>
            <li><a href="">Staff</a></li>
            <li><a href="">Gallery</a></li>
            <li><a href="">Contact</a></li>
         </ul>
      </div>

      <div class="buttons">
         <div class="profileIcon">
            <img src="<?php echo URLROOT ?>/public/imgs/person4.jpg" alt="">
         </div>

         <i class="ci ci-menu-white menuBtn"></i>
      </div>
   </nav>
   <div class="profile_menu">
      <ul>
         <li>
            <i class="far fa-user"></i>
            <a href="<?php echo URLROOT ?>/custDashboard/myReservations">My Reservations</a>
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