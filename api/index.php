<?php

// prepara response
$data['status'] = 'ERROR';
$data['data'] = null;

// request
if(isset($_GET['option'])){

    switch ($_GET['option']) {
        case 'status':
            define_response($data, 'API running OK!!!!');
            break;

        case 'random':
            define_response($data, rand(0,1000));
            break;
    }
}

// emitir a resposta da API
response($data);

// ====================================================================
function define_response(&$data, $value)
{
    $data['status'] = 'SUCCESS';
    $data['data'] = $value;
}

// ====================================================================
// construção da response
function response($data_response)
{
    header("Content-Type:application/json");
    echo json_encode($data_response);
}