 <section id="page-header">
     <h2>#checkout</h2>
     <p>Checkout your purchase</p>
 </section>

 <section id="checkout" class="section-p1">
     <div class="container">
         <h4>Shipping Address</h4>
         <form action="controller/placeorder.php" method="POST">
             <hr>
             <div class="checkout-details">
                 <div class="form">
                     <input type="text" placeholder="Enter your first Name" required name="firstname">
                     <input type="text" placeholder="Enter your surname Name" required name="surname">
                     <input type="email" value="<?= $_SESSION['email'] ?>" placeholder="<?= $_SESSION['email'] ?>" name="email">
                     <input type="text" placeholder="Enter your Phone Number" required name="number">
                     <input type="text" placeholder="Enter your Whatsapp Phone Number" name="wnumber">
                     <input type="number" placeholder="Postal Code" required name="pcode">
                     <select name="state" id="state" required class="address">
                         <option selected disabled>State of Residence</option>
                         <option value="Abia">Abia</option>
                         <option value="Abuja">Abuja</option>
                         <option value="Adamawa">Adamawa</option>
                         <option value="Akwa Ibom">Akwa Ibom</option>
                         <option value="Anambra">Anambra</option>
                         <option value="Bauchi">Bauchi</option>
                         <option value="Bayelsa">Bayelsa</option>
                         <option value="Benue">Benue</option>
                         <option value="Borno">Borno</option>
                         <option value="Cross River">Cross River</option>
                         <option value="Delta">Delta</option>
                         <option value="Ebonyi">Ebonyi</option>
                         <option value="Edo">Edo</option>
                         <option value="Ekiti">Ekiti</option>
                         <option value="Enugu">Enugu</option>
                         <option value="Gombe">Gombe</option>
                         <option value="Imo">Imo</option>
                         <option value="Jigawa">Jigawa</option>
                         <option value="Kaduna">Kaduna</option>
                         <option value="Kano">Kano</option>
                         <option value="Katsina">Katsina</option>
                         <option value="Kebbi">Kebbi</option>
                         <option value="Kogi">Kogi </option>
                         <option value="Kwara">Kwara</option>
                         <option value="Lagos">Lagos</option>
                         <option value="Nasarawa">Nasarawa</option>
                         <option value="Niger">Niger</option>
                         <option value="Ogun">Ogun</option>
                         <option value="Ondo">Ondo</option>
                         <option value="Osun">Osun</option>
                         <option value="Oyo">Oyo</option>
                         <option value="Plateau">Plateau</option>
                         <option value="Rivers">Rivers</option>
                         <option value="Sokoto">Sokoto</option>
                         <option value="Taraba">Taraba</option>
                         <option value="Yobe">Yobe</option>
                         <option value="Zamfara">Zamfara</option>
                     </select>
                     <input type="text" placeholder="Enter your address" required class="address" name="address">
                     <input type="hidden" value="Pending" name="payment_status">
                 </div>

                 <div class="checkout-prod">
                     <hr>

                     <?php
                        $items = getCartItems();
                        $totalPrice = 0;
                        $totalweight = 0;
                        foreach ($items as $item) {
                        ?>
                         <div class="prod product-data">
                             <img src="img/exproducts/<?= $item['item_image'] ?>" alt="" width="70px" height="70px">
                             <div>
                                 <p class="name"><?= $item['item_name'] ?></p>
                                 <div class="price">&#8358; <?= number_format($item['item_price']); ?></div>
                                 <p>QTY: <?= $item['qty'] ?></p>
                             </div>
                             <div id="sub">
                                 <h4>Subtotal</h4>
                                 <p>&#8358; <?= number_format($item['item_price'] * $item['qty']); ?></p>
                             </div>
                         </div>
                         <hr>
                     <?php
                            $totalPrice += $item['item_price'] * $item['qty'];
                            $totalweight += $item['qty'] *  $item['pty'];
                        }
                        ?>
                     <div class="total_price" id="total">
                         <h4>Total Purchase Weight:</h4>
                         <p> <?= $totalweight ?></p>
                     </div>
                     <div class="total_price" id="total">
                         <h4>Total Price:</h4>
                         <p>&#8358; <?= number_format($totalPrice); ?></p>
                     </div>
                     <hr>
                     <p style="text-align: center; font-size: 13px;">Delivery fee applied By Purchase Weight and State of Residence</p>
                     <button class="normal" type="submit" name="placeOrderBtn">Confirm and Place Order</button>
                 </div>
         </form>
     </div>
     </div>
 </section>