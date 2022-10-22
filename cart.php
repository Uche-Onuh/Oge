<?php
include("header.php");
?>

<div id="cart" class="section-p1" style="margin-top: 70px;">
    <table width="100%">
        <thead>
            <tr>
                <td>Remove</td>
                <td>Image</td>
                <td>Product</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Subtotal</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button><span class="material-symbols-outlined">delete</span></button></td>
                <td><img src=" img/products/f1.jpg" alt=""></td>
                <td>Cartoon Astronaught T-shirt</td>
                <td>$3000</td>
                <td>
                    <button class="qty-up border bg-light">-</button>
                    <input type="text" disabled>
                    <button class="qty-up border bg-light">+</button>
                </td>
                <td>$3000</td>
            </tr>
            <tr>
                <td><button><span class="material-symbols-outlined">delete</span></button></td>
                <td><img src="img/products/f1.jpg" alt=""></td>
                <td>Cartoon Astronaught T-shirt</td>
                <td>$3000</td>
                <td><input type="number" value="1"></td>
                <td>$3000</td>
            </tr>
            <tr>
                <td><button><span class="material-symbols-outlined">delete</span></button></td>
                <td><img src="img/products/f1.jpg" alt=""></td>
                <td>Cartoon Astronaught T-shirt</td>
                <td>$3000</td>
                <td><input type="number" value="1"></td>
                <td>$3000</td>
            </tr>
        </tbody>
    </table>
</div>


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
                <td>$9000</td>
            </tr>
            <tr>
                <td>Shipping</td>
                <td>Free</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td><strong>$9000</strong></td>
            </tr>
        </table>
        <button class="btn" type="submit" width="100%">Proceed to Checkout</button>
    </div>
</section>


<?php
include("includes/_newsletter.php");
?>
<?php
include("footer.php");
?>