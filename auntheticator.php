<?php
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location: ' . $url);
    exit();
}

if (!isset($_SESSION['user_id'])) {
    redirect('login.php', 'Login to continue');
    die();
}
