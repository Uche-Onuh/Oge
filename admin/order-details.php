<?php

include("includes/header.php");

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

?>



<div class="py-5">
    <div class="container">
        <div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Order Details
                            <a href="orders.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Delivery Details</h4>
                                    <hr color="blue">
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Customer Name :</label>
                                            <div class="border p-2">
                                                <?= $data['first_name'] ?> <?= $data['surname'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Contact Email :</label>
                                            <div class="border p-2">
                                                <?= $data['email'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Contact No :</label>
                                            <div class="border p-2">
                                                <?= $data['phone'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Whatsapp No :</label>
                                            <div class="border p-2">
                                                <?= $data['whatsapp'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Shipping Address :</label>
                                            <div class="border p-2">
                                                <?= $data['shipping_address'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Region :</label>
                                            <div class="border p-2">
                                                <?= $data['state'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Payment id :</label>
                                            <div class="border p-2">
                                                <?= $data['payment_id'] ?>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <label for="" class="fw-bold">Payment Reference no :</label>
                                            <div class="border p-2">
                                                <?= $data['reference'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <h4>Order Items</h4>
                                    <hr color="blue">

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Size</th>
                                                <th>Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $order_query = "SELECT o.id as oid, o.tracking_no, o.user_id, oi. *, oi.qty as orderqty, oi.size, p.  * FROM orders o, order_items oi, product
                                            p WHERE oi.order_id=o.id AND p.item_id=oi.item_id AND o.tracking_no = '$tracking_no'";
                                            $order_query_run = mysqli_query($conn, $order_query);


                                            if (mysqli_num_rows($order_query_run) > 0) {
                                                foreach ($order_query_run as $item) {
                                            ?>

                                                    <tr>
                                                        <td class="align-middle">
                                                            <img src="../img/exproducts/<?= $item['item_image'] ?>" alt="<?= $item['item_name'] ?>" style="width:70px; height:70px;">
                                                        </td>
                                                        <td class="align-middle"><?= $item['item_name'] ?></td>
                                                        <td class="align-middle">&#8358;<?= number_format($item['item_price']) ?></td>
                                                        <td class="align-middle"><?= $item['size'] ?></td>
                                                        <td class="align-middle"><?= $item['orderqty'] ?></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <hr color="blue">
                                    <h5>Total Price : <span class="float-end">&#8358; <?= number_format($data['total_price']) ?></span></h5>
                                    <hr color="blue">
                                    <h5>Order Status : <span class="float-end"><?php
                                                                                if ($data['status'] == 0) {
                                                                                    echo 'Order being Processed';
                                                                                } else if ($data['status'] == 1) {
                                                                                    echo 'Items Shipped';
                                                                                } else if ($data['status'] == 2) {
                                                                                    echo 'Order Completed';
                                                                                } else if ($data['status'] == 3) {
                                                                                    echo 'Order Cancelled';
                                                                                }
                                                                                ?></span></h5>
                                    <hr color="blue">
                                    <h5>Edit Status : <span class="float-end"><a href="edit-status.php?ref=<?= $data['reference'] ?>" class="btn btn-warning btn-sm">Change status</a></h5>
                                    <hr color="blue">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <p>Status : <b></b></p> -->

<?php include("includes/footer.php") ?>