<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Product</h4>
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
                                            <option value="<?= $item['id']; ?>"><?= $item['name']; ?></option>
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
                                <input type="text" name="name" class="form-control mb-2" placeholder="Enter Product Name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Slug</label>
                                <input type="text" name="slug" class="form-control mb-2" placeholder="Enter Product Slug" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Small Description</label>
                                <textarea name="small_description" id="" cols="30" rows="5" placeholder="Enter Small Product Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Description</label>
                                <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product Description" class="form-control mb-2" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Price</label>
                                <input type="number" name="item_price" class="form-control mb-2" placeholder="Enter Product Price" required>
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Item Brand</label>
                                <input type="text" name="item_brand" class="form-control mb-2" placeholder="Enter Product Brand" required>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" name="image" class="form-control mb-2" placeholder="Upload Product image" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Qty</label>
                                    <input type="number" name="qty" class="form-control mb-2" placeholder="Enter Product Quantity">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Status</label> <br>
                                    <input type="checkbox" name="status">
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trending</label> <br>
                                    <input type="checkbox" name="trending">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control mb-2" placeholder="Enter Meta title">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Item Tags</label>
                                <input type="text" name="tags" class="form-control mb-2" placeholder="Enter item tags">
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="5" placeholder="Enter Meta Description" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="mb-0">Meta Keywords</label>
                                <textarea name="meta_keywords" id="" cols="30" rows="5" placeholder="Enter Meta Keywords" class="form-control mb-2"></textarea>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-info" name="add_product_btn" type="submit">SAVE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>