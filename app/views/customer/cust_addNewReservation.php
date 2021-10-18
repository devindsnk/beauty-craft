<?php require APPROOT . "/views/customer/cust_headerBar.php" ?>
<div class="content">
   <div class="main-container">
      <a href="" class="btn btn-filled btn-theme-red">Go Back</a>
      <h1>New Reservation</h1>
      <input type="date" id="" name="">



      <div class="dropdown-group">
         <label class="label" for="lName">Service</label>
         <select name="" id="">
            <option value="">Service 1</option>
            <option value="">Service 2</option>
         </select>
      </div>

      <div class="dropdown-group">
         <label class="label" for="lName">Start Time</label>
         <select name="" id="">
            <?php for ($i = 9; $i <= 18; $i += 1) : ?>
               <?php for ($j = 0; $j <= 50; $j += 10) : ?>
                  <option value="<?php echo $i; ?>" class=font-numeric> <?php echo str_pad($i, 2, "0", STR_PAD_LEFT) . ' : ' . str_pad($j, 2, "0", STR_PAD_LEFT); ?> h </option>
               <?php endfor; ?>
            <?php endfor; ?>
         </select>
      </div>


      <div class="text-group">
         <label class="label" for="fName">Duration</label>
         <input type="text" name="" id="fName" placeholder="Your first name here">
      </div>

      <div class="dropdown-group">
         <label class="label" for="lName">Service Provider</label>
         <select name="" id="">
            <option value="">Service Prov 1</option>
            <option value="">Service Prov 2</option>
         </select>
      </div>

      <div class="text-group">
         <label class="label" for="fName">Remarks</label>
         <br>
         <textarea name="" id="" cols="30" rows="10"></textarea>
      </div>

   </div>

</div>
<script src="<?php echo URLROOT ?>/public/js/home.js"></script>
</body>

</html>