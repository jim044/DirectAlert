<?php

include_once "db_functions.php";

$db = new DB_Functions();

$res = $db->getUser();
$resCB = $db->getCB();

$fields = array
    (
        'client_token' => '"'.$res['token_zinc'].'"',
    	'retailer' => 'amazon',
    	'products' => array(array('product_id' => 'B012AWBDWO', 'quantity' => 1, 'variants' => array('dimension' => '', 'value' => ''))),
    	'max_price' => 2300,
    	'shipping_address' => array('first_name' => '"'.$res['first_name'].'"', 'last_name' => '"'.$res['last_name'].'"', 'address_line1' => '48 E RUE ERNEST RENAN', 'address_line2' => '', 'zip_code' => '69200', 'city' => 'VENISSIEUX', 'state' => 'Rhone', 'country' => 'FR', 'phone_number' => '"'.$res['phone_number'].'"'),
    	'is_gift' => true,
	    'gift_message' => 'Here is your package, Jimmy! Enjoy!',
		'shipping' => array('order_by' => 'price', 'max_days' => 90, 'max_price' => 20), 
		'payment_method' => array('name_on_card' => '"'.$resCB['first_name'].' '.$resCB['last_name'].'"', 'number' => '"'.$resCB['carte_number'].'"', 'security_code' => '"'.$resCB['cvc'].'"', 'expiration_month' => intval($resCB['month']),
	    'expiration_year' => intval($resCB['year']),
	    'use_gift' => false),

	    'billing_address' => array('first_name' => '"'.$res['first_name'].'"',
								    'last_name' => '"'.$res['last_name'].'"',
								    'address_line1' => '48 E RUE ERNEST RENAN',
								    'address_line2'=> "",
								    'zip_code' => '69200',
								    'city'=> "LYON",
								    'state' => "RHONES",
								    'country'=> "FR",
								    'phone_number' => '"'.$res['phone_number'].'"'),
	     'retailer_credentials' => array('email' => 'jimmy.1993@hotmail.fr',
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

//echo $response;


//{"request_id":"5b49a2270cac4efef43f68cc218a394e"}

//{"request_id":"8cce314569e4970eb616cf3a6702937f"}

//{"request_id":"aef6eb28921360a299b19d6074b025b7"}

//{"request_id":"a7af5e0db340b59a913ea4c0768a73f8"}

//{"request_id":"2f483091429fbe5eb65329951c4afc43"}

//{"request_id":"6e1f08c4fc2018ede35c64c2a0950296"}

//{"request_id":"06109a1b139591ccdc56be2a6f81279d"}

//{"request_id":"f3deba224678ffae62d4ad4b451db1ff"}

//{"request_id":"0b8abe27fed9088076286b91e7c0f5aa"}
?>