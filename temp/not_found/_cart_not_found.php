<section id="page-header">
    <h2>#cart</h2>
    <p>View Items in Your Cart</p>
</section>

<section id="cart" class="section-p1">
    <!-- empty cart -->
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12 text-center py-2">
                    <img src="./img/about/empty_cart.png" alt="Empty cart" class="img-fluid" style="height:500px; width:80%">
                    <div style="display:flex; justify-content:center;">
                        <p class="font-baloo font-size-16 text-black-50" style="font-size:25px; font-weight:700;">Empty Cart</p>
                        <button class="normal" style="margin-left:30px;"><a href="index.php">Continue shopping</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- empty cart -->
</section>

<section class="section-p1" id="cart-add">
    <div id="coupon">
        <!-- <h3>Apply Coupon</h3>
            <div>
                <input type="text" placeholder="Enter Your Coupon">
                <button class="normal">Apply</button>
            </div> -->
    </div>

    <div id="subtotal">
        <h3>Cart Total</h3>
        <table>
            <tr>
                <td>Cart Subtotal</td>
                <td>&#8358; <span class="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span></td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>&#8358; <span class="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?></span> </strong></td>
            </tr>
        </table>
        <button class="normal" type="submit">Proceed to Checkout</button>
    </div>
</section>