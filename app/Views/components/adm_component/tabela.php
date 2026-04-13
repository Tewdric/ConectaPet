<?php
$tituloTabela = $tituloTabela ?? 'Tabela';
$usuarios = $usuarios ?? [];
?>

<div class="admin-container">

    <h2><?= $tituloTabela ?></h2>

    <div class="tabela">

        <div class="tabela-header">
            <span>ID</span>
            <span>Nome</span>
            <span>Data</span>
            <span>Status</span>
            <span></span>
        </div>

        <?php foreach ($usuarios as $u): ?>
            <div class="linha">
                <span><?= $u['id'] ?></span>

                <div class="user">
                    <div class="avatar"></div>
                    <?= $u['nome'] ?>
                </div>

                <span><?= $u['data'] ?></span>

                <span class="status"><?= $u['status'] ?></span>

                <div class="acoes">
                    <i class="fas fa-lock"></i>
                    <i class="fas fa-pen"></i>
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>