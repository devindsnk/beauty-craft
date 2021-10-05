<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Rates";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Rates";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
<div class="content own rates">
    <h3>This is main option 1</h3>
    <!-- grid area 1  start-->
    <div class="ownRatesDate">
      <label class="ownRateMonthlabel">Month</label> <br>
      <input type="month">
    </div>
    <!-- grid area 1  ends-->
    <!-- grid area 2 starts -->
    <div class="ownRateGridArea2">
    <!-- Starts Leave Limits -->
    <div class="ownRatesLeaveLimitContainer">
    <div class="ownRatesLeaveLimit">
     
           <div class="ownRatesLeaveLimitHeadbar">
          <h1>Leave Limit</h1>
          </div>
          <div class="ownRatesLeaveLimitsDetails">
             <label class="ownRatesLeaveLimitsLabel">Receptionist </label>
             <input type="text" class="ownRatesLeaveLimitsText" placeholder="2"> <br>
             <label class="ownRatesLeaveLimitsLabel">Manager </label>
             <input type="text" class="ownRatesLeaveLimitsText" placeholder="2"> <br>
             <label class="ownRatesLeaveLimitsLabel">Service Provider </label>
             <input type="text" class="ownRatesLeaveLimitsText" placeholder="2">
          </div>
          
    </div>
    </div>
    <!-- Ends Leave Limits -->

     <!-- Starts Commision Rate -->
     <div class="ownRatesLeaveLimitContainer">
    <div class="ownRatesComissionRate">
    <div class="ownRatesCommisionRateHeadbar">
          <h1>Commision Rate</h1>
          </div>
          <div class="ownRatesCommisionRateDetails">
          <input type="text" class="ownRatesCommisionRateText" placeholder="2"> 
          </div>
    </div>
    </div>

     <!-- Ends Commision Rate -->

     <!-- StartS Minimum Managers -->
     <div class="ownRatesMinManagersContainer">
    <div class="ownRatesMinManagers">
    <div class="ownRatesMinManagersHeadbar">
          <h1>Minimum Number Of Managers</h1>
          </div>
          <div class="ownRatesMinManagersDetails">
          <input type="text" class="ownRatesMinManagersText" placeholder="2"> 
          </div>
    </div>
    </div>
    <!-- Ends Minimum Managers -->
    </div>
    <!-- grid area 2 ends -->
    <div class="ownRatesBasicSalaryContainer">
<!---- Starts Basic Salary ---->
<div class="ownRatesBasicSalary">
    <!-- basic salary heading starts -->
    <div class="ownRatesBasicSalaryHeadbar">
        <h1>Basic Salary(LKR)</h1>
    </div>
    <!-- basic salary heading ends -->
 
    <!-- basic salary content starts -->
    <div class="ownRatesBasicSalaryContent">
        <div class="ownRatesBasicSalary1">
            <div class="ownRatesBasicSalarylabel1">
                <label class="ownRatesBasicSalarylabel">Receptionist</label>
                <div class="ownRatesDotButton">
                    <button><img src="" alt=""></button>
                </div>
            </div>
            <div class="ownRatesBasicSalarytext1">
                <input type="text" class="ownRatesBasicSalaryText" placeholder="20000">
            </div>
        </div>
        <div class="ownRatesBasicSalary2">
            <div class="ownRatesBasicSalarylabel2">
                <label class="ownRatesBasicSalarylabel">Manager</label>
            </div>
            <div class="ownRatesBasicSalarytext2">
                <input type="text" class="ownRatesBasicSalaryText" placeholder="20000">
            </div>
        </div>
        <div class="ownRatesBasicSalary3">
            <div class="ownRatesBasicSalarylabel3">
                <label class="ownRatesBasicSalarylabel">Service Provider</label>
            </div>
            <div class="ownRatesBasicSalarytext3">
                <input type="text" class="ownRatesBasicSalaryText" placeholder="20000">
            </div>
        </div>
        <!-- basic salary content ends -->
    </div>
</div>
</div>

</div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>