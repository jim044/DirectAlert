<?php

class DB_Connect {
 
	 public function connect() {
	 // Connexion à MySQL
	 
	 $con = mysqli_connect('localhost', 'id137467_jim044', 'OBIWAN2715', 'id137467_directalert');
	 
	 return $con;
	 }
	 
	 public function close() {
	 mysql_close();
	 }
 
}

?>