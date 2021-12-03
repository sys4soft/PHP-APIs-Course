<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
require_once('inc/functions.php');

$error_message = '';
$success_message = '';

// step 1
if ($_SERVER['REQUEST_METHOD'] != 'POST'){
    // verificar se existe o id do cliente indicado na querystring
    if (!isset($_GET['id'])) {
        header('Location: index.php');
    }
    
    // chamar a API para ir buscar os dados do cliente a editar
    $cliente = api_request('get_client', 'POST', ['id' => $_GET['id']])['data']['results'][0];
}

// lógica e regras de negócio - step 2
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['text_nome'];
    $email = $_POST['text_email'];
    $telefone = $_POST['text_telefone'];

    // call para a API fazer a atualização do cliente
    $results = api_request('update_client', 'POST', [
        'id_cliente' => $id_cliente,
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone
    ]);

    // apresenta o resultado da operação na API
    if ($results['data']['status'] == 'ERROR') {
        $error_message = $results['data']['message'];
    } elseif ($results['data']['status'] == 'SUCCESS') {
        $success_message = $results['data']['message'];
    }

    // recarregar os dados do cliente atualizado
    $cliente = api_request('get_client', 'POST', ['id' => $id_cliente])['data']['results'][0];
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Consumidora - Editar cliente</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

</head>

<body>

    <?php include('inc/nav.php') ?>

    <section class="container">
        <div class="row my-5">
            <div class="col-sm-6 offset-sm-3 card bg-light p-4">

                <form action="clientes_edit.php" method="POST">

                    <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

                    <div class="mb-3">
                        <label>Nome do cliente:</label>
                        <input type="text" name="text_nome" class="form-control" value="<?= $cliente['nome'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Telefone:</label>
                        <input type="text" name="text_telefone" class="form-control" value="<?= $cliente['telefone'] ?>">
                    </div>

                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="text_email" class="form-control" value="<?= $cliente['email'] ?>">
                    </div>

                    <div class="mb-3 text-center">
                        <a href="clientes.php" class="btn btn-secondary btn-sm">Cancelar</a>
                        <input type="submit" value="Atualizar" class="btn btn-primary btn-sm">
                    </div>

                    <?php if (!empty($error_message)) : ?>
                        <div class="alert alert-danger p-2 text-center">
                            <?= $error_message ?>
                        </div>
                    <?php elseif (!empty($success_message)) : ?>
                        <div class="alert alert-success p-2 text-center">
                            <?= $success_message ?>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>