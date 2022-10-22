<?php
include("../config/db.php");

function getAll($table)
{
    global $conn;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($conn, $query);
}

function getAllOrdersid($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function getAllSales($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 12";
    return $query_run = mysqli_query($conn, $query);
}

function getAllOrders($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC LIMIT 5";
    return $query_run = mysqli_query($conn, $query);
}

function getAllUsers($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY role_as DESC";
    return $query_run = mysqli_query($conn, $query);
}


function getById($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getByProductId($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE item_id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getByUserId($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE user_id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function checkTrackinNoValid($trackingNo)
{
    global $conn;


    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo'";

    return $query_run = mysqli_query($conn, $query);
}

function getOrderByRef($reference)
{
    global $conn;

    $query = "SELECT * FROM orders WHERE reference = '$reference'";
    return $query_run = mysqli_query($conn, $query);
}

function getTransactionsBySucc($payment_status)
{
    global $conn;



    $query = "SELECT * FROM orders WHERE payment_status = '$payment_status' ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}

function getTransactionsBySuccLim($payment_status)
{
    global $conn;



    $query = "SELECT * FROM orders WHERE payment_status = '$payment_status' ORDER BY id DESC LIMIT 5";
    return $query_run = mysqli_query($conn, $query);
}

function getRequesByQN($quotationNo)
{
    global $conn;

    $query = "SELECT * FROM requests WHERE quotation_no = '$quotationNo'";
    return $query_run = mysqli_query($conn, $query);
}

function getAllR($table)
{
    global $conn;
    $query = "SELECT * FROM $table ORDER BY id DESC";
    return $query_run = mysqli_query($conn, $query);
}


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('location: ' . $url);
    exit();
}
