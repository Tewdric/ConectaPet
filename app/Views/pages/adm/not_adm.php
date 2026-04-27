
<?php
$titulo = "Notificações";
include './../../components/head/head.php';
?>

<body>

<?php include './../../components/nav/nav_adm/sideBar.php'; ?>

<div class="main-content">

    <div class="notificacoes-container">

        <!-- COLUNA LISTA -->
        <div class="painel-lista">

            <div class="topo-noti">
                <h2>Notificações</h2>

                <select class="filtro">
                    <option>Todas</option>
                    <option>Usuários</option>
                    <option>Animais</option>
                    <option>Publicações</option>
                    <option>Sistema</option>
                </select>
            </div>

            <div class="lista-cards">

                <div class="card-noti ativo">
                    <i class="fas fa-user-plus"></i>
                    <div>
                        <h4>Novo usuário cadastrado</h4>
                        <p>Maria entrou na plataforma.</p>
                        <span>5 min atrás</span>
                    </div>
                </div>

                <div class="card-noti">
                    <i class="fas fa-paw"></i>
                    <div>
                        <h4>Novo animal publicado</h4>
                        <p>Thor foi cadastrado.</p>
                        <span>15 min atrás</span>
                    </div>
                </div>

                <div class="card-noti">
                    <i class="fas fa-file-alt"></i>
                    <div>
                        <h4>Nova publicação</h4>
                        <p>Post aguardando revisão.</p>
                        <span>30 min atrás</span>
                    </div>
                </div>

                <div class="card-noti">
                    <i class="fas fa-cog"></i>
                    <div>
                        <h4>Sistema atualizado</h4>
                        <p>Backup concluído com sucesso.</p>
                        <span>Hoje</span>
                    </div>
                </div>

            </div>

        </div>

        <!-- COLUNA DETALHES -->
        <div class="painel-detalhes">

            <div class="header-detalhes">
                <h3>Detalhes</h3>
            </div>

            <div class="conteudo-detalhes">

                <div class="icone-detalhe">
                    <i class="fas fa-user-plus"></i>
                </div>

                <h2>Novo usuário cadastrado</h2>

                <p>
                    Maria Silva criou uma conta na plataforma e aguarda análise inicial.
                </p>

                <div class="info-extra">
                    <span><strong>Tipo:</strong> Usuário</span>
                    <span><strong>Data:</strong> Hoje às 14:20</span>
                </div>

                <div class="botoes">
                    <button class="btn-voltar">Ver Perfil</button>
                    <button class="btn-concluir">Aprovar</button>
                </div>

            </div>

        </div>

    </div>

</div>

</body>