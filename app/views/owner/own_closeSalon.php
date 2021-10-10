<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Close Salon";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>

   <?php
   $title = "Close Salon";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content own close-salon">
      <!------------------------------------------ Temorary button starts ------------------------------------------------->


      <div class="container">
         <button class="btnOpen normal" type="button">Check button</button>
      </div>


      <!------------------------------------------ Temorary button starts ------------------------------------------------->



      <!------------------------------------------------- Modal starts ----------------------------------------------------->
   <div class="modal-container normal">
    <div class="modal-box addItems">
       <h1 class="addItemsModalHead">Close Salon</h1>
       <!-- start main grid 1 -->

       <div class="addItemsModalGrid1">
          <div class="addItemsModalDetail1">
             <label class="addItemsModalLable">Date</label> <br>
             <input type="date" class="addItemsModalDate">
          </div>
          <div class="addItemsModalDetail2">
             <label class="addItemsModalLable">Reason</label>
             <textarea class="addItemsModalTextArea" name="addItemsModalTextArea" rows="4" cols="50"
                placeholder="Type the reason here"> </textarea>
          </div>
       </div>

       <!-- main grid 1 ends -->

       <!-- main grid 2 starts -->
       <div class="addItemsModalGrid2">
          <div class="addItemsModalError">
             <label class="addItemsModalErrortext">Cannot proceed. Has upcoming reservations</label>
             <a href="#" class="addItemsModalErrorAnchortag"> <label class="addItemsModalErrorLable">View
                   Reservaions</label></a>
          </div>
          <div class="addItemsModalRecallMessage">
             <span class="addItemsModalMessage">Recall requests will be sent if you proceed.</span>
          </div>
       </div>
       <!-- main grid 2 ends -->
       <!-- main grid 3 starts -->
       <div class="ownCloseSalonGrid3">
          <div class="ownCloseSalonbtn1">
             <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
          </div>
          <div class="ownCloseSalonbtn2">
             <button class="btn ModalGreenButton ModalButton">Proceed</button>
          </div>
       </div>
       <!-- main grid 3 ends -->
    </div>
 </div>
      <!-- ----------------------------------------------------------------------------------------------------------------------- -->
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>