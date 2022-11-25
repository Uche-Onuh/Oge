<?php

// require mysql connection
require('database/DBController.php');

// require product class
require('database/product.php');

// require productpage class
require('database/productpage.php');

// require product class
require('database/Cart.php');


//  Db contriller object
$db = new DBController();

// product object
$product = new Product($db);
$product_shuffle = $product->getData();

// products page
$productpage = new Productpage($db);
$product_page = $productpage->getProduct();

// counting product rows to calc number of pages
function totalRows()
{
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM product";
    $pages = $conn->query($sql)->fetch_array();
    return $pages['total'];
}

$recordPerPage = 16;

$numberOfpages = ceil(totalRows() / $recordPerPage);

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$pageData = [
    'products' => $product_page,
    'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
    'nextPage' => $currentPage + 1 <= $numberOfpages ? $currentPage + 1 : false,
];

// Cart object
$Cart = new Cart($db);


function getAllActive($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function getById($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getSlugActive($table, $slug)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE slug='$slug' && status='0' LIMIT 1";
    return $query_run = mysqli_query($conn, $query);
}

function getByProductId($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE item_id='$id'";
    return $query_run = mysqli_query($conn, $query);
}

function getIdActive($table, $id)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE id='$id' AND status='0' ";
    return $query_run = mysqli_query($conn, $query);
}

function getProductsByCategory($category_id)
{
    global $conn;
    $query = "SELECT * FROM product WHERE category_id='$category_id' AND status='0'";
    return $query_run = mysqli_query($conn, $query);
}

function getExtraImg($id)
{
    global $conn;
    $query = "SELECT * FROM alt_img WHERE item_id='$id' LIMIT 4";
    return $query_run = mysqli_query($conn, $query);
}

function getByProductTrending($table)
{
    global $conn;
    $query = "SELECT * FROM $table WHERE trending='1' LIMIT 8";
    return $query_run = mysqli_query($conn, $query);
}


function getCartItems()
{
    global $conn;

    if (isset($_SESSION['user_id'])) {
        $user = $_SESSION['user_id'];
    } else {
        $user = '0';
    }


    $query = "SELECT  c.cart_id as cid, c.item_id, c.qty, c.size, p.item_id , p.item_name, p.item_price, p.item_image, p.qty as pty
    FROM cart c, product p WHERE c.item_id = p.item_id AND c.user_id ='$user' ORDER BY c.cart_id DESC";
    return $query_run = mysqli_query($conn, $query);
}

// function getQuotationItems()
// {
//     global $conn;


//     if (isset($_SESSION['user_id'])) {
//         $user = $_SESSION['user_id'];
//     } else {
//         $user = '0';
//     }

//     $query = "SELECT  q.id as qid, q.item_id, q.qty, p.item_id , p.item_name, p.item_price, p.item_image 
//     FROM quotations q, product p WHERE q.item_id = p.item_id AND q.user_id ='$user' ORDER BY q.id DESC";
//     return $query_run = mysqli_query($conn, $query);
// }


function getOrder($table, $payment_id)
{
    global $conn;

    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM $table WHERE user_id = '$user_id' AND payment_id = '$payment_id'";

    return $query_run = mysqli_query($conn, $query);
}


function getOrders()
{
    global $conn;

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        $user_id = '0';
    }

    $query = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY id DESC";

    return $query_run = mysqli_query($conn, $query);
}


function checkTrackinNoValid($trackingNo)
{
    global $conn;

    $user_id = $_SESSION['user_id'];

    $query = "SELECT * FROM orders WHERE tracking_no = '$trackingNo' AND user_id = '$user_id'";

    return $query_run = mysqli_query($conn, $query);
}

function countUserTable()
{
    global $conn;

    $user = $_SESSION['user_id'];

    $query = "SELECT  c.cart_id as cid, c.item_id, c.qty, p.item_id , p.item_name, p.item_price, p.item_image 
    FROM cart c, product p WHERE c.item_id = p.item_id AND c.user_id ='$user' ORDER BY c.cart_id DESC";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        $data = mysqli_fetch_all($query_run);
        $count = count($data);
        return $count;
    }
}

