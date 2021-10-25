<?php

// resposta temporária
header("Content-Type:application/json");

$data['status'] = 'SUCCESS';
$data['method'] = $_SERVER['REQUEST_METHOD'];

// apresentar as variáveis que vieram no pedido (get ou post)
if($data['method'] == 'GET'){
    $data['data'] = $_GET;
} else if($data['method'] == 'POST'){
    $data['data'] = $_POST;
}

echo json_encode($data);