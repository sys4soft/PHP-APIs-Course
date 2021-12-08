<?php

    $user = $_SERVER['PHP_AUTH_USER'];
    $pass = $_SERVER['PHP_AUTH_PW'];

    echo json_encode([
        'user' => $user,
        'pass' => $pass,
        'status' => 'success'
    ]);