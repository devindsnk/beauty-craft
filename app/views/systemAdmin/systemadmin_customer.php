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
      <div class="formadmin">
         <div class="reg-container form-container contentBox">
            <form action="<?php echo URLROOT; ?>/customer/createCustomerAccount" method="post" class="form">
               <h1 class="title">Customer Account</h1>

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
                     <div class="sysadmin-custacc-gender">
                        <div class="option">
                           <div class="labelname">
                              <label class="option1" for="option1"> Male</label>
                           </div>
                           <div class="inputdiv">
                              <input type="radio" name="gender" value="M" <?php if ($data['gender'] == 'M') echo 'checked'; ?>>
                           </div>
                        </div>
                        <div class="option">
                           <div class="labelname">
                              <label for="option2">Female</label>
                           </div>
                           <input type="radio" name="gender" value="F" <?php if ($data['gender'] == 'F') echo 'checked'; ?>>

                        </div>
                     </div>
                     <span class="error"></span>
                  </div>
               </div>

               <div class="row row-last">
                  <div class="text-group">
                     <label class="label" for="mobileNo">Mobile No</label>
                     <input type="text" name="mobileNo" placeholder="Your mobile no here" value="<?php echo $data['mobileNo']; ?>" maxlength="10">
                     <span class="error"><?php echo $data['mobileNo_error']; ?></span>
                  </div>
                  <div class="column">
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
                  <button type="submit" class="btn" name="action" value="register">Create account</button>
               </div>

            </form>
         </div>
      </div>



   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>