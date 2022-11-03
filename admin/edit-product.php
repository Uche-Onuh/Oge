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
                            <h4>Edit Product</h4>
                            <a href="products.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="mb-0">Select Category</label>
                                        <select class="form-select form-control mb-2" name="category_id" required>
                                            <option selected disabled>Select Category</option>
                                            <?php
                                            $categories = getAll("categories");

                                            if (mysqli_num_rows($categories) > 0) {
                                                foreach ($categories as $item) {
                                            ?>
                                                    <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id'] ? 'selected' : '' ?>><?= $item['name']; ?></option>
                                            <?php
                                                }
                                            } else {
                                                echo "No category available";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Name</label>
                                        <input type="text" name="name" class="form-control mb-2" value="<?= $data['item_name']; ?>" placeholder="Enter Product Name" required>
                                    </div>
                                    <input type="hidden" value="<?= $data['item_id'] ?>" name="product_id">
                                    <div class="col-md-6">
                                        <label class="mb-0">Product Code</label>
                                        <input type="text" name="slug" class="form-control mb-2" value="<?= $data['slug'] ?>" placeholder="Enter Product Code" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Product details</label>
                                        <textarea name="small_description" id="" cols="30" rows="5" placeholder="Enter Product details" class="form-control mb-2"><?= $data['small_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Product perfomance</label>
                                        <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product perfomance" class="form-control mb-2" required><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Product Specification</label>
                                        <textarea name="meta_description" id="" cols="30" rows="5" placeholder="Enter Product Specification" class="form-control mb-2"><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Price</label>
                                        <input type="number" name="item_price" class="form-control mb-2" value="<?= $data['item_price'] ?>" placeholder="Enter Product Price" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Original Price</label>
                                        <input type="number" name="original_price" class="form-control mb-2" value="<?= $data['discount_price'] ?>" placeholder="Enter Product Original Price" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Item Brand</label>
                                        <input type="text" name="item_brand" class="form-control mb-2" value="<?= $data['item_brand'] ?>" placeholder="Enter Product Brand" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="mb-0">Upload Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['item_image'] ?>">
                                        <input type="file" name="image" class="form-control mb-2" placeholder="Upload Product image">
                                        <label class="mb-0"></label>
                                        <img src="../img/exproducts/<?= $data['item_image']; ?>" alt="Product Image" height="50px" width="50px">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="mb-0">Product Weight(kg)</label>
                                            <input type="number" name="qty" class="form-control mb-2" value="<?= $data['qty'] ?>" placeholder="Enter Product Weight">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0">Status</label> <br>
                                            <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="mb-0">Trending</label> <br>
                                            <input type="checkbox" <?= $data['trending'] ? "checked" : "" ?> name="trending">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control mb-2" value="<?= $data['meta_title'] ?>" placeholder="Enter Meta title">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Item Tags</label>
                                        <input type="text" name="tags" class="form-control mb-2" value="<?= $data['item_tags'] ?>" placeholder="Enter item tags">
                                    </div>
                                    <div class="col-md-12">
                                        <label class="mb-0">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" cols="30" rows="5" placeholder="Enter Meta Keywords" class="form-control mb-2"><?= $data['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" name="update_product_btn" type="submit">Update</button>
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

<?php include("includes/footer.php") ?>