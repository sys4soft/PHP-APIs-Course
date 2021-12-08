<?php

    $now = new DateTime();

    echo json_encode([
        'status' => 'SUCCESS',
        'message' => $now->format('d-m-Y H:i:s')
    ]);