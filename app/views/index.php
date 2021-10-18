<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
   <!--Meta-->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale = 1.0" />

   <title>Beauty Craft</title>

   <!--Style Sheets-->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/home.css">
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css">





</head>

<body class="landingPage">
   <header>
      <nav>
         <div class="logo">
            <a href="index.html">
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
            <?php if (isset($_SESSION['userMobileNo'])) : ?>
            <div class="profileIcon">
               <img src="<?php echo URLROOT ?>/public/imgs/person4.jpg" alt="">
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
            <button class="btn-landing btnMakeRes"> Make a Reservation </button>
         </div>
      </div>
      <div class="profile_menu">
         <ul>
            <li>
               <?php if ($_SESSION['userType'] == 'customer') : ?>
               <i class="far fa-user"></i>
               <a href="#">My Reservations</a>
               <?php else : ?>
               <i class="far fa-user"></i>
               <a href="<?php echo URLROOT ?>/user/provideIntialView">Dashboard</a>
               <?php endif; ?>
            </li>
            <li>
               <i class="far fa-cog"></i>
               <a href="#">Account Settings</a>
            </li>
            <li>
               <i class="far fa-sign-out"></i>
               <a href="<?php echo URLROOT ?>/user/signout">Sign Out</a>
            </li>
         </ul>
      </div>
   </header>

   <div class="features section">
      <span class="title">WHY CHOOSE US</span>
   </div>
   <div class="services section ">
      <span class="title">OUR SERVICES</span>

      <div class="slideshow-container">
<!-- slide 1 -->
         <div class="mySlides fade">
            <div class="cardContainer">
            <!-- card 1 -->
               <div class="card1">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Mens’ Haircut
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs.500
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                            Ladies’ Haircut (Long Hair)
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs.500
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                            Ladies’ Haircut (Short Hair)
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs.400
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn ">
                           <label class="CardDetailsLabel">
                            Kids’ Haircut
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs.350
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                            Kids’ Haircut
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs.350
                           </span>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- card 2 -->
               <div class="card2">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               </div>            
         </div>

<!-- slide 2 -->

         <div class="mySlides fade">
            <div class="cardContainer">
            <!-- card 1 -->
               <div class="card1">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- card 2 -->
               <div class="card2">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               </div>            
         </div>



         <!-- slide 2 -->

         <div class="mySlides fade">
            <div class="cardContainer">
            <!-- card 1 -->
               <div class="card1">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- card 2 -->
               <div class="card2">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               </div>            
         </div>


         <!-- slide 2 -->

         <div class="mySlides fade">
            <div class="cardContainer">
            <!-- card 1 -->
               <div class="card1">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>

               <!-- card 2 -->
               <div class="card2">
               <div class="cardHead">
                  <h3>Hair Cuts</h3>
                  </div>
                  <div class="cardDetails">
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                     <div class="cardRow">
                        <div class="cardColumn">
                           <label class="CardDetailsLabel">
                              Kids Hair cuts
                           </label>
                        </div>
                        <div class="cardColumn">
                           <span class="CardDetailsValue">
                              Rs. 20000
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
               </div>            
         </div>


         

         <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
         <a class="next" onclick="plusSlides(1)">&#10095;</a>

      </div>
      <br>

      <div style="text-align:center">
         <span class="dot" onclick="currentSlide(1)"></span>
         <span class="dot" onclick="currentSlide(2)"></span>
         <span class="dot" onclick="currentSlide(3)"></span>
      </div>




   </div>

   <div class="team section">
      <span class="title">MEET OUR TEAM</span>
   </div>
   <div class="gallery section">
      <span class="title">GALLERY</span>
   </div>
   <div class="testimonials section">
      <span class="title">WHAT THEY SAY</span>
   </div>
   <div>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias laudantium voluptas animi amet beatae aliquid
      praesentium quisquam repellat consequatur rem, quas, voluptatum nisi ipsa, earum nihil sequi corrupti commodi
      alias?
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto ducimus labore a earum unde! Dolor asperiores
      rerum deleniti architecto, ab fugiat delectus veniam aut laboriosam nostrum, autem natus dolores, cupiditate quam.
      Sed a voluptatibus doloribus iste exercitationem vel doloremque cumque reprehenderit officia, repellendus labore
      quasi quam inventore cum nesciunt excepturi eligendi nostrum incidunt quibusdam culpa ab delectus beatae.
      Voluptatibus, excepturi consequatur! Rerum, ab sapiente magni vel voluptatum eum, nulla neque accusantium placeat
      amet quam blanditiis. Officiis exercitationem inventore molestias quam, magni, natus necessitatibus minima,
      laboriosam eveniet et similique. Consequatur tenetur sint dicta alias. Omnis amet dolor quae sint quia similique.
   </div>

   <footer>

   </footer>
   <script src="<?php echo URLROOT ?>/public/js/home.js"></script>

</body>

</html>