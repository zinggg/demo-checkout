<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
  <?php 
    include '../checkout_response.php';
    $id = $_GET['id'];
    $checkoutResponse = checkoutReponse($id);
    $decoded_result = json_decode($checkoutResponse, true);
    $transaction_id = $decoded_result['id'] ?? null
  ?>

    <div class="ctn">
      <div class="col">
        <?php
          if ($transaction_id != null) {
            echo "<h1>Payment successful</h1>";
          } else {
            echo "<h1>Invalid/Expired</h1>";
          }
        ?>
        <ul>
          <?php
          if ($transaction_id != null) {
            echo "<li>Transaction ID:";
            echo "<span>" . $decoded_result['id'] . "</span>";
            echo "</li>";
          }
        ?>
          
          <li>Response Code: <span><?= $decoded_result['result']['code']; ?></span></li>
          <li>Payment Description: <span><?= $decoded_result['result']['description']; ?></span></li>
          <li>Payment Date: <span><?= $decoded_result['timestamp']; ?></span></li>
        </ul>
        <a href="../index.html" class="wpwl-button wpwl-button-back">Main page</a>
      </div>
      <div class="col"><img src="26627070.png" alt="" /></div>
    </div>
  </body>
</html>
