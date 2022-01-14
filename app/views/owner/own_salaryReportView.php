<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

    <!-- ########################################################################################################################### -->

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic"></h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/Salary/salaryTableView" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">

        <div class="content own salaries">
            <div class="ownSalaryReportHeadings">
                <h1 class="ownSalaryReportHead2">Staff Member Salary Report</h1>
                <h3 class="ownSalaryReportHead3">Month-August</h3>
            </div>
            <?php $staffD = $data['staffD'][0]; ?>
            <?php $bankD = $data['bankD'][0]; ?>
            <?php $salaryRateD = $data['salaryRateD'][0]; ?>
            <?php $leaveRateD = $data['leaveRateD'][0]; ?>
            <?php $commisionRateD = $data['commisionRateD'][0]; ?>
            <?php $StaffSalaryPaymentD = $data['StaffSalaryPaymentD']; ?>
            <?php print_r($StaffSalaryPaymentD); ?>
            <!-- Staff member details starts  -->
            <div class="SalaryReportContainer">
                <div class="ownSalaryReportStaffMemberDetails">
                    <div class="ownSalaryReportDetailsHead">
                        <label class="ownSalaryReportStaffMemberDetailHeadLabel">Staff member details</label>
                    </div>
                    <div class="ownSalaryReportStaffMemberDetailsContent">

                        <label class="ownSalaryReportStaffMemberDetailsContentData">Name</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue"><?php echo $staffD->fName; ?> <?php echo $staffD->lName; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Staff Id</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue"><?php echo $staffD->staffID; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Type</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue">
                            <?php if ($staffD->staffType == 3)
                            {
                                echo 'Manager';
                            }
                            elseif ($staffD->staffType == 4)
                            {
                                echo 'Receptionist';
                            }
                            elseif ($staffD->staffType == 5)
                            {
                                echo 'Service Provider';
                            } ?>
                        </label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Contact Number</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue"><?php echo $staffD->mobileNo; ?></label>
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
                        <label class="ownSalaryReportBankDetailsContentValue"><?php echo $bankD->accountNo; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Bank Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue"><?php echo $bankD->bankName; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Branch Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue"><?php echo $bankD->branchName; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportBankDetailsContentData">Holders Name</label>
                        <label class="ownSalaryReportBankDetailsContentValue"><?php echo $bankD->holdersName; ?></label>
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
                        <label class="ownSalaryReportSalaryDetailsContentValue">
                            <?php if ($staffD->staffType == 3)
                            {
                                echo $salaryRateD->managerSalaryRate;
                            }
                            elseif ($staffD->staffType == 4)
                            {
                                echo $salaryRateD->receptionistSalaryRate;
                            }
                            elseif ($staffD->staffType == 5)
                            {
                                echo $salaryRateD->serviceProviderSalaryRate;
                            } ?> LKR
                        </label>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Service Commision</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue">20000.00 LKR</label>
                        <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportSalaryDetailsContentData">Addtional Leave Count</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue"><?php echo $StaffSalaryPaymentD->additionalLeaveCount; ?>  </label>
                        <br> <br>
                        <label class="ownSalaryReportDeductionsDetailsContentData">Leave Deduction</label>
                        <label class="ownSalaryReportDeductionsDetailsContentValue">-<?php echo $StaffSalaryPaymentD->additionalLeaveCount*500; ?> LKR</label>
                        <br> <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportTotalSalaryContentData">Total Salary</label>
                        <label class="ownSalaryReportTotalSalaryContentValue"><?php echo $StaffSalaryPaymentD->amount; ?> LKR</label>
                        <br> <br>
                        <div class="ownSalaryReportTotalSalaryStatus">
                             
                        </div>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Paid Date</label>
                        <label class="ownSalaryReportSalaryDetailsContentValue"><?php echo $StaffSalaryPaymentD->paidDate; ?> </label>
                    </div>
                </div>
                <!---- Earning details starts  ---->

            </div>

        </div>



        <?php require APPROOT . "/views/inc/footer.php" ?>