<?php

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['latest_sale_button'])) {
        // call method addtocart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>

<section class="section-p1" id="product1">
    <h2>Latest Products</h2>
    <p>Our Latest Products</p>
    <div class="pro-contain">
        <?php foreach ($product_shuffle as $item) { ?>
            <div class="pro product-data">
                <a href="<?php printf('%s?id=%s', 'productsingle.php', $item['item_id']) ?>">
                    <img src="img/exproducts/<?php echo $item['item_image'] ?? './img/exproducts/andris rs.jpg'; ?>" alt="Product" class="product-img"></a>
                <div class="desc">
                    <span><?php echo $item['item_brand'] ?? 'unknown'; ?></span>
                    <h5><?php echo $item['item_name'] ?? 'unknown'; ?></h5>
                    <span>Product code: <?= $item['slug'] ?></span>
                    <div class="star" style="margin-top: 5px;">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                    </div>
                    <h4>&#8358; <?php echo number_format($item['item_price'] ?? '0'); ?><small style="text-decoration: line-through; color:black; font-size:11px; margin-left: 10px;">&#8358; <?php echo number_format($item['discount_price'] ?? '0'); ?></small></h4>
                </div>
                <input type="hidden" value="Size 6" class="size">
                <input type="hidden" value="1" class="qty-input">
                <button class="cart-btn addToCartBtn" value="<?= $item['item_id']; ?>"><img src="img/svgs/solid/cart-shopping.svg" alt="" class="cart-img"></button>


            </div>
        <?php } ?>

    </div>
</section>