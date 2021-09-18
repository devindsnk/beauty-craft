<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="../../public/css/login.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <title>slider sign in/sign up form</title>
</head>

<body>
    <div class="container" id="container">
        <!-- signup container -->
        <div class="form-container sign-up-container">
            <form action="#">
                <h1 class="topic">CreateAccount</h1>
                <div class="formwrapper">
                    <!-- name -->
                    <div class="formGroup">
                        <label class="labels ">Name </label> <br />
                        <input type="text" class="textinput" name="text" placeholder="First Name" />
                    </div>

                    <div class="formGroup">
                        <label class="labels "></label> <br />
                        <input type="text" class="textinput" name="text" placeholder="Last Name" />
                    </div>
                </div>
                    
                    <!-- form radio Button -->
                <label class="labels" >Gender</label>
                <div class="formGroup">
                    <div class="radiobutton">
                        <label class="option">Male
                            <input type="radio" checked="checked" name="radio">
                            <span class="checkmark"></span>
                        </label>
                        <label class="option">Female
                            <input type="radio" name="radio">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
            

                <div class="formwrapper">
                    <!-- contact number -->
                        <div class="formGroup">
                            <label class="labels ">Mobile Number </label> <br />
                            <input type="text" class="textinput" name="text" placeholder="+94 " />
                        </div>
                        <div class="formGroup">
                            <label class="labels ">Verification code </label> <br />
                            <input type="text" class="textinput" name="text" placeholder="_  _  _  _ " />
                        </div>
                        <div class="codesend">
                            <div class="formGroup">
                                <input class="send-code" type="submit" value="Send code" />
                            </div>
                            <div class="message">
                                <label class="msg">Verification code will be sent to your mobile number</label>
                            </div>
                        </div>
                        <div class="formGroup">
                            <label class="labels">Password </label> <br />
                            <input type="password" name="password" class="passwordinput" placeholder="Password" />
                        </div>
                        <div class="formGroup">
                            <label class="labels">Password </label> <br />
                            <input type="password" name="password" class="passwordinput" placeholder="Password" />
                        </div>

                </div>
                <button class="signupbutton">Sign Up</button>
                    <!-- end create Account -->
            </form>
        </div>
        <!-- end signup container -->
        <!-- signin container -->
        <div class="form-container sign-in-container">
                <form action="#">
                    <h1>Sign in</h1>
                    <!-- input field -->
                        <input id="user name" class="username" type="text" placeholder="Name">
                   <!-- end input field -->
                        <input type="password" placeholder="Password" />
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
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
        </div>
        <!-- overlay-container -->
    </div>
        <script type="text/javascript" src="../../public/js/login.js"></script>
</body>

<footer>
</footer>
</body>

</html> 