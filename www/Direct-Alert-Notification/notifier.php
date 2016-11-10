<?php





    $path_to_firebase_cm = 'https://fcm.googleapis.com/fcm/send';

    
    $registrationIds = array('fMXcCQyqgYU:APA91bE5xeKdAnYy02lpwN0pJGMPBbtgRIHZFneHx1S5AlrYxX4OKRHNfA8soLv1Izhm2aJC-OyvDQ6fmmWcDn47MJEvlJSG5d9LCV53vCtPz3W66HpzE7yw5g_x9oHPPtrRjzS2exl0');

    $msg = array
    (
        'message'   => 'here is a message. message',
        'title'     => 'This is a title. title',
        'subtitle'  => 'This is a subtitle. subtitle',
        'tickerText'    => 'Ticker text here...Ticker text here...Ticker text here',
        'vibrate'   => 1,
        'sound'     => 1,
        'largeIcon' => 'large_icon',
        'smallIcon' => 'small_icon'
    );
    $fields = array
    (
        'registration_ids'  => $registrationIds,
        'data'          => $msg
    );


    //     'to' => 'fMXcCQyqgYU:APA91bE5xeKdAnYy02lpwN0pJGMPBbtgRIHZFneHx1S5AlrYxX4OKRHNfA8soLv1Izhm2aJC-OyvDQ6fmmWcDn47MJEvlJSG5d9LCV53vCtPz3W66HpzE7yw5g_x9oHPPtrRjzS2exl0',

    //     'notification' => array('title' => 'test', 'body' => 'test'),

    //     'data' => array('message' => 'Message')

    // );


    $headers = array
    (
        'Authorization: key=AIzaSyCeJQxGiWef1Znuu2FiZgDrVT3kyMU7KAw',
        'Content-Type: application/json'
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