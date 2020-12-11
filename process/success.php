<?php
    if(!empty($_GET['tid'] && !empty($_GET['product']))) {
        $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

        $tid = $GET['tid'];
        $product = $GET['product'];
    }

    else {
        header('Location:../index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
    <title>Thank you!</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Thank you for purchasing <?= $product; ?></h2>
        <hr>
        <p>Your transaction ID is <?= $tid ?></p>
        <p>Check your email for more info</p>
        <a href="../index.php" class="btn btn-light mt-2">Go back</a>
    </div>
</body>
</html>