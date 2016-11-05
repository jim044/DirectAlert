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
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO users (id, email, date_ajout) VALUES('$gcm_token', NOW())");  // A finir
 
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
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO event_user (id, libelle, date_event, place, id_user) VALUES('$gcm_token', NOW())"); // A finir
 
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
        // insert user into database
        $result = $this->mysqli->query("INSERT INTO token (id_token, date_creation, id_user) VALUES('$gcm_token', NOW())");  // A finir
 
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