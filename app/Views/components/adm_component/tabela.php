<?php
$tituloTabela = $tituloTabela ?? 'Tabela';
$usuarios = $usuarios ?? [];
$acoes = $acoes ?? []; // 👈 NOVO
?>

<div class="admin-container">

    <h2><?= $tituloTabela ?></h2>

    <div class="tabela">

        <div class="tabela-header">
            <span>ID</span>
            <span>Nome</span>
            <span>Data</span>
            <span>Status</span>
            <span>Ações</span>
        </div>

        <?php foreach ($usuarios as $u): ?>
            <div class="linha">
                <span><?= $u['id'] ?></span>

                <div class="user">
                    <div class="avatar"></div>
                    <?= $u['nome'] ?>
                </div>

                <span><?= $u['data'] ?></span>

                <span class="status <?= strtolower($u['status']) == 'ativo' ? 'ativo' : 'suspenso' ?>">
                    <?= $u['status'] ?>
                </span>

                <div class="acoes">

                    <?php if (!empty($acoes)): ?>

                        <?php foreach ($acoes as $acao): ?>

                            <?php if ($acao == 'suspender'): ?>
                                <button class="btn-acao suspender" data-id="<?= $u['id'] ?>">
                                    <i class="fas <?= strtolower($u['status']) == 'ativo' ? 'fa-lock' : 'fa-lock-open' ?>"></i>
                                </button>
                            <?php endif; ?>

                            <?php if ($acao == 'historico'): ?>
                                <button class="btn-acao historico"
                                    data-id="<?= $u['id'] ?>"
                                    data-nome="<?= $u['nome'] ?>"
                                    title="Histórico">
                                    <i class="fas fa-clock"></i>
                                </button>
                            <?php endif; ?>

                            <?php if ($acao == 'mensagem'): ?>
                                <button class="btn-acao mensagem"
                                    data-id="<?= $u['id'] ?>"
                                    data-nome="<?= $u['nome'] ?>"
                                    title="Mensagem">
                                    <i class="fas fa-envelope"></i>
                                </button>
                            <?php endif; ?>

                            <?php if ($acao == 'editar'): ?>
                                <button class="btn-acao editar"
                                    data-id="<?= $u['id'] ?>"
                                    data-nome="<?= $u['nome'] ?>"
                                    data-email="<?= $u['email'] ?? '' ?>"
                                    data-telefone="<?= $u['telefone'] ?? '' ?>"
                                    title="Editar">
                                    <i class="fas fa-pen"></i>
                                </button>
                            <?php endif; ?>

                            <?php if ($acao == 'excluir'): ?>
                                <button class="btn-acao excluir" data-id="<?= $u['id'] ?>" title="Excluir">
                                    <i class="fas fa-trash"></i>
                                </button>
                            <?php endif; ?>

                        <?php endforeach; ?>

                    <?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>

    </div>

</div>