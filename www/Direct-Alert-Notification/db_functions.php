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

    public function get_Last_Position_User($token)
    {

    }
    public function addPosition($position, $token, $users)
    {
    	$latitude = $position->{'latitude'};
    	$longitude = $position->{'longitude'};
    	$id_token = $token->{'id_token'};
    	$mail = $users->{'mail'};

    	$result = $this->mysqli->query("INSERT INTO position (mail_user, token, latitude, longitude) VALUES('$mail', '$id_token', '$latitude', '$longitude')");
 
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

        $driving = $event->{'driving'};
        $bicycling = $event->{'bicycling'};
        $transit = $event->{'transit'};
        $walking = $event->{'walking'};


        $result = $this->mysqli->query("INSERT INTO event_user (id_event_user, libelle, location, date_event, id_user_mail, driving, bicycling, transit, walking) VALUES('$idEvent', '$unLibelle', '$location', '$start_event', '$mail', '$driving', '$bicycling', '$transit', '$walking')");
 
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
        $result = $this->mysqli->query("select id_event_user, libelle, location, date_event, id_user_mail, driving, transit, bicycling, walking FROM event_user WHERE id_user_mail='$user'");
        return $result;
    }

    public function getEventByToken($token) {
        $result = $this->mysqli->query("select evu.id_event_user, evu.libelle, evu.location, evu.date_event, evu.id_user_mail, evu.driving, evu.transit, evu.bicycling, evu.walking FROM event_user as evu INNER JOIN token as tk ON evu.id_user_mail = tk.id_user_mail WHERE tk.id_token='$token'");
        return $result;
    }

    public function InsertDateModif($id_event_user)
    {
        $newDate = new Date('Y-m-d H:i:s');
        $result = $this->mysqli->query("UPDATE event_user SET date_modif='$newDate' WHERE id_event_user='$id_event_user'");
    }




    public function UpdateEventDriving($timeLate, $id_event_user)
    {
        $result = $this->mysqli->query("UPDATE event_user SET driving='$timeLate' WHERE id_event_user='$id_event_user'");
    }
    
    public function UpdateEventTransit($timeLate, $id_event_user)
    {
        $result = $this->mysqli->query("UPDATE event_user SET transit='$timeLate' WHERE id_event_user='$id_event_user'");
    }
    
    public function UpdateEventBicycling($timeLate, $id_event_user)
    {
        $result = $this->mysqli->query("UPDATE event_user SET bicycling='$timeLate' WHERE id_event_user='$id_event_user'");
    }
    
    public function UpdateEventWalking($timeLate, $id_event_user)
    {
        $result = $this->mysqli->query("UPDATE event_user SET walking='$timeLate' WHERE id_event_user='$id_event_user'");
    }
 
 
}
 
?>