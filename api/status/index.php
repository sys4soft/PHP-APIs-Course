<?php

    // incluir as dependências
    require_once('../inc/authentication.php');

    // fazer a análise do pedido

    // ------------------------------------------------------------------
    // emitir a resposta
    echo json_encode([
        'status' => 'SUCCESS',
        'message' => 'API running OK!'
    ]);