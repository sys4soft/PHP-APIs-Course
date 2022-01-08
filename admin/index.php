<?php
session_start();

// define uma constante de controlo
define('ROOT', true);

require_once('inc/config.php');
require_once('inc/database.php');
require_once('inc/html_header.php');

// definir rota
$rota = '';

if (!isset($_SESSION['id_admin']) && $_SERVER['REQUEST_METHOD'] != 'POST') {
    $rota = 'login';
} elseif (!isset($_SESSION['id_admin']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $rota = 'login_submit';
} else {

    // interior do BO
    $rota = 'home';

    // se existir uma rota explificamente definida
    if (isset($_GET['r'])) {
        $rota = $_GET['r'];
    }
}


// execução da rota
switch ($rota) {
    case 'login':
        require_once('login.php');
        break;
    case 'login_submit':
        require_once('login_submit.php');
        break;

        // após login
    case 'home':
        require_once('bo/home.php');
        break;

    case 'new_client':
        require_once('bo/new_client.php');
        break;

    default:
        echo 'Rota não definida';
        break;
}


require_once('inc/html_footer.php');
