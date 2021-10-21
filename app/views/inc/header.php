<!DOCTYPE html>
<html>

<head>
   <!--Meta-->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale = 1.0" />

   <title>Beauty Craft</title>

   <!--Style Sheet-->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo URLROOT ?>/icons/logoWhiteBG.ico">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

   <!-- Common stylesheets -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sideNav.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/layoutTemplate1.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/layoutTemplate2.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table1Style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/table2Style.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/seperateTableStyle.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/modalStyle.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/icons.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/formStyle.css" />


   <!-- UserBasedStylesheets -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/sysAdmin.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/receptStyle.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/ownStyle.css" />


   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/mangOverviewAnalytics.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/mangService.css" />

   <!-- service provider style added by Ruwanthi -->
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/serviceprovider.css" />
   <link rel="stylesheet" href="<?php echo URLROOT ?>/public/css/StaffUser.css">
</head>

<?php
switch ($_SESSION['userType'])
{
   case 1:
      $username = "Pasindu Munasinghe";
      break;
   case 2:
      $username = "Ravindu Madhubhashana";
      break;
   default:
      $username = $_SESSION['username'];
      break;
}
$userType = ["System Admin", "Owner", "Manager", "Receptionist", "Service Provider", "Customer"][$_SESSION['userType'] - 1];
$userTypeNo = $_SESSION['userType'];
?>