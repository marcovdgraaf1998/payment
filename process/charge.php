<?php
    require_once('../vendor/autoload.php');
    require_once('../config/db.php');
    require_once('../lib/pdo_db.php');
    require_once('../models/Customer.php');
    require_once('../models/Transaction.php');

    \Stripe\Stripe::setApiKey('sk_test_51Hx9e6DZ316V0ELv4Wr0zb6EBcPSOsCyofSmmhRpn2VWjnBoDd65QKwQKLYF55fImcT4eenQFaIBHDKQ3GyxnggH00hBri0jc1');
    
    # Sanitize POST Array
    $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

    $first_name = $POST['first_name'];
    $last_name = $POST['last_name'];
    $email = $POST['email'];
    $token = $POST['stripeToken'];

    # Create customer in Stripe
    $customer = \Stripe\Customer::create(array(
        "email" => $email,
        "source" => $token
    ));

    # Charge customer
    $charge = \Stripe\Charge::create(array(
        "amount" => 5000,
        "currency" => "usd",
        "description" => "Intro To React Course",
        "customer" => $customer->id
    ));

    ## Customer ##
    # Customer data 
    $customerData = [
        'id' => $charge->customer,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email
      ];
      
    # Instantiate customer
    $customer = new Customer();
    
    # Add customer to db
    $customer->addCustomer($customerData);

    ## Transaction ##
    # Transaction data
    $transactionData = [
        'id' => $charge->id,
        'customer_id' => $charge->customer,
        'product' => $charge->description,
        'amount' => $charge->amount,
        'currency' => $charge->currency,
        'status' => $charge->status
      ];
      
    # Instantiate transaction
    $transaction = new Transaction();
    
    # Add transaction to db
    $transaction->addTransaction($transactionData);

    # Redirect to success
    header('Location: success.php?tid='.$charge->id.'&product='.$charge->description);