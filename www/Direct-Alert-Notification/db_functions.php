<?php

class DB_Functions {
 
    private $db;
 
    private $mysqli;
 
    function __construct() {
        include_once "db_connect.php";
        // connecting to database
        $this->db = new DB_Connect();
        $this->mysqli = $this->db->connect();
    }
 
    /**
     * On ajoute un nouvel utilisateur
     */
    public function addUser($users) {

        $mail = $users->{'mail'};
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO users (id_user_mail, date_ajout) VALUES('$mail', NOW())");  // A finir
 
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addEvent($event, $users) {

        $mail = $users->{'mail'};
    	$idEvent = $event->{'id'};
        $unLibelle = $event->{'summary'};
        $longtest = (int)$event->{'start'}->{'value'};
        $seconds = $longtest / 1000;
        $start_event = date("Y-m-d H:i:s", $seconds+3600);
        $location = $event->{'location'};


        $result = $this->mysqli->query("INSERT INTO event_user (id_event_user, libelle, location, date_event, id_user_mail) VALUES('$idEvent', '$unLibelle', '$location', '$start_event', '$mail')");
 
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addToken($gcm_token, $users) {

        $mail = $users->{'mail'};
        $id_token = $gcm_token->{'id_token'};
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO token (id_token, date_creation, id_user_mail) VALUES('$id_token', NOW(), '$mail')");  // A finir
 
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
 
    /**
     * Pour obtenir tous les utilisateurs
     */
    public function getToken() {
        $result = $this->mysqli->query("select id_token, id_user_mail FROM token");
        return $result;
    }


    public function getEvent($user) {
        $result = $this->mysqli->query("select libelle, location, date_event FROM event_user WHERE id_user_mail='$user'");
        return $result;
    }
 
 
}
 
?>