<?php

    session_start();

    // remoção do usuário da sessão
    unset($_SESSION['id_admin']);
    unset($_SESSION['usuario']);

    header('Location: index.php');
?>