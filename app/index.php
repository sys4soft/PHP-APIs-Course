<?php

require_once('inc/config.php');

$variaveis = [
    'id' => '1',
    'nome' => 'António',
    'data' => '10-02-2030'
];

$resultados = api_request("get_datetime", 'GET', $variaveis);
print_r($resultados);




// ===================================================================
function api_request($endpoint, $method = 'GET', $variables = [])
{
    $curl = curl_init();
    $headers = array(
        'Content-Type: application/json',
        'Authorization: Basic ' . base64_encode(API_USER . ':' . API_PASS)
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    // define a url
    $url = API_BASE_ENDPOINT . $endpoint . '/';

    // se o pedido é GET
    if ($method == 'GET') {
        if (!empty($variables)) {
            $url .= '?' . http_build_query($variables);
        }
    }

    // se o pedido é POST
    if ($method == 'POST') {
        $variables = array_merge(['endpoint' => $endpoint], $variables);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $variables);
    }

    // define a url do curl
    curl_setopt($curl, CURLOPT_URL, $url);

    $response = curl_exec($curl);

    // verifica se há erro
    if (curl_errno($curl)) {
        throw new Exception(curl_error($curl));
    }

    curl_close($curl);

    return json_decode($response, true);
}
