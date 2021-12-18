<?php

    // incluir as dependências
    require_once('../inc/authentication.php');

    $now = new DateTime();

    echo json_encode([
        'status' => 'SUCCESS',
        'data' => $_GET,
        'message' => $now->format('d-m-Y H:i:s')
    ]);