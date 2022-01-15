<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Sales";
   require APPROOT . "/views/receptionist/recept_sideNav.php"
   ?>

   <?php
   $title = "Sales";
   $username = "Devin Dissanayake";
   $userLevel = "Receptionist";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content recept sales">
      <form class="form filter-options" action="">
         <div class="options-container">
            <div class="left-section">
               <div class="row">
                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Invoice Type</label>
                        <select id="iTypeSelector" onchange="initializeInvoiceStatusSelector()">
                           <option value="all" selected>All</option>
                           <option value="1" <?php echo ($data['selectedType'] == "1") ? "selected" : "" ?>>Payment</option>
                           <option value="0" <?php echo ($data['selectedType'] == "0") ? "selected" : "" ?>>Refund</option>
                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>

                  <div class="column">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Status</label>
                        <select id="statusSelector" disabled>
                           <option value="" selected>Select a specific Invoice Type</option>
                           <option value="all" selected>All</option>
                           <option value="0" <?php echo ($data['selectedState'] == "0") ? "selected" : "" ?>>Voided</option>
                           <option value="1" <?php echo ($data['selectedState'] == "1") ? "selected" : "" ?>>Unpaid</option>
                           <option value="2" <?php echo ($data['selectedState'] == "2") ? "selected" : "" ?>>Paid</option>
                           <option value="3" <?php echo ($data['selectedState'] == "3") ? "selected" : "" ?>>Voided</option>
                           <option value="4" <?php echo ($data['selectedState'] == "4") ? "selected" : "" ?>>Refunded</option>

                        </select>
                     </div>
                     <span class="error"> <?php echo " "; ?></span>
                  </div>
               </div>
            </div>
            <div class="right-section">
               <button type="button" id="salesFilterBtn" class="btn btn-filled btn-black">Search</button>
            </div>
         </div>

      </form>

      <div class="table-container">
         <div class="table2 table2-responsive">
            <table class="table2-hover">
               <thead>
                  <tr>
                     <th class="column-center-align col-1">Invoice No</th>
                     <th class="column-center-align col-2">Amount</th>
                     <th class="column-center-align col-3">Type</th>
                     <th class="column-center-align col-4">Date & Time</th>
                     <th class="column-center-align col-5">Status</th>
                     <th class="col-6"></th>
                  </tr>
               </thead>

               <tbody>

                  <?php foreach ($data['invoices'] as $invoice) : ?>
                     <!-- invoice type payment  -->
                     <?php if ($invoice->type == 1) :
                        $statusClassList = ["red", "yellow", "green"];
                        $statusValueList  = ["Voided", "Unpaid", "Paid"];
                        $statusClass = $statusClassList[$invoice->status];
                        $statusValue = $statusValueList[$invoice->status]; ?>
                        <tr>
                           <td data-lable="Invoice No" class="column-center-align font-numeric">Pay_<?php echo $invoice->paymentInvoiceNo ?></td>
                           <td data-lable="Amount" class="column-right-align font-numeric"><?php echo $invoice->amount ?> LKR</td>
                           <td data-lable="Type" class="column-center-align">Payment</td>
                           <td data-lable="Date" class="column-center-align"><?php echo DateTimeExtended::dateToShortMonthFormat($invoice->datetime, "F") ?></td>
                           <td data-lable="Status" class="column-center-align">
                              <button type="button" class="status-btn green text-uppercase <?php echo $statusClass ?>"><?php echo $statusValue ?></button>
                           </td>
                           <td class="column-center-align">
                              <span>
                                 <a href="<?php echo URLROOT . "/ReceptDashboard/invoiceView/" . $invoice->paymentInvoiceNo . "/" . $invoice->type ?>"><i class="ci-view-more table-icon"></i></a>
                              </span>
                           </td>
                        </tr>
                     <?php else :
                        $statusClassList = ["red", "yellow"];
                        $statusValueList  = ["Voided", "Refunded"];
                        $statusClass = $statusClassList[$invoice->status];
                        $statusValue = $statusValueList[$invoice->status]; ?>
                        <tr>
                           <td data-lable="Invoice No" class="column-center-align font-numeric">Ref_<?php echo $invoice->refundInvoiceNo ?></td>
                           <td data-lable="Amount" class="column-right-align font-numeric"><?php echo $invoice->amount ?> LKR</td>
                           <td data-lable="Type" class="column-center-align">Refund</td>
                           <td data-lable="Date" class="column-center-align">
                              <?php echo DateTimeExtended::dateToShortMonthFormat($invoice->datetime, "F") ?></td>
                           <td data-lable="Status" class="column-center-align">
                              <button type="button" class="status-btn green text-uppercase <?php echo $statusClass ?>"><?php echo $statusValue ?></button>
                           </td>
                           <td class="column-center-align">
                              <span>
                                 <a href="<?php echo URLROOT . "/ReceptDashboard/invoiceView/" . $invoice->refundInvoiceNo . "/" . $invoice->type ?>"><i class="ci-view-more table-icon"></i></a>
                              </span>
                           </td>
                        </tr>
                     <?php endif; ?>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
   <!--End Content-->
   <script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

   <?php require APPROOT . "/views/inc/footer.php" ?>
