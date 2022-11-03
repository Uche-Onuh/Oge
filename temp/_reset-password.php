<div class="form-hero">
    <div class="form-box reset">
        <h4>Reset your password</h4>
        <?php if (count($errors) > 0) : ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $error) :  ?>
                    <li><?php echo $error ?></li>
                <?php endforeach ?>
            </div>
        <?php endif; ?>

        <form class="input-group" id="reset" action="reset-password.php" method="POST" style="margin:0 50px;">
            <input type="password" placeholder="Reset Password" class="input-field" name="password">
            <input type="password" placeholder="Confirm password" class="input-field" name="passwordConf">
            <button type="submit" class="submit-btn resetbtn" name="resetPassBtn">Reset Password</button>
            <br>
        </form>
    </div>
</div>