<?php defined('ROOT') or die('Acesso inválido.') ?>

<div class="container-fluid">
    <div class="row bg-dark text-white">
        <div class="col-sm-6 col-12 p-2">
            MENU
        </div>
        <div class="col-sm-6 col-12 p-2 text-end">
            <?= $_SESSION['usuario'] ?>
            <span class="mx-2">|</span>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</div>