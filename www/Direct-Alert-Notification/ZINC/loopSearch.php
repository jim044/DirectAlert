<?php

include_once "db_functions.php";

$db = new DB_Functions();

$res = $db->getToken_user();

while ($row = $res->fetch_assoc()) 
{
	$http_auth_ident = $row['token_zinc'];
	break;
}

$res = $db->getButton();
//$http_auth_ident = "E74D0B610F859CF4B0E5CA25";

 while ($row = $res->fetch_assoc()) 
 {
	$prixInf = False;

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
				//$prixInf = True;
				echo $value->{'condition'};
				echo "</br>";
				echo $value->{'price'} + $value->{'ship_price'};

				echo $http_auth_ident;

				// if($row['name'] == "Button 1")
				// {
				// 	system ( "gpio mode 1 out" );
				// 	system ( "gpio write 1 1" );
				// }
				// else if($row['name'] == "Button 2")
				// {
				// 	system ( "gpio mode 3 out" );
				// 	system ( "gpio write 3 1" );
				// }
				// else if($row['name'] == "Button 3")
				// {
				// 	system ( "gpio mode 5 out" );
				// 	system ( "gpio write 5 1" );
				// }
				// else if($row['name'] == "Button 4")
				// {
				// 	system ( "gpio mode 7 out" );
				// 	system ( "gpio write 7 1" );
				// }
				
			}
			else
			{
				// if($row['name'] == "Button 1")
				// {
				// 	system ( "gpio mode 1 in" );
				// 	system ( "gpio write 1 0" );
				// }
				// else if($row['name'] == "Button 2")
				// {
				// 	system ( "gpio mode 3 in" );
				// 	system ( "gpio write 3 0" );
				// }
				// else if($row['name'] == "Button 3")
				// {
				// 	system ( "gpio mode 5 in" );
				// 	system ( "gpio write 5 0" );
				// }
				// else if($row['name'] == "Button 4")
				// {
				// 	system ( "gpio mode 7 in" );
				// 	system ( "gpio write 7 0" );
				// }
			}

			break;
			
		}
	}
 }


?>