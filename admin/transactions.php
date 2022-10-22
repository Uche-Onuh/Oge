<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Transactions
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
                            $transaction = getTransactionsBySucc("$payment_status");

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