<?php
session_start();

require("controller/authController.php");

// verify the user
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    verifyUser($token);
}

// reset token
if (isset($_GET['passwordToken'])) {
    $token = $_GET['passwordToken'];
    resetPassword($token);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/faa63b78a2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <!-- alertify  -->
    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <title>Oge by Oge</title>
    <link rel="shortcut icon" type="image/png" href="img/logosmall.png">


    <?php
    //require funtions Connection
    require('functions.php')
    ?>
</head>

<?php
$page =  substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>

<body id="body">
    <div class="arrow-btn" id="arrowbtn">
        <a href="#"><img src="img/svgs/solid/arrow-up.svg" alt=""></a>
    </div>
    <!--STATIC NAVBAR STARTS -->
    <nav class="nav" id="nav">
        <div class="navbar">
            <a href="index.php">
                <img src="img/logo.png" alt="Oge by oge logo" class="logo">
            </a>
            <div class="navlinks">
                <ul class="navbar-li" id="navbar">
                    <li><a href="#" class="main">Services</a>
                        <ul class="sub-menu">
                            <li><a href="couture.php" class="<?= $page == "couture.php"  ? 'current' : ''; ?>">Custom Made Wears</a></li>
                            <li><a href="school.php" class="<?= $page == "school.php"  ? 'current' : ''; ?>">Fashion School</a></li>
                            <li><a href="https://ogebyoge-s-school-ac48.thinkific.com/" target="_blank">Online School</a></li>
                        </ul>
                    </li>
                    <li><a href="#" class="main <?= $page == "product.php" ? 'current' : ''; ?>">Shop Now</a>
                        <ul class="sub-menu">
                            <?php
                            $categories = getAllActive("categories");

                            if (mysqli_num_rows($categories) > 0) {
                                foreach ($categories as $item) {
                            ?>
                                    <li>
                                        <a href="product.php?category=<?= $item['slug']; ?>">
                                            <?= $item["name"]; ?>
                                        </a>
                                    </li>

                            <?php
                                }
                            } else {
                                echo '<li>No category available</li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="about.php" class="<?= $page == "about.php" ? 'current' : ''; ?>">About Us</a></li>
                    <li><a href="contact.php" class="<?= $page == "contact.php" ? 'current' : ''; ?>">Contact Us</a></li>
                    <li>
                        <form action="productsearch.php" method="POST" class="navbar-li-search">
                            <button class="white bg-non" type="submit" name="submit-search"><img src="img/svgs/solid/magnifying-glass.svg" alt="search icon" style="margin-right:10px;"></button>
                            <input type="text" placeholder="Search" name="search">

                        </form>
                    </li>
                    <li style="text-transform: capitalize; margin-left:20px;"><?php
                                                                                if (isset($_SESSION['username'])) {
                                                                                    echo 'Welcome ' . $_SESSION['username'];
                                                                                } else {
                                                                                    echo '<li><a href="login.php#signin">Sign In</a></li>';
                                                                                }
                                                                                ?>
                    </li>
                    <li class="right cart"><a href="cart.php" class="<?= $page == "cart.php" ? 'current' : ''; ?>"><img src="img/svgs/solid/cart-shopping.svg" alt="">
                            <sub>
                                <?php
                                if (isset($_SESSION['username'])) {
                                    if (countUserTable() > 0) {
                                        echo countUserTable();
                                    } else {
                                        echo '';
                                    }
                                } else {
                                    echo '';
                                }
                                ?>
                            </sub>
                        </a></li>
                    <a href="#" id="close"><img src="img/svgs/solid/x.svg" alt=""></a>
                </ul>
            </div>
        </div>
        <div id="bars">
            <img src="img/svgs/solid/bars-staggered.svg" alt="" id="bar">
        </div>
    </nav>



    <!-- NAV ENDS -->