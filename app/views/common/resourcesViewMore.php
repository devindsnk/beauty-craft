<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">


   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">Purchase Details</h1>
      </div>
      <div class="header-right verticalCenter">
         <!-- you have to specify the user roll ?????????????????????????????????????????????????????????????????????????? -->


         <a href="
         <?php
         echo URLROOT;
         if ($userTypeNo == 2) echo "/OwnDashboard/resources";
         elseif ($userTypeNo == 3) echo "/MangDashboard/resources";
         elseif ($userTypeNo == 4) echo "/ReceptDashboard/resources";
         ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>

      </div>
   </header>
   <div class="content contentNewRes own ViewCustomer">





<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Manifacturer</label>
                  <input type="text" name="" id="fName" placeholder="Resource name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Purchase ID</label>
                  <input type="text" name="" id="fName" placeholder="Resource ID here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
         </div>
      </div>
      <div class="right-section">
         <a href="" class="btn btn-filled btn-black">Search</a>
         <!-- <button class="btn btn-search">Search</button> -->
      </div>
   </div>
</form>

<div class="table-container">
   <div class="table2 table2-responsive">
      <table class="table2-hover">

         <thead>
            <tr>
               <th class="column-center-align col-1">Purchase ID</th>
               <th class="column-center-align col-2">Manufacturer Name</th>
               <th class="column-center-align col-2">Model No</th>
               <th class="column-center-align col-3">Quantity</th>
               <th class="col-7"></th>
            </tr>
         </thead>

         <tbody>
            <tr>
                  <td class="column-center-align">bla bla</td>
                  <td class="column-center-align">bla bla</td>
                  <td class="column-center-align">bla bla</td>
                  <td class="column-center-align">bla bla</td>                  
                  <td data-lable="Action" class="column-center-align">
                     <span>
                        <!-- <?php if ($userType == "Owner") : ?> -->
                           <a href="#"><i class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                           <a href="#"><i class="ci-trash table-icon btnRemoveResource img-gap"></i></a>
                        <!-- <?php endif; ?> -->
                     </span>
                  </td>
            </tr>

         </tbody>
      </table>
   </div>
</div>
</div>


<?php require APPROOT . "/views/inc/footer.php" ?>


