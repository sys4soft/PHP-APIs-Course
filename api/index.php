<?php

// dependencies

require_once(dirname(__FILE__) . '/inc/config.php');
require_once(dirname(__FILE__) . '/inc/api_response.php');
require_once(dirname(__FILE__) . '/inc/api_logic.php');

// --------------------------------------------------------
// instanciate the api_classe
$api = new api_class();

// --------------------------------------------------------
// check if method is valid
if(!$api->check_method($_SERVER['REQUEST_METHOD']))
{
    // send error reponse
    $api->api_request_error('Invalid request method.');
}

// --------------------------------------------------------
// set request method
$api->set_method($_SERVER['REQUEST_METHOD']);

// --------------------------------------------------------
// set request endpoint and parameters
$params = null;
if($api->get_method() == 'GET'){
    $api->set_endpoint($_GET['endpoint']);
    $params = $_GET;
} elseif($api->get_method() == 'POST'){
    $api->set_endpoint($_POST['endpoint']);
    $params = $_POST;
}

// prepare api_logic
$api_logic = new api_logic($api->get_endpoint(), $params);

// check if endpoint exists
if(!$api_logic->endpoint_exists()){
    $api->api_request_error('Inexistant endpoint. ' . $api->get_endpoint());
}

// request to the api_logic
$result = $api_logic->{$api->get_endpoint()}();
$api->add_to_data('data', $result);

// send api response
$api->send_response();
