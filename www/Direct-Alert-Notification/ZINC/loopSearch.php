<?php

include_once "db_functions.php";

$db = new DB_Functions();
$res = $db->getAsin();
$http_auth_ident = "E74D0B610F859CF4B0E5CA25";


 while ($row = $res->fetch_assoc()) 
 {
	
	$ch = curl_init('https://api.zinc.io/v1/products/'.$row['asin'].'/offers?retailer=amazon');
	curl_setopt($ch, CURLOPT_USERPWD, $http_auth_ident); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$response = curl_exec($ch);
	curl_close($ch);

	$json_asin = json_decode($response);

	foreach ($json_asin->{'offers'} as $key => $value) {
		
		if($value->{'condition'} == 'New')
		{
			if($value->{'price'} + $value->{'ship_price'} <= $row['button_price'])
			{
				echo $value->{'condition'};
				echo "</br>";
				echo $value->{'price'} + $value->{'ship_price'};
				echo "</br>";
				echo "</br>";
				break;
			}
			
		}
	}

	echo "</br>";
	echo "</br>";

 }


?>