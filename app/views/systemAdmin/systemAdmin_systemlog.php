<?php require APPROOT . "/views/inc/header.php" ?>


<body class="layout-template-1">

   <?php
   $selectedMain = "SystemLog";
   $selectedSub = "";
   require APPROOT . "/views/systemAdmin/systemAdmin_sideNav.php"
   ?>

   <?php
   $title = "system Log";
   require APPROOT . "/views/inc/headerBar.php"
   ?>

   <!--Content-->
   <div class="content systemlogdownload">
      <div class="systemlog">
         <a href="<?php echo URLROOT ?>/public/logfile/syslog.txt" download><button onclick="storelogRecord()"><i class=" fa fa-download"></i>Download System Log File</button></a>

      </div>

   </div>
   <!--End Content-->
   <script>
      function storelogRecord() {
         console.log('button clicked');
         fetch(`http://localhost:80/beauty-craft/SysAdminDashboard/systemLogRecordstore`)
         // .then(response => response.json())
         // .then(msg => {
         //    // console.log(msg);
         //    // console.log('msg');

         // });

      }
   </script>

   <?php require APPROOT . "/views/inc/footer.php" ?>