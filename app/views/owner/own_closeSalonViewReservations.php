<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">


   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">Reservation List</h1>
      </div>
      <div class="header-right verticalCenter">


         <a href="<?php echo URLROOT ?>/OwnDashboard/closeSalon" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>

      </div>
   </header>
   <div class="content contentNewRes own ViewCustomer">


<div class="closeDateReservationDate">
   <h1> <?php echo $data[0]->date;?>  </h1>
</div>
   <!-- <?php echo $date;?> -->

<!-- <?php print_r ($data[0]); ?> -->
<br>
<div class="table-container">
   <div class="table2 table2-responsive">
      <table class="table2-hover">

         <thead>
            <tr>
               <th class="column-center-align col-1">Reservation ID</th>
               <th class="column-center-align col-2">Customer ID</th>
               <th class="column-center-align col-2">Start time</th>
               <th class="column-center-align col-3">End Time</th>
            </tr>
         </thead>

         <tbody>
         <?php foreach ($data as $reservationD) : ?>
            <tr>
                  <td class="column-center-align"><?php echo $reservationD->reservationID ;?></td>
                  <td class="column-center-align"><?php echo $reservationD->customerID  ;?></td>
                  <td class="column-center-align"><?php echo $reservationD->startTime ;?></td>
                  <td class="column-center-align"><?php echo $reservationD->endTime ;?></td>                  
            </tr>
            <?php endforeach; ?>

         </tbody>
      </table>
   </div>
</div>
</div>


<?php require APPROOT . "/views/inc/footer.php" ?>


