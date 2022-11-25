<?php
session_start();

include("../config/db.php");

if (isset($_SESSION['user_id'])) {
    if (isset($_POST['placeOrderBtn'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
        $surName = mysqli_real_escape_string($conn, $_POST['surname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $wnumber = mysqli_real_escape_string($conn, $_POST['wnumber']);
        $pcode = mysqli_real_escape_string($conn, $_POST['pcode']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $payment_status = mysqli_real_escape_string($conn, $_POST['payment_status']);
        if ($firstName == "" || $surName == "" || $email == "" || $number == "" || $pcode == "" || $state == "" || $address == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header('location: ../checkout.php');
            exit(0);
        }



        $user_id = $_SESSION['user_id'];

        $query = "SELECT  c.cart_id as cid, c.item_id, c.qty, c.size, p.item_id , p.item_name, p.item_price, p.item_image
        FROM cart c, product p WHERE c.item_id = p.item_id AND c.user_id ='$user_id' ORDER BY c.cart_id DESC";
        $query_run = mysqli_query($conn, $query);

        $totalPrice = 0;
        foreach ($query_run as $item) {
            if ($state == "Abia") {
                $shipping = 3000;
            } else if ($state == "UK") {
                $shipping = 33000;
            } else if ($state == "Europe") {
                $shipping = 46800;
            } else if ($state == "USA") {
                $shipping = 42600;
            } else if ($state == "Canada") {
                $shipping = 42600;
            } else if ($state == "America") {
                $shipping = 42600;
            } else if ($state == "South America") {
                $shipping = 61800;
            } else if ($state == "Asia") {
                $shipping = 57640;
            } else if ($state == "Carribbeans") {
                $shipping = 61800;
            } else if ($state == "Australia") {
                $shipping = 57640;
            } else if ($state == "NZ") {
                $shipping = 61800;
            } else if ($state == "North Africa") {
                $shipping = 47600;
            } else if ($state == "South Africa") {
                $shipping = 47600;
            } else if ($state == "Africa") {
                $shipping = 35400;
            } else if ($state == "Adamawa") {
                $shipping = 3000;
            } else if ($state == "Abuja") {
                $shipping = 5600;
            } else if ($state == "Akwa Ibom") {
                $shipping = 3000;
            } else if ($state == "Anambra") {
                $shipping = 3000;
            } else if ($state == "Bauchi") {
                $shipping = 3000;
            } else if ($state == "Bayelsa") {
                $shipping = 3000;
            } else if ($state == "Benue") {
                $shipping = 3000;
            } else if ($state == "Borno") {
                $shipping = 3000;
            } else if ($state == "Cross River") {
                $shipping = 3000;
            } else if ($state == "Delta") {
                $shipping = 3000;
            } else if ($state == "Ebonyi") {
                $shipping = 3000;
            } else if ($state == "Edo") {
                $shipping = 3000;
            } else if ($state == "Ekiti") {
                $shipping = 3000;
            } else if ($state == "Enugu") {
                $shipping = 3000;
            } else if ($state == "Gombe") {
                $shipping = 3000;
            } else if ($state == "Imo") {
                $shipping = 3000;
            } else if ($state == "Jigawa") {
                $shipping = 3000;
            } else if ($state == "Kaduna") {
                $shipping = 5600;
            } else if ($state == "Kano") {
                $shipping = 3000;
            } else if ($state == "Kebbi") {
                $shipping = 3000;
            } else if ($state == "Kogi") {
                $shipping = 3000;
            } else if ($state == "Kwara") {
                $shipping = 3000;
            } else if ($state == "Lagos") {
                $shipping = 3000;
            } else if ($state == "Nasarawa") {
                $shipping = 3000;
            } else if ($state == "Niger") {
                $shipping = 3000;
            } else if ($state == "Ogun") {
                $shipping =3000;
            } else if ($state == "Ondo") {
                $shipping = 3000;
            } else if ($state == "Osun") {
                $shipping = 3000;
            } else if ($state == "Oyo") {
                $shipping =3000;
            } else if ($state == "Plateau") {
                $shipping = 3000;
            } else if ($state == "Rivers") {
                $shipping = 5600;
            } else if ($state == "Sokoto") {
                $shipping = 3000;
            } else if ($state == "Taraba") {
                $shipping = 3000;
            } else if ($state == "Yobe") {
                $shipping = 3000;
            } else if ($state == "Zamfara") {
                $shipping = 3000;
            }

            $totalPrice += ($item['item_price'] * $item['qty']);
        }

        $totalPrice = $totalPrice + $shipping;


        $tracking_no = "BYOGE" . rand(1111, 9999) . substr($pcode, 2);
        $payment_id = "PAYMENT" . rand(0000, 9999) . substr($number, 2);

        $insert_query = "INSERT INTO orders(tracking_no, user_id, first_name, surname, email, phone, whatsapp, state, shipping_address, 
        pcode, total_price, payment_id, payment_status, shipping) VALUES ('$tracking_no', '$user_id', '$firstName', '$surName',
         '$email', '$number', '$wnumber', '$state', '$address', '$pcode', '$totalPrice', '$payment_id', '$payment_status', '$shipping')";
        $insert_query_run = mysqli_query($conn, $insert_query);

        if ($insert_query_run) {
            $order_id = mysqli_insert_id($conn);
            foreach ($query_run as $item) {
                $item_id = $item['item_id'];
                $item_qty = $item['qty'];
                $size = $item['size'];
                $item_price = $item['item_price'];
                $insert_items_query = "INSERT INTO order_items (order_id, item_id, qty, size, price) VALUES ('$order_id', '$item_id',
                '$item_qty', '$size', '$item_price')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            }

            $deleteCartQuery = "DELETE FROM cart WHERE user_id = '$user_id'";
            $deleteCartQuery_run = mysqli_query($conn, $deleteCartQuery);

            $_SESSION['message'] = "Orders logged succesfully, process payment";
            header("Location: ../pay.php?payment_id=$payment_id");
            die();
        }
    }
} else {
    header('location: ../index.php');
}
