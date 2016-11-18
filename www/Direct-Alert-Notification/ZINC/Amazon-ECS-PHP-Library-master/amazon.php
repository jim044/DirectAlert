<?php
echo $_POST['category'];
echo '<form name="recherche" method="post" action="amazon.php">';
	echo '<input type="text" name="search" value="'.$_POST["search"].'">';
	echo "<select name='category' id='category' value='".$_POST['category']."'>";
		echo "<option value='-1'>- - - Choisissez la catégorie - - -</option>";
		echo '<option value="DVD">DVD</option>';
		echo '<option value="Music">MUSIC</option>';
	echo "</select>";
	echo '<input type="submit" name="submit" value="Rechercher" />';
echo '</form>';

if (isset($_POST['submit'])) 
{

	require_once 'lib/AmazonECS.class.php';
	$client = new AmazonECS('AKIAJ7L4KKPYVFWPLRGA', '4CuY/H33aJfzVsJvQJAheHrVJu+tHwHRxxifwHG3', 'FR', 'smartpanel08-21');

	$response1  = $client->category($_POST['category'])->page(1)->search($_POST['search']);
	$response2  = $client->category($_POST['category'])->page(2)->search($_POST['search']);
	$response3  = $client->category($_POST['category'])->page(3)->search($_POST['search']);

	// $response1  = $client->category('Books')->page(1)->search($_POST['search']);
	// $response2  = $client->category('Books')->page(2)->search($_POST['search']);
	// $response3  = $client->category('Books')->page(3)->search($_POST['search']);

	$image_different = "";

	echo "<select name='product' id='product' onChange='changeit(this.value)''>";
	  		echo "<option value='-1'>- - - Choisissez un produit - - -</option>";
	for($i = 0; $i<count($response1->Items->Item); $i++)
	{
	  	echo '<option value='.$response1->Items->Item[$i]->ASIN.'>'.$response1->Items->Item[$i]->ItemAttributes->Title.'</option>';
	}

	for($i = 0; $i<count($response2->Items->Item); $i++)
	{
	  	echo '<option value='.$response2->Items->Item[$i]->ASIN.'>'.$response2->Items->Item[$i]->ItemAttributes->Title.'</option>';
	}

	for($i = 0; $i<count($response3->Items->Item); $i++)
	{
	  	echo '<option value='.$response3->Items->Item[$i]->ASIN.'>'.$response3->Items->Item[$i]->ItemAttributes->Title.'</option>';
	}

	echo '</select>';

}


// $dom = new DOMDocument;
// 	$dom->loadHTMLFile($response1->Items->Item[$i]->DetailPageURL);
// 	$dom->preserveWhiteSpace = false;
// 	$images = $dom->getElementsByTagName('img');
// 	foreach ($images as $image) {
// 		if($image->getAttribute('id') == 'imgBlkFront')
// 		{
// 			$image_different = $image->getAttribute('src');
// 			break;
// 		}
	  
// 	}

?>

<script>

function changeit(val) {
    
  }

</script>

