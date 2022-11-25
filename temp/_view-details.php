<?php

if (isset($_GET['t'])) {
    $tracking_no = $_GET['t'];

    $orderData = checkTrackinNoValid($tracking_no);

    if (mysqli_num_rows($orderData) < 0) {
?>
        <h4>Something went wrong</h4>
    <?php
        die();
    } else {
    }
} else {
    ?>
    <h4>Something went wrong</h4>
<?php
    die();
}

$data = mysqli_fetch_array($orderData);
if ($data['reference'] !== "") {
    $payment_status = "Paid";
} else {
    $payment_status = "Pending";
}
?>
<section id="page-header">
    <h2>#view orders</h2>
    <p>View your placed order details</p>
</section>

<section id="checkout" class="section-p1">
    <div class="container">
        <div style="display: flex; align-items:center; justify-content: space-between;">
            <h4>Order Details</h4>
            <a href="myorders.php"><button class="normal">Back</button></a>
        </div>
        <form action="controller/placeorder.php" method="POST">
            <hr>
            <div class="checkout-details">
                <div class="form">
                    <p>First : <?= $data['first_name'] ?></p>
                    <p>Surname : <?= $data['surname'] ?></p>
                    <p>Contact mail : <?= $_SESSION['email'] ?></p>
                    <p>Contact no : <?= $data['phone'] ?></p>
                    <p>Shipping Address : <?= $data['shipping_address'] ?></p>
                    <p>Payment id : <?= $data['payment_id'] ?></p>
                    <p>Payment status: <?= $payment_status ?></p>
                    <p>Payment reference no : <?= $data['reference'] ?></p>
                </div>
                <div class="checkout-prod">
                    <hr>

                    <?php
                    $user_id = $_SESSION['user_id'];

                    $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi. *, oi.qty as orderqty, oi.size, p. * FROM orders o, order_items oi, product
                        p WHERE o.user_id='$user_id' AND oi.order_id=o.id AND p.item_id=oi.item_id AND o.tracking_no = '$tracking_no'";
                    $order_query_run = mysqli_query($conn, $order_query);

                    if (mysqli_num_rows($order_query_run) > 0) {
                        foreach ($order_query_run as $item) {
                    ?>
                            <div class="prod product-data">
                                <img src="img/exproducts/<?= $item['item_image'] ?>" alt="" width="70px" height="70px">
                                <div>
                                    <p class="name"><?= $item['item_name'] ?></p>
                                    <div class="price">&#8358; <?= number_format($item['item_price']); ?></div>
                                    <p><b>Size:</b> <?= $item['size'] ?></p>
                                    <p><b>QTY:</b> <?= $item['orderqty'] ?></p>
                                </div>
                                <div id="sub">
                                </div>
                            </div>
                            <hr>
                    <?php
                        }
                    }


                    ?>
                    <div class="total_price" style="text-align: center;">
                        <p>Total price :<b> &#8358; <?= number_format($data['total_price']) ?></b></p>
                    </div>
                    <hr>

                    <div class="total_price" style="text-align: center;">
                        <p>Status : <b><?php
                                        if ($data['status'] == 0) {
                                            echo 'Order being Processed';
                                        } else if ($data['status'] == 1) {
                                            echo 'Items Shipped';
                                        } else if ($data['status'] == 2) {
                                            echo 'Order Completed';
                                        } else if ($data['status'] == 3) {
                                            echo 'Order Cancelled';
                                        }
                                        ?></b></p>
                    </div>
                    <hr>
                </div>
        </form>
    </div>
    </div>
</section>