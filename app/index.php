<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

$results = api_request('status', 'GET');

echo '<pre>';
print_r($results);