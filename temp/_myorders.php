<section id="page-header">
    <h2>#my-orders</h2>
    <p>View your placed orders history</p>
</section>

<section id="cart" class="section-p1 ">
    <table width="100%" id="myCart">
        <thead>
            <tr>
                <td>Order Id</td>
                <td>Tracking No</td>
                <td>Price</td>
                <td>Date</td>
                <td>Details</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders = getOrders();
            if (mysqli_num_rows($orders) > 0) {
                foreach ($orders as $item) {
            ?>
                    <tr>
                        <td><?= $item['id'] ?></td>
                        <td><?= $item['tracking_no'] ?></td>
                        <td>&#8358; <?= number_format($item['total_price']) ?></td>
                        <td><?= $item['created_at'] ?></td>
                        <td>
                            <a href="view-details.php?t=<?= $item['tracking_no'] ?>" style="color:#fff;"><button class="normal">View Details</button></a>
                        </td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr>
                    <td style="width: 100%;">No orders history available</td>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>
</section>