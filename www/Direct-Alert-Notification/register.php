<?php

if (isset($_POST["gcm_token"]) && isset($_POST["user"]) && isset($_POST["event"])) {

    include_once "db_functions.php";

    $gcm_token = json_decode($_POST["gcm_token"]);
    $users = json_decode($_POST["user"]);
    $event = json_decode($_POST["event"]);
    $position = json_decode($_POST["position"]);

    $db = new DB_Functions();
    $res = $db->addUser($users);
    $res = $db->addToken($gcm_token, $users);
    $res = $db->addPosition($position, $gcm_token, $users);
    
    foreach ($event as $key=>$event_user){
        $res = $db->addEvent($event_user, $users);
    }
  
    if ($res)
    {
        $response['message'] = 'Utilisateur enregistré !';
        $response['success'] = 1;
        //$response['id_token'] = $gcm_token->{'id_token'};
    }
    else
    {
        $response['message'] = 'Utilisateur non enregistré !';
        $response['success'] = 0;
        //$response['id_token'] = $gcm_token->{'id_token'};
    }
   
   foreach ($event as $key=>$event_user){
        $response['message'] = $event_user->{'id'};
    }
 
} else {
    $response['message'] = "Je crois que tu t'es planté mon gars...";
    $response['success'] = 0;
}

 
echo json_encode($response);

?>