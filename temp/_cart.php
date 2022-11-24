   <?php
    include("auntheticator.php");
    ?>

   <section id="page-header">
       <h2>#cart</h2>
       <p>View Items in Your Cart</p>
   </section>

   <section id="cart" class="section-p1 ">
       <table width="100%" id="myCart">
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
               <?php
                $items = getCartItems();
                $totalPrice = 0;
                $totalweight = 0;
                foreach ($items as $item) {
                ?>
                   <div>
                       <div class="row">
                           <tr class="product-data">
                               <td><button class="deleteItem normal" value="<?= $item['cid'] ?>" style="padding: 5px 10px;"><span class="material-symbols-outlined">delete</span></button></td>
                               <td><img src="img/exproducts/<?= $item['item_image'] ?>" alt="<?= $item['item_name'] ?>"></td>
                               <td><?= $item['item_name'] ?></td>

                               <td>&#8358; <?= number_format($item['item_price']) ?></td>
                               <td>
                                   <input type="hidden" class="prodId" value="<?= $item['item_id'] ?>">
                                   <div style="display:flex; align-items:center;">
                                       <button style="padding: 5px 15px; font-size: 25px; text-align:center;" class="decrement-btn updateQty">-</button>
                                       <input type="text" value="<?= $item['qty'] ?>" class="qty-input" style="width: 80px;">
                                       <button style="padding: 8px 17px; font-size: 20px; text-align:center;" class="increment-btn updateQty">+</button>
                                   </div>
                               </td>
                               <td>&#8358; <?= number_format($item['item_price'] * $item['qty']) ?></td>
                           </tr>
                       </div>
                   </div>
               <?php
                    $totalPrice += $item['item_price'] * $item['qty'];
                    $totalweight += $item['qty'] *  $item['pty'];
                }
                ?>
           </tbody>
       </table>
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
           <table id="addition">
               <tr>
                   <td>Cart Subtotal</td>
                   <td>&#8358; <span class="deal-price"><?= number_format($totalPrice) ?></span></td>
               </tr>
               <tr>
                   <td>Delivery Fee</td>
                   <td>Rates applied by Delivery Region</td>
               </tr>
               <tr>
                   <td><strong>Total</strong></td>
                   <td><strong>&#8358; <span class="deal-price"><?= number_format($totalPrice) ?></span> </strong></td>
               </tr>
           </table>
           <a href=" checkout.php" style="color: #fff;"><button class="normal" style="width:100%;">Proceed to Checkout</button></a>


       </div>
   </section>