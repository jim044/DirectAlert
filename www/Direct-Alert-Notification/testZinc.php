<?php

$jsontest = '{
  "retailer": "amazon",
  "products": [
    {
      "product_id": "0923568964",
      "quantity": 1,
      "variants": [
        {
          "dimension": "color",
          "value": "Red",
        }
      ]
    }
  ],
  "max_price": 2300,
  "shipping_address": {
    "first_name": "Jimmy",
    "last_name": "VILLOSSEL",
    "address_line1": "48 E RUE ERNEST RENAN",
    "address_line2": "",
    "zip_code": "69200",
    "city": "LYON",
    "state": "RHONES",
    "country": "FR",
    "phone_number": "0643503741"
  },
  "is_gift": true,
  "gift_message": "Here is your package, Jimmy! Enjoy!",
  "shipping": {
    "order_by": "price",
    "max_days": 5,
    "max_price": 1000
  },
  "payment_method": {
    "name_on_card": "Ben Bitdiddle",
    "number": "5555555555554444",
    "security_code": "123",
    "expiration_month": 1,
    "expiration_year": 2020,
    "use_gift": false
  },
  "billing_address": {
    "first_name": "Jimmy",
    "last_name": "VILLOSSEL",
    "address_line1": "48 E RUE ERNEST RENAN",
    "address_line2": "",
    "zip_code": "69200",
    "city": "LYON",
    "state": "RHONES",
    "country": "FR",
    "phone_number": "0643503741"
  },
  "retailer_credentials": {
    "email": "jimmy.villossel@gmail.com",
    "password": "OBIWAN2715"
  },
  "webhooks": {
    "order_placed": "http://mywebsite.com/zinc/order_placed",
    "order_failed": "http://mywebsite.com/zinc/order_failed",
    "tracking_obtained": "http://mywebsite.com/zinc/tracking_obtained"
  },
  "client_notes": {
    "our_internal_order_id": "abc123",
    "any_other_field": ["any value"]
  }
}';

// $fields = array
//     (
//     	'retailer' => 'amazon',
//     	'products' => array('product_id' => '0923568964', 'quantity' => 1, 'variants' => array('dimension' => 'color', 'value' => 'Red')),
//     	'max_price' => 2300,
//     	'shipping_address' => array('first_name' => 'Jimmy', 'last_name' => 'VILLOSSEL', 'address_line1' => '48 E RUE ERNEST RENAN', 'address_line2' => '', 'zip_code' => '69200', 'city' => 'VENISSIEUX', 'state' => 'Rhone', 'country' => 'FR', 'phone_number' => '0643503741'),
//     	'is_gift' => true,
// 	    'gift_message' => 'Here is your package, Jimmy! Enjoy!',
// 		'shipping' => array('order_by' => 'price', 'max_days' => 5, 'max_price' => 1000), 
// 		'payment_method' => array('name_on_card' => 'Ben Bitdiddle', 'number' => '5555555555554444', 'security_code' => '123', 'expiration_month' => 1,
// 	    'expiration_year' => 2020,
// 	    'use_gift' => false),

// 	    'billing_address' => array('first_name' => 'Jimmy',
// 								    'last_name' => 'VILLOSSEL',
// 								    'address_line1' => '48 E RUE ERNEST RENAN',
// 								    'address_line2'=> "",
// 								    'zip_code' => '69200',
// 								    'city'=> "LYON",
// 								    'state' => "RHONES",
// 								    'country'=> "FR",
// 								    'phone_number' => "0643503741"),
// 	     'retailer_credentials' => array('email' => 'jimmy.villossel@gmail.com',
// 		    							'password' => 'OBIWAN2715'),
// 	     'webhooks' => array('order_placed' => 'http://mywebsite.com/zinc/order_placed',
//     							'order_failed'=> 'http://mywebsite.com/zinc/order_failed',
//     							'tracking_obtained' => 'http://mywebsite.com/zinc/tracking_obtained'),

// 		 'client_notes' => array('our_internal_order_id' => 'abc123',
// 		    					'any_other_field' => array('any value')),
    

//     );

//echo json_encode($fields);
// echo "https://api.zinc.io/v1/orders \
//    -H <client_token>:E74D0B610F859CF4B0E5CA25 \
//    -d '".$jsontest."'"



  $ch = curl_init("https://api.zinc.io/v1/products/0923568964?retailer=amazon \
  -u <client_token>:E74D0B610F859CF4B0E5CA25");
  //curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
  $output = curl_exec($ch);

	var_dump($output);

 //  $ch = curl_init("https://api.zinc.io/v1/orders \
 //   -H <client_token>:E74D0B610F859CF4B0E5CA25 \
 //   -d '".$jsontest."'");
 //  curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
 //  $output = curl_exec($ch);

 // echo $output;


  

?>