<?php

include_once "db_functions.php";
echo "<script type='text/javascript' src='js/calcul_navigation.js'></script>";

$db = new DB_Functions();
$res = $db->getToken();
$tabToken=array();
$tabEvent=array();

while ($row = $res->fetch_assoc()) {


    //array_push($tabToken,"token",$row["id_user_mail"]);
    //print_r($tabEvent);

	//echo $row["id_token"];
	$resBis = $db->getEvent($row["id_user_mail"]);
    var_dump($resBis->fetch_all());


    echo"<script  type='text/javascript'>   
                 test('".$resBis->fetch_all()."'); 
             </script>";

	// while ($rowBis = $resBis->fetch_assoc()) {

 //            array_push($tabEvent, "Event", array($rowBis["location"], "PARIS" , $rowBis["id_token"], $rowBis["libelle"], $rowBis["date_event"]));
           
            
 // //        //echo $rowBis["location"];
 // //        if(empty($rowBis["location"]) == false)
 // //        {
            

 // //            echo"<script  type='text/javascript'>   
 // //                codeAddress('".$rowBis['location']."', 'PARIS', '".$row["id_token"]."', '".$rowBis["libelle"]."', '".$rowBis["date_event"]."'); 
 // //            </script>";

 // //            break;

 // //        }
 // //        else
 // //        {
 // //            //echo "test";
 // //        }
 //        //break;
 // //        //send_notification($row["id_token"], $rowBis["libelle"]);
 //    }
 //     array_push($tabToken, "tab", $tabEvent);
 //     $tabEvent=array();
    
    break;
}

// echo json_encode($tabToken);
// echo"<script  type='text/javascript'>   
//                  test('".$tabToken."'); 
//              </script>";

//

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