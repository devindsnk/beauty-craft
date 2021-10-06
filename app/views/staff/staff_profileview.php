<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beauty Craft</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/StaffUser.css">
    <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/modalStyle.css"/>
</head>
<body>
    <div class="profileviewh1">
    <h1 class="profileviewh1">View Profile</h1>
    <div class="profilecontent">
<div class="basicinfo">
   <div class="item1">
       <img class="item1img" src="<?php echo URLROOT ?>/public/imgs/person1.jpg"></img>
   </div>
    <div class="item2">
        <span class="item2name">Ruwanthi Munasinghe</span>
        <span class="item2type">Service Provider</span>
    </div>
    <div class="item3">
        <span class="rate">4.5</span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
    </div>
    <div class="item4">
        <div class="item4status">Active</div>
    </div>
    <div class="item5">
        <span class="item5staffid">Staff ID</span>
        <span class="item5id">E00023</span>
    </div>
    <div class="item6">
        <span class="item6empdate">Employement Date</span>
        <span class="item6date">2021.05.08</span>
    </div>
    <div class="item7">
        <button class="btnOpen normal changepw">Change Password</button>
    </div>
</div>
<div class="contactinfo">
    <div class="contactinfo1">
    <div class="listitem1">
        <div class="listitemleft">Mobile Number</div>
        <div class="listitemright">07123456789</div>
    </div>
    <div class="listitem2">
        <div class="listitemleft">NIC Number</div>
        <div class="listitemright">123456789V</div>
    </div>
    <div class="listitem3">
        <div class="listitemleft">Date of Birth</div>
        <div class="listitemright">2002.01.01</div>
    </div>
    <div class="listitem4">
        <div class="listitemleft">Gender</div>
        <div class="listitemright">Female</div>
    </div>
    <div class="listitem5">
        <div class="listitemleft">E-mail </div>
        <div class="listitemright">abc@gmail.com</div>
    </div>
    <div class="listitem6">
        <div class="listitemleft add">Address<br></div>
        <div class="listitemright">255A,Galle Road <br> Dehiwala.</div>
    </div>
    </div>
    <div class="contactinfo2">
        <div class="infoitem">
        <div class="infoitemleft">Account number</div>
        <div class="infoitemright">0000146984435</div>
        </div>
        <div class="infoitem">
            <div class="infoitemleft">Account Holder</div>
        <div class="infoitemright">H. D. R. M. Munasinghe</div>
        </div>
        <div class="infoitem">
            <div class="infoitemleft">Bank Name</div>
        <div class="infoitemright">People’s Bank</div>
        </div>
        
    </div>
 
    
</div>
    </div>
    <div class="profilecontent">
    <div class="reservationlist">
                <span class="assignservices">Assigned Services</span>
                <span class="servicelist">Childrens hair cut</span>
                <span class="servicelist">Men’s hair colorl</span>
                <span class="servicelist">Men’s hair  conditioning treatment</span>
    </div>
    </div>

        <div class="modal-container normal">
        <div class="modal-box">
            <h1>Change Password</h1>
            <div class="pwditem1">
                <div class="pwditemleft">
                   <span>Current Password</span> 
                   <input class="changepwd" type="password" placeholder="Current password" name="cpw" required>
                </div>
                <div class="pwditemright"></div>
        </div>
            <div class="pwditem1">
                <div class="pwditemleft">
                   <span>New Password</span> 
                   <input class="changepwd" type="password" placeholder="New password" name="cpw" required>
                </div>
                <div class="pwditemright">
                   <span>Confirm Password</span> 
                   <input class="changepwd" type="password" placeholder="Confirm password" name="cpw" required>                    
                </div>
            </div>
            <div class="pwditem1">
            
            <button class="btn btnClose normal">Close </button>
            <button class="btnOpen new" type="button">Save Password</button>
            </div>
        </div>
        </div>
    
    <script type="text/javascript" src="<?php echo URLROOT ?>/public/js/modals.js"></script>
</body>
</html>