<?php defined('ROOT') or die('Acesso inválido.') ?>

<?php
require_once('bo/navegacao.php');
?>

<div class="container">
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">

            <h3 class="text-center">Novo cliente</h3>
            <hr>

            <div class="mb-3">
                <label class="form-label">Cliente:</label>
                <input type="text" name="text_cliente" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username:</label>
                <input type="text" name="text_usuario" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="text" name="text_senha" class="form-control" required>
            </div>

            <div class="mb-3 text-center">
                <a href="?r=home" class="btn btn-secondary btn-150">Cancelar</a>
                <input type="submit" value="Criar" class="btn btn-primary btn-150">
            </div>

        </div>
    </div>
</div>