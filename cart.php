<?php
include("header.php");
?>





<div class="py-5" style="margin: 100px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row cart_items">
                    <div class="col-md-2">
                        <img src="images/products/news-6.jpg" alt="image name" width="80px">
                    </div>
                    <div class="col-md-3">
                        <h5>Product name</h5>
                    </div>

                    <div class="col-md-3">
                        <h5>Product price</h5>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group mb-3" style="width: 130px;">
                            <button class="input-group-text decrement-btn">-</button>
                            <input type="text" class="form-control text-center input-qty bg-white" value="" disabled>
                            <button class="input-group-text increment-btn">+</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include("includes/_newsletter.php");
?>
<?php
include("footer.php");
?>