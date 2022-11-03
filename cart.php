<?php
include("header.php")
?>

<!-- cart BEGINS -->
<?php
// if cart is not empty
$items = getCartItems();
if (mysqli_num_rows($items) > 0) {
    include("temp/_cart.php");
} else {
    include("temp/not_found/_cart_not_found.php");
}
?>
<!-- cart ends -->

<!-- NEWSLETTER SECTION BEGINS -->
<?php
include("temp/_newsletter.php")
?>
<!-- NEWSLETTER SECTION END -->


<!-- footer section -->
<?php
include("footer.php")
?>