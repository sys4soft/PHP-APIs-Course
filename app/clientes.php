<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');
require_once('inc/functions.php');

// lógica e regras de negócio
$results = api_request('get_all_active_clients', 'GET');

// analisar a informação obtida
if($results['data']['status'] == 'SUCCESS'){
    $clientes = $results['data']['results']; 
} else {
    $clientes = [];
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Consumidora - Clientes</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

</head>

<body>

    <?php include('inc/nav.php') ?>

    <section class="container">
        <div class="row">
            <div class="col">

                <div class="row">
                    <div class="col">
                        <h1>Clientes</h1>
                    </div>
                    <div class="col text-end align-self-center">
                        <a href="clientes_novo.php" class="btn btn-primary btn-sm">Adicionar cliente...</a>
                    </div>
                </div>
                
                <?php if (count($clientes) == 0) : ?>
                    <p class="text-center">Não existem clientes registados.</p>
                <?php else : ?>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Telefone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach($clientes as $cliente): ?>
                                
                                <tr>
                                    <td>
                                        <a href="clientes_edit.php?id=<?= $cliente['id_cliente'] ?>">&#9998;</a>
                                        <?= $cliente['nome'] ?>
                                    </td>
                                    <td><?= $cliente['email'] ?></td>
                                    <td><?= $cliente['telefone'] ?></td>
                                    <td>
                                        <a href="clientes_delete.php?id=<?= $cliente['id_cliente'] ?>">&#128465;</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <p class="text-end">Total: <strong><?= count($clientes) ?></strong></p>

                <?php endif; ?>

            </div>
        </div>
    </section>


    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>