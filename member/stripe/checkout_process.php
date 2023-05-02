<?php
  include '../authorization.php';
  include 'C:\xampp\htdocs\HulkZone\connect.php';
?>
<?php

include('../stripe/stripe-php/init.php');
// require_once '../vendor/autoload.php';
require_once '../stripe/secrets.php';

\Stripe\Stripe::setApiKey('sk_test_51MihJyAQ8qDWFtDV0XqAva3SYTPiA6S8EgRVole7UFhkeRYw4uLNqPq5jrxvYsuP0Byaa1HzGCrGcpJHG2Q43Xu000jA2ecRHZ');
header('Content-Type: application/json');

$url =  "http://localhost/HulkZone/member/stripe/";
echo $url;
$YOUR_DOMAIN = $url;

$paymentAmount = $_POST['paymentAmount'];
$type = $_POST['type'];
$employeeID = isset($_POST['employeeID']) ? $_POST['employeeID'] : 0;

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'lkr',
      'unit_amount' => $paymentAmount * 100, //smallest currency unit which is cents //100 cents = 1 lkr
      'product_data' => [
        'name' => 'Payment',
        'images' => ["../images/pay.jpg"],
      ],
    ],
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    // 'price' => '{{PRICE_ID}}',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/success.php?amount=' . $paymentAmount . '&type=' . $type . '&employeeID=' . $employeeID,
  'cancel_url' => $YOUR_DOMAIN . '/cancel.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>