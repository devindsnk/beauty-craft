<!DOCTYPE html>
<html>

<head>
    <!--Meta-->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0" />

    <title>Beauty Craft</title>

    <!--Style Sheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="../../../public/css/style.css" />
    <link rel="stylesheet" href="../../../public/css/serviceprovider.css" />
    <link rel="stylesheet" href="../../../public/css/sideNav.css" />
    <link rel="stylesheet" href="../../../public/css/layoutTemplate1.css" />


</head>

<body class="layout-template-1">
    <!--Sidebar-->
    <div class="sidebar">
        <!--Sidebar Header-->
        <div class="header">
            <a href="receptionistDashboard.html">
                <div>
                    <img src="../../../public/imgs/logo-white.png" alt="BeautyCraft">
                </div>
            </a>
        </div>
        <!--End Sidebar Header-->

        <!--Sidebar Navigation-->
        <nav class="nav">
            <!--Sidebar Menu-->
            <ul class="mainMenu">

                <!--Sidebar Item-->
                <li class="mainOption">
                    <a class="optionLink selected" href="./layoutTemplate1.html">
                        <div class="optionIcon">
                            <img src="../../public/icons/overview-white.png" />
                        </div>
                        <div class="optionTitle">Main Option 1</div>
                    </a>
                </li>
                <!--End Sidebar Item-->

                <!--Sidebar Item-->
                <li class="mainOption menuOption">
                    <a class="optionLink" href="#">
                        <div class="optionIcon">
                            <img src="../../../public/icons/overview-white.png" />
                        </div>
                        <div class="optionTitle">Main Option 2</div>
                        <div class="optionArrow">
                            <img src="../../../public/icons/expand-white.png" />
                        </div>
                    </a>
                    <!--Sidebar Sub Menu-->
                    <ul class="subMenu">
                        <!--Sidebar Sub Item-->
                        <li class="menuOption subOption">
                            <a class="optionLink" href="#">
                                <!-- <div class="sidebar-menu_item-icon"></div> -->
                                <div class="optionTitle">Sub Option 1</div>
                            </a>
                        </li>
                        <!--End Sidebar Sub Item-->
                        <!--Sidebar Sub Item-->
                        <li class="menuOption subOption">
                            <a class="optionLink" href="#">
                                <!-- <div class="sidebar-menu_item-icon"></div> -->
                                <div class="optionTitle">Sub Option 2</div>
                            </a>
                        </li>
                        <!--End Sidebar Sub Item-->
                    </ul>
                    <!--End Sidebar Sub Menu-->
                </li>
                <!--End Sidebar Item-->

                <!--Sidebar Item-->
                <li class="mainOption menuOption">
                    <a class="optionLink" href="#">
                        <div class="optionIcon">
                            <img src="../../../public/icons/overview-white.png" />
                        </div>
                        <div class="optionTitle">Main Option 2</div>
                        <div class="optionArrow">
                            <img src="../../../public/icons/expand-white.png" />
                        </div>
                    </a>
                    <!--Sidebar Sub Menu-->
                    <ul class="subMenu">
                        <!--Sidebar Sub Item-->
                        <li class="menuOption subOption">
                            <a class="optionLink" href="#">
                                <!-- <div class="sidebar-menu_item-icon"></div> -->
                                <div class="optionTitle">Sub Option 1</div>
                            </a>
                        </li>
                        <!--End Sidebar Sub Item-->
                        <!--Sidebar Sub Item-->
                        <li class="menuOption subOption">
                            <a class="optionLink" href="#">
                                <!-- <div class="sidebar-menu_item-icon"></div> -->
                                <div class="optionTitle">Sub Option 2</div>
                            </a>
                        </li>
                        <!--End Sidebar Sub Item-->
                    </ul>
                    <!--End Sidebar Sub Menu-->
                </li>
                <!--End Sidebar Item-->


            </ul>
            <!--End Sidebar Menu-->
        </nav>
        <!--End Sidebar Navigation-->

    </div>
    <!--End Sidebar-->


    <!--Header(Top Bar)-->
    <header>
        <!--Header left section-->
        <div class="header-left verticalCenter">
            <i class="fas fa-bars fa-2x header-menu_icon"></i>
            <h1 class="header-topic">Layout Template 3</h1>
        </div>
        <!--End header left section-->

        <!--Header profile section-->
        <div class="header-profile">
            <img class="header-profilepic" src="../../../public/imgs/person1.jpg"></img>
            <span class="header-username">Ruwanthi Muasinghe</span>
            <span class="header-userRole">Service Provider</span>
            <div class="header-profile-arrow">
                <i class="fas fa-chevron-down"></i>
            </div>
        </div>
        <!--Header profile menu-->
        <div class="profile_menu">
            <ul>
                <li>
                    <i class="far fa-user"></i>
                    <a href="#">My Profile</a>
                </li>
                <li>
                    <i class="far fa-cog"></i>
                    <a href="#">Account Settings</a>
                </li>
                <li>
                    <i class="far fa-sign-out"></i>
                    <a href="#">Sign Out</a>
                </li>
            </ul>
        </div>
        <!--End header profile menu-->
    </header>
    <!--End Header(Top Bar)-->

    <!--Content-->
    <div class="content">
        <div class="sub-container1">
            <!--sub-container1-card 1-->
            <div class="sub-container1-card">
                <div class="sub-container1-card-title">
                    <p>Completed</br>Reservations </p>
                </div>
                <div class="sub-container1-card-count">
                    <p>5/10</p>
                </div>

            </div>
            <!--End sub-container1-card  1-->
            <!--sub-container1-card 2-->
            <div class="sub-container1-card">
                <div class="sub-container1-card-title">
                    <p>Pending Recall</br>Requests </p>
                </div>
                <div class="sub-container1-card-count">
                    <p>10</p>
                </div>
            </div>
            <!--End sub-container1-card  2-->
        </div>

        <!--sub-container2-->
        <div class="sub-container2">
            <h2>Upcoming reservations today</h2>
            <!--sub-container2-card-->
            <div class="scroll-area">
                <div class="webview">
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                    <div class="sub-container2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="sub-container2-card-timeservice">
                            <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                            <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                        </div>
                        <!--sub-container2-card-timetype-->

                        <div class="sub-container2-card-name">
                            <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">
                            <p>Ruwanthi Munasinghe</p>
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="#popup1 ">More Info</a>
                        </div>
                    </div>
                    <!--End sub-container2-card-->
                </div>
                <!--mobilesub-container2-card-->
                <div class="mobview">
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                    <div class="mob-subcontainer2-card">
                        <!--sub-container2-card-timetype-->
                        <div class="details">
                            <div class="sub-container2-card-timeservice">
                                <span class="sub-container2-card-timeservice-time">
                            10.30-10.00
                        </span>
                                <span class="sub-container2-card-timeservice-service">
                            Ladies hair cut
                        </span>
                                <span class="sub-container2-card-name">
                            Ruwanthi123Munasinghe
                        </span>

                            </div>
                            <div class="sub-container2-card-profile">
                                <img src="https://image.shutterstock.com/image-photo/young-businesswoman-sitting-on-modern-260nw-1912892869.jpg" alt="Avatar" class="avatar">

                            </div>
                            <!--sub-container2-card-timetype-->
                        </div>
                        <div class=" sub-container2-card-link ">
                            <a class="sub-container2-card-link" href="url ">More Info</a>
                        </div>
                    </div>
                    <!--End mobile sub-container2-card-->
                </div>
            </div>
            <!--End scroll area-->

        </div>
        <!--End sub-container2-->
        <!--popup-->
        <div id="popup1" class="overlay">
            <div class="popup">
                <h2 class="popup-topic">Reservation Details</h2>
                <a class="close" href="#">&times;</a>
                <div class="popin-content">
                    content
                </div>
            </div>
        </div>
        <!--End popup-->
    </div>
    <!--End Content-->

    <!--Footer-->
    <footer>
        <P>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, ducimus laboriosam saepe numquam veniam velit dolorem rem debitis fugit quasi illum nostrum, aliquid quam nulla labore necessitatibus excepturi culpa soluta!
        </P>
    </footer>
    <!--End Footer-->
    <script src="../../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../../assets/js/sideNav.js"></script>
    <script src="../../assets/js/header.js"></script>
</body>


</html>