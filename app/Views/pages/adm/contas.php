<?php
$titulo = 'Conta';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/nav_adm/sideBar.php'; ?>

    <div class="main-content">

        <?php
        // ✅ define o tipo
        $tipo = $_GET['tipo'] ?? 'usuarios';
        ?>
        <h2>Administrar Contas</h2>

        <div class="topo-tabela">
            <!-- FILTRO -->
            <div class="filtro">
                <a href="?tipo=usuarios">
                    <button class="<?= $tipo == 'usuarios' ? 'ativo' : '' ?>">Usuário</button>
                </a>

                <a href="?tipo=moderadores">
                    <button class="<?= $tipo == 'moderadores' ? 'ativo' : '' ?>">Moderador</button>
                </a>
            </div>

            <!-- BOTÃO CONDICIONAL -->
            <?php if ($tipo == 'moderadores'): ?>
                <button class="btn-criar">Criar novo Moderador</button>
            <?php endif; ?>

        </div>
        <?php
        // ✅ dados dinâmicos
        if ($tipo == 'moderadores') {
            $tituloTabela = "Moderadores";

            $usuarios = [
                ["id" => 10, "nome" => "Carlos", "data" => "05/02", "status" => "Ativo"],
                ["id" => 11, "nome" => "Ana", "data" => "06/02", "status" => "Ativo"]
            ];

            // 👇 NOVO
            $acoes = ['suspender', 'historico', 'mensagem', 'editar'];
        } else {
            $tituloTabela = "Usuários";

            $usuarios = [
                ["id" => 1, "nome" => "João", "data" => "01/01", "status" => "Ativo"],
                ["id" => 2, "nome" => "Maria", "data" => "02/02", "status" => "Ativo"]
            ];

            // 👇 NOVO
            $acoes = ['editar', 'suspender'];
        }

        // ✅ chama componente
        include './../../components/adm_component/tabela.php';
        ?>

    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            document.querySelectorAll('.btn-acao.suspender').forEach(botao => {

                botao.addEventListener('click', function() {

                    let linha = this.closest('.linha');
                    let status = linha.querySelector('.status');
                    let icone = this.querySelector('i');

                    if (!status || !icone) return;

                    if (status.classList.contains('ativo')) {
                        // vai suspender
                        status.classList.remove('ativo');
                        status.classList.add('suspenso');
                        status.textContent = 'Suspenso';

                        // agora mostra abrir 🔓
                        icone.classList.remove('fa-lock');
                        icone.classList.add('fa-lock-open');

                    } else {
                        // vai ativar
                        status.classList.remove('suspenso');
                        status.classList.add('ativo');
                        status.textContent = 'Ativo';

                        // agora mostra fechar 🔒
                        icone.classList.remove('fa-lock-open');
                        icone.classList.add('fa-lock');
                    }

                });

            });

        });
    </script>

</body>

</html>