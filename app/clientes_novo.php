<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
require_once('inc/functions.php');

// lógica e regras de negócio
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $nome = $_POST['text_nome'];
    $email = $_POST['text_email'];
    $telefone = $_POST['text_telefone'];

    $results = api_request('create_new_client', 'POST', [
        'nome' => $nome,
        'email' => $email,
        'telefone' => $telefone
    ]);

    // já cá voltamos...
    printData($results);

}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Consumidora - Novo cliente</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

</head>
<body>
    
    <?php include('inc/nav.php') ?>

    <section class="container">
        <div class="row my-5">
            <div class="col-sm-6 offset-sm-3 card bg-light p-4">

                <form action="clientes_novo.php" method="POST">

                    <div class="mb-3">
                        <label>Nome do cliente:</label>
                        <input type="text" name="text_nome" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label>Telefone:</label>
                        <input type="text" name="text_telefone" class="form-control">
                    </div>
    
                    <div class="mb-3">
                        <label>Email:</label>
                        <input type="email" name="text_email" class="form-control">
                    </div>
    
                    <div class="mb-3 text-center">
                        <a href="clientes.php" class="btn btn-secondary btn-sm">Cancelar</a>
                        <input type="submit" value="Guardar" class="btn btn-primary btn-sm">
                    </div>

                </form>
                

            </div>
        </div>
    </section>


<script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>