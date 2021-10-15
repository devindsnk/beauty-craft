<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-2">
   <header class="full-header">
      <div class="header-center verticalCenter">
         <h1 class="header-topic">New Reservation</h1>
      </div>
      <div class="header-right verticalCenter">
         <a href="" class="top-right-closeBtn"><i class="fal fa-times fa-2x "></i></a>
      </div>
   </header>

   <div class="recept content newRes">

      <!-- <div class="center-container">
         <div class="resDetails form"> -->
      <div class="main-container">
         <div class="left-container">
            <h3>Reservation Details</h3>
            <div class="dateSelection">
               <label for="date">Date</label>
               <input type="date">
            </div>
            <div class="serviceSelection contentBox form">
               <div class="row">
                  <div class="box-1">
                     <div class="dropdown-group mini">
                        <label class="label" for="lName">Start Time</label>
                        <select name="cars" id="cars">
                           <option value="" disabled selected>Select an option</option>
                           <option value="volvo">Volvo</option>
                           <option value="saab">Saab</option>
                           <option value="mercedes">Mercedes</option>
                           <option value="audi">Audi</option>
                        </select>
                     </div>
                     <div class="text-group mini">
                        <label class="label" for="fName">Duration</label>
                        <input type="text" name="" id="fName" placeholder="Your first name here" disabled>
                     </div>
                  </div>
                  <div class="box-2">
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service</label>
                        <select name="cars" id="cars">
                           <option value="" disabled selected>Select an option</option>
                           <option value="volvo">Volvo</option>
                           <option value="saab">Saab</option>
                           <option value="mercedes">Mercedes</option>
                           <option value="audi">Audi</option>
                        </select>
                     </div>
                     <div class="dropdown-group">
                        <label class="label" for="lName">Service Provider</label>
                        <select name="cars" id="cars">
                           <option value="" disabled selected>Select an option</option>
                           <option value="volvo">Volvo</option>
                           <option value="saab">Saab</option>
                           <option value="mercedes">Mercedes</option>
                           <option value="audi">Audi</option>
                        </select>
                     </div>
                  </div>

               </div>
               <div class="row">
                  <div class="text-group">
                     <label class="label" for="fName">Reservation Note</label>
                     <input type="text" name="" id="fName" placeholder="Add a note related to reservation">
                  </div>
               </div>
            </div>
         </div>
         <div class="right-container">
            <div class="cusDetails">
               <h3>Customer Details</h3>
               <div class="cusSelection contentBox form">
                  <div class="text-group">
                     <label class="label" for="fName">Customer Name / Contact No</label>
                     <input type="text" name="" id="fName" placeholder="Search">
                  </div>

                  <div class="profile-info">
                     <div class="img-container">
                        <img class="header-profilepic" src="<?php echo URLROOT ?>/public/imgs/person1.jpg"></img>
                     </div>
                     <div class="text-container"><label for="" class="cust-name">Ravindu Madhubhashana</label>
                        <label for="" class="contact-no">0717679714</label>
                     </div>
                     <i class="fal fa-times profile-remove"></i>
                  </div>

                  <div class="price-calc">
                     <div class="tag">
                        <p class="service-name">Service Name</p>
                        <p class="price num-text">1000.00 LKR</p>
                     </div>
                     <div class="tag">
                        <p class="service-name">Service Name</p>
                        <p class="price num-text">1000.00 LKR</p>
                     </div>
                     <div class="total tag">
                        <p class="service-name">Total</p>
                        <p class="price num-text">2000.00 LKR</p>
                     </div>
                  </div>
                  <a href="" class="btn btn-filled btn-theme-purple btn-main">Place Reservation</a>
               </div>
            </div>
         </div>
      </div>

      <div class="addAnother">
         <span>+ Add another service</span>
      </div>
   </div>

   </div>


   </div>

   <?php require APPROOT . "/views/inc/footer.php" ?>