<?php
		$stringtest = "1450856349100";
		$longtest = (int)$stringtest;

		$seconds = $longtest / 1000;
		echo date("Y-m-d H:i:s", $seconds);

  		//echo date('Y-m-d g:i:s', $longtest); 

		//$start = DateTime::createFromFormat("YmdHis", $longtest);

		//$start = date("Y-m-d H:i:s", $longtest);
        //$start->setTimestamp($longtest);
		//$start->format('U = Y-m-d H:i:s');

		//echo $start->format('Y-m-d H:i:s');
		//echo $start;
	
?>

