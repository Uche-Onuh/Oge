<?php
// session_start();

require 'config/db.php';
require 'emailController.php';
// include('myRedFunction.php');

$errors = array();
$username ="";
$email ="";

// if user clicks on sign up button
if (isset($_POST['signup-btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    // validation
    if(empty($username)){
        $errors['username'] = "Username required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid Email Address provided";
    }

    if(empty($email)){
        $errors['email'] = "Email required";
    }

    if(empty($password)){
        $errors['password'] = "Password required";
    }

    if($password !== $passwordConf){
        $errors['password'] = "Passwords do not match";
    }

    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssbss',$username, $email, $verified, $token, $password);

        if ($stmt->execute()) {
            // login user
            $user_id = $conn ->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = $verified;
            // flash message
            $_SESSION['message'] = "You are now logged in!";
            header('location: index.php');
            exit();
        } else{
            $errors['db_error'] = "Database error: failed to register user";
        }
        sendVerificationEmail($email, $token);
    }   
}

// if user clicks on login button
if (isset($_POST['signin-btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    // validation
    if(empty($username)){
        $errors['username'] = "Username required";
    }

    if(empty($password)){
        $errors['password'] = "Password required";
    }

    $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
    $stmt = $conn->prepare(($sql));
    $stmt->bind_param('ss',$username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])){
        // login success
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['verified'] = $user['verified'];
        $_SESSION['role_as'] = $user['role_as'];

        if ($user['role_as'] == 1) {
            // flash message
            $_SESSION['message'] = "Welcome Admin!";
            header('location: admin/index.php');
            exit();
        } else {
            // flash message
            $_SESSION['message'] = "You are now logged in!";
            header('location: index.php');
            exit();
        }

    } else{
        $_SESSION['message'] = "Wrong credentials";
        header("Location: login.php");
        die();
    }

}

// logout user
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    unset($_SESSION['email']);
    unset($_SESSION['verified']);
    header('location: index.php');
    exit();
}

// verify the user by token
function verifyUser($token){
    global $conn;
    $sql = "SELECT * FROM users WHERE token = '$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);


    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token = '$token'";

        if(mysqli_query($conn, $update_query)){
            // login success
            session_start();
            session_regenerate_id();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            $_SESSION['role_as'] = $user['role_as'];
            // $_SESSION['address'] = $user['address'];

            if ($user['role_as'] == 1) {
                // flash message
                $_SESSION['message'] = "Your Email address was verified!";
                header('location: admin/index.php');
                exit();
            } else {
                // flash message
                $_SESSION['message'] = "Your Email address was verified!";
                header('location: index.php');
                exit();
            }
        }else{
            echo "user not found";
        }
    }
}



// if uer clicks on the forgot password button
if (isset($_POST['forgot-password'])){
    $email = $_POST['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Invalid Email Address provided";
    }

    if(empty($email)){
        $errors['email'] = "Email required";
    }

    if(count($errors) == 0){
        $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $user = mysqli_fetch_assoc($result);

        $token = $user['token'];
        sendPasswordResetLink($email, $token);
        header('location: password_message.php');
        exit(0);
    }
}

// if user clicks on password reset btn
if(isset($_POST['resetPassBtn'])){
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];


    if (empty($password) || empty($passwordConf)) {
        $errors['password'] = "Password required";
    }

    if ($password !== $passwordConf) {
        $errors['password'] = "Passwords do not match";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $email = $_SESSION['email'];

    if(count($errors) == 0){
        $sql = "UPDATE users SET password='$password' WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if($result){
            header('location: login.php');
            exit(0);
        }
    }

}


function resetPassword($token){
    global $conn;

    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $_SESSION['email'] = $user['email'];
    header('location: reset-password.php');
    exit(0);
}


if (isset($_POST['form_submit_btn'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

 sendContactMail($name, $email, $subject, $message);
        $name = '';
        $email = '';
        $subject = '';
        $message = '';
        header('location: contact.php');
}


if (isset($_POST['application_submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $program = $_POST['program'];
    $profeciency = $_POST['profeciency'];

    sendApplication($name, $email, $phone, $program, $profeciency);
    $name = '';
    $email = '';
    $phone = '';
    header('location: school.php');
}

if (isset($_POST['booking_submit'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $booking = $_POST['booking_date'];

    sendBooking($name, $email, $phone, $booking);
    $name = '';
    $email = '';
    $phone = '';
    header('location: couture.php');
}

