<?php


// include("../config/db.php");
include("../controller/myRedFunction.php");

if (isset($_POST['add_category_btn'])) {
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular'])  ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../img/cateImg";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    $cate_query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, meta_keywords, status, popular,image)
    VALUES('$name', '$slug', '$description', '$meta_title', '$meta_description', '$meta_keywords', '$status', '$popular', '$filename')";

    $cate_query_run = mysqli_query($conn, $cate_query);

    if ($cate_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("add-category.php", "Category added Succesfully");
    } else {
        redirect("add-category.php", "Something went wrong");
    }
} else if (isset($_POST['update_category_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $popular = isset($_POST['popular'])  ? '1' : '0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if ($new_image != '') {
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $updateFilename = time() . '.' . $image_ext;
    } else {
        $updateFilename = $old_image;
    }

    $path = "../img/cateImg";

    $update_query =  "UPDATE categories SET name='$name', slug='$slug', description='$description', 
    meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords', 
    status='$status', popular='$popular', image='$updateFilename' WHERE id='$category_id'";

    $update_query_run = mysqli_query($conn, $update_query);

    if ($update_query_run) {
        if ($_FILES['image']['name'] != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $updateFilename);
            if (file_exists("../img/cateImg/" . $old_image)) {
                unlink("../img/cateImg/" . $old_image);
            }
        }
        redirect("edit-category.php?id=$category_id", "Category updated successfully");
    } else {
        redirect("edit-category.php?id=$category_id", "Something went wrong");
    }
} else if (isset($_POST['delete_category_button'])) {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($conn, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../img/cateImg/" . $image)) {
            unlink("../img/cateImg/" . $image);
        }
        // redirect('category.php', 'Category succesfully deleted');
        echo 200;
    } else {
        // redirect('category.php', 'Something went wrong');
        echo 500;
    }
} else if (isset($_POST['add_product_btn'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $item_price = $_POST['item_price'];
    $item_brand = $_POST['item_brand'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $tags = $_POST['tags'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending'])  ? '1' : '0';

    $image = $_FILES['image']['name'];

    $path = "../img/exproducts";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_ext;

    if ($name != '' && $slug != '' && $description != '' && $item_brand != '' && $item_price != '') {
        $product_query = "INSERT INTO product (category_id,item_brand,item_name,slug,small_description,description,item_price,
        qty,status,meta_description,trending,meta_title,meta_keywords,item_tags,item_image) VALUES ('$category_id', '$item_brand', '$name',
        '$slug', '$small_description', '$description', '$item_price', '$qty', '$status','$meta_description', '$trending', '$meta_title', 
        '$meta_keywords', '$tags', '$filename')";

        $product_query_run = mysqli_query($conn, $product_query);
        if ($product_query_run) {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
            redirect("add-product.php", "Product added Succesfully");
        } else {
            redirect("add-product.php", "Something went wrong");
        }
    } else {
        redirect("add-product.php", "You have some empty fields");
    }
} else if (isset($_POST['update_product_btn'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $item_price = $_POST['item_price'];
    $item_brand = $_POST['item_brand'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $tags = $_POST['tags'];
    $meta_description = $_POST['meta_description'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1' : '0';
    $trending = isset($_POST['trending'])  ? '1' : '0';

    $path = "../img/exproducts";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];


    if ($new_image != '') {
        // update filename = $newimage
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $updateFilename = time() . '.' . $image_ext;
    } else {
        $updateFilename = $old_image;
    }



    $update_product_query = "UPDATE product SET category_id='$category_id', item_brand='$item_brand',item_name='$name', slug='$slug', 
     small_description='$small_description', description='$description', item_price='$item_price', item_image='$updateFilename', qty='$qty', status='$status', 
     meta_description='$meta_description', trending='$trending', meta_title='$meta_title', meta_keywords='$meta_keywords', 
     item_tags='$tags'  WHERE item_id='$product_id'";

    $update_product_query_run = mysqli_query($conn, $update_product_query);

    if ($update_product_query_run) {
        if ($_FILES['image']['name'] != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $updateFilename);
            if (file_exists("../img/exproducts/" . $old_image)) {
                unlink("../img/exproducts/" . $old_image);
            }
        }
        redirect("edit-product.php?id=$product_id", "Product updated successfully");
    } else {
        redirect("edit-product.php?id=$product_id", "Something went wrong");
    }
} else if (isset($_POST['delete_product_button'])) {
    $product_id = mysqli_real_escape_string($conn, $_POST['product_id']);

    $product_query = "SELECT * FROM product WHERE item_id='$product_id'";
    $product_query_run = mysqli_query($conn, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['item_image'];

    $delete_query = "DELETE FROM product WHERE item_id='$product_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        if (file_exists("../img/exproducts/" . $image)) {
            unlink("../img/exproducts/" . $image);
        }
        // redirect('products.php', 'Product succesfully deleted');
        echo 200;
    } else {
        redirect('products.php', 'Something went wrong');
    }
} else if (isset($_POST['create_admin_btn'])) {
    $user_id = $_POST['user_id'];
    $role_as = isset($_POST['role_as']) ? '1' : '0';

    $update_user_query = "UPDATE users SET role_as='$role_as' WHERE user_id ='$user_id'";

    $update_user_query_run = mysqli_query($conn, $update_user_query);

    if ($update_user_query_run) {
        redirect("edit-user.php?id=$user_id", "User Role updated successfully");
    } else {
        redirect("edit-user.php?id=$user_id", "Something went wrong");
    }
} else if (isset($_POST['delete_user_button'])) {
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

    $user_query = "SELECT * FROM users WHERE user_id='$user_id'";
    $user_query_run = mysqli_query($conn, $user_query);
    $user_data = mysqli_fetch_array($user_query_run);

    $delete_query = "DELETE FROM users WHERE user_id='$user_id'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        echo 200;
    } else {
        echo 500;
    }
} else if (isset($_POST['update_status_btn'])) {
    $reference = $_POST['reference'];
    $status = $_POST['status'];

    $update_status_query = "UPDATE orders SET status='$status' WHERE reference ='$reference'";

    $update_status_query_run = mysqli_query($conn, $update_status_query);

    if ($update_status_query_run) {
        redirect("edit-status.php?ref=$reference", "Order status updated successfully");
    } else {
        redirect("edit-status.php?ref=$reference", "Something went wrong");
    }
} else if (isset($_POST['update_request_btn'])) {
    $quotation_no = $_POST['quotation'];
    $status = $_POST['status'];

    $update_status_query = "UPDATE requests SET status='$status' WHERE quotation_no ='$quotation_no'";

    $update_status_query_run = mysqli_query($conn, $update_status_query);

    if ($update_status_query_run) {
        redirect("request-status.php?q=$quotation_no", "Request status updated successfully");
    } else {
        redirect("request-status.php?q=$quotation_no", "Something went wrong");
    }
} else if (isset($_POST['delete_request_btn'])) {
    $request = mysqli_real_escape_string($conn, $_POST['id']);

    $request_query = "SELECT * FROM requests WHERE id='$request'";
    $request_query_run = mysqli_query($conn, $request_query);
    $request_data = mysqli_fetch_array($request_query_run);

    $delete_query = "DELETE FROM requests WHERE id='$request'";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        echo 200;
    } else {
        echo 500;
    }
} else if (isset($_POST['add_sales_btn'])) {
    $month = $_POST['month'];
    $amount = $_POST['amount'];
    $year = $_POST['year'];

    if ($month != '' && $amount != '' && $year != '') {
        $sales_query = "INSERT INTO sales_statistics (total_sales,month,year) VALUES ('$amount', '$month', '$year')";
        $sales_query_run = mysqli_query($conn, $sales_query);
        if ($update_user_query_run) {
            redirect("add-sales.php", "Monthly total added successfully");
        } else {
            redirect("add-sales.php", "Something went wrong");
        }
    }
} else {
    header('location: ../index.php');
}
