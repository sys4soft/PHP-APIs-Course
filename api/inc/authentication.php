<?php

    // verifica se existe user e pass vieram com o request HTTP
    if(empty($_SERVER['PHP_AUTH_USER']) || 
       empty($_SERVER['PHP_AUTH_PW'])){

        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Invalid access.'
        ]);
        exit();
    }




    // verificar se a autenticação é válida
    require_once('config.php');
    require_once('database.php');

    $db = new database();

    $params = [
        ':user' => $_SERVER['PHP_AUTH_USER']
    ];

    $results = $db->EXE_QUERY("SELECT * FROM `authentication` WHERE username=:user", $params);
    if(count($results) > 0) {

        // verificar se a senha é válida
        $usuario = $results[0];
        if(password_verify($_SERVER['PHP_AUTH_PW'], $usuario['passwrd'])){
            $valid_authentication = true;
        } else {
            $valid_authentication = false;    
        }
        
    } else {
        $valid_authentication = false;
    }

    // invalid authentication
    if(!$valid_authentication){
        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Invalid authentication credentials.'
        ]);
        exit();
    }