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
        $result = $this->mysqli->query("INSERT INTO users (mail, date_ajout) VALUES('$mail', NOW())");  // A finir
 
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addEvent($event) {

        $unLibelle = $event->{'summary'};
        $start = date("Y-m-d h:m:s", ($event->{'start'}->{'value'} / 1000) );

        //$result = $this->mysqli->query("INSERT INTO event_user (libelle, date_event) VALUES('$libelle', '$start'"); // A finir
        $result = $this->mysqli->query("INSERT INTO event_user (libelle, date_event) VALUES('$unLibelle', '$start')"); // A finir
 
        if ($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function addToken($gcm_token) {

        $id_token = $gcm_token->{'id_token'};
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO token (id_token, date_creation) VALUES('$id_token', NOW())");  // A finir
 
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
    public function getDevices() {
        $result = $this->mysqli->query("select gcm_token FROM gcm_ids");
        return $result;
    }
 
}
 
?>