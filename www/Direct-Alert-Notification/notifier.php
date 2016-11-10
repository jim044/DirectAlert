<?php

include_once "db_functions.php";
$db = new DB_Functions();
$res = $db->getToken();

while ($row = $res->fetch_assoc()) {
        echo $row["id_token"];
        send_notification($row["id_token"]);
    }

//

function send_notification($token)
{
    $registrationIds = array($token);

    $msg = array
    (
        'message'   => 'here is a message. message',
        'title'     => 'This is a title. title',
        'subtitle'  => 'This is a subtitle. subtitle',
        'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate'   => 1,
        'sound'     => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );

    $fields = array
    (
        'registration_ids'  => $registrationIds,

        'notification' => array('title' => 'test', 'body' => 'test'),

        'data' => array('message' => 'Message')
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
    echo $result;
}


?>