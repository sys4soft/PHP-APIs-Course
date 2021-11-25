<?php

// dependencies
require_once('inc/config.php');
require_once('inc/api_functions.php');

// lógica e regras de negócio
$results = api_request('get_all_products', 'GET');

// analisar a informação obtida
if ($results['data']['status'] == 'SUCCESS') {
    $produtos = $results['data']['results'];
} else {
    $produtos = [];
}

?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App Consumidora - Produtos</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

</head>

<body>

    <?php include('inc/nav.php') ?>

    <section class="container">
        <div class="row">
            <div class="col">

                <div class="row">
                    <div class="col">
                        <h1>Produtos</h1>
                    </div>
                    <div class="col text-end align-self-center">
                        <a href="produtos_novo.php" class="btn btn-primary btn-sm">Adicionar produto...</a>
                    </div>
                </div>

                <?php if (count($produtos) == 0) : ?>
                    <p class="text-center">Não existem produtos registados.</p>
                <?php else : ?>

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th width="50%">Produto</th>
                                <th width="50%" class="text-end">Quantidade (stock)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($produtos as $produto) : ?>

                                <tr>
                                    <td><?= $produto['produto'] ?></td>
                                    <td class="text-end"><?= $produto['quantidade'] ?></td>
                                    <td>
                                        <a href="produtos_delete.php?id=<?= $produto['id_produto'] ?>">Delete</a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>

                    <p class="text-end">Total: <strong><?= count($produtos) ?></strong></p>

                <?php endif; ?>

            </div>
        </div>
    </section>


    <script src="assets/bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>