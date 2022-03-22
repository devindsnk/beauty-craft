<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-2">

    <!-- ########################################################################################################################### -->

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic"></h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/Salary/salaryTableView" class="top-right-closeBtn"><i
                    class="fal fa-times fa-2x "></i></a>
        </div>
    </header>
    <div class="content contentNewRes">
        <div class="content own salaries">
            <div class="ownSalaryReportHeadings">
                <h1 class="ownSalaryReportHead2">Staff Member Salary Report</h1>
                <h3 class="ownSalaryReportHead3">
                    <?php echo date('F', strtotime($data['StaffSalaryPaymentD']->month)); echo ' ' . date('Y', strtotime($data['StaffSalaryPaymentD']->month));?>
                </h3>
            </div>
            <?php $staffD = $data['staffD'][0]; ?>
            <?php $bankD = $data['bankD'][0]; ?>
            <?php $salaryRateD = $data['salaryRateD'][0]; ?>
            <?php $leaveRateD = $data['leaveRateD'][0]; ?>
            <?php $commisionRateD = $data['commisionRateD'][0]; ?>
            <?php $StaffSalaryPaymentD = $data['StaffSalaryPaymentD'];  ?>
            <!-- Staff member details starts  -->
            <div class="SalaryReportContainer">
                <div class="ownSalaryReportStaffMemberDetails">
                    <div class="ownSalaryReportDetailsHead">
                        <label class="ownSalaryReportStaffMemberDetailHeadLabel">Staff member details</label>
                    </div>
                    <div class="ownSalaryReportStaffMemberDetailsContent">

                        <label class="ownSalaryReportStaffMemberDetailsContentData">Name</label>
                        <label class="ownSalaryReportStaffMemberDetailsContentValue"><?php echo $staffD->fName; ?>
                            <?php echo $staffD->lName; ?></label>
                        <br> <br>
                        <label class="ownSalaryReportStaffMemberDetailsContentData">Staff Id</label>
                        <label
                            class="ownSalaryReportStaffMemberDetailsContentValue">SM<?php echo $staffD->staffID; ?></label>
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
                        <label
                            class="ownSalaryReportStaffMemberDetailsContentValue"><?php echo $staffD->mobileNo; ?></label>
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
                                echo number_format($salaryRateD->managerSalaryRate , 2, '.', ' ') ;
                            }
                            elseif ($staffD->staffType == 4)
                            {
                                echo number_format($salaryRateD->receptionistSalaryRate , 2, '.', ' ') ;
                                                        }
                            elseif ($staffD->staffType == 5)
                            {
                                echo number_format($salaryRateD->serviceProviderSalaryRate , 2, '.', ' '); 
                            } ?> LKR
                        </label>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Service Commision</label>
                        <label
                            class="ownSalaryReportSalaryDetailsContentValue"><?php echo ($staffD->staffType!=5)?"N/A":number_format($StaffSalaryPaymentD->servProCommission , 2, '.', ' '); ?> LKR</label>
                        <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportSalaryDetailsContentData">Addtional Leave Count</label>
                        <label
                            class="ownSalaryReportSalaryDetailsContentValue"><?php echo $StaffSalaryPaymentD->additionalLeaveCount; ?>
                        </label>
                        <br> <br>
                        <label class="ownSalaryReportDeductionsDetailsContentData">Leave Deduction</label>
                        <label
                            class="ownSalaryReportDeductionsDetailsContentValue">-<?php echo number_format($StaffSalaryPaymentD->additionalLeaveCount*250 , 2, '.', ' ') ?>
                            LKR</label>
                        <br> <br>
                        <div class="ownAddstaffLineContainer">
                            <div class="ownAddstaffLines">
                            </div>
                        </div>
                        <label class="ownSalaryReportTotalSalaryContentData">Total Salary</label>
                        <label
                            class="ownSalaryReportTotalSalaryContentValue"><?php echo number_format($StaffSalaryPaymentD->amount , 2, '.', ' ') ?>
                            LKR</label>
                        <br> <br>
                        <?php if ($StaffSalaryPaymentD->status == 1): ?>
                        <div class="ownSalaryReportTotalSalaryStatusGreen">
                            <label for="" class="ownSalaryReportTotalSalaryStatusLabelGreen">Paid</label>
                        </div>
                        <?php elseif ($StaffSalaryPaymentD->status == 0): ?>
                        <div class="ownSalaryReportTotalSalaryStatusRed">
                            <label for="" class="ownSalaryReportTotalSalaryStatusLabelRed">Not Paid</label>
                        </div>
                        <?php endif ?>
                        <br> <br>
                        <label class="ownSalaryReportSalaryDetailsContentData">Paid Date</label>
                        <label
                            class="ownSalaryReportSalaryDetailsContentValue"><?php echo ($StaffSalaryPaymentD->paidDate=="0000-00-00")? "N/A":DateTimeExtended::dateToShortMonthFormat($StaffSalaryPaymentD->paidDate, "F");; ?>  
                        </label>
                    </div>
                </div>
                <!---- Earning details starts  ---->

            </div>

        </div>

    </div>



    <?php require APPROOT . "/views/inc/footer.php" ?>