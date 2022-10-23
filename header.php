<?php
session_start();
require("controller/authController.php");
require("functions.php");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Oge by Oge | Homepage</title>
    <!-- Stylesheets -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="plugins/revolution/css/settings.css" rel="stylesheet" type="text/css">
    <!-- REVOLUTION SETTINGS STYLES -->
    <link href="plugins/revolution/css/layers.css" rel="stylesheet" type="text/css"><!-- REVOLUTION LAYERS STYLES -->
    <link href="plugins/revolution/css/navigation.css" rel="stylesheet" type="text/css">
    <!-- REVOLUTION NAVIGATION STYLES -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/cart.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!--Color Themes-->
    <link id="theme-color-file" href="css/color-themes/olive-theme.css" rel="stylesheet">


    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="icon" href="images/logo.png" type="image/x-icon">
    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>

    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header-->
        <header class="main-header header-style-two">

            <!-- Header Top Two-->
            <div class="header-top-two">
                <div class="auto-container">
                    <div class="clearfix">

                        <!--Top Left-->
                        <div class="top-left">
                            <!--social-icon-->
                            <div class="social-icon">
                                <ul class="clearfix">
                                    <li><a href="https://www.facebook.com/melakumercy/" target="_blank"><span class="fa fa-facebook"></span></a></li>
                                    <li><a href="https://twitter.com/melakumercy" target="_blank"><span class="fa fa-twitter"></span></a></li>
                                    <li><a href="https://www.instagram.com/mercymelaku/" target="_blank"><span class="fa fa-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <!-- Header Top End -->

            <!--Header-Upper-->
            <div class="header-upper">
                <div class="auto-container">
                    <div class="clearfix">

                        <div class="pull-left logo-outer">
                            <div class="logo"><a href="index.php"><img src="images/logo.png " alt="" title=""></a></div>
                        </div>

                        <div class="pull-right upper-right clearfix">

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <ul>
                                    <li><span class="icon flaticon-technology-1"></span><strong>Phone.</strong></li>
                                    <a href="tel:+234 807 046 3232">
                                        <li>(+234) 807 046 3232</li>
                                    </a>
                                </ul>
                            </div>

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <ul>
                                    <li><span class="icon flaticon-symbol"></span><strong>Email</strong></li>
                                    <a href="mailto:melakumercy@yahoo.com">
                                        <li>melakumercy@yahoo.com</li>
                                    </a>
                                </ul>
                            </div>

                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <ul>
                                    <li><span class="icon flaticon-location-pin"></span><strong>Location</strong></li>
                                    <a href="https://goo.gl/maps/2qDS7BjhSaGTATWR8" target="_blank">
                                        <li>1, Nomase Close, Off Etete Road, Benin City</li>
                                    </a>
                                </ul>
                            </div>

                            <div class="upper-column info-box">
                                <ul><a href="cart.php">
                                        <span class="material-symbols-outlined" style="font-size: 35px;">
                                            shopping_bag
                                        </span>
                                        <sup>0</sup>
                                    </a>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!--Header Lower-->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="nav-outer clearfix">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li class="current"><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop Now</a>
                                        <ul>
                                            <?php
                                            $categories = getAllActive("categories");

                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <li>
                                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                                            <?= $item["name"]; ?>
                                                        </a>
                                                    </li>

                                            <?php
                                                }
                                            } else {
                                                echo '<li><a>No category available</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="#">Coutures</a></li>
                                            <li><a href="#">Fashion School</a></li>
                                            <li><a href="#">Online School</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>

                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->
                        <div class="outer-box">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                echo
                                '<a href="index.php?logout=1" class="theme-btn btn-style-two">
                                Log out
                            </a>';
                            } else {
                                echo '<a href="signin.php" class="theme-btn btn-style-two">
                                Sign in
                            </a>';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Lower-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="index.php" class="img-responsive" title="Tali"><img src="images/logo.png" alt="" title=""></a>
                    </div>

                    <!--Right Col-->
                    <div class="right-col pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-header">
                                <!-- Toggle Button -->
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="navbar-collapse collapse clearfix">
                                <ul class="navigation clearfix">
                                    <li class="current"><a href="index.php">Home</a></li>
                                    <li class="dropdown"><a href="#">Shop Now</a>
                                        <ul>
                                            <?php
                                            $categories = getAllActive("categories");

                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <li>
                                                        <a href="products.php?category=<?= $item['slug']; ?>">
                                                            <?= $item["name"]; ?>
                                                        </a>
                                                    </li>

                                            <?php
                                                }
                                            } else {
                                                echo '<li><a>No category available</a></li>';
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li><a href="about.php">About Us</a></li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="#">Coutures</a></li>
                                            <li><a href="#">Fashion School</a></li>
                                            <li><a href="#">Online School</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="gallery.php">Gallery</a></li>
                                    <li><a href="contact.php">Contact</a></li>

                                    <li><a href="cart.php"><span class="material-symbols-outlined" style="font-size: 35px;">
                                                shopping_bag
                                            </span>
                                            <sup>0</sup>
                                        </a></li>
                                </ul>
                            </div>
                        </nav><!-- Main Menu End-->
                    </div>

                </div>
            </div>
            <!--End Sticky Header-->

        </header>
        <!--End Main Header -->