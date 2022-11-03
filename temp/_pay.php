<?php
$payment_id = $_GET['payment_id'];
$user_id = $_SESSION['user_id'];


$payment_data = getOrder('orders', $payment_id);
$data = mysqli_fetch_array($payment_data);

$firstname = $data['first_name'];
$surname = $data['surname'];
$email = $_SESSION['email'];
$phone = $data['phone'];
$address = $data['shipping_address'];
$shipping = $data['shipping'];
$amount = $data['total_price'];
?>



<section id="pay" class="section-p1 pay">
    <div class="container">
        <h2>Hello, <?= $firstname ?> <?= $surname ?></h2>
        <p>Contact Email: <span style="font-weight: 600;"> <?= $email ?></span></p>
        <p>Contact Number: <span style="font-weight: 600;"> <?= $phone ?></span></p>
        <p>Contact Address: <span style="font-weight: 600;"> <?= $address ?></span></p>
        <p>Applied Delivery Fee: <span style="font-weight: 600;">&#8358; <?= number_format($shipping) ?></span></p>
        <p>Total Fee: <span style="font-weight: 600;">&#8358; <?= number_format($amount) ?></span></p>

        <form action="" method="POST">
            <script src="https://js.paystack.co/v1/inline.js"></script>
            <button name="sub" type="button" onclick="payPageWithPaystack()" class="normal"> Proceed to payment</button>
        </form>

        <script>
            function payPageWithPaystack() {
                const api = "pk_live_86408a11baad06a0548322683237fb459c712316";
                var handler = PaystackPop.setup({
                    key: api,
                    email: "<?php echo $email; ?>",
                    amount: <?php echo $amount; ?> * 100,
                    currency: "NGN",
                    ref: '' + Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
                    firstname: "<?php echo $firstname; ?>",
                    lastname: "<?php echo $surname; ?>",
                    phone: "<?php echo $phone; ?>",
                    // label: "Optional string that replaces customer email"
                    metadata: {
                        custom_fields: [{
                                display_name: "First Name:",
                                variable_name: "first_name",
                                value: "<?php echo $firstname; ?>",
                            },
                            {
                                display_name: "Last Name:",
                                variable_name: "last_name",
                                value: "<?php echo $surname; ?>",
                            },
                            {
                                display_name: "Phone Number:",
                                variable_name: "phone_number",
                                value: "<?php echo $phone; ?>",
                            },
                            {
                                display_name: "Transaction",
                                variable_name: "transaction",
                                value: "<?php echo $payment_id; ?>",
                            }
                        ]
                    },
                    callback: function(response) {
                        const referenced = response.reference;
                        var payment_id = "<?php echo $payment_id ?>";
                        window.location.href = 'success.php?successfullypaid=' + referenced + "&payment_id=" + payment_id;
                    },
                    onClose: function() {
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }
        </script>

    </div>
</section>