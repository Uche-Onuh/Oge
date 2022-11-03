<?php

if (!$_GET['successfullypaid']) {
    echo "<h3> CANNOT VIEW THIS PAGE</h3>";
    exit;
} else {


    $payment_id = $_GET['payment_id'];
    $ref = $_GET['successfullypaid'];
    $user_id = $_SESSION['user_id'];
    $email = $_SESSION['email'];
    $payment_status = "Successful";

    $query_orders = "SELECT* FROM orders WHERE payment_id = '$payment_id' ";
    $query_orders_run = mysqli_query($conn, $query_orders);
    if (mysqli_num_rows($query_orders_run) > 0) {
        $insert_into_orders = "UPDATE orders SET reference = '$ref' , payment_status='$payment_status' WHERE payment_id = '$payment_id'";
        $insert_into_orders_run = mysqli_query($conn, $insert_into_orders);
    }
    $data = mysqli_fetch_array($query_orders_run);

    $tracking_no = $data['tracking_no'];

    $total = $data['total_price'];
    $shipping_address = $data['shipping_address'];

    $firstName = $data['first_name'];
    $surname = $data['surname'];

    $id = $data['id'];
   
    sendOrderConfirmation($email, $ref, $payment_id, $tracking_no, $shipping_address, $firstName, $surname, $id, $total);
    recieveMail($tracking_no);

}

?>


<section class="section-p1 success">
    <div class="container">
        <div class="icon">
            <img src="img/credit.png" alt="">
        </div>
        <h3>Payment Successful</h3>
        <p><span>Transaction ID : </span> <?= $payment_id; ?></p>
        <p><span>Payment Reference Code : </span> <?= $ref; ?></p>

        <div>
            <p>A confirmation message will be sent to your email</p>
            <p class="mail"><?= $email; ?></p>
        </div>
        <a href="index.php"><button class="normal">Go Back Home</button></a>
    </div>
</section>