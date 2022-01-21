<?php

$opts = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer_name" => false,
    ),
    'http' => array(
        'method'  => 'POST',
        'protocol_version'=>'1.1',
        'header'  => array(
            "Content-Type: application/json\r\n",
            "AppsName: digiboard\r\n",
            "AppsToken: BB8D366DFD2CAE9F8B7F69186219853A7ADCB0C881EAB1227CB81E3993668F7B\r\n\r\n"
        ),
        'content' => '{"username":"930421","password":"password*123#"}'
    )
);

$context  = stream_context_create($opts);

$result = file_get_contents('https://auth.telkom.co.id/v2/account/validate', false, $context);
echo $result;

