<?php

// $_POST['temps'];
// $_POST['mode_transport'];
// $_POST['token'];
// $_POST['libelle_event'];
//$_POST['message_temps'];



include_once "db_functions.php";

$splitTabEventLate = explode(".\n", $_POST['message_temps']);

//$pos = strpos($splitTabEventLate[0], "minutes");

if($splitTabEventLate[0] != null)
{
	$splitTabEventLate[0] = substr($splitTabEventLate[0], 16, strpos($splitTabEventLate[0], "minutes")-8);
	$splitTabForNumber = explode(" ", $splitTabEventLate[0]);
	$splitTabEventLate[0] = recupNumber($splitTabForNumber);
}
else
{
	$splitTabEventLate[0] = "Non disponible";
}

if($splitTabEventLate[1] != null)
{
	$splitTabEventLate[1] = substr($splitTabEventLate[1], 16, strpos($splitTabEventLate[1], "minutes")-8);
	$splitTabForNumber = explode(" ", $splitTabEventLate[1]);
	$splitTabEventLate[1] = recupNumber($splitTabForNumber);
}
else
{
	$splitTabEventLate[1] = "Non disponible";
}

if($splitTabEventLate[2] != null)
{
	$splitTabEventLate[2] = substr($splitTabEventLate[2], 16, strpos($splitTabEventLate[2], "minutes")-8);
	$splitTabForNumber = explode(" ", $splitTabEventLate[2]);
	$splitTabEventLate[2] = recupNumber($splitTabForNumber);
}
else
{
	$splitTabEventLate[2] = "Non disponible";
}

if($splitTabEventLate[3] != null)
{
	$splitTabEventLate[3] = substr($splitTabEventLate[3], 16, strpos($splitTabEventLate[3], "minutes")-8);
	$splitTabForNumber = explode(" ", $splitTabEventLate[3]);
	$splitTabEventLate[3] = recupNumber($splitTabForNumber);
}
else
{
	$splitTabEventLate[3] = "Non disponible";
}

$db = new DB_Functions();

$res = $db->UpdateEventDriving($splitTabEventLate[0], $_POST['id_event']);
$res = $db->UpdateEventWalking($splitTabEventLate[1], $_POST['id_event']);
$res = $db->UpdateEventBicycling($splitTabEventLate[2], $_POST['id_event']);
$res = $db->UpdateEventTransit($splitTabEventLate[3], $_POST['id_event']);


$registrationIds = array($_POST['token']);

    $fields = array
    (
        'registration_ids'  => $registrationIds,

        'notification' => array('title' => $_POST['libelle_event'], 'body' =>  $_POST['message_temps']),

        'data' => array('message' => $_POST['message_temps'])
    );
     
    $headers = array
    (
        'Authorization: key=AIzaSyCH8L2SWCU2v3Vz6qQ74plaLapx8_zqTZM',
        'Content-Type: application/json'
    );
     
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    curl_close( $ch );


    function recupNumber($listChar)
    {	
    	$passage = 0;
    	$retour = null;

    	foreach ($listChar as $value){
		    if(is_numeric($value))
		    {
		    	if($value > 0)
		    	{
		    		if($passage == 0)
		    		{
		    			$retour = $value." jours";
		    		}
		    		else if($passage == 1)
		    		{
		    			$retour = $retour. " " .$value." heures";
		    		}
		    		else if($passage == 2)
		    		{
		    			$retour = $retour. " " .$value." minutes";
		    		}
		    	}

		    	$passage = $passage + 1;
		    }
		}

		if($retour == null)
		{
			$retour = "En retard";
		}
		return $retour;

    	
    }



?>