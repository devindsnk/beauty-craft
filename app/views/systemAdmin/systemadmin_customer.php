<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "CreateAccount";
   $selectedSub = "Customer";
   require APPROOT . "/views/systemAdmin/systemAdmin_sideNav.php"
   ?>

   <?php
   $title = "Create Account";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content admin">

      <div class="reg-container form-container contentBox">
         <form method="post" class="form">
            <h1 class="title">Customer Account</h1>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="name">Name</label>
                     <input type="text" name="fName" placeholder="Your first name here" />
                     <span class="error"></span>
                  </div>
               </div>
               <div class="column spec">
                  <div class="text-group">
                     <input type="text" name="lName" placeholder="Your last name here" ">
                     <span class=" error"></span>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <label class="label" for="lName">Gender</label>
                  <div class="radio-container">
                     <div class="radio-group">
                        <input type="radio" name="gender" value="M">
                        <span>Male</span>
                     </div>
                     <div class="radio-group">
                        <input type="radio" name="gender" value="F">
                        <span>Female</span>
                     </div>
                     <span class="error"></span>
                  </div>
               </div>
            </div>

            <div class="row row-last">
               <div class="text-group">
                  <label class="label" for="mobileNo">Mobile No</label>
                  <input type="text" name="mobileNo" placeholder="Your mobile no here" value="">
                  <span class="error"></span>
               </div>
               <div class="column">
                  <button type="#" class="btn middle">Get OTP</button>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="text-group">
                  <label class="label" for="OTP">OTP</label>
                  <input type="text" class="OTP" name="OTP" maxlength="6" placeholder="OTP">
                  <span class="error"></span>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="password">Password</label>
                     <input type="password" name="password" placeholder="Enter password here">
                     <span class="error"></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="confirmPassword">Confirm Password</label>
                     <input type="password" name="confirmPassword" placeholder="Enter password again">
                     <span class="error"></span>
                  </div>
               </div>
            </div>

            <div class="footer-container">
               <button type="submit" class="btn">Create account</button>
            </div>

         </form>
      </div>



   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>