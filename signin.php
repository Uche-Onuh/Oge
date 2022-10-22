<?php
include("header.php");
?>

<!--Contact Form Section-->
<div class="contact-form-section">
    <div class="auto-container text-center mg-auto">
        <h2>Sign in</h2>

        <!--Contact Form-->
        <div class="contact-form" style="margin: 20px auto;">
            <form method="post" action="signin.php" id="contact-form">
                <div class="row clearfix">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="username" value="" placeholder=" Enter your Username or Email" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                        <input type="password" name="password" value="" placeholder=" Enter your Password" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <p>Don't have an account? <a href="register.php">Register Now</a> </p>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                        <button type="submit" class="theme-btn btn-style-two" name="signin_btn">Sign in</button>
                    </div>
                </div>

            </form>
        </div>

    </div>
</div>

<?php
include("includes/_newsletter.php");
?>
<?php
include("footer.php");
?>