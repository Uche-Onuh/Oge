<?php
session_start();

include("../config/db.php");


if (isset($_SESSION['user_id'])) {

    if (isset($_POST["scope"])) {
        $scope = $_POST["scope"];

        switch ($scope) {
            case "add";
                $item_id = $_POST['item_id'];
                $item_qty = $_POST['item_qty'];
                $size = $_POST['size'];

                $user_id = $_SESSION['user_id'];

                $chk_existing_cart = "SELECT * FROM cart WHERE item_id='$item_id' AND user_id = '$user_id'";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    echo 'existing';
                } else {
                    $insert_query = "INSERT INTO cart (user_id, item_id, qty, size) VALUES ('$user_id', '$item_id', '$item_qty', '$size')";
                    $insert_query_run = mysqli_query($conn, $insert_query);

                    if ($insert_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                }
                break;

            case "update":
                $item_id = $_POST['item_id'];
                $item_qty = $_POST['item_qty'];

                $user_id = $_SESSION['user_id'];


                $chk_existing_cart = "SELECT * FROM cart WHERE item_id='$item_id' AND user_id = '$user_id'";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    $update_query = "UPDATE cart SET qty = '$item_qty' WHERE item_id = '$item_id' AND user_id = '$user_id' ";
                    $update_query_run = mysqli_query($conn, $update_query);

                    if ($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }    
                } else {
                   echo "something went wrong";
                }
                break;

            case "updateSize":
                $item_id = $_POST['item_id'];
                $size = $_POST['size'];

                $user_id = $_SESSION['user_id'];


                $chk_existing_cart = "SELECT * FROM cart WHERE item_id='$item_id' AND user_id = '$user_id'";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    $update_query = "UPDATE cart SET size = '$size' WHERE item_id = '$item_id' AND user_id = '$user_id' ";
                    $update_query_run = mysqli_query($conn, $update_query);

                    if ($update_query_run) {
                        echo 201;
                    } else {
                        echo 500;
                    }
                } else {
                    echo "something went wrong";
                }
                break;
                
            case "delete":
                $cart_id = $_POST['cart_id'];
                $user_id = $_SESSION['user_id'];

                $chk_existing_cart = "SELECT * FROM cart WHERE cart_id='$cart_id' AND user_id = '$user_id'";
                $chk_existing_cart_run = mysqli_query($conn, $chk_existing_cart);

                if (mysqli_num_rows($chk_existing_cart_run) > 0) {
                    $delete_query = "DELETE FROM cart WHERE cart_id='$cart_id'";
                    $delete_query_run = mysqli_query($conn, $delete_query);

                    if ($delete_query_run) {
                        echo 200;
                    } else {
                        echo "Something went wrong";
                    }
                } else {
                    echo "Something went wrong";
                }
                break;
            default:
                echo 500;
        }
    }
} else {
    echo 402;
}

