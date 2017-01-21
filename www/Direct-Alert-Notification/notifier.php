<?php

	include_once "db_functions.php";

	header ('Content-type: text/html');
	echo "<script type='text/javascript' src='js/calcul_navigation.js'></script>";

	$db = new DB_Functions();
	$res = $db->getToken();
	$tabToken=array();
	$tabEvent=array();
	$i = 0;

	echo"<script  type='text/javascript'> 
	                 var tab = new Array();
	             </script>";
	             
	while ($row = $res->fetch_assoc()) {
		$resBis = $db->getEvent($row["id_user_mail"]);
		while ($rowBis = $resBis->fetch_assoc()) {

	         if(empty($rowBis["location"]) == false)
	         {
	            echo"<script  type='text/javascript'> 
	                tab['".$i."']=new Array();
	                 tab['".$i."']= ['".$rowBis['id_event_user']."', '".$rowBis['location']."', 'PARIS', '".$row["id_token"]."', '".$rowBis["libelle"]."', '".$rowBis["date_event"]."']; 
	             </script>";
	             $i = $i+1;
	         }
	    }
	    
	}


	echo"<script  type='text/javascript'> 
	        codeAddress(tab);
	     </script>";

	// $url1=$_SERVER['REQUEST_URI'];
 //    header("Refresh: 15; URL=$url1");


?>