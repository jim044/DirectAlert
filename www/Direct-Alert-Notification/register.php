<?php

 
if (isset($_POST["gcm_token"]) && isset($_POST["user"]) && isset($_POST["event"])) {


    $gcm_token = json_decode($_POST["gcm_token"]);
    $users = json_decode($_POST["user"]);
    $event = json_decode($_POST["event"]);

    // Store user details in db
    include_once "db_functions.php";
 
    $db = new DB_Functions();
 
    $res = $db->addUser($users);
    $res = $db->addToken($gcm_token);
    
    foreach ($event as $key=>$event_user){
        $res = $db->addEvent($event_user);
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

    // foreach ($event as $key=>$event_user){
    //     $response['message'] = $event_user->{'start'}->{'value'};
    // }
   
 
} else {
    $response['message'] = "Je crois que tu t'es planté mon gars...";
    $response['success'] = 0;
}
 
echo json_encode($response);    
 
?>