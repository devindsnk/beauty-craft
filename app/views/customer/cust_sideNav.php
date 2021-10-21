<div class="sidebar">
   <div class="sidebarcontent">
      <div class="list">
         <a href="<?php echo URLROOT ?>/custDashboard/myReservations" class="sidenavbtn option <?php if ($selectedOption == "myReservations") echo "selected"; ?>">
            My Reservations
         </a>
         <a href="<?php echo URLROOT ?>/custDashboard/profileSettings" class="sidenavbtn <?php if ($selectedOption == "profileSettings") echo "selected"; ?>">
            Profile Settings
         </a>
         <a href="<?php echo URLROOT ?>/Customer/changePassword" class="sidenavbtn option <?php if ($selectedOption == "changePassword") echo "selected"; ?>">
            Change Password
         </a>

      </div>
      <div class="line"></div>
   </div>
</div>