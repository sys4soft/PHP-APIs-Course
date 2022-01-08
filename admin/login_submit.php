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
        return;
    }

    // ligar à base de dados
    $bd = new database();
    $params = [
        ':usuario' => $usuario
    ];

    $resultados = $bd->EXE_QUERY("SELECT * FROM admin_users WHERE username = :usuario", $params);
    
    // verifica se existe resultado
    if(count($resultados) == 0){
        
        // não existe usuário com esse username
        $_SESSION['error'] = 'Login inválido.';
        header('Location: index.php');
        return;
    }

    // validar a password/senha
    if(!password_verify($senha, $resultados[0]['passwrd'])){

        // password errada
        $_SESSION['error'] = 'Login inválido.';
        header('Location: index.php');
        return;
    }

    // colocar o administrador na sessão
    $_SESSION['id_admin'] = $resultados[0]['id_admin'];
    $_SESSION['usuario'] = $resultados[0]['username'];

    // redirecionar para a página inicial (index.php)
    header('Location: index.php');
?>