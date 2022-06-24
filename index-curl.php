<title>Index CURL</title>
<style type="text/css">
    html, body {
        font-family: consolas, monospace;
    }
</style>
<?php

function samakan($param1, $param2){
    $param_A = (string) $param1;
    $param_B = (string) $param2;
    $selisih = strlen($param_B) - strlen($param_A);
    $results = "";
    for($i = 0; $i < $selisih; $i++){
        $results = $results . "0";
    }
    return $results . $param_A;
}

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://ykkbi.or.id:2083/execute/Email/list_pops',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Authorization: cpanel ykkbiori:1NEKP89L1U5D1ASMQ47K2UFXJ7OQ2HLF'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

$num_data = 1;
$result = json_decode($response);
foreach($result->data as $data){
    echo samakan($num_data, 1000) . " " . $data->login . " " . "SamainDulu20@@" . "<br />\n";
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://ykkbi.or.id:2083/execute/Email/passwd_pop?email='.$data->login.'&password=SamainDulu20@@&domain=ykkbi.or.id',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'Authorization: cpanel ykkbiori:1NEKP89L1U5D1ASMQ47K2UFXJ7OQ2HLF'
        ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
    echo "<br />\n";
    echo "<br />\n";
    $num_data++;
    // break;
}