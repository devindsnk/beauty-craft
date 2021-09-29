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
   <div class="content">
      <h3>This is main option 1</h3>
<!------------------------------------------ Temorary button starts ------------------------------------------------->


<div class="container">
      <button class="btnOpen normal" type="button">Check button</button>
   </div>


<!------------------------------------------ Temorary button starts ------------------------------------------------->



<!------------------------------------------------- Modal starts ----------------------------------------------------->
<div class="modal-container normal">
      <div class="modal-box " id="ownCloseSalonContainer">
     
         <h1 class="ownCloseSalonHead">Add New Date</h1>
         <!-- start main grid 1 -->
         
         <div class= "ownCloseSalonGrid1">
             <div class="ownCloseSalonDetail1">
             <label class = "ownCloseSalonLable">Close Date</label> 
             <input type="date" class="ownCloseSalonDate">
             </div>
             <div class="ownCloseSalonDetail2">
             <label class= "ownCloseSalonLable">Reason</label>
             <textarea id="ownCloseSalonTextArea" name="ownCloseSalonTextArea" rows="4" cols="50"  placeholder="Type the reason here"> </textarea>          
             </div>
            
         </div>
      
         <!-- main grid 1 ends -->

         <!-- main grid 2 starts -->
         <div class="ownCloseSalonGrid2">
         <div class="ownCloseSalonError">
                <label class="ownCloseSalonErrortext">Cannot proceed. Has upcoming reservations</label>
                <a href="#" class="ownCloseSalonErrorAnchortag"> <label class="ownCloseSalonErrorViewReservaions">View Reservaions</label></a>
         </div>
         <div class="ownCloseSalonRecallMessage">
               <span class="ownCloseSalonMessage">Recall requests will be sent if you proceed.</span>
         </div>
         </div>
         <!-- main grid 2 ends -->
         <!-- main grid 3 starts -->
         <div class="ownCloseSalonGrid3">
            <div class="ownRemStaffbtn1">
            <button class="btn btnClose normal">Cancel</button>
            </div>
            <div class="ownRemStaffbtn2">
            <button class="btn">Proceed</button>
            </div>
        </div>
        <!-- main grid 3 ends -->

       
      </div>
   </div>


<!-- ----------------------------------------------------------------------------------------------------------------------- -->
   </div>
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>