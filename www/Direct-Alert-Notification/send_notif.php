<?php

// $_POST['temps'];
// $_POST['mode_transport'];
// $_POST['token'];
// $_POST['libelle_event'];
//$_POST['message_temps'];



include_once "db_functions.php";

$splitTabEventLate = explode(".\n", $_POST['message_temps']);
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



?>