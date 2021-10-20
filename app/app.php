<?php

define('API_BASE', 'http://localhost/aula_06/api/?option=');

echo '<p>APLICAÇÃO</p>';

for($i=0; $i<10; $i++)
{
    $resultado = api_request('hash');

    // verify is response is ok (success)
    if($resultado['status'] == 'ERROR'){
        die('Aconteceu um erro na minha chamada à API.');
    }

    echo "O valor randômico: " . $resultado['data'] . "<br>";

}

// echo '<pre>';
// print_r(api_request('status'));

echo 'TERMINADO';


function api_request($option)
{
    $client = curl_init(API_BASE . $option);
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);
    return json_decode($response, true);
}