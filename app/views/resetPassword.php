<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />

   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login-reg.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <title>Reset Password</title>
</head>

<body>
   <div class="main-container">
      <a href="<?php echo URLROOT ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>

      <div class="reset-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/user/resetPassword" method="post" class="form">
            <h1 class="title">Reset Password</h1>

            <div class="row row-last">
               <div class="text-group">
                  <label class="label" for="mobileNo">Mobile No</label>
                  <input type="text" name="mobileNo" placeholder="Your mobile no here" value="<?php echo "" ?>">
                  <span class="error"><?php echo " " ?></span>
               </div>
               <div class="column">
                  <button type="submit" name="action" value="getPIN" class="btn btn-filled btn-black middle">Get PIN</button>
               </div>
            </div>
            <hr>
            <div class="row">
               <div class="text-group">
                  <label class="label" for="pin">PIN</label>
                  <input type="text" class="pin" name="pin" maxlength="6" placeholder="PIN">
                  <span class="error"><?php echo "" ?></span>
               </div>
            </div>

            <div class="row">
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="password">New Password</label>
                     <input type="password" name="password" placeholder="Enter password here">
                     <span class="error"><?php echo " " ?></span>
                  </div>
               </div>
               <div class="column">
                  <div class="text-group">
                     <label class="label" for="confirmPassword">Confirm New Password</label>
                     <input type="password" name="confirmPassword" placeholder="Enter password again">
                     <span class="error"><?php echo " " ?></span>
                  </div>
               </div>
            </div>

            <div class="footer-container">
               <button type="submit" name="action" value="save" class="btn btn-filled btn-theme-purple">Save Changes</button>
               <p>Don't have an account? <a href="<?php echo URLROOT ?>/customer/register">Register Here</a></p>
            </div>

         </form>
      </div>
   </div>

</body>



</html>