
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

    public function getToken_user()
    {
        $result = $this->mysqli->query("select token_zinc FROM fos_user");
        return $result;
    }

    public function getButton()
    {
        $result = $this->mysqli->query("select id, name, asin, button_price, alert FROM button");
        return $result;
    }

    public function getUser()
    {
        $result = mysql_query("select * FROM fos_user"); // Requête SQ
        $donnees = mysql_fetch_array($result)

        //$result = $this->mysqli->query("select * FROM fos_user");
        return $donnees;
    }

    public function getCB()
    {
        // $result = $this->mysqli->query("select * FROM cb");
        // return $result;

        $result = mysql_query("select * FROM cb"); // Requête SQ
        $donnees = mysql_fetch_array($result)

        return $donnees;
    }

   
}
 
?>