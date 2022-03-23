<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payon checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>
<?php
    // import the checkout generation class
    include '../generate_checkout.php';
    // create an instance of the checkout generation class
    $checkoutResponse = checkoutRequest();
    // decode $checkoutResponse
    $decoded_checkout_result = json_decode($checkoutResponse, true);
    // set variables for the checkout result
    $checkout_result_description = $decoded_checkout_result['result']['description'];
    $checkout_result_code = $decoded_checkout_result['result']['code'];
    $checkout_result_id = $decoded_checkout_result['id'];
?>

<div class="checkout-container">
    <h1>Purchase your Package</h1>
    <h3>3 Month consultation <strong> $40/month </strong></h3>
    <div class="checkout-form">
        <form action="../payment-result/index.php" class="paymentWidgets"
            data-brands="VISA MASTER AMEX"></form>
    </div>
</div>

<script src="script.js"></script>
<script async src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?= $checkout_result_id ?>"></script>
</body>
</html>