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
        <a href="../index.html" class="back">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" fill="currentColor">
            <path d="M990,57.1L942.9,10L500,452.9L57.1,10L10,57.1L452.9,500L10,942.9L57.1,990L500,547.1L942.9,990l47.1-47.1L547.1,500L990,57.1z"/>
          </svg>
        </a>
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
