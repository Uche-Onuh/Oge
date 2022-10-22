<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Sales Total
                    </h4>
                </div>
                <div class="card-body" id="user_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Month</th>
                                <th>Total Amount</th>
                                <th>Year</th>
                                <th>Date Logged</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sales = getAll('sales_statistics');

                            if (mysqli_num_rows($sales) > 0) {
                                foreach ($sales as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['month']; ?></td>
                                        <td>&#8358; <?= number_format($item['total_sales']); ?></td>
                                        <td><?= $item['year']; ?></td>
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