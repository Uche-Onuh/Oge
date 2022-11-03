  <div class="form-hero">
        <div class="form-box reset">
            <h4>Recover your password</h4>
            <p>Please enter your email if you forgot your password and you will be sent a reset link</p>

            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error):  ?>
                <li><?php echo $error ?></li>
                <?php endforeach ?>
            </div>
            <?php endif; ?>

            <form class="input-group" id="reset" action="reset.php" method="POST" style="margin:0 50px;">
                <input type="email" placeholder="Email" class="input-field" name="email">
                <button type="submit" class="submit-btn resetbtn" name="forgot-password">Recover Password</button>
                <br>
            </form>
        </div>
    </div>