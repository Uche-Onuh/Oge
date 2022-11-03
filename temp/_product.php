<?php

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['products_button'])) {
        // call method addtocart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>

<?php
if (isset($_GET['category'])) {

    $category_slug = $_GET['category'];
    $category_data = getSlugActive('categories', $category_slug);
    $category = mysqli_fetch_array($category_data);
    $cid = $category['id'];
}

?>

<section id="page-header">
    <h2><?= $category["name"] ?></h2>
    <p>Exochos Nigeria</p>
</section>
<!-- fEATURED PRODUCTS SECTION BEGINS -->


<section class="section-p1" id="product1">
    <div class="pro-contain">

        <?php
        $products = getProductsByCategory($cid);

        if (mysqli_num_rows($products) > 0) {
            foreach ($products as $item) {
        ?>
                <div class="pro product-data">
                    <a href="<?php printf('%s?id=%s', 'productsingle.php', $item['item_id']) ?>">
                        <img src="img/exproducts/<?php echo $item['item_image'] ?? './img/products/f1.jpg'; ?>" alt="" class="product-img">
                    </a>
                    <div class="desc">
                        <span><?php echo $item['item_brand']; ?></span>
                        <h5><?php echo $item['item_name']; ?></h5>
                        <span>Product code: <?= $item['slug'] ?></span>
                        <div class="star" style="margin-top: 5px;">
                            <img src="img/svgs/solid/star.svg">
                            <img src="img/svgs/solid/star.svg">
                            <img src="img/svgs/solid/star.svg">
                            <img src="img/svgs/solid/star.svg">
                            <img src="img/svgs/solid/star.svg">
                        </div>
                        <h4>&#8358; <?php echo number_format($item['item_price']); ?><small style="text-decoration: line-through; color:black; font-size:11px; margin-left: 10px;">&#8358; <?php echo number_format($item['discount_price'] ?? '0'); ?></small></h4>
                    </div>
                    <button class="addToQuoteBtn" value="<?= $item['item_id']; ?>"><img src=" img/icon-01.svg" alt="" class="quote-img"></button>
                    <input type="hidden" value="1" class="qty-input">
                    <button class="cart-btn addToCartBtn" value="<?= $item['item_id']; ?>"><img src="img/svgs/solid/cart-shopping.svg" alt="" class="cart-img"></button>
                </div>
        <?php
            }
        }
        ?>
    </div>
</section>


<!-- LATEST PRODUCTS BEGINS -->