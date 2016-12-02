<?php

include_once "db_functions.php";

	$db = new DB_Functions();
	$res = $db->getEvent("jimmyvillossel@gmail.com");
	$jsonarrayvalue = array();
	$i = 0;


	while ($row = $res->fetch_assoc()) {

		$jsonarrayvalue[$i] = array("id_event_user" => $row['id_event_user'], "libelle" => $row['libelle'], "location" => $row['location'], "id_user_mail" => $row['id_user_mail'], "date_event" => $row['date_event'], "driving" => $row['driving'], "transit" => $row['transit'], "bicycling" => $row['bicycling'], "walking" => $row['walking']);

		$i = $i +1;
	}



	echo json_encode($jsonarrayvalue);

?>