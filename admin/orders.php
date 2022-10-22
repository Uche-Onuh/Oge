<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Orders
                    </h4>
                </div>
                <div class="card-body" id="product_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No</th>
                                <th>Payment status</th>
                                <th>Status</th>
                                <th>Order Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = getAllOrdersid("orders");

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['tracking_no']; ?></td>
                                        <td><?= $item['payment_status']; ?></td>
                                        <td><?php
                                            if ($item['status'] == 0) {
                                                echo 'Order being Processed';
                                            } else if ($item['status'] == 1) {
                                                echo 'Items Shipped';
                                            } else if ($item['status'] == 2) {
                                                echo 'Order Completed';
                                            } else if ($item['status'] == 3) {
                                                echo 'Order Cancelled';
                                            }
                                            ?></td>
                                        <td>
                                            <a href="order-details.php?t=<?= $item['tracking_no'] ?>"><button type="button" class="btn btn-danger">details</button></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo "No records Found";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>