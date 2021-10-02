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
      <div class="login-container form-container contentBox">
         <form action="<?php echo URLROOT; ?>/user/signin" method="post" class="form">
            <h1 class="title">Sign In</h1>

            <div class="text-group">
               <input type="text" name="mobileNo" placeholder="Your mobile number here" value="<?php echo $data['mobileNo']; ?>">
               <span class=" error"><?php echo $data['mobileNo_error']; ?></span>
            </div>

            <div class="text-group">
               <input type="password" name="password" placeholder="Your password here">
               <span class="error"><?php echo $data['password_error']; ?></span>
            </div>

            <a href="" class="forgot-password">Forgot Password?</a>

            <div class="footer-container">
               <button class="btn">Sign In</button>
               <p>Don't have an account? <a href="<?php echo URLROOT ?>/customer/register">Register Here</a></p>
            </div>

         </form>
      </div>
   </div>

</body>



</html>