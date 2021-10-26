<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

// $variables = [
//     'nome' => 'joao',
//     'apelido' => 'ribeiro'
// ];

// request
// $results = api_request('status', 'POST', $variables);
$results = api_request('status', 'GET');

echo '<pre>';
print_r($results);