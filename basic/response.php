<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response page</title>
</head>
<body>
    <?php 
        echo $url = "https://eu-test.oppwa.com" . $_GET['resourcePath'];
        echo "<br>";
        echo $id = $_GET['id'];
        echo "<br>";
        include '../checkout_response.php';
        $checkoutResponse = checkoutReponse($id);
        $decoded_result = json_decode($checkoutResponse, true);
        echo "<br> cechkout result: <br>";
        echo $checkoutResponse;
        echo "<br> Decoded result: <br>";
        var_dump($decoded_result);
        echo "<br> GET: <br>";
        var_dump($_GET);
        echo "<br> resourcePath: <br>";
        print($_GET['resourcePath']);
        echo "<br> URLTEST: <br>";

  


        
    ?>



</body>
</html>