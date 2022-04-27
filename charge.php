<?php


  require_once('vendor/autoload.php');
  require_once('config/dbPayment.php');
  require_once('lib/pdo_db.php');
  require_once('models/Customer.php');
  require_once('models/Transaction.php');

  \Stripe\Stripe::setApiKey('sk_test_51KcvUWLvgKkU1KjF8e2Yd7xFnOiPtFa4s3meURUTjJ6kqEwkYaq16nIuZrY5Jgk0hA71xuVeHnzLPmlo1CSYTvO700rSF3nifa');

 // Sanitize POST Array
 $POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);

 $first_name = $POST['first_name'];
 $last_name = $POST['last_name'];
 $email = $POST['email'];
 $token = $POST['stripeToken'];
 $products_id = $POST['ids'];
 $price = $POST['price'];

 echo "alert('$first_name');";

// Create Customer In Stripe
$customer = \Stripe\Customer::create(array(
  "email" => $email,
  "source" => $token
));

// Charge Customer
$charge = \Stripe\Charge::create(array(
  "amount" => $price,
  "currency" => "eur",
  "description" => $products_id,
  "customer" => $customer->id
));

// Customer Data
$customerData = [
  'id' => $charge->customer,
  'first_name' => $first_name,
  'last_name' => $last_name,
  'email' => $email
];

// Instantiate Customer
$customer = new Customer();

// Add Customer To DB
$customer->addCustomer($customerData);


// Transaction Data
$transactionData = [
  'id' => $charge->id,
  'customer_id' => $charge->customer,
  'product' => $charge->description,
  'amount' => $charge->amount,
  'currency' => $charge->currency,
  'status' => $charge->status,
];

// Instantiate Transaction
$transaction = new Transaction();

// Add Transaction To DB
$transaction->addTransaction($transactionData);

// Redirect to success
header('Location: /php/success.php?tid='.$charge->id.'&products='.$charge->description.'&amount='.$charge->amount);
