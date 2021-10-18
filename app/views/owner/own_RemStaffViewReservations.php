<?php require APPROOT . "/views/inc/header.php" ?>

<!-- <body class="ownAddstaffBody"> -->

<body class="layout-template-2">

    <header class="full-header">
        <div class="header-center verticalCenter">
            <h1 class="header-topic">Upcomming Resrvations</h1>
        </div>
        <div class="header-right verticalCenter">
            <a href="<?php echo URLROOT ?>/OwnDashboard/staff" class="top-right-closeBtn"><i
                    class="fal fa-times fa-2x "></i></a>
        </div>
    </header>

     <!-- StartContent-->

    <div class="content contentNewRes">

    <?php require APPROOT . "/views/common/reservationsTable.php" ?>

   </div>

   <!--End Content-->


   <?php require APPROOT . "/views/inc/footer.php" ?>