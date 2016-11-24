<?php

include_once "db_functions.php";
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

function send_notification($token, $libelle_event, $temps)
{
    $registrationIds = array($token);

    $fields = array
    (
        'registration_ids'  => $registrationIds,

        'notification' => array('title' => 'test', 'body' =>  $libelle_event),

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