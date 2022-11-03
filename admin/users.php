<?php

include("includes/header.php");
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Users
                    </h4>
                </div>
                <div class="card-body" id="user_table">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Edit Role</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $users = getAllUsers("users");

                            if (mysqli_num_rows($users) > 0) {
                                foreach ($users as $item) {
                            ?>
                                    <tr>
                                        <td><?= $item['user_id']; ?></td>
                                        <td style="text-transform: capitalize;"><?= $item['username']; ?></td>
                                        <td><?= $item['email']; ?></td>
                                        <td><?= $item['verified'] == '0' ? "Not-verified" : "Verified"; ?></td>
                                        <td><?= $item['role_as'] == '0' ? "Client" : "Admin"; ?></td>
                                        <td>
                                            <a href="edit-user.php?id=<?= $item['user_id']; ?>" class="btn btn-primary"><i class="material-icons opacity-10">edit</i></a>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-danger delete_user_button" value="<?= $item['user_id']; ?>"><i class="material-icons opacity-10">delete</i></button>
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