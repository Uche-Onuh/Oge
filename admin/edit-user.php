<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $users = getByUserId("users", $id);
                if (mysqli_num_rows($users) > 0) {
                    $data = mysqli_fetch_array($users);
            ?>
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Permission</h4>
                            <a href="users.php" class="btn btn-primary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" name="user_id" value="<?= $data['user_id'] ?>">
                                        <label for="" style="font-size: 50px; text-transform: capitalize;"> User: <?= $data['username']; ?></label>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="" style="font-size: 20px; margin-right: 20px;">Check to make an Admin or Uncheck to remove as Admin</label>
                                        <input type="checkbox" <?= $data['role_as'] ? "checked" : "" ?> name="role_as">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-info" name="create_admin_btn" type="submit">UPDATE</button>
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