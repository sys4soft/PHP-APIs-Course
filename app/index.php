<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

$variables = [
    'nome' => 'joao',
    'apelido' => 'ribeiro'
];
api_request('status', 'GET', $variables);