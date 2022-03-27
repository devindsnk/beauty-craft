<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
    <header class="full-header">
        <div class="header-center">
            <h1 class="header-topic">Edit Reservation</h1>
            <h3 class="header-subtopic reservationBox" data-resID="<?php echo $data["reservationID"]; ?>">R<?php echo $data["reservationID"]; ?></h3>
        </div>
        <div class="header-right verticalCenter">
            <a onclick="history.back()" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
        </div>
    </header>

    <div class="recept content newRes editRes">

        <div class="form">
            <div class="inner-container">

                <h3>Customer Details</h3>
                <div class="contentBox cust-container">
                    <div class="left-box cust-data">
                        <div class="profile-info">
                            <div class="img-container">
                                <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/customerImgs/<?php echo $data['imgPath']; ?>"></img>
                            </div>
                            <div class="text-container">
                                <label class="cust-name"><?php echo $data['customerName']; ?></label>
                                <label class="contact-no"><?php echo $data['customerMobileNo']; ?></label>
                            </div>
                        </div>
                    </div>
                </div>

                <h3>Reservation Details</h3>

                <div class="contentBox service-container">
                    <div class="top-container">
                        <div class="dropdown-group left-box service">
                            <label class="label" for="fName">Service</label>
                            <input type="text" disabled value="<?php echo $data['serviceName']; ?>" data-serviceID="<?php echo $data['serviceID']; ?>" class=" serviceSelect">
                        </div>

                        <div class="dropdown-group right-box duration">
                            <label class="label" for="fName">Duration</label>
                            <input type="text" disabled class="durationBox" value="<?php echo DateTimeExtended::minsToDuration($data['duration']); ?>" data-duration="<?php echo $data['duration']; ?>">
                        </div>

                        <div class="text-group left-box date">
                            <label class="label" for="fName">Customer Category</label>
                            <input type="text" disabled class="custCategoryBox" value="<?php echo $data['custCategory']; ?>">
                        </div>

                        <div class="dropdown-group right-box start-time">
                            <label class="label" for="fName">Price (LKR)</label>
                            <input type="text" disabled class="servicePriceBox" value="<?php echo $data['price']; ?>">
                        </div>


                        <div class="text-group left-box date">
                            <label class="label" for="fName">Date</label>
                            <input type="date" id="date_picker" name="date" value="<?php echo $data['date']; ?>" class="dateSelect">
                            <span class="error date-error"></span>
                            <span class="info-line">*A reservation can be placed upto maximum of two months ahead. </span>
                        </div>

                        <div class="dropdown-group right-box start-time">
                            <label class="label" for="lName">Time</label>
                            <select name="startTime" class="startTimeSelect">
                                <option value="" disabled>Select</option>
                                <?php for ($i = 9; $i <= 19; $i += 1) : ?>
                                    <?php for ($j = 0; $j <= 50; $j += 10) : ?>
                                        <option value="<?php echo $i * 60 + $j; ?>" class="font-numeric" <?php if (($i * 60 + $j) == $data['startTime']) echo " selected"; ?>>
                                            <?php
                                            if ($i < 12)
                                                echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " AM";
                                            else if ($i == 12)
                                                echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " PM";
                                            else
                                                echo str_pad($i - 12, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT) . " PM";
                                            ?>
                                        </option>
                                    <?php endfor; ?>
                                <?php endfor; ?>
                            </select>
                            <span class="error sTime-error"></span>
                        </div>







                        <div class="text-group ser-provider">
                            <label class="label" for="lName">Service Provider</label>
                            <select name="staffID" id="" class="serviceProviderSelect">
                                <option value="" selected disabled>Select service first</option>
                            </select>
                            <span class="error sProv-error"></span>
                        </div>
                    </div>

                    <div class="text-group last-group">
                        <label class="label" for="fName">Remarks</label>
                        <textarea name="remarks" id="" maxlength="200" class="remarks"></textarea>
                    </div>
                    <span class="error remarks-error"></span>
                </div>

                <button class="btn btn-filled btn-error-red editResBtnRecept">Edit Reservation</button>
            </div>
        </div>

        <script language="javascript">
            const datePicker = document.getElementById("date_picker");

            let today = new Date().toISOString().split('T')[0];
            let maxDate = new Date();
            month = new Date().getMonth();
            maxDate.setMonth(maxDate.getMonth() + 2);
            maxDate = maxDate.toISOString().split('T')[0];

            datePicker.setAttribute('min', today);
            datePicker.setAttribute('max', maxDate);
            datePicker.setAttribute('format', 'yyyy-MM-dd')
        </script>

        <script src="<?php echo URLROOT ?>/public/js/fetchRequests/editReservation.js"></script>

    </div>
    <?php require APPROOT . "/views/inc/footer.php" ?>
