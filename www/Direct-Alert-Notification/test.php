<?php

		
        $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';
		
		$fields = array(
            'to' => 'e8ziD3ZZ1SM:APA91bGvaiHTkA7ZWrRQHMcuxmclftFhOWVQ3nUsNtwQ1TqLF60yo7pjb-jRk7UNW7CQSPT0r695Ojl8HjOqbvCEb_E5aQttWCPsMloyU0CCA_jDhxiwMYoVvZvYarI_EJxZbWC-3Ssv',
            'notification' => array('title' => 'Working Good', 'body' => 'That is all we want'),
            'data' => array('message' => 'Message')
        );
 
        $headers = array(
            'Authorization:key=AIzaSyDlW4nqdKjbN_DjNQaKlvTXUGsRDlD8pcY',
            'Content-Type:application/json'
        );		
		$ch = curl_init();
 
        curl_setopt($ch, CURLOPT_URL, $path_to_firebase_cm); 
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); 
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    
        $result = curl_exec($ch);
       
       echo $result;
       
       curl_close($ch);

	
?>

