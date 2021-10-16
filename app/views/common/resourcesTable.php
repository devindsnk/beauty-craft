<?php if ($userLevel == "Owner") : ?>
   <div class="page-top-main-container">
      <a href="#" class="btn btn-filled btn-theme-purple btn-main btnAddResource">Add New</a>
   </div>
<?php endif; ?>


<form class="form filter-options" action="">
   <div class="options-container">
      <div class="left-section">
         <div class="row">
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource Name</label>
                  <input type="text" name="" id="fName" placeholder="Resource name here">
               </div>
               <span class="error"> <?php echo " "; ?></span>
            </div>
            <div class="column">
               <div class="text-group">
                  <label class="label" for="fName">Resource ID</label>
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
               <th class="column-center-align col-1">Resource Name</th>
               <th class="column-center-align col-2">Resource ID</th>
               <th class="column-center-align col-3">Quantity</th>
               <th class="col-7"></th>
            </tr>
         </thead>

         <tbody>
            <tr>
               <td class="column-center-align">Resource 1</td>
               <td class="column-center-align">R001</td>
               <td class="column-center-align">4</td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                  <?php if ($userLevel == "Owner") : ?>
                        <a href="#"><i class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveResource img-gap"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td class="column-center-align">Resource 1</td>
               <td class="column-center-align">R001</td>
               <td class="column-center-align">4</td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                  <?php if ($userLevel == "Owner") : ?>
                        <a href="#"><i class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveResource img-gap"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td class="column-center-align">Resource 1</td>
               <td class="column-center-align">R001</td>
               <td class="column-center-align">4</td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                  <?php if ($userLevel == "Owner") : ?>
                        <a href="#"><i class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveResource img-gap"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>

            <tr>
               <td class="column-center-align">Resource 1</td>
               <td class="column-center-align">R001</td>
               <td class="column-center-align">4</td>
               <td data-lable="Action" class="column-center-align">
                  <span>
                     <?php if ($userLevel == "Owner") : ?>
                        <a href="#"><i class="ci-edit table-icon btnUpdateResource img-gap"></i></a>
                        <a href="#"><i class="ci-trash table-icon btnRemoveResource img-gap"></i></a>
                     <?php endif; ?>
                  </span>
               </td>
            </tr>
           
         </tbody>
      </table>
   </div>
</div>

<!-- Remove Resource model -->
<div class="modal-container remove-resource">
        <div class="modal-box">
                <div class="confirm-model-head">
                    <h1>Remove Resource</h1>
                </div>
                <div class="confirm-model-head">
                    <p>Are you sure you want to Remove the Resource? <br> This action cannot be undone after proceeding.</p>
                </div>
                <div class="confirm-model-head">
                    <button class="btn btnClose normal ModalButton ModalCancelButton">Close</button>
                    <button class="btn btnClose normal ModalButton ModalBlueButton">proceed</button>
                </div>
        </div>
    </div>

<!-- End of Remove Resource model -->



  <!--------------------------------------------------------------------------------- Add resource starts ---------------------------------------------------------------->
  <div class="modal-container add-resource">
    <div class="modal-box addItems">
       <h1 class="addItemsModalHead">Add Resources</h1>
       <!-- start main grid 1 -->

       <div class="addItemsModalGrid1 ownResAddDetails">
       <div class="ownResAddDetail1">
                    <label class="addItemsModalLable">Resource Name</label> <br>
                    <input type="text" class="ownResAddLabeltext" placeholder="--Type in--">
                </div>
                <div class="ownResAddDetail2">
                    <label class="addItemsModalLable">Quantity</label> <br>
                    <select   class="addItemsSelect" name="ownResAddQuantity">
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
                </div>
       </div>

       <!-- main grid 1 ends -->

       <!-- main grid 3 starts -->
       <div class="addItemsModalGrid3">
          <div class="addItemsModalbtn1">
             <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
          </div>
          <div class="addItemsModalbtn2">
             <button class="btn ModalGreenButton ModalButton">Proceed</button>
          </div>
       </div>
       <!-- main grid 3 ends -->
    </div>
 </div>


         <!--------------------------------------------------------------------------------- Add resource ends ---------------------------------------------------------------->


<!--------------------------------------------------------------------------------- Update resource starts ---------------------------------------------------------------->
  <div class="modal-container update-resource">
    <div class="modal-box addItems">
       <h1 class="addItemsModalHead">Add Resources</h1>
       <!-- start main grid 1 -->

       <div class="addItemsModalGrid1 ownResAddDetails">
       <div class="ownResAddDetail1">
                    <label class="addItemsModalLable">Resource Name</label> <br>
                    <input type="text" class="ownResAddLabeltext" placeholder="--Type in--">
                </div>
                <div class="ownResAddDetail2">
                    <label class="addItemsModalLable">Quantity</label> <br>
                    <select   class="addItemsSelect" name="ownResAddQuantity">
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
                </div>
       </div>

       <!-- main grid 1 ends -->

       <!-- main grid 3 starts -->
       <div class="addItemsModalGrid3">
          <div class="addItemsModalbtn1">
             <button class="btn btnClose normal ModalCancelButton ModalButton">Cancel</button>
          </div>
          <div class="addItemsModalbtn2">
             <button class="btn ModalGreenButton ModalButton">Proceed</button>
          </div>
       </div>
       <!-- main grid 3 ends -->
    </div>
 </div>
         <!--------------------------------------------------------------------------------- Update resource ends ---------------------------------------------------------------->




   

   
<div class="modal-container remove-resource">
   <div class="modal-box">
      <div class="confirm-model-head">
         <h1>Remove Resource</h1>
      </div>
      <div class="confirm-model-head">
         <p>Are you sure you want to Remove the Resource?</p>
      </div>
      <div class="confirm-model-head">
         <button class="btn btnClose normal ModalButton ModalCancelButton">Cancel</button>
         <button class="btn btnClose normal ModalButton ModalBlueButton">Proceed</button>
      </div>
   </div>
</div>

