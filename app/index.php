<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
echo '<pre>';

$results = api_request('status', 'GET');
print_r($results);

$results = api_request('statusx', 'GET');
print_r($results);

$results = api_request('get_all_clients', 'GET');
print_r($results);