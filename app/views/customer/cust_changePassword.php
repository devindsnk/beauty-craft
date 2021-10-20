<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
     <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
     <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/customer.css" />
</head>
<body>
    <div class="content">
                <div class="sidebar">
            <div class="sidebarcontent">
                <div class="list">
                    <div class="sidenavbtn1">
                        <a href="<?php echo URLROOT ?>/Customer/myReservation">
                        <button class="sidenavbttn">My Reservations</button>
                        </a>
                    </div>
                    <div class="sidenavbtn2">
                        <a href="<?php echo URLROOT ?>/Customer/profile">
                        <button class="sidenavbttn">Profile</button>
                        </a>
                    </div>
                    <div class="sidenavbtn3">
                        <button class="sidenavbttn selected">Change Password</button>
                    </div>
                    
                </div>
                <div class="line"></div>
            </div>

        </div>
        <div class="container">
            <div class="item item6">
                <div class="profname">
                    <label class="proflabel">Current Password </label> <br />
                      <div class="passwordinputlabel">
                    <input type="password" name="password" class="passwordinput pwd2" placeholder="Current Password" />
                    </div>
                </div>
            </div>
            <div class="item item7">
                <div class="profname">
                    <label class="proflabel">New Password </label> <br />
                    <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput1" placeholder="Password" />
                    </div>
                </div>
                <div class="profname">
                    <label class="proflabel">Verify New Password </label> <br />
                     <div class="passwordinput">
                    <input type="password" name="password" class="passwordinput1" placeholder="Verify Password" />
                    </div>
                </div>

            </div>
            <div class="item item5">
                <div class="savebutton">
                <button>Save</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>