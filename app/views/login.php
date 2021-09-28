<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/login.css" />
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>slider sign in/sign up form</title>
</head>

<body>
    <?php
    $selectbutton = $_COOKIE['selectbtn'];
    echo $selectbutton;
    ?>
    <div class="container<?php if ($selectbutton == "register") echo " register" ?><?php if ($selectbutton == "login") echo " login" ?>" id="container">
        <!-- signup container -->
        <!-- <div class="sliding-container<?php if ($selectbutton == "register") echo " register" ?>"> -->
        <div class="form-container sign-up-container">
            <form action="<?php echo URLROOT; ?>/users/register" method="post">
                <h1 class="topic">Get Registered</h1>
                <div class="formwrapper">
                    <div class="formGroup">
                        <label class="labels ">First Name </label> <br />
                        <input type="text" name="fname" placeholder="First Name " class="textinput <?php echo (!empty($data['fname_error'])) ? 'error' : ' ' ?>" value="<?php echo $data['fname']; ?>" />
                        <span class="error"><?php echo $data['fname_error']; ?></span>
                    </div>
                    <div class="formGroup">
                        <label class="labels ">Last Name </label> <br />
                        <input type="text" name="lname" placeholder="Last Name" class="textinput 
                        <?php echo (!empty($data['lname_error'])) ? 'error' : ' ' ?>" value="<?php echo $data['lname']; ?>" />
                        <span class="error"><?php echo $data['lname_error']; ?></span>
                    </div>
                </div>

                <!-- form radio Button -->
                <div class="formwrapperopt">
                    <label class="labels">Gender</label>

                    <div class="radiobutton">
                        <div class="opt">
                            <label class="option">Male
                                <input type="radio" name="gender" value="Male" checked=<?php echo ($data['gender'] == "Male") ? 'checked' : '' ?> />
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div class="opt">
                            <label class="option">Female
                                <input type="radio" name="gender" value="Female" checked=<?php echo ($data['gender'] == "Female") ? 'checked' : '' ?>>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <span class="error"><?php echo $data['gender_error']; ?></span>
                    </div>
                </div>


                <div class="formwrapper">
                    <!-- contact number -->
                    <div class="formGroup">
                        <label class="labels ">Mobile Number </label> <br />
                        <input type="text" name="mobileNo" placeholder="+94 " class="textinput 
                        <?php echo (!empty($data['mobileNo_error'])) ? 'error' : ' ' ?>" value="<?php echo $data['mobileNo']; ?>" />
                        <span class="error"><?php echo $data['mobileNo_error']; ?></span>
                    </div>
                    
                      
                    <div class="formGroup">
                      
                         <button class="send-code" type="submit">Get PIN</button>
                    </div>
                    
               
                    
                </div>
                <div class="formwrapper">
                    <div class="line"></div>
                </div>
                
                <div class="formwrapper">
                    <!-- contact number -->
                    
                    <div class="formGroup">
                        <label class="labels ">PIN </label> <br />
                        <input type="text" name="code" placeholder="_  _  _  _ " class="textinput 
                        <?php echo (!empty($data['code_error'])) ? 'error' : ' ' ?>" value="<?php echo $data['code']; ?>" />
                        <span class="error"><?php echo $data['code_error']; ?></span>
                    </div>
                </div>

                <div class="formwrapper">
                    <div class="formGroup">
                        <label class="labels">Password </label> <br />
                        <input type="password" name="password_2" placeholder="Password" class="passwordinput
                        <?php echo (!empty($data['password_error_2'])) ? 'error' : ' ' ?>" />
                        <span class="error"><?php echo $data['password_error_2']; ?></span>
                    </div>

                    <div class="formGroup">
                        <label class="labels">Confirm password </label> <br />
                        <input type="password" name="confirmPassword" placeholder="Password" class="passwordinput
                        <?php echo (!empty($data['confirmPassword_error'])) ? 'error' : ' ' ?>" />
                        <span class="error"><?php echo $data['confirmPassword_error']; ?></span>
                    </div>
                </div>
                
                <button class="signupbutton">Register</button>




                <!-- end create Account -->
            </form>
        </div>
        <!-- end signup container -->
        <!-- signin container -->
        <div class="form-container sign-in-container">
            <form action="<?php echo URLROOT; ?>/users/login" method="post">
                <h1>Sign in</h1>
                <!-- input field -->
                <div class="text-group">
                    <input name="contactNo" id="user name" type="text" placeholder="Contact No" class="username <?php echo (!empty($data['contactNo_error'])) ? 'error' : ' ' ?>" value="<?php echo $data['contactNo']; ?>" />
                    <span class="error"><?php echo $data['contactNo_error']; ?></span>
                </div>

                <!-- end input field -->
                <div class="text-group">
                    <input name="password" type="password" placeholder="Password" class="
                    <?php echo (!empty($data['password_error'])) ? 'error' : ' ' ?>" />
                    <span class="error"><?php echo $data['password_error']; ?></span>
                </div>
                <a href="#">Forgot your password?</a>
                <button>Sign In</button>
            </form>
        </div>
        <!-- end signin container -->
        <!-- overlay-container -->
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please sign in to your account</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Get registered and start your journey with us</p>
                    <button class="ghost" id="signUp">Register</button>
                </div>
            </div>
        <!-- </div> -->
        <!-- overlay-container -->
        </div>
    </div>
    
        <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/login.js"></script>
    

</body>



</html>