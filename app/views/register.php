<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login-reg.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <title>slider sign in/sign up form</title>
</head>

<body>
   <div class="main-container">
      <a href="<?php echo URLROOT ?>">
         <img src="<?php echo URLROOT ?>/public/logo/logoTextWhite.png" alt="logo" class="top-left-logo logo-textWhite">
         <img src="<?php echo URLROOT ?>/public/logo/logoTextBlack.png" alt="logo" class="top-left-logo logo-textBlack">
      </a>
      <a href="<?php echo URLROOT ?>" class="top-right-closeBtn white-red-hover"><i class="fal fa-times fa-2x "></i></a>
      <div class="reg-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/customer/register" method="post" class="form">
            <h1 class="title">Get Registered</h1>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="name">Name</label>
                     <input type="text" name="fName" placeholder="Your first name here" value="<?php echo $data['fName']; ?>" maxlength="35" />
                     <span class="error"><?php echo $data['fName_error']; ?></span>
                  </div>
               </div>
               <div class="column spec">
                  <div class="text-group">
                     <input type="text" name="lName" placeholder="Your last name here" value="<?php echo $data['lName']; ?>" maxlength="35">
                     <span class="error"><?php echo $data['lName_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <label class="label" for="lName">Gender</label>
                  <div class="radio-container">
                     <div class="radio-group">
                        <input type="radio" name="gender" value="M" <?php if ($data['gender'] == 'M') echo 'checked'; ?>>
                        <span>Male</span>
                     </div>
                     <div class="radio-group">
                        <input type="radio" name="gender" value="F" <?php if ($data['gender'] == 'F') echo 'checked'; ?>>
                        <span>Female</span>
                     </div>
                     <span class="error"><?php echo $data['gender_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="row row-last">
               <div class="text-group">
                  <label class="label" for="mobileNo">Mobile No</label>
                  <input type="text" name="mobileNo" placeholder="Your mobile no here" value="<?php echo $data['mobileNo']; ?>" maxlength="10">
                  <span class="error"><?php echo $data['mobileNo_error']; ?></span>
               </div>
               <div class="column">
                  <p id="countdown"></p>
                  <button type="submit" name="action" value="getOTP" id="getOTPBtn" class="btn btn-filled btn-black middle">Get OTP</button>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="text-group">
                  <label class="label" for="OTP">OTP</label>
                  <input type="text" class="OTP" name="OTP" maxlength="6" placeholder="OTP">
                  <span class="error"><?php echo $data['OTP_error']; ?></span>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="password">Password</label>
                     <input type="password" name="password" placeholder="Enter password here" maxlength="25">
                     <span class="error"><?php echo $data['password_error']; ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="confirmPassword">Confirm Password</label>
                     <input type="password" name="confirmPassword" placeholder="Enter password again" maxlength="25">
                     <span class="error"><?php echo $data['confirmPassword_error']; ?></span>
                  </div>
               </div>
            </div>

            <div class="footer-container">
               <button type="submit" name="action" value="register" class="btn btn-filled btn-theme-purple">Register</button>
               <p>Already have an account? <a href="<?php echo URLROOT ?>/user/signin">Sign in</a></p>
            </div>

         </form>
      </div>
   </div>

</body>

<script src="<?php echo URLROOT ?>/public/js/countdownTimer.js"></script>

</html>