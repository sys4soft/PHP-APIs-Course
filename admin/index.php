<?php

    // define uma constante de controlo
    define('ROOT', true);

    require_once('inc/config.php');
    require_once('inc/database.php');
    require_once('inc/html_header.php');

    // verifica se existe um administrador logado
    // $_SESSION['id_admin'] = 1;


    if(isset($_SESSION['id_admin'])){
        echo 'sim';
    } else {
        echo 'nao';
    }

    
    echo '<h3>BO!</h3>';


    require_once('inc/html_footer.php');
