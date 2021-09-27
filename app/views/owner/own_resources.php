<?php require "../header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Resources";
   require "./own_sidenav.php"
   ?>
   
   <?php
   $title = "Resources";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require "../headerBar.php"
   ?>
   
   <!--Content-->
   <div class="content">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Resources</button>
      <button class="btnOpen normal" type="button">Add Resources</button>
      <button class="btnOpen normal" type="button">Update Resources</button>
   </div>
      <div class="modal-container normal">
      <div class="modal-box" id= "ownResAddContainer">
               <h1 class="ownResAddHead">Add Resources</h1>
               <!-- main grid 1 starts -->
               <div class= "ownResAddDetails">
                  <div class="ownResAddDetail1">
                  <label class="ownResAddLabel1">Resource Name</label> <br>
                   <input type="text" class = "ownResAddLabeltext" placeholder ="--Type in--">
                   </div> 
                   <div class="ownResAddDetail2">
                  <label class="ownResAddLabel2">Quantity</label> <br>
                   <input type="text" class = "ownResAddLabeltext" placeholder ="--Type in--">
                   </div
>               </div>
                <!-- main grid 1 ends -->
                <!-- main grid 2 starts -->
            <div class="ownResAddButtons">
                <div class="ownResAddBtn1">
                    <button class="btn btnClose normal">Cancel</button>
                </div>
                <div class="ownResAddBtn2">
                    <button class="btn">Add</button>
                </div>
            </div>
            <!-- main grid 2 ends -->

        </div>
        <!-- main grid 2 ends -->

        
      </div>
      
   </div>
   <div class="modal-container full">
      <div class="modal-box">
         <h1>This is a full modal</h1>
         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam iste enim odit, nulla consequuntur corporis
            provident sint magni necessitatibus animi molestias quas eos perspiciatis doloribus porro? Fugit amet
            recusandae distinctio.</p>
         <button class="btn btnClose full">Save</button>

      </div>      
   </div>
   </div>
  
   <!--End Content-->


   <?php require "../footer.php" ?>