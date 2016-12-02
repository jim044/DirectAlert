<?php

include_once "db_functions.php";
echo "<script type='text/javascript' src='js/calcul_navigation.js'></script>";

$db = new DB_Functions();
$i = 0;

echo"<script  type='text/javascript'> 
                 var tab = new Array();
             </script>";
             
	$resBis = $db->getEventByToken($_POST["token"]);
	while ($rowBis = $resBis->fetch_assoc()) {

         if(empty($rowBis["location"]) == false)
         {
            echo"<script  type='text/javascript'> 
                tab['".$i."']=new Array();
                 tab['".$i."']= ['".$rowBis['id_event_user']."', '".$rowBis['location']."', 'PARIS', '".$_POST["token"]."', '".$rowBis["libelle"]."', '".$rowBis["date_event"]."']; 
             </script>";
             $i = $i+1;
         }
    }
    


echo"<script  type='text/javascript'> 
        codeAddress(tab);
     </script>";

?>