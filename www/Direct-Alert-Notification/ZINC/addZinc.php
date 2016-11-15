<?php

$token_client = $_POST['token_client'];
$id_product = $_POST['id_product'];
$market = $_POST['market'];


$fields = array
    (
        'client_token' => 'E74D0B610F859CF4B0E5CA25',
    	'retailer' => "'".$market."'",
    	'products' => array(array('product_id' => "'".$id_product."'", 'quantity' => 1, 'variants' => array('dimension' => '', 'value' => ''))),
    	'max_price' => 2300,
    	'shipping_address' => array('first_name' => 'Jimmy', 'last_name' => 'VILLOSSEL', 'address_line1' => '48 E RUE ERNEST RENAN', 'address_line2' => '', 'zip_code' => '69200', 'city' => 'VENISSIEUX', 'state' => 'Rhone', 'country' => 'FR', 'phone_number' => '0643503741'),
    	'is_gift' => true,
	    'gift_message' => 'Here is your package, Jimmy! Enjoy!',
		'shipping' => array('order_by' => 'price', 'max_days' => 15, 'max_price' => 3), 
		'payment_method' => array('name_on_card' => 'Jimmy Villossel', 'number' => '5555555555554444', 'security_code' => '123', 'expiration_month' => 1,
	    'expiration_year' => 2020,
	    'use_gift' => false),

	    'billing_address' => array('first_name' => 'Jimmy',
								    'last_name' => 'VILLOSSEL',
								    'address_line1' => '48 E RUE ERNEST RENAN',
								    'address_line2'=> "",
								    'zip_code' => '69200',
								    'city'=> "LYON",
								    'state' => "RHONES",
								    'country'=> "FR",
								    'phone_number' => "0643503741"),
	     'retailer_credentials' => array('email' => 'jimmy.villossel@gmail.com',
		    							'password' => 'OBIWAN2715'),
	     'webhooks' => array('order_placed' => 'http://mywebsite.com/zinc/order_placed',
    							'order_failed'=> 'http://mywebsite.com/zinc/order_failed',
    							'tracking_obtained' => 'http://mywebsite.com/zinc/tracking_obtained'),

		 'client_notes' => array('our_internal_order_id' => 'abc123',
		    					'any_other_field' => array('any value')),
    

    );

//echo json_encode($fields);
$ch = curl_init('https://api.zinc.io/v0/order');
    curl_setopt_array($ch, array(
    CURLOPT_POST => TRUE,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_POSTFIELDS => json_encode($fields)
    ));

$response = curl_exec($ch);

echo $response;

?>