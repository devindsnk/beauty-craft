<?php require APPROOT . "/views/inc/header.php" ?>

<body class="ownViewStaffBody layout-template-2">


   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">Customer Details</h1>
      </div>
      <div class="header-right verticalCenter">
         <!-- you have to specify the user roll ?????????????????????????????????????????????????????????????????????????? -->


         <a href="
         <?php
         echo URLROOT;
         if ($userTypeNo == 2) echo "/OwnDashboard/customers";
         elseif ($userTypeNo == 3) echo "/MangDashboard/customers";
         elseif ($userTypeNo == 4) echo "/ReceptDashboard/customers";
         ?>" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>

      </div>
   </header>
   <div class="content contentNewRes own ViewCustomer">

<?php $cusD = $data['cusDetails'];
      $cusCancelledResC =  $data['cancelledResCount'];
      $cusAllResC = $data['allResCount'];
print_r($cusD[0]);
print_r($cusCancelledResC);
print_r($cusAllResC);
?>
      <div class="Cards">
         <!----------------------------------------------------- Profile details starts --------------------------------->
         <div class="Card1 contentBox ">
            <div class="ProfileGrid">
               <div class="ProfileDetailsImg">
                  <img src="<?php echo URLROOT ?>/public//imgs/img_avatar.png" alt="Avatar" class="ProfileDetailsImgCircle">
               </div>
               <div class="ProfileDetailsInfo">
                  <span class="ProfileDetailsName"><?php echo ($cusD[0]->fName) ?> <?php echo ($cusD[0]->lName) ?></span> <br>
                  <span class="ProfileDetailsStaffId">Customer ID : <?php echo ($cusD[0]->customerID) ?></span>
               </div>
            </div>
         </div>

         <!--------------------------------- Basic Info Details Card starts ---------------------------------------------->


         <div class="Card2 contentBox ">
            <!-- Basic Info Details Head  -->
            <div class="CardHead">
               <h3 class="HeadLabel">Basic Info</h3>
            </div>
            <!-- Basic Info Details  -->

            <!-- section break line starts -->
            <!-- <div class="ownAddstaffLineContainer">
                  <div class="ownAddstaffLines">
                  </div>
               </div> -->
            <hr id="sectionBreackLine">
            <!-- section break line endss -->

            <div class="Card1Details">


               <div class="Cardrow">

                  <div class="fCardcolumn">
                     <label class="CardDetailsLabel">
                        First Name
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                     <?php echo ($cusD[0]->fName) ?>
                     </span>
                  </div>
               </div>


               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Last Name
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                     <?php echo ($cusD[0]->lName) ?>
                     </span>
                  </div>
               </div>


               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Gender
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                     <?php if($cusD[0]->gender=='M')
                     echo ('Male');
                     elseif($cusD[0]->gender=='F')
                     echo ('Female'); ?>
                     </span>
                  </div>
               </div>

               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Joined Date
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                      <?php echo ($cusD[0]->registeredDate) ?>
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <!--------------------------------- Basic Info Details Card ends ---------------------------------------------->


         <!--------------------------------- Contact Details Card starts ---------------------------------------------->


         <div class="Card3 contentBox ">
            <!-- Contact Details Head  -->
            <div class="CardHead">
               <h3 class="HeadLabel">Reservations Summary</h3>
            </div>
            <!-- Contact Details  -->

            <!-- section break line starts -->
            <hr class="sectionBreackLine">
            <!-- section break line endss -->

            <div class="Card2Details">

               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Total Reservations
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                     <?php echo $cusAllResC ?>
                     </span>
                  </div>
               </div>

               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Total Sales
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                        25,350.00 LKR
                     </span>
                  </div>
               </div>

               <div class="Cardrow">

                  <div class="Cardcolumn">
                     <label class="CardDetailsLabel">
                        Cancelled
                     </label>
                  </div>
                  <div class="Cardcolumn">
                     <span class="CardDetailsValue">
                     <?php echo $cusCancelledResC ?>
                     </span>
                  </div>
               </div>

            </div>

         </div>
         <!--------------------------------- Contact Details Card ends ---------------------------------------------->

      </div>




      <?php require APPROOT . "/views/inc/footer.php" ?>