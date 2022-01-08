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
                <input type="text" name="text_usuario" id="usuario" class="form-control" readonly required>
            </div>

            <div class="mb-3">
                <label class="form-label">Senha:</label>
                <input type="text" name="text_senha" id="senha" class="form-control" readonly required>
            </div>

            <div class="mb-3 text-end">
                <button class="btn btn-primary" onclick="gerarUsuarioPassword()">Gerar</button>
            </div>

            <div class="mb-3 text-center">
                <a href="?r=home" class="btn btn-secondary btn-150">Cancelar</a>
                <input type="submit" value="Criar" class="btn btn-primary btn-150">
            </div>

        </div>
    </div>
</div>

<script>
    function gerarUsuarioPassword(){

        // definir variáveis
        let client_username = "";
        let client_password = "";
        let charbase = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";

        let client_username_length = 32;
        let client_password_length = 32;

        // client username
        for(var i = 1; i <= client_username_length; i++){
            client_username += charbase.charAt(Math.floor(Math.random()*charbase.length));
        }

        // client password
        for(var i = 1; i <= client_password_length; i++){
            client_password += charbase.charAt(Math.floor(Math.random()*charbase.length));
        }

        // colocar os valores nos inputs
        document.querySelector("#usuario").value = client_username;
        document.querySelector("#senha").value = client_password;

    }
</script>