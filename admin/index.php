<?php

include("includes/header.php");

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div>
                <canvas id="myChart"></canvas>
            </div>

            <?php
            $sales = getAllSales('sales_statistics');
            while ($row = mysqli_fetch_array($sales)) {
                $month[] = $row['month'];
                $amount[] = $row['total_sales'];
                $year[] = $row['year'];
            }
            ?>

            <script>
                const labels = <?php echo json_encode($month) ?>;

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Sales Analysis',
                        backgroundColor: 'rgb(1,152,219)',
                        borderColor: 'rgb(1,152,219)',
                        data: <?php echo json_encode($amount) ?>,
                    }]
                };

                const config = {
                    type: 'line',
                    data: data,
                    options: {}
                };

                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );
            </script>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Latest Orders
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
                            $orders = getAllOrders("orders");

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


<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Latest Transactions
                    </h4>
                </div>
                <div class="card-body" id="user_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>Payment ID</th>
                                <th>Payment Reference</th>
                                <th>Total Amount</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $payment_status = "Successful";
                            $transaction = getTransactionsBySuccLim("$payment_status");

                            if (mysqli_num_rows($transaction) > 0) {
                                foreach ($transaction as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['payment_id']; ?></td>
                                        <td><?= $item['reference']; ?></td>
                                        <td>&#8358; <?= number_format($item['total_price']); ?></td>
                                        <td><?= $item['created_at']; ?></td>
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