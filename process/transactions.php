<?php
    require_once('../config/db.php');
    require_once('../lib/pdo_db.php');
    require_once('../models/Transaction.php');

    # Instantiate transaction
    $transaction = new Transaction();

    # Get transactions
    $transactions = $transaction->getTransactions();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
    <title>View transactions</title>
</head>
<body>
    <div class="container mt-4">
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-seconday">Customers</a>
        <a href="transactions.php" class="btn btn-primary">Transactions</a>
    </div>
    <hr>
        <h2>Customers</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Transaction ID</th>
                        <th>Customer</th>
                        <th>Product</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($transactions as $t) : ?>
                        <tr>
                            <td><?= $t->id; ?></td>
                            <td><?= $t->customer_id; ?></td>
                            <td><?= $t->product; ?></td>
                            <td><?= sprintf('%.2f', $t->amount / 100);  ?> <?= strtoupper($t->currency); ?></td>
                            <td><?= $t->created_at ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="../index.php"></a>
    </div>
</body>
</html>