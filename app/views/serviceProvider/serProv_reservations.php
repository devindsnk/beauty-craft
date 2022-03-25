<?php require APPROOT . "/views/inc/header.php" ?>



<body class="layout-template-1">

    <?php
    $selectedMain = "Reservations";
    require APPROOT . "/views/serviceProvider/serProv_sideNav.php"
    ?>

    <?php
    $title = "Reservations";

    require APPROOT . "/views/inc/headerBar.php"
    ?>

    <!--Content-->
    <div class="content serprov">
        <!--sub-container1-card 1-->

        <div class="container1-card">
            <form class="form filter-options" action="">
                <div class="options-container">
                    <div class="left-section">
                        <div class="row statusopt">
                            <div class="column">
                                <div class="text-group">
                                    <label class="label" for="fName">Date</label>
                                    <input type="date" name="" id="datePickerSPRes" value="<?php echo $data['rDate'] ?>" format="yyyy-MM-dd">
                                </div>
                                <span class="error"> <?php echo " "; ?></span>
                            </div>
                            <div class="column">
                                <div class="dropdown-group">
                                    <label class="label" for="lName">Service</label>
                                    <select id="serviceSelectorSPRes">
                                        <option value="all" selected>All</option>
                                        <?php foreach ($data['rServiceList'] as $reservationlist) : ?>
                                            <option value="<?php echo $reservationlist->serviceID ?>" <?php echo ($data["rService"] ==  $reservationlist->serviceID) ? "selected" : ""; ?>><?php echo $reservationlist->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <span class="error"> <?php echo " "; ?></span>
                            </div>
                            <div class="column">
                                <div class="dropdown-group">
                                    <label class="label" for="lName">Status</label>
                                    <select id="staffSelectorSPRes">

                                        <option value="all" selected>All</option>
                                        <option value='1' <?php echo ($data["rType"] == '1') ? "selected" : "" ?>>Not Confirmed</option>
                                        <option value='2' <?php echo ($data["rType"] == '2') ? "selected" : "" ?>>Confirmed</option>
                                        <option value='4' <?php echo ($data["rType"] == '4') ? "selected" : "" ?>>Completed</option>
                                        <option value='5' <?php echo ($data["rType"] == '5') ? "selected" : "" ?>>Recalled</option>
                                    </select>
                                </div>
                                <span class="error"> <?php echo " "; ?></span>
                            </div>



                        </div>
                    </div>
                    <div class="right-section" onclick="filterReservationsForSPOverview(this);">
                        <button type="button" class=" btn btn-filled btn-black ">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <!--End sub-container1-card  1-->
        <!--sub-container2-->

        <div class=" table-container resContainerTable">
            <div class="table2 table2-responsive">
                <table class="table2-hover" id="leaveReqTable">
                    <thead>
                        <tr>
                            <th class="column-center-align col-1">Reservation Date</th>
                            <th class="column-center-align col-2">Time</th>
                            <th class="column-center-align col-3">Service</th>
                            <th class="column-center-align col-4">Customer Name</th>
                            <th class="column-center-align col-4">Status</th>
                            <th class="column-center-align col-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['reservationData'] as $reservation) : ?>
                            <tr>
                                <td data-lable="Reservation Date" class="column-center-align"><?php echo DateTimeExtended::dateToShortMonthFormat($reservation->date, "F"); ?></td>
                                <td data-lable="Time" class="column-center-align"><?php echo DateTimeExtended::minsToTime($reservation->startTime) . " - " . DateTimeExtended::minsToTime($reservation->endTime); ?></td>
                                <td data-lable="Service" class="column-center-align">
                                    <?php echo $reservation->name; ?>
                                </td>
                                <!-- leave Approved=1 pending=0 rejected=2 -->
                                <td data-lable="Customer Name" class="column-center-align">
                                    <?php echo $reservation->fName . " " . $reservation->lName; ?>

                                </td>
                                <td data-lable="Status" class="column-center-align">
                                    <?php if ($reservation->status == 1) : ?>
                                        <div class="status-btn blue text-uppercase">
                                            <span>Not Confirmed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 2) : ?>
                                        <div class="status-btn green text-uppercase">
                                            <span>Confirmed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 3) : ?>
                                        <div class="status-btn grey text-uppercase">
                                            <span>No Show</span>
                                        </div>
                                    <?php elseif ($reservation->status == 4) : ?>
                                        <div class="status-btn grey text-uppercase">
                                            <span>Completed</span>
                                        </div>
                                    <?php elseif ($reservation->status == 5) : ?>
                                        <div class="status-btn yellow text-uppercase">
                                            <span>Recalled</span>
                                        </div>
                                    <?php elseif ($reservation->status == 0) : ?>
                                        <div class="status-btn red text-uppercase">
                                            <span>Cancelled</span>
                                        </div>

                                    <?php endif; ?>
                                </td>
                                <td data-lable="Action" class="column-center-align">
                                    <span>
                                        <button class="editicon btnViewLeave btnOpen btnResMoreInfo" data-id="<?php echo $reservation->reservationID; ?>"><a href="#" data-id=""><i class="ci-view-more table-icon" data-id=""></i></a></button>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>



        <!-- modal -->
        <div class="modal-container reservation-more-info">
            <div class="modal-box">
                <h1 class="header">Reservation Details</h1>
                <div class="modelcontent">
                    <div class="modaldetails">
                        <div class="modaldetails-name">
                            <span class="service"></span><br>
                            <span class="name cust"></span>
                        </div>
                        <div class="modaldetails-status green">
                            <div class="moredetails-confirm-status" id="resStatus">
                                <span class="spn-moredetails-confirm-status"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modaldatetime">
                        <div class="modaldatetime-time">
                            <span class="serviceTime"></span><br>
                            <span class="duration"></span>
                        </div>
                        <div class="modaldatetime-date">

                            <span class="month-day"></span><br>
                            <span class="year"></span>
                        </div>
                    </div>
                    <div class="Reservationnote-cust">
                        <div class="Reservationnote-name">
                            <span>Reservation Note</span>
                        </div>
                        <div class="Reservationnote-note">
                            <span class="Reservationnote"></span>
                        </div>
                    </div>
                    <div class="Reservationnote">
                        <div class="Reservationnote-name">
                            <span>Customer Note</span>
                        </div>
                        <div class="Reservationnote-note editable" contenteditable="true">
                            <textarea class="customerNoteSection" name="customerNote" value=""></textarea>
                        </div>
                    </div>
                    <div class="savechange">
                        <button value="saveChanges" onclick="editCustNote(this);">Save Changes</button>
                    </div>
                    <div class="modalbutton-more">
                        <div class="more-details-modalbtnsection">
                            <button class="btn modelbtnClose normal">Close</button>
                            <button class="btnOpen btnResRecall button proceedBtn " id="recallModelOpenBtn" value="recall" onclick="recallResrvation(this);">Recall</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal -->

        <div class="modal-container reservation-recall">

            <div class="modal-box addItems">
                <h1 class="recall-data-header"></h1>
                <form>
                    <div class="modaldetails">
                        <div class="modaldetails-name">
                            <span class="recall-service"></span><br>
                            <span class="recall-name"></span>
                        </div>
                        <div class="recall-modaldetails-status">
                            <div class="recall-moredetails-confirm-status" id="recallResStatus">
                                <span class="recall-spn-moredetails-confirm-status"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modelcontent">
                        <div class="modaldatetime">
                            <div class="modaldatetime-time">
                                <span class="recall-serviceTime"></span><br>
                                <span class="recall-duration"></span>
                            </div>
                            <div class="modaldatetime-date">

                                <span class="recall-month-day"></span><br>
                                <span class="recall-year"></span>
                            </div>
                        </div>
                        <div class="Reservationnote">
                            <div class="Reservationnote-name">
                                <span>Recall reason</span>
                            </div>
                            <div class="Reservationnote-note editable" contenteditable="true">

                                <textarea class="recall-reason recall-reason-section" name="recallReason" value="" id="recall-reason-section"></textarea>
                            </div>
                            <span class="recall error" id="recall-error-msg"> </span>
                        </div>
                        <div class="savechange">
                            <!-- <input type="text" name="selectedReservation" class="selectedReservation"> -->
                        </div>
                        <div class="modalbutton-more">
                            <div class="more-details-modalbtnsection">
                                <!-- <button class="btn  backBtn btnResMoreInfo" ">Back</button> -->
                                <button class="btn btnBack normal" value="close">Back</button>
                                <button class="btnOpen recall  proceedBtn btn btn-filled " id="recallRequestDeleteBtn" value="sendRecall" onclick="proceedRecall(this);">Delete</button>
                            </div>
                        </div>

                    </div>
                </form>
                <input type="text" name="selectedReservation" class="selectedReservation">


            </div>

        </div>
    </div>
    </div>
    <script>
        function day_of_week() {
            var weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

            var d = document.getElementById('date_input').valueAsDate;
            var n = d.getDay()
            document.getElementById("output").innerHTML = weekday[n];
        }
    </script>

    <!--End Content-->
    <script src="<?php echo URLROOT ?>/public/js/fetchRequests/reservationMoreview.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>