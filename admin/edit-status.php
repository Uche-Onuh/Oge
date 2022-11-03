<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if (isset($_GET['ref'])) {
                $reference = $_GET['ref'];
                $orders = getOrderByRef($reference);
                if (mysqli_num_rows($orders) > 0) {
                    $data = mysqli_fetch_array($orders);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Status</h4>
                            <a href="order-details.php?t=<?= $data['tracking_no'] ?>" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="reference" value="<?= $data['reference'] ?>">
                                        <label for="" style="font-size: 50px; text-transform: capitalize;"> Tracking No : <?= $data['tracking_no']; ?></label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" style="font-size: 20px; margin-right: 20px;">Update the Order status</label>
                                        <input type="number" name="status" value="<?= $data['status']; ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" name="update_status_btn" type="submit">UPDATE</button>
                                    </div>
                                </div>
                            </form>

                            <hr color="blue">

                            <div class="row">
                                <div class="col-md-12">
                                    <h5>Legend</h5>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h6>Being processed : 0</h6>
                                        </div>

                                        <div class="col-md-3">
                                            <h6>Shipping : 1</h6>
                                        </div>

                                        <div class="col-md-3">
                                            <h6>Completed : 2</h6>
                                        </div>

                                        <div class="col-md-3">
                                            <h6>Canceled : 3</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Category not found";
                }
            } else {
                echo "Id missing from url";
            }
            ?>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>