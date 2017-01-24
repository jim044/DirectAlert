<?php    

include_once "db_functions.php";

$gcm_token = json_decode($_POST["gcm_token"]);
$users = json_decode($_POST["user"]);
$position = json_decode($_POST["position"]);

$db = new DB_Functions();
$res = $db->addPosition($position, $gcm_token, $users);

 ?>