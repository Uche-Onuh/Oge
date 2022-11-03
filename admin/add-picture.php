<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $product = getByProductId("product", $id);
                if (mysqli_num_rows($product) > 0) {
                    $data = mysqli_fetch_array($product);

            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Product Images</h4>
                            <a href="products.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" value="<?= $data['item_id'] ?>" name="product_id">
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Main Product Images (Should be same as Main Product Image)</label>
                                        <input type="file" name="image[]" class="form-control mb-2" placeholder="Upload Product Image">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Alternative Images 1</label>
                                        <input type="file" name="image[]" class="form-control mb-2" placeholder="Upload Product Alt Image1">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Alternative Images 2</label>
                                        <input type="file" name="image[]" class="form-control mb-2" placeholder="Upload Product Alt Image2">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Upload Alternative Images 3</label>
                                        <input type="file" name="image[]" class="form-control mb-2" placeholder="Upload Product Alt Image3">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" name="add_picture_btn" type="submit">SAVE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            <?php
                } else {
                    echo "Product not found or given Id";
                }
            } else {
                echo "Product Id missing from url";
            }
            ?>
        </div>
    </div>
</div>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Images
                    </h4>
                </div>
                <div class="card-body" id="image_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item_id</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = getExtraImg("$id");

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['item_id']; ?></td>
                                        <td><img src="../img/extraImg/<?= $item['image']; ?>" width="50px" height="50px"></td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_image_button" value="<?= $item['id']; ?>"><i class="material-icons opacity-10">delete</i></button>
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