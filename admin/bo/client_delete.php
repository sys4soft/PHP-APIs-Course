<?php defined('ROOT') or die('Acesso inválido.') ?>

<?php
require_once('bo/navegacao.php');
?>

<?php

    // verificar se existe o ID no get
    $error = "";
    if(!isset($_GET['id'])){
        $error = "Não foi definido o cliente a eliminar.";
    }
    
    // verificar na base de dados se existe um cliente com este id
    if(empty($error)){

        $id_client = $_GET['id'];
        
        $bd = new database();
        $parametros = [
            ':id_client' => $id_client
        ];
        $resultados = $bd->EXE_QUERY("SELECT id_client FROM authentication WHERE id_client = :id_client", $parametros);
        if(empty($resultados)){

            // não foi encontrado o registo pretendido
            $error = "Não existe o registo indicado.";
        }

        // eliminar o registo fisicamente
        if(empty($error)){
            $bd->EXE_NON_QUERY("DELETE FROM authentication WHERE id_client = :id_client", $parametros);
        }

        // faz o redirecionamento para a página inicial
        header("Location: index.php");
        // die('Concluído');
        return;
    }
?>

<h3><?= $error ?></h3>