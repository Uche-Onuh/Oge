<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Products
                    </h4>
                </div>
                <div class="card-body" id="product_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = getAll("product");

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['item_id']; ?></td>
                                        <td><?= $item['item_name']; ?></td>
                                        <td><img src="../img/exproducts/<?= $item['item_image']; ?>" width="50px" height="50px" alt="<?= $item['item_name']; ?>"></td>
                                        <td><?= $item['status'] == '0' ? "Visible" : "Hidden"; ?></td>
                                        <td>
                                            <a href="edit-product.php?id=<?= $item['item_id']; ?>" class="btn btn-primary"><i class="material-icons opacity-10">edit</i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_product_button" value="<?= $item['item_id']; ?>"><i class="material-icons opacity-10">delete</i></button>
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