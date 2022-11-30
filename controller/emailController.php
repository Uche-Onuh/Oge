<?php

require_once 'vendor/autoload.php';
require_once 'config/constants.php';

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

// Create the Transport
$transport = Transport::fromDsn($dsn);


// Create the Mailer using your created Transport
$mailer = new Mailer($transport);

// create an email obj
$email = (new Email());

function sendVerificationEmail($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
            <html lang="en">
            <head> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verify email</title>
            </head>
            <body>
                <div class="wrapper">
                    <p>Thank you for signing up on our website. Please click on the link below to verify your account</p>
                    <a href="https://exochos.com.ng?token=' . $token . ' ">
                        Verify Your Account
                    </a>
                </div>
                
            </body>
            </html>';
    // Create a message
    $email = (new Email())
        ->from('info@ogebyoge.com.ng')
        ->to($userEmail)
        ->subject('Verify  your Email adress')
        ->html($body);

    // Send the message
    $mailer->send($email);
}

function sendPasswordResetLink($userEmail, $token)
{
    global $mailer;

    $body = '<!DOCTYPE html>
            <html lang="en">
            <head> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Verify email</title>
            </head>
            <body>
                <div class="wrapper">
                    <p>
                      Hello,

                      Please Click on the password reset link below to reset your password
                    </p>
                    <a href="https://exochos.com.ng?passwordToken=' . $token . ' ">
                        Reset your password
                    </a>
                </div>
                
            </body>
            </html>';
    // Create a message
    $email = (new Email())
        ->from('info@ogebyoge.com.ng')
        ->to($userEmail)
        ->subject('Password reset')
        ->html($body);

    // Send the message
    $mailer->send($email);
}


function sendOrderConfirmation($userEmail, $reference, $payment_id, $tracking_no, $address, $firstName, $surname, $id, $total)
{
    global $mailer;

    $body = '<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>Email Confirmation</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        section {
            width: 100%;
            margin: 0 auto;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        .logo {
            padding: 30px 0;
        }

        .logo h1 {
            font-size: 25px;
            color: #0198db;
        }

        .hero {
            text-align: center;
            margin-top: 50px;
        }

        .symbol {
            color: #0198db;
            font-size: 150px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 20px;
        }

        .hero hr,
        .details hr {
            margin-top: 30px;
        }

        .details {
            margin-top: 50px;
        }

        .flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .flex p {
            padding: 3px 0;
            font-size: 17px;
        }

        .items {
            margin-top: 50px;
        }

        .items table {
            width: 100%;
            text-align: right;
        }

        table thead tr {
            background: #e3e6f3;
            color: #000;
            margin-bottom: 20px;
        }

        table thead tr td {
            font-size: 25px;
        }


        table tbody td {
            font-size: 17px;
        }

        table tr td:nth-child(1) {
            text-align: left;
            padding: 5px 0 5px 10px;
        }

        table tr td:nth-child(2) {
            text-align: right;
            padding: 5px 10px 5px 0px;
        }

        .total{
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .footer{
            padding: 100px 0;
            text-align: center;
            margin-top: 20px;
        }
        .footer p{
            margin-top: 5px;
            font-size: 18px;
        }

        .footer a{
            color: red;
            text-decoration: none;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <section class="header">
        <div class="container">
            <div class="logo">
                <h1>Exochos Nigeria</h1>
            </div>
            <hr>
        </div>
    </section>

    <section class="hero">
        <div class="container">
            <span class="material-symbols-outlined symbol">
                check_circle
            </span>
            <p>Thank you for making your Purchase with our online store</p>
            <p>Find below your purchase details</p>
            <hr>
        </div>
    </section>



    <section class="details">
        <div class="container">
            <div class="flex">
                <div class="flex1">
                    <p>Transaction ref : <span>' . $reference . '</span></p>
                    <p>Payment ID : <span>' . $payment_id . '</span></p>
                    <p>First Name: ' . $firstName . '</p>
                    <p>Surname: ' . $surname . '</p>

                </div>
                <div class="flex1">
                    <p>Tracking No : <span>' . $tracking_no . '</span></p>
                    <p>Order ID : <span>' . $id . '</span></p>
                    <p>Shipping Address : <span>' . $address . '</span></p>
                </div>
            </div>
            <hr>
        </div>
    </section>

    <section class="items">
        <div class="container"> 
           <div class="total">
                <p>Total</p>
                <p>N ' . $total . '</p>
            </div>
            <hr>
        </div>
    </section>

    <section class="footer" style="background-color: #e3e6f3; color: #000;">
            <div class="container">
                <p>This email was sent to you from Exochos Nigeria as confirmation of your order</p>
                <p>To check the status and details of your order, please log into you account on our <a href="https://exochos.com.ng/index.php">website</a> and navigate to you orders
                    page</p>
                <p>If you have any enquiry, Please do endevour to send us a mail <a href="mailto:info@exochos.com.ng">here</a></p>
            </div>
    </section>

</body>

</html>';
    // Create a message
    $email = (new Email())
        ->from('sales@ogebyoge.com.ng')
        ->to($userEmail)
        ->subject('Order Confirmation Mail')
        ->html($body);

    // Send the message
    $mailer->send($email);
}




function sendContactMail($name, $userEmail, $subject, $message)
{
    global $mailer;

    $body = '<!DOCTYPE html>
            <html lang="en">
            <head> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>You have a new mail</title>
            </head>
            <body>
                <div class="wrapper">
                   <div>Name: ' . $name . '</div>
                   <div>Email: ' . $userEmail . '</div>
                   <div>Messsage: ' . $message . '</div>
                </div>
                
            </body>
            </html>';
    // Create a message
    $email = (new Email())
        ->from('info@ogebyoge.com.ng')
        ->to('info@ogebyoge.com.ng')
        ->subject($subject)
        ->html($body);

    // Send the message
    $mailer->send($email);
}

function recieveMail($tracking_no)
{
    global $mailer;

    $body = '<!DOCTYPE html>
            <html lang="en">
            <head> 
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>You have a new mail</title>
            </head>
            <body>
                <div class="wrapper">
                   <p>You Have a new Order</p>
                   <p>Login to <a href="https://exochos.com.ng/login.php#signin">Admin panel</a> to see details</p>
                </div>
                
            </body>
            </html>';
    // Create a message
    $email = (new Email())
        ->from('info@ogebyoge.com.ng')
        ->to('sales@ogebyoge.com.ng')
        ->subject($tracking_no)
        ->html($body);

    // Send the message
    $mailer->send($email);
}
