<?php

    // verifica se existe user e pass vieram com o request HTTP
    if(empty($_SERVER['PHP_AUTH_USER']) || 
       empty($_SERVER['PHP_AUTH_PW'])){

        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Invalid access.'
        ]);
        return;
    }

    // usuários permitidos
    $usuarios = [
        [
            'user' => 'Joao',
            'pass' => 'abc123'
        ],
        [
            'user' => 'Ana',
            'pass' => '111'
        ],
        [
            'user' => 'Carlos',
            'pass' => '222'
        ],
    ];

    // verifica se user e pass têm autenticação válida
    $user = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];

    $valid_authentication = false;
    foreach($usuarios as $usuario){
        if($usuario['user'] == $user && $usuario['pass'] == $pass){
            $valid_authentication = true;
        }
    }

    // invalid authentication
    if(!$valid_authentication){
        echo json_encode([
            'status' => 'ERROR',
            'message' => 'Invalid authentication credentials.'
        ]);
        return;
    }

    // valid authentication
    echo json_encode([
        'status' => 'success',
        'message' => 'Welcome to this API!'
    ]);