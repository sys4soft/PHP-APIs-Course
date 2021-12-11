<?php

    require_once('inc/config.php');
    api_request("get_datetime");

// ===================================================================
function api_request($endpoint, $method = 'GET', $variables = [])
{
    $curl = curl_init(API_BASE_ENDPOINT . $endpoint . '/');
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode(API_USER . ':' . API_PASS)
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($curl);

    if(curl_errno($curl)){
        throw new Exception(curl_error($curl));
    }

    curl_close($curl);

    echo $response;
}