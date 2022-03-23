<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payon checkout</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
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

    <div class="card">
      <div class="card-header">
        <div class="wpwl-title">
          Purchase your <br />
          Consultation Package
        </div>
        <div class="wpwl-subtitle">3 monthly consultations&nbsp;&nbsp;|&nbsp;&nbsp;<strong>$40/month</strong></div>
      </div>
      <form action="../payment-result/index.php" class="paymentWidgets"
            data-brands="VISA MASTER AMEX"></form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
    <script async src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?= $checkout_result_id ?>"></script>
  </body>
</html>
