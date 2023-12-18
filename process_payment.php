<?php

require_once 'vendor/autoload.php';
include_once 'config.php';
// require_once 'secrets.php';


$stripe = new \Stripe\StripeClient('sk_test_TOhtnAvqZoPHQAJchqbfTjNO00MiSbjGd2');

// function calculateOrderAmount(array $items): int
// {
//     // Replace this constant with a calculation of the order's amount
//     // Calculate the order total on the server to prevent
//     // people from directly manipulating the amount on the client
//     return 1400;
// }

header('Content-Type: application/json');

try {
  // retrieve JSON from POST body
  $jsonStr = file_get_contents('php://input');
  $jsonObj = json_decode($jsonStr, true);

  $token_pay = $jsonObj['items'][0]['token_pay'];

  $respuesta = file_get_contents(URL_SOFTMOR_POS . 'consultar-carrito/' . $token_pay);
  $cto = json_decode($respuesta, true);

  $cto_total = str_replace('.', '', $cto['cto_total']);
  // return;
  // Create a PaymentIntent with amount and currency
  $paymentIntent = $stripe->paymentIntents->create([
    'amount' =>  $cto_total,
    'currency' => 'mxn',
    // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
    'automatic_payment_methods' => [
      'enabled' => true,
    ],
  ]);

  // API PARA AGREGAR EL CLIENT SECRET
  $cto_id_pay = file_get_contents(URL_SOFTMOR_POS . 'carrito/cto_id_pay/' . $paymentIntent->client_secret . '/tokenpay/' . $token_pay);


  $output = [
    'clientSecret' => $paymentIntent->client_secret,
  ];

  echo json_encode($output);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}
