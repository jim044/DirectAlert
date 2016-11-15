<?php

$fields = array
    (
        'client_token' => 'E74D0B610F859CF4B0E5CA25', 
    );


$ch = curl_init('https://api.zinc.io/v1/orders/d554862751a8613c374134b4d6179484');
    curl_setopt_array($ch, array(
CURLOPT_POST => TRUE,
CURLOPT_RETURNTRANSFER => TRUE,
CURLOPT_POSTFIELDS => json_encode($fields)
    ));

    // Send the request
    $response = curl_exec($ch);

    echo $response;

?>