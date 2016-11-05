<?php

 
if (isset($_POST["gcm_token"]) && isset($_POST["users"]) && && isset($_POST["event"])) {

    $gcm_token = $_POST["gcm_token"];
    $users = $_POST["users"];
    $event = $_POST["event"];
    // Store user details in db
    include_once "db_functions.php";
 
    $db = new DB_Functions();
 
    $res = $db->addUser($users);
    $res = $db->addEvent($event);
    $res = $db->addToken($gcm_token);
 
    if ($res)
    {
        $response['message'] = 'Utilisateur enregistré !';
        $response['success'] = 1;
    }
    else
    {
        $response['message'] = 'Utilisateur non enregistré !';
        $response['success'] = 0;
    }
 
} else {
    $response['message'] = "Je crois que tu t'es planté mon gars...";
    $response['success'] = 0;
}
 
echo json_encode($response);    
 
?>