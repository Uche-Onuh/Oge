<?php
include("header.php");
?>

<!--Contact Form Section-->
<div class="contact-form-section">
    <div class="auto-container text-center mg-auto">
        <h2>Register Now</h2>

        <!--Contact Form-->
        <div class="contact-form" style="margin: 20px auto;">
            <form method="post" action="register.php" id="contact-form">
                <div class="row clearfix">
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="username" value="<?= $username; ?>" placeholder=" Enter your Username" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input type="email" name="email" value="<?= $email; ?>" placeholder="Enter your Email" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                        <input type="password" name="password" value="" placeholder=" Enter your Password" required>
                    </div>
                    <div class="form-group col-md-6 col-sm-12 col-xs-12">
                        <input type="password" name="passwordConf" value="" placeholder="Confirm Password" required>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                        <p>Already have an account? <a href="signin.php">Log in</a> </p>
                    </div>
                    <div class="form-group col-md-12 col-sm-12 col-xs-12 text-center">
                        <button type="submit" class="theme-btn btn-style-two" name="register_btn">Register</button>
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