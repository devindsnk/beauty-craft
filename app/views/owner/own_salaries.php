<?php require "../header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Salaries";
   require "./own_sidenav.php"
   ?>

   <?php
   $title = "Salaries";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require "../headerBar.php"
   ?>

   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="ownSalariesHeading">
         <label class="ownSalariesHead1">Beauty Craft</label> <br>
         <label class="ownSalariesHead2">Staff Member Salary Report</label> <br>
         <label class="ownSalariesHead3">Month</label>
      </div>
      <!-- Staff member details starts  -->
      <div class="ownSalariesStaffMemberDetails">
         <div class="ownSalariesStaffMemberDetailHead">
            <label class="ownSalariesStaffMemberDetailHeadLabel">Staff member details</label>
        </div>

        <div class="ownSalariesStaffMemberDetailsContent">
            <label >Name</label>
            <label >Devin Dissanayake</label>
            <br>
            <label >Staff Id</label>
            <label >R001</label>
            <br>
            <label >Type</label>
            <label >Service Provider</label>
            <br>
            <label >Contact Number</label>
            <label >0711234567</label>
        </div>

      </div>
      <!-- Staff member details ends  -->
      <!-- Earning details starts  -->
      <div class="ownSalariesEarningDetails">
         <div class="ownSalariesEarningDetailHead">
            <label class="ownSalariesEarningDetailHeadLabel">Earnings</label>
        </div>

        <div class="ownSalariesEarningDetailsContent">
            <label >Basic Salary</label>
            <label >30000.00</label>
            <br>
            <label >Service Commision</label>
            <label >20000.00</label>
        </div>

      </div>
      <!-- Earning details ends  -->
          <!-- Deductions  etails starts  -->
          <div class="ownSalariesDeductionsDetails">
         <div class="ownSalariesDeductionsDetailHead">
            <label class="ownSalariesDeductionsDetailHeadLabel">Deductions</label>
        </div>

        <div class="ownSalariesDeductionsDetailsContent">
            <label >Addtional Leave Count</label>
            <label >4</label>
            <br>
            <label ></label>
            <label >-2500.00</label>
        </div>

      </div>
      <!-- Deductions details ends  -->
      <!-- Sub Total  details starts  -->
           <div class="ownSalariesSubTotalDetails">
         <div class="ownSalariesSubTotalDetailHead">
            <label class="ownSalariesSubTotalDetailHeadLabel">Deductions</label>
        </div>

        <div class="ownSalariesSubTotalDetailsContent">
            <label >Total Salary(LKR)</label>
            <label >47500.00</label>
        </div>

      </div>
      <!-- Sub Total details ends  -->
      <!-- Paid details starts  -->
      <div class="ownSalariesPaidDetails">
         <div class="ownSalariesPaidDetailHead">
            <label class="ownSalariesPaidDetailHeadLabel">Deductions</label>
        </div>

        <div class="ownSalariesPaidDetailsContent">
            <label >Paid</label>
            <label >28/08/2021</label>
            <br>
            <label >Paid Ammount(LKR)</label>
            <label >47500.00</label>
        </div>
      </div>
      <!-- Sub Total details ends  -->


   </div>
   <!--End Content-->


   <?php require "../footer.php" ?>