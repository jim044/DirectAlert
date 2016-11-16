<?php

require_once 'lib/AmazonECS.class.php';
$client = new AmazonECS('AKIAJ7L4KKPYVFWPLRGA', '4CuY/H33aJfzVsJvQJAheHrVJu+tHwHRxxifwHG3', 'FR', 'smartpanel08-21');

$response1  = $client->category('Books')->page(1)->search('PHP 5');
$response2  = $client->category('Books')->page(2)->search('PHP 5');
$response3  = $client->category('Books')->page(3)->search('PHP 5');

//var_dump($response1);
//$response  = $client->responseGroup('Offers')->category('Books')->search('PHP 5');



// echo($response->Items->Item[0]->ItemAttributes->Title);

// echo count($response->Items->Item);
$image_different = "";

echo "<select name='product' id='product' onChange='changeit(this.value)''>";
  		echo "<option value='-1'>- - - Choisissez un produit - - -</option>";
for($i = 0; $i<count($response1->Items->Item); $i++)
{
	$dom = new DOMDocument;
	$dom->loadHTMLFile($response1->Items->Item[$i]->DetailPageURL);
	$dom->preserveWhiteSpace = false;
	$images = $dom->getElementsByTagName('img');
	foreach ($images as $image) {
		if($image->getAttribute('id') == 'imgBlkFront')
		{
			$image_different = $image->getAttribute('src');
			break;
		}
	  
	}

  	echo '<option value='.$response1->Items->Item[$i]->ASIN.'>'.$response1->Items->Item[$i]->ItemAttributes->Title.' ' .$image_different.'</option>';

  	//echo '<option value="test" style="background-image: url('.$image_different.')">Test</option>';

	


	//break;

	

}

// for($i = 0; $i<count($response2->Items->Item); $i++)
// {
//   	echo '<option value='.$response2->Items->Item[$i]->ASIN.'>'.$response2->Items->Item[$i]->ItemAttributes->Title.'</option>';
// }

// for($i = 0; $i<count($response3->Items->Item); $i++)
// {
//   	echo '<option value='.$response3->Items->Item[$i]->ASIN.'>'.$response3->Items->Item[$i]->ItemAttributes->Title.'</option>';
// }

echo '</select>';


?>

<script>

function changeit(val) {
    document.getElementById("hidden").style.display="none";
    document.getElementById("hidden2").style.display="none";
    document.getElementById("hidden3").style.display="none";
    document.getElementById(val).style.display="block";
  }

</script>