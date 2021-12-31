<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
    <header class="full-header">
        <div class="header-center">
            <h1 class="header-topic">Invoice Details</h1>
        </div>
        <div class="header-right verticalCenter">
            <span class="top-right-closeBtn" onclick="history.back()">
                <i class=" fal fa-times fa-2x "></i>
            </span>
        </div>
    </header>

    <div class="recept content invoiceView">
        <div class="innerContainer">

            <h3>Invoice Details</h3>
            <div class="contentBox invoiceDetails">

                <div class="sub-res-container">
                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label for="">Invoice No</label>
                                <p>
                                    <?php
                                    if ($data->type == 0)
                                        echo "Ref_" . $data->refundInvoiceNo;
                                    else
                                        echo "Pay_" . $data->paymentInvoiceNo;
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label for="">Amount</label>
                                <p><?php echo $data->amount ?></p>
                            </div>
                        </div>
                        <div class="column invoice-status">
                            <?php
                            $statusClassList = [["status-error-red", "status-warning-yellow"], ["status-error-red", "status-warning-yellow", "status-success-green"]];
                            $statusValueList  = [["Voided", "Refunded"], ["Voided", "Unpaid", "Paid"]];
                            $statusClass = $statusClassList[$data->type][$data->status];
                            $statusValue = $statusValueList[$data->type][$data->status];
                            ?>
                            <span class="status-tag invoice-status <?php echo $statusClass ?>"><?php echo $statusValue ?></span>

                        </div>
                    </div>


                </div>
                <hr class="separator">

                <div class="summary">
                    <?php if ($data->type == 0) : ?>
                        <!-- displaying refund basic data  -->
                        <span>Refund Created by</span>
                        <span class="highlighted"> <?php echo $data->refRecept ?></span><br>
                        <span>on </span> <span class="highlighted">24th Aug 2021 <?php echo $data->refDateTime ?> </span>
                        <span>at </span> <span class="highlighted">11:23 AM <?php echo $data->refDateTime ?></span><br>
                        <span>for the payment invoice </span> <span class="highlighted">Pay_<?php echo $data->paymentInvoiceNo ?></span>
                    <?php else : ?>
                        <!-- displaying payment basic data  -->
                        <span>Payment received by</span>
                        <span class="highlighted"> <?php echo $data->refRecept ?></span><br>
                        <span>on </span> <span class="highlighted">24th Aug 2021 <?php echo $data->payDateTime ?> </span>
                        <span>at </span> <span class="highlighted">11:23 AM <?php echo $data->payDateTime ?></span>
                    <?php endif; ?>
                </div>

                <!-- if a payment invoice and later refunded  -->
                <?php if ($data->type == 1 && !is_null($data->refundInvoiceNo)) : ?>
                    <hr class="separator">

                    <div class="summary">
                        <span>Refund Created by</span>
                        <span class="highlighted"> <?php echo $data->refRecept ?></span><br>
                        <span>on </span> <span class="highlighted">24th Aug 2021 <?php echo $data->refDateTime ?> </span>
                        <span>at </span> <span class="highlighted">11:23 AM <?php echo $data->refDateTime ?></span><br>
                    </div>
                <?php endif; ?>

                <!-- if invoice is voided  -->
                <?php if ($data->status == 0) : ?>
                    <hr class="separator">

                    <div class="summary">
                        <!-- and its a refund invoice  -->
                        <?php if ($data->type == 0) : ?>
                            <span>Refund Cancelled by</span>
                            <span class="highlighted"> Store name and get it here</span><br>
                            <span>on </span> <span class="highlighted">(Date) <?php echo $data->voidDateTime ?> </span>
                            <span>at </span> <span class="highlighted">(Time) <?php echo $data->voidDateTime ?></span>

                            <!-- its a payment invoice  -->
                        <?php else : ?>
                            <span>Payment Cancelled by</span>
                            <span class="highlighted"> Store name and get it here</span><br>
                            <span>on </span> <span class="highlighted">(Date) <?php echo $data->voidDateTime ?> </span>
                            <span>at </span> <span class="highlighted">(Time) <?php echo $data->voidDateTime ?></span>
                        <?php endif; ?>
                    </div>

                <?php endif; ?>

            </div>

            <h3>Reservation Details</h3>
            <div class="contentBox resDetails">
                <div class="sub-res-container">
                    <div class="row">
                        <div class="column">
                            <div class="text-group">
                                <label for="">Reservation ID</label>
                                <p>R<?php echo $data->reservationID ?></p>
                            </div>
                        </div>
                        <div class="column">
                            <div class="text-group">
                                <label for="">Date & TIme</label>
                                <p><?php echo $data->resDate . " " . $data->resTime; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-group">
                            <label for="">Service</label>
                            <p><?php echo $data->name; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text-group">
                            <label for="">Service Provider</label>
                            <p><?php echo $data->staffFName . " " . $data->staffLName; ?></p>
                        </div>
                    </div>


                </div>

            </div>
            <div class="btn-container">

                <?php if ($data->type == 1) : ?>
                    <?php $btnStatus = ($data->status == 0 || !is_null($data->refundInvoiceNo)) ? "disabled" : ""; ?>
                    <button class="btn btn-outlined btn-error-red btnRefundInv" <?php echo $btnStatus; ?> data-id="<?php echo $data->paymentInvoiceNo;  ?>">Refund</button>
                    <button class="btn btn-filled btn-error-red btnVoidPayInv" <?php echo $btnStatus; ?> data-id="<?php echo $data->paymentInvoiceNo;  ?>">Void</button>
                <?php else : ?>
                    <?php $btnStatus = ($data->status == 0) ? "disabled" : ""; ?>
                    <button class="btn btn-filled btn-error-red btnVoidRefInv" <?php echo $btnStatus; ?> data-id="<?php echo $data->refundInvoiceNo;  ?>">Void</button>
                <?php endif; ?>
            </div>
        </div>

    </div>

    <!-- Refund invoice modal -->
    <div class="modal-container refund-invoice">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Refund Payment</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to refund the payment?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="refundPayment(this);">Yes, Refund</button>
            </div>
        </div>
    </div>
    <!-- End of Refund invoice  modal -->

    <!-- Void payment modal -->
    <div class="modal-container void-payInvoice">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Void Payment Invoice</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to cancel the payment?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="voidPayInvoice(this);">Yes, Void</button>
            </div>
        </div>
    </div>
    <!-- End of Void payment modal -->

    <!-- Void Refund modal -->
    <div class="modal-container void-refInvoice">
        <div class="modal-box size-confirmation">
            <div class="confirm-model-head">
                <h1>Void Refund Invoice</h1>
            </div>
            <div class="confirm-model-head">
                <p>Are you sure you want to cancel the payment?</p>
            </div>
            <div class="confirm-model-head">
                <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                <button class="btn normal ModalButton ModalRedButton proceedBtn" onclick="voidRefInvoice(this);">Yes, Void</button>
            </div>
        </div>
    </div>
    <!-- End of Void Refund modal -->

    <script src="<?php echo URLROOT ?>/public/js/fetchRequests/salesOperations.js"></script>
    <?php require APPROOT . "/views/inc/footer.php" ?>