    <footer class="section-p1">
        <div class="footer">
            <div class="col">
                <img src="img/logo.png" alt="Exochos Nigeria Logo" class="logo">
                <h4>Contact Details</h4>
                <p><strong>Address:</strong> Diamond plaza 88 Mushin road, Isolo Lagos stat, Nigeria.</p>
                <p><strong>Phone:</strong> (+234) 905 836 1341.</p>
                <p><strong>Phone:</strong> (+234) 808 502 8709.</p>
                <p><strong>Hours:</strong> 8:00 - 18:00, Mon - Sat</p>
                <div class="follow">
                    <h4>Follow Us</h4>
                    <div class="icon">
                        <a href="https://www.facebook.com/exochosbusinessventures" target="blank"><img src="img/svgs/brands/facebook-f.svg" alt="" class="facebook"></a>
                        <a href="" target="blank"><img src="img/svgs/brands/twitter.svg" alt="" class="facebook"></a>
                        <a href="https://www.instagram.com/invites/contact/?i=11w3n5vy8yv4t&utm_content=e05socf" target="blank"><img src="img/svgs/brands/instagram.svg" alt="" class="facebook"></a>
                    </div>
                </div>
            </div>

            <div class="col">
                <h4>About</h4>
                <a href="about.php">About Us</a>
                <a href="#">Delivery Information</a>
                <a href="myorders.php">My Orders</a>
                <a href="#">Terms & Conditions</a>
                <a href="contact.php">Contact Us</a>
            </div>

            <div class="col">
                <h4>My Account</h4>
                <a href="login.php">Sign In</a>
                <a href="login.php">Register</a>
                <a href="cart.php">View Cart</a>
                <a href="index.php?logout=1">Logout</a>
                <a href="#"><?php if (isset($_SESSION['verified'])) {
                                if ($_SESSION['verified'] != 1) {
                                    echo '<p style="color:red;">Verify Account </p>';
                                } else {
                                    echo 'This account is verified';
                                }
                            } else {
                                echo '<p style="color:green;">Not logged in</p>';
                            }
                            ?>
                </a>
            </div>

            <div class="col install">
                <h4>Install App</h4>
                <p>From App Store or Google Play</p>
                <div class="row">
                    <img src="img/pay/play.jpg" alt="Google play app">
                    <img src="img/pay/app.jpg" alt="Google play app">
                </div>
                <h4>Secure Payment Gateways</h4>
                <img src="img/pay/pay.png" alt="">
            </div>
        </div>

        <div class="copyright">
            <p>&copy; <script>
                    document.write(new Date().getFullYear());
                </script>, Oge by Oge | All Rights Reserved</p>
        </div>
    </footer>

    <script src="js/jquery-3.6.1.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Owl Carousel Js file -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>

    <!--  isotope plugin cdn  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha256-CBrpuqrMhXwcLLUd5tvQ4euBHCdh7wGlDfNz8vbu/iI=" crossorigin="anonymous"></script>

    <script src="js/cart.js"></script>
    <script src="js/login.js"></script>
    <script src="js/script.js"></script>
    <script src="js/product-single.js"></script>

    <!-- alertify  -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        alertify.set('notifier', 'position', 'top-right');
        <?php if (isset($_SESSION['message'])) { ?>

            alertify.success('<?= $_SESSION['message'] ?>');
        <?php
            unset($_SESSION['message']);
        } ?>
    </script>
    <!-- alertify  -->
    </body>

    </html>