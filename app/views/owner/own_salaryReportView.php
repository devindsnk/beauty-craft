<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

    <!-- ########################################################################################################################### -->

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic"></h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/OwnDashboard/salaries" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">







        <div class="content own salaries">
            <div class="ownSalaryReportHeadings">
                <h1 class="ownSalaryReportHead2">Staff Member Salary Report</h1>
                <h3 class="ownSalaryReportHead3">Month-August</h3>
            </div>
            <!-- Staff member details starts  -->
            <div class="SalaryReportContainer">
                <div class="ownSalaryReportStaffMemberDetails">
                    <div class="ownSalaryReportDetailsHead">
                        <label class="ownSalaryReportStaffMemberDetailHeadLabel">Staff member details</label>
                    </div>
                    <div class="ownSalaryReportStaffMemberDetailsContent">

                        <label class="ownSalaryReportStaffMemberDetailsContentData">Name</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue">Devin Dissanayake</label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Staff Id</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue">R001</label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Type</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue">Service Provider</label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Contact Number</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue">0711234567</label>
                    </div>

                </div>
                <!-- Staff member details ends  -->

                <!-- Staff member details starts  -->
                <div class="ownSalaryReportBankDetails">
                    <div class="ownSalaryReportDetailsHead">
                        <label class="ownSalaryReportBankDetailsHeadLabel">Bank details</label>
                    </div>
                    <div class="ownSalaryReportBankDetailsContent">

                        <label class="ownSalaryReportBankDetailsContentData">Bank Account Number</label>
                        <label class="ownSalaryReportBankDetailsContentValue">6648236822</label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Bank Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue">Sampath</label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Branch Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue">Kottawa</label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Holders Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue">Devin</label>
                    </div>

                </div>
                <!-- Staff member details ends  -->

                <!-- Earning details starts  -->
                <div class="ownSalaryReportSalaryDetails">
                    <div class="ownSalaryReportDetailsHead">
                        <label class="ownSalaryReportSalaryDetailsHeadLabel">Salary Breakdown</label>
                    </div>

                    <div class="ownSalaryReportSalaryDetailsContent">
                        <label class="ownSalaryReportSalaryDetailsContentData">Basic Salary</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue">30000.00 LKR</label>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Service Commision</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue">20000.00 LKR</label>
                        <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportSalaryDetailsContentData">Addtional Leave Count</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue">4</label>
                        <br> <br>
                        <label class="ownSalaryReportDeductionsDetailsContentData">Leave Deduction</label>
                        <label class="ownSalaryReportDeductionsDetailsContentValue">-2500.00 LKR</label>
                        <br> <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportTotalSalaryContentData">Total Salary</label>
                        <label class="ownSalaryReportTotalSalaryContentValue">47500.00 LKR</label>
                        <br> <br>
                        <div class="ownSalaryReportTotalSalaryStatus">
                            <label class="ownSalaryReportTotalSalaryStatusLabel">Paid</label>
                        </div>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Paid Date</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue">28/08/2021</label>
                    </div>
                </div>
                <!---- Earning details starts  ---->

            </div>

        </div>



        <?php require APPROOT . "/views/inc/footer.php" ?>