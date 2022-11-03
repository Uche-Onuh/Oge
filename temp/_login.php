<?php 
if (isset($_SESSION['username'])){
    $_SESSION['message'] = "You are already logged in";
    header('location: index.php');
    exit();
}
?>

<div class="form-hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button class="toggle-button" onclick="signin()">Sign In</button>
                <button class="toggle-button" onclick="register()">Register</button>
            </div>
            
            <form class="input-group" id="signin" action="login.php" method="POST">
                <input type="text" placeholder="Username or Email" value="<?php echo $username; ?>" class="input-field" required name="username"  id="loginEmail">
                <input type="password" placeholder="Password" class="input-field" required name="password" id="loginPassword">
                <button type="submit" class="submit-btn" name="signin-btn" id="log-submit">Sign In</button>
                <a href="reset.php" class="link">Forgot your password</a>
            </form>

            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error):  ?>
                <li style="text-align: center; color: red; font-size: 18px; font-weight: 700;"><?php echo $error ?></li>
                <?php endforeach ?>
            </div>
            <?php endif; ?>

            <form class="input-group" id="register" action="login.php" method="POST">
                <input type="text" value="<?php echo $username; ?>" placeholder="Username" class="input-field" required name="username" id="username">
                <input type="email" value="<?php echo $email; ?>" placeholder="Email" class="input-field" required name="email" id="email">
                <input type="password" placeholder="Password" class="input-field" required name="password" id="password">
                <small id="error" style="color: red;"></small>
                <input type="password" placeholder="Confirm Password" class="input-field" required name="passwordConf" id="passwordConf">
                <button type="submit" class="submit-btn" name="signup-btn">Register</button>
            </form>
        </div>
    </div>