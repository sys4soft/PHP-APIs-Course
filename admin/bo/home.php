<?php defined('ROOT') or die('Acesso inválido.') ?>

<?php 
    require_once('bo/navegacao.php');
?>

<?php 

    // recolhe os dados das aplicações clientes da API
    $bd = new database();
    $clientes_da_api = $bd->EXE_QUERY("SELECT * FROM authentication");

?>

<div class="container mt-5">
    <div class="row">
        <div class="col">

            <h3>Clientes da API</h3>

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Chave</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($clientes_da_api as $cliente_api): ?>
                        <tr>
                            <td><?= $cliente_api['client_name']?></td>
                            <td><?= $cliente_api['username']?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>