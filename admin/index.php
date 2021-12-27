<?php
    session_start();

    // define uma constante de controlo
    define('ROOT', true);

    require_once('inc/config.php');
    require_once('inc/database.php');
    require_once('inc/html_header.php');

    // verifica se existe um administrador logado
    if(!isset($_SESSION['id_admin'])){
        
        // apresenta o quadro de login
        require_once('login.php');

    } else {

        // backoffice
        require_once('home.php');

    }


    require_once('inc/html_footer.php');
