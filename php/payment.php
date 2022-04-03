<?php

$token = $_POST['stripeToken'];
$name = $_POST['name'];
$email = $_POST['email'];

require_once('../vendor/autoload.php');

//echo $token;

use \Stripe\StripeClient;

$data = [
  'source' => $token,
  'description' => $name,
  'email' => $email
];

if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($token) && !empty($name)) {
    $stripe = new \Stripe\StripeClient('sk_test_51KcvUWLvgKkU1KjF8e2Yd7xFnOiPtFa4s3meURUTjJ6kqEwkYaq16nIuZrY5Jgk0hA71xuVeHnzLPmlo1CSYTvO700rSF3nifa');
    $customer = $stripe->customers->create($data);
    echo json_encode($customer);
}
