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
                        <button class="sidenavbttn selected">My Reservations</button>
                    </div>
                    <div class="sidenavbtn2">
                        <a href="<?php echo URLROOT ?>/Customer/profile">
                        <button class="sidenavbttn">Profile</button>
                        </a>
                    </div>
                    <div class="sidenavbtn3">
                        <a href="<?php echo URLROOT ?>/Customer/changePassword">
                        <button class="sidenavbttn ">Change Password</button>
                        </a>
                    </div>
                    
                </div>
                <div class="line"></div>
            </div>

        </div>
        <div class="container">
        Customer-My reservation
        </div>

    </div>
</body>
</html>