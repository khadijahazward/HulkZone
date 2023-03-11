<?php

include('../stripe/stripe-php/init.php');
// require_once '../vendor/autoload.php';
require_once '../stripe/secrets.php';

\Stripe\Stripe::setApiKey('sk_test_51MihJyAQ8qDWFtDV0XqAva3SYTPiA6S8EgRVole7UFhkeRYw4uLNqPq5jrxvYsuP0Byaa1HzGCrGcpJHG2Q43Xu000jA2ecRHZ');
header('Content-Type: application/json');

$url =  "http://localhost/HulkZone/member/stripe/";
echo $url;
$YOUR_DOMAIN = $url;

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'lkr',
      'unit_amount' => 50000, //smallest currency unit which is cents //100 cents = 1 lkr
      'product_data' => [
        'name' => 'Strubborn Attachments',
        'images' => ["https://i.imagur.com/EMyR2nP.png"],
      ],
    ],
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    // 'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.html',
  'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>