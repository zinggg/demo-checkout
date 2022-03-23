<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Payon checkout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
  
    <div class="ctn">
      <div class="ls">
        <div class="card">
          <div class="card__btns">
            <div class="col">
              <button class="apple-pay">
                <span>Pay with</span>
                <img src="apple.svg" alt="" />
              </button>
            </div>
            <div class="col">
              <button class="google-pay">
                <span>Pay with</span>
                <img src="google.svg" alt="" />
              </button>
            </div>
          </div>
          <div class="card__sep"><span>or pay with card</span></div>
          <form action="../payment-result/index.php" class="paymentWidgets"
            data-brands="VISA MASTER AMEX"></form>
        </div>
      </div>
      <div class="rs"><img src="product.png" alt="" /></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="script.js"></script>
    <script async src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId=<?= $checkout_result_id ?>"></script>
  </body>
</html>
