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

        $query = "SELECT  c.cart_id as cid, c.item_id, c.qty, p.item_id , p.item_name, p.item_price, p.item_image, p.qty as pty
        FROM cart c, product p WHERE c.item_id = p.item_id AND c.user_id ='$user_id' ORDER BY c.cart_id DESC";
        $query_run = mysqli_query($conn, $query);

        $totalPrice = 0;
        $totalWeight = 0;
        foreach ($query_run as $item) {
            $totalWeight += $item['qty'] * $item['pty'];
            if ($state == "Abia") {
                $shipping = 295 * $totalWeight;
            } else if ($state == "Adamawa") {
                $shipping = 650 * $totalWeight;
            } else if ($state == "Abuja") {
                $shipping = 332 * $totalWeight;
            } else if ($state == "Akwa Ibom") {
                $shipping = 329 * $totalWeight;
            } else if ($state == "Anambra") {
                $shipping = 255 * $totalWeight;
            } else if ($state == "Bauchi") {
                $shipping = 512 * $totalWeight;
            } else if ($state == "Bayelsa") {
                $shipping = 570 * $totalWeight;
            } else if ($state == "Benue") {
                $shipping = 362 * $totalWeight;
            } else if ($state == "Borno") {
                $shipping = 740 * $totalWeight;
            } else if ($state == "Cross River") {
                $shipping = 357 * $totalWeight;
            } else if ($state == "Delta") {
                $shipping = 186 * $totalWeight;
            } else if ($state == "Ebonyi") {
                $shipping = 316 * $totalWeight;
            } else if ($state == "Edo") {
                $shipping = 155 * $totalWeight;
            } else if ($state == "Ekiti") {
                $shipping = 154 * $totalWeight;
            } else if ($state == "Enugu") {
                $shipping = 286 * $totalWeight;
            } else if ($state == "Gombe") {
                $shipping = 592 * $totalWeight;
            } else if ($state == "Imo") {
                $shipping = 261 * $totalWeight;
            } else if ($state == "Jigawa") {
                $shipping = 544 * $totalWeight;
            } else if ($state == "Kaduna") {
                $shipping = 390 * $totalWeight;
            } else if ($state == "Kano") {
                $shipping = 519 * $totalWeight;
            } else if ($state == "Kebbi") {
                $shipping = 413 * $totalWeight;
            } else if ($state == "Kogi") {
                $shipping = 247 * $totalWeight;
            } else if ($state == "Kwara") {
                $shipping = 158 * $totalWeight;
            } else if ($state == "Lagos") {
                $shipping = 9 * $totalWeight;
            } else if ($state == "Nasarawa") {
                $shipping = 366 * $totalWeight;
            } else if ($state == "Niger") {
                $shipping = 403 * $totalWeight;
            } else if ($state == "Ogun") {
                $shipping = 28 * $totalWeight;
            } else if ($state == "Ondo") {
                $shipping = 108 * $totalWeight;
            } else if ($state == "Osun") {
                $shipping = 109 * $totalWeight;
            } else if ($state == "Oyo") {
                $shipping = 99 * $totalWeight;
            } else if ($state == "Plateau") {
                $shipping = 444 * $totalWeight;
            } else if ($state == "Rivers") {
                $shipping = 278 * $totalWeight;
            } else if ($state == "Sokoto") {
                $shipping = 465 * $totalWeight;
            } else if ($state == "Taraba") {
                $shipping = 531 * $totalWeight;
            } else if ($state == "Yobe") {
                $shipping = 689 * $totalWeight;
            } else if ($state == "Zamfara") {
                $shipping = 449 * $totalWeight;
            }

            $totalPrice += ($item['item_price'] * $item['qty']);
        }

        $totalPrice = $totalPrice + $shipping;


        $tracking_no = "EXOCHOS" . rand(1111, 9999) . substr($pcode, 2);
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
                $item_price = $item['item_price'];
                $insert_items_query = "INSERT INTO order_items (order_id, item_id, qty, price) VALUES ('$order_id', '$item_id',
                '$item_qty', '$item_price')";
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
