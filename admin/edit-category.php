<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $category = getById("categories", $id);
                if (mysqli_num_rows($category) > 0) {
                    $data = mysqli_fetch_array($category);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Category</h4>
                            <a href="category.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="hidden" name="category_id" value="<?= $data['id'] ?>">
                                        <label for="">Name</label>
                                        <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" placeholder="Enter Category Name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Slug</label>
                                        <input type="text" name="slug" value="<?= $data['slug'] ?>" class="form-control" placeholder="Enter Category Slug">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" cols="30" rows="5" placeholder="Enter Category Description" class="form-control"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Upload Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="Upload Category image">
                                        <label for="">Current Image</label>
                                        <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                        <img src="../img/cateImg/<?= $data['image'] ?>" height="50px" width="50px" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Title</label>
                                        <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" class="form-control" placeholder="Enter Meta title">
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Description</label>
                                        <textarea name="meta_description" id="" cols="30" rows="5" placeholder="Enter Meta Description" class="form-control"><?= $data['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Meta Keywords</label>
                                        <textarea name="meta_keywords" id="" cols="30" rows="5" placeholder="Enter Meta Keywords" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Status</label>
                                        <input type="checkbox" <?= $data['status'] ? "checked" : "" ?> name="status">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Popular</label>
                                        <input type="checkbox" <?= $data['popular'] ? "checked" : "" ?> name="popular">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-warning" name="update_category_btn" type="submit">UPDATE</button>
                                    </div>
                                </div>
                            </form>
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