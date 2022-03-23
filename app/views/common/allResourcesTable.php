<?php require APPROOT . "/views/inc/header.php" ?>

<body class="layout-template-1">
    <?php
    $selectedMain = "Resources";
    $selectedSub = "";
    switch (Session::getUser("type"))
    { 
       case "2" :
          require APPROOT . "/views/owner/own_sidenav.php";
          break; 
       case "3" : 
          require APPROOT . "/views/manager/mang_sidenav.php"; 
          break; 
       case "4" : 
          require APPROOT . "/views/receptionist/recept_sidenav.php"; 
          // break;  
    } 
    ?> 

    <?php
    $title = "Resources";
    require APPROOT . "/views/inc/headerBar.php"
    ?>

    <!--Content-->
    <div class="content own resources">

<!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php if (Session::getUser("typeText") == "Owner") : ?>
   <div class="page-top-main-container">
      <a href="<?php echo URLROOT ?>/resources/addResource" class="btn btn-filled btn-theme-purple btn-main btnAddResourceBtn" onclick="sessionStorage.setItem('returnReferer',window.location.href);">Add New</a>
   </div>
<?php endif; ?>


<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource ID</label>
                  <input type="text" name="" id="resourceIDInput"  value="<?php echo ($data["typedID"]== "all")? "": $data["typedID"];?>" placeholder="Resource ID here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource Type</label>
                  <input type="text" name=""   id="resourceNameInput" value="<?php echo ($data["typedName"] == "all")? "":$data["typedName"];?>" placeholder="Resource name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
         </div>
      </div>
      <div class="right-section">
         <a class="btn btn-filled btn-black" id="allResourcesFilterBtn">Search</a>
         <!-- <button class="btn btn-search">Search</button> -->
      </div>
   </div>
</form>
<div class="table-container">
   <div class="table2 table2-responsive">
      <table class="table2-hover">

         <thead>
            <tr>
               <th class="column-center-align col-1">Resource ID</th> 
               <th class="column-center-align col-2">Resource Type</th> 
               <th class="column-center-align col-3">Quantity</th> 
               <th class="column-center-align col-4">Status</th> 
               <th class="col-7"></th> 
            </tr> 
         </thead> 
         <tbody> 
            <tr> 
               <?php foreach ($data['allResourceDetailsList'] as $resourceD) : ?> 
                  <td class="column-center-align">RT<?php echo $resourceD->resourceID; ?></td> 
                  <td class="column-center-align"><?php echo $resourceD->name; ?></td> 
                  <td class="column-center-align"><?php echo $resourceD->quantity; ?></td> 
                  <td data-lable="Status" class="column-center-align"> 
                     <?php if ($resourceD->quantity==0) : ?> 
                        <button type="button" class="status-btn text-uppercase red"> Not Available </button> 
                     <?php elseif ($resourceD->quantity > 0) : ?> 
                        <button type="button" class="status-btn text-uppercase green"> Available </button> 
                     <?php endif; ?> 
                  </td>  
                  <td data-lable="Action" class="column-center-align">
                     <span>
                     
                        <!-- <a href="#" class="removeResourceTypeAnchor"><i  class="ci-trash table-icon btnRemoveResourceType img-gap"></i></a> -->
                     
                           <a href="<?php echo URLROOT ?>/resources/viewResources/<?php echo $resourceD->resourceID; ?>"><i class="ci ci-view-more table-icon img-gap"></i></a>
                     </span>
                  </td>
            </tr>
         <?php endforeach; ?>

         </tbody>
      </table>
   </div>
</div>

</div>
    
    <!--End Content-->

<script src="<?php echo URLROOT ?>/public/js/fetchRequests/resources.js"></script>
<script src="<?php echo URLROOT ?>/public/js/filters.js"></script>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->



    <?php require APPROOT . "/views/inc/footer.php" ?>