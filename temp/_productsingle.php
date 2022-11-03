<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = getByProductId("product", $id);
    $altImg = getExtraImg($id);
    if (mysqli_num_rows($product) > 0) {
        $item = mysqli_fetch_array($product);

?>

        <section id="pro-detail" class="section-p1 product-data">
            <div class="single-pro-image">
                <img src="img/exproducts/<?php echo $item['item_image'] ?>" alt="<?php echo $item['item_name'] ?>" width="100%" height="450px" id="main-img">
                <div class="small-img-group" style="margin-top: 30px;">
                    <div class="small-img-col">
                        <img src="img/exproducts/<?php echo $item['item_image'] ?>" class="small-img" height="120px">
                    </div>
                    <?php
                    if (mysqli_num_rows($altImg) > 0) {
                        while ($fetch = mysqli_fetch_assoc($altImg)) {
                    ?>
                            <div class="small-img-col">
                                <img src="img/extraImg/<?php echo $fetch['image'] ?>" class="small-img" height="120px">
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>

            <div class="single-pro-detail">
                <h6>Home / <?php echo $item['item_brand'] ?? 'Brand'; ?></h6>
                <h4><?php echo $item['item_name'] ?? 'Unknown'; ?></h4>
                <span>Product code: <?= $item['slug'] ?></span>
                <h2>&#8358; <?php echo number_format($item['item_price'] ?? 0); ?> <small style="text-decoration: line-through; color:black; font-size:13px; margin-left: 10px;">&#8358; <?php echo number_format($item['discount_price'] ?? '0'); ?></small></h2>
                <tbody>
                    <tr>
                        <div style="display:flex; align-items:center; justify-content: start; margin-bottom: 10px;">
                            <button style="padding: 5px 15px; font-size: 25px; text-align:center; margin-right: 10px; outline:none; border:none;" class="decrement-btn">-</button>
                            <input type="text" value="1" class="qty-input" style="width: 80px  ;" disabled>
                            <button style="padding: 8px 17px; font-size: 20px; text-align:center; outline:none; border:none;" class="increment-btn">+</button>
                        </div>
                    </tr>
                </tbody>
                <button class="normal addToCartBtn" value="<?= $item['item_id']; ?>">Add to Cart</button>
                <button class="normal addToQuoteBtn" value="<?= $item['item_id'];  ?>">Get Quotation</button>
                <h4>Product Details</h4>
                <p style="margin: 5px 0;">
                    <?php echo $item['small_description'] ?? 0; ?>
                </p>
                <h4>Product Perfomance</h4>
                <p style="margin: 5px 0;">
                    <?php echo $item['description'] ?? 0; ?>
                </p>
                <h4>Product Specification</h4>
                <p style="margin: 5px 0;">
                    <?php echo $item['meta_description'] ?? 0; ?>
                </p>
            </div>
        </section>

<?php
    } else {
        echo "<h1 style='text-align:center;' class='section-p1'>Product not found for given Id</h1>";
    }
} else {
    echo "Product Id missing from url";
}
?>