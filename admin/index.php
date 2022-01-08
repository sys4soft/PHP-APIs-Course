<?php
    session_start();

    // define uma constante de controlo
    define('ROOT', true);

    require_once('inc/config.php');
    require_once('inc/database.php');
    require_once('inc/html_header.php');

    // definir rota
    $rota = '';

    if(!isset($_SESSION['id_admin']) && $_SERVER['REQUEST_METHOD'] != 'POST'){
        $rota = 'login';
    } elseif(!isset($_SESSION['id_admin']) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $rota = 'login_submit';
    } else {

        // interior do BO
        $rota = 'home';

    }


    // execução da rota
    switch ($rota) {
        case 'login':
            require_once('login.php');
            break;
        case 'login_submit':
            require_once('login_submit.php');
            break;

        case 'home':
            require_once('bo/home.php');
            break;
        
        default:
            echo 'Rota não definida';
            break;
    }


    require_once('inc/html_footer.php');
