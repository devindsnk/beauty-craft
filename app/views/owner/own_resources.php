<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
   <?php
   $selectedMain = "Resources";
   require APPROOT . "/views/owner/own_sidenav.php"
   ?>
   
   <?php
   $title = "Resources";
   $username = "Ravindu Madhubhashana";
   $userLevel = "Owner";
   require APPROOT . "/views/inc/headerBar.php"
   ?>
   
   <!--Content-->
   <div class="content own resources">
      <h3>This is main option 1</h3>
      <div class="container">
      <button class="btnOpen normal" type="button">Remove Resources</button>
      <button class="btnOpen normal" type="button">Add Resources</button>
      <button class="btnOpen normal" type="button">Update Resources</button>
   </div>
      <div class="modal-container normal">
      <div class="modal-box" id= "ownResAddContainer">
<!-- Add content here for modal  -->
<h1 class="ownResAddHead">Add Resources</h1>
               <!-- main grid 1 starts -->
               <div class= "ownResAddDetails">
                  <div class="ownResAddDetail1">
                  <label class="ownResAddLabel1">Resource Name</label> <br> 
                   <input type="text" class = "ownResAddLabeltext" placeholder ="--Type in--">
                   </div> 
                   <div class="ownResAddDetail2">
                  <label class="ownResAddLabel2">Quantity</label> <br>
                  <select id="ownResAddQuantity" name="ownResAddQuantity">
                          <option value="one">1</option>
                          <option value="two">2</option>
                          <option value="three">3</option>
                          <option value="four">4</option>
                          <option value="five">5</option>
                          <option value="six">6</option>
                          <option value="seven">7</option>
                          <option value="eight">8</option>
                          <option value="nine">9</option>
                          <option value="ten">10</option>
</select>
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

  <!-- end adding content here for modal -->
      </div>
      
   </div>
   <div class="modal-container full">
      <div class="modal-box">
         <!--------------------------------------------------------------------------------- Add resource starts ---------------------------------------------------------------->
         <h1 class="ownResAddHead">Add Resources</h1>
               <!-- main grid 1 starts -->
               <div class= "ownResAddDetails">
                  <div class="ownResAddDetail1">
                  <label class="ownResAddLabel1">Resource Name</label> <br> 
                   <input type="text" class = "ownResAddLabeltext" placeholder ="--Type in--">
                   </div> 
                   <div class="ownResAddDetail2">
                  <label class="ownResAddLabel2">Quantity</label> <br>
                  <select id="ownResAddQuantity" name="ownResAddQuantity">
                          <option value="one">1</option>
                          <option value="two">2</option>
                          <option value="three">3</option>
                          <option value="four">4</option>
                          <option value="five">5</option>
                          <option value="six">6</option>
                          <option value="seven">7</option>
                          <option value="eight">8</option>
                          <option value="nine">9</option>
                          <option value="ten">10</option>
</select>
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
<!--------------------------------------------------------------------------------- Add resource ends ---------------------------------------------------------------->




<!--------------------------------------------------------------------------------- Remove resource starts ---------------------------------------------------------------->


<h1 class="ownRemResHead">Remove Resources</h1>
            <!-- start main grid 1 -->
            <div class="ownResRem_ResourceDeatils">

                <span class="staffDetai1">Are You sure you want to remove this resource ?</span>

            </div>
            <!-- main grid 1 ends -->

            <!-- main grid 2 starts -->
            <div class="ownResRemButtons">
                <div class="ownResRemBtn1">
                    <button class="btn btnClose normal">Cancel</button>
                </div>
                <div class="ownResRemBtn2">
                    <button class="btn">Proceed</button>
                </div>
            </div>
            <!-- main grid 2 ends -->


<!-- ----------------------------------------------------------------------------------Remove resource starts -------------------------------------------------------------->
        
         <button class="btn btnClose full">Save</button>

      </div>      
   </div>
   </div>
  
   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>