<?php

header('Content-Type: application/json; charset=utf-8');
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://coda.io/apis/v1/docs?isOwner=True&query=james',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer a04ae286-c82c-49cf-ba54-969655c1d027'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;