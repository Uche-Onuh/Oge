<?php
// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['products_button'])) {
        // call method aadtocart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<section class="section-p1" id="product1">
    <div class="pro-contain">
        <?php
        if (isset($_POST['submit-search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);
            $sql = "SELECT * FROM product WHERE item_tags LIKE '%$search%' OR item_name LIKE '%$search%' OR item_brand LIKE '%$search%' OR item_price LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);
            // $queryResult = mysqli_num_rows($result);

            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $item) {
        ?>

                    <div class="pro-contain">
                        <div class="pro product-data">
                            <a href="<?php printf('%s?item_name=%s', 'productsingle.php', $item['item_name']) ?>">
                                <img src=" img/exproducts/<?= $item['item_image'] ?? 'unknown' ?>" alt="" class="product-img">
                            </a>
                            <div class="desc">
                                <span><?= $item['item_brand'] ?? 'unknown' ?></span>
                                <h5><?= $item['item_name'] ?? 'unknown' ?></h5>
                                <span>Product code: <?= $item['slug'] ?></span>
                                <div class="star" style="margin-top: 5px;">
                                    <img src="img/svgs/solid/star.svg">
                                    <img src="img/svgs/solid/star.svg">
                                    <img src="img/svgs/solid/star.svg">
                                    <img src="img/svgs/solid/star.svg">
                                    <img src="img/svgs/solid/star.svg">
                                </div>
                                <h4>&#8358;<?= $item['item_price'] ?? 'unknown' ?><small style="text-decoration: line-through; color:black; font-size:11px; margin-left: 10px;">&#8358; <?php echo number_format($item['discount_price'] ?? '0'); ?></small></h4>
                            </div>
                            <input type="hidden" value="Size 6" class="size">
                            <input type="hidden" value="1" class="qty-input">
                            <button class="cart-btn addToCartBtn" value="<?= $item['item_id']; ?>"><img src="img/svgs/solid/cart-shopping.svg" alt="" class="cart-img"></button>
                        </div>
            <?php
                }
            } else {
                echo "<h1 class='text-center' style='font-size: 40px; margin:100px auto; text-align:center;'>There is no result for your search</h1>";
            }
        }
            ?>
                    </div>
</section>