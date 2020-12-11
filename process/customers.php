<?php
    require_once('../config/db.php');
    require_once('../lib/pdo_db.php');
    require_once('../models/Customer.php');

    # Instantiate customer
    $customer = new Customer();

    # Get customer
    $customers = $customer->getCustomers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css'/>
    <title>View customers</title>
</head>
<body>
    <div class="container mt-4">
    <div class="btn-group" role="group">
        <a href="customers.php" class="btn btn-primary">Customers</a>
        <a href="transactions.php" class="btn btn-secondary">Transactions</a>
    </div>
    <hr>
        <h2>Customers</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $c) : ?>
                    <tr>
                        <td><?= $c->id ?></td>
                        <td><?= $c->first_name ?></td>
                        <td><?= $c->last_name ?></td>
                        <td><?= $c->email ?></td>
                        <td><?= $c->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <br>
        <a href="../index.php"></a>
    </div>
</body>
</html>