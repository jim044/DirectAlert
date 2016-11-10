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

    	$idEvent = $event->{'id'};
        $unLibelle = $event->{'summary'};
        $start = new DateTime($event->{'start'}->{'value'});

  //       $start_event = new DateTime("@$start");
		// $start_event->format('U = Y-m-d H:i:s');


		// date_timestamp_set($date, 1171502725);
		// echo date_format($date, 'U = Y-m-d H:i:s') . "\n";
		

		//$start = date("Y-m-d H:i:s", substr($event->{'start'}->{'value'}, 0, 10));


        $result = $this->mysqli->query("INSERT INTO event_user (id_event_user, libelle, date_event) VALUES('$idEvent', '$unLibelle', '$start')");
 
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