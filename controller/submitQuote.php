<?php
session_start();

include("../config/db.php");


if (isset($_SESSION['user_id'])) {
    if (isset($_POST['submitQuotesBtn'])) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstname']);
        $surName = mysqli_real_escape_string($conn, $_POST['surname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['number']);
        $whatsapp = mysqli_real_escape_string($conn, $_POST['wnumber']);

        if ($firstName == "" || $surName == "" || $email == "" || $phone == "") {
            $_SESSION['message'] = "All fields are mandatory";
            header('location: ../sendRequest.php');
            exit(0);
        }

        $user_id = $_SESSION['user_id'];

        $query = "SELECT  q.id as qid, q.item_id, q.qty, p.item_id , p.item_name, p.item_price, p.item_image 
        FROM quotations q, product p WHERE q.item_id = p.item_id AND q.user_id ='$user_id' ORDER BY q.id DESC";
        $query_run = mysqli_query($conn, $query);


        $quotation_no = "QUOTATION" . rand(1111, 9999) . substr($number, 2);

        $insert_query = "INSERT INTO requests (quotation_no, user_id, first_name, surname, email, phone, whatsapp) VALUES
        ('$quotation_no', '$user_id', '$firstName', '$surName', '$email', '$phone', '$whatsapp')";
        $insert_query_run = mysqli_query($conn, $insert_query);


        if ($insert_query_run) {
            $quotation_id = mysqli_insert_id($conn);
            foreach ($query_run as $item) {
                $item_id = $item['item_id'];
                $item_qty = $item['qty'];
                $item_price = $item['item_price'];
                $insert_items_query = "INSERT INTO quotation_items (quotation_id, item_id, qty) VALUES ('$quotation_id', '$item_id',
                '$item_qty')";
                $insert_items_query_run = mysqli_query($conn, $insert_items_query);
            }

            $deleteQuoteQuery = "DELETE FROM quotations WHERE user_id = '$user_id'";
            $deleteQuoteQuery_run = mysqli_query($conn, $deleteQuoteQuery);

            $_SESSION['message'] = "Quotation request sent succesfully";
            header("Location: ../sendRequest.php");
            die();
        }
    }
} else {
    header('location: ../index.php');
}
