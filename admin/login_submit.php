<?php defined('ROOT') or die('Acesso inválido'); ?>

<?php 

    // verificar se todos os dados existem para a autenticação do admin
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        die('Acesso inválido');
    }

    $usuario = $_POST['text_usuario'];
    $senha = $_POST['text_senha'];

    // validação
    if(empty($usuario) || empty($senha)){
        $_SESSION['error'] = 'Dados insuficientes.';
        header('Location: index.php');
    }

    echo 'ok';

    /* 
    verificar se todos os dados existem para a autenticação do admin
    ligar à base de dados
    confirmar as credenciais
    criar usuário na sessao
    */

?>