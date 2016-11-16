<?php

require_once 'lib/AmazonECS.class.php';
$client = new AmazonECS('AKIAJ7L4KKPYVFWPLRGA', '4CuY/H33aJfzVsJvQJAheHrVJu+tHwHRxxifwHG3', 'COM', 'smartpanel08-21');

$response  = $client->category('Books')->page(1)->search('PHP 5');


//$response  = $client->responseGroup('Offers')->category('Books')->search('PHP 5');



// echo($response->Items->Item[0]->ItemAttributes->Title);

// echo count($response->Items->Item);


for($i = 0; $i<count($response->Items->Item); $i++)
{
	echo $response->Items->Item[$i]->ItemAttributes->Title;
	echo '<br>';
	echo $response->Items->Item[$i]->ASIN;
	echo '<br>';

}
// foreach ($response as $key => $value) {
// 	var_dump($value->OperationRequest->HTTPHeaders->Header->Value);
// // 	//echo $key;
// // 	foreach ($value as $keyBis => $valueBis) {
// // 		//echo $keyBis;
// // 		var_dump($valueBis->OperationRequest);
// // 		foreach ($valueBis as $keyBisBis => $valueBisBis) {
// // 			foreach ($valueBisBis as $keyBisBisBis => $valueBisBisBis) {	
// // 				foreach ($valueBisBisBis as $keyBisBisBisBis => $valueBisBisBisBis) {
// // 					//echo $valueBisBisBis->Title;
// // 				}
// // 			}
// // 		}
// // 	}
// }

?>