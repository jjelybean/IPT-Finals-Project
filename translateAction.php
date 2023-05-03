<?php

    // retrieve form input

    $source = $_POST['source']; 
    $target = $_POST['target']; 
    $content = $_POST['content']; 

    // the url hahshahsah

    $url = 'https://translate.terraprint.co/translate';

    // body 
    $body = array(
        'source' => $source,
        'target' => $target,
        'q' => $content
    );   


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,  $body);

    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);
    echo $response; 

    
?>