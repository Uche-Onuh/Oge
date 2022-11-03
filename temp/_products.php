<section id="page-header">
    <h2>All Products</h2>
    <p>Exochos Nigeria</p>
</section>

<!-- fEATURED PRODUCTS SECTION BEGINS -->
<section class="section-p1" id="product1">
    <div class="pro-contain">
        <?php foreach ($pageData['products'] as $items) { ?>
            <div class="pro product-data">
                <a href="productsingle.php?id=<?= $items['item_id']; ?>">
                    <img src="img/exproducts/<?php echo $items['item_image'] ?? './img/products/f1.jpg'; ?>" alt="Product" class="product-img"></a>
                <div class="desc">
                    <span><?php echo $items['item_brand'] ?? 'unknown'; ?></span>
                    <h5><?php echo $items['item_name'] ?? 'unknown'; ?></h5>
                    <span>Product code: <?= $items['slug'] ?></span>
                    <div class="star" style="margin-top: 5px;">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                        <img src="img/svgs/solid/star.svg">
                    </div>
                    <h4>&#8358; <?php echo number_format($items['item_price'] ?? '0'); ?><small style="text-decoration: line-through; color:black; font-size:11px; margin-left: 10px;">&#8358; <?php echo number_format($item['discount_price'] ?? '0'); ?></small></h4>
                </div>
                <button class="addToQuoteBtn" value="<?= $items['item_id']; ?>"><img src=" img/icon-01.svg" alt="" class="quote-img"></button>
                <input type="hidden" value="1" class="qty-input">
                <button class="cart-btn addToCartBtn" value="<?= $items['item_id']; ?>"><img src="img/svgs/solid/cart-shopping.svg" alt="" class="cart-img"></button>
            </div>
        <?php } ?>
    </div>
</section>
<!-- LATEST PRODUCTS BEGINS -->

<!-- PAGINATION -->
<section id="pagination" class="section-p1">

    <?php if ($pageData['prevPage']) : ?>
        <a href="products.php?page=<?php echo $pageData['prevPage'] ?>"><img src="img/svgs/solid/arrow-left-long.svg" alt=""></a>
    <?php else : ?>
        <span></span>
    <?php endif; ?>

    <!-- <a href="#" class="current">1</a>
        <a href="#">2</a> -->

    <?php if ($pageData['nextPage']) : ?>
        <a href="products.php?page=<?php echo $pageData['nextPage'] ?>"><img src="img/svgs/solid/arrow-right-long.svg" alt=""></a>
    <?php else : ?>
        <span></span>
    <?php endif; ?>
</section>