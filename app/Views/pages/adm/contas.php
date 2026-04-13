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

        <!-- FILTRO -->
        <div class="filtro">
            <a href="?tipo=usuarios">
                <button class="<?= $tipo == 'usuarios' ? 'ativo' : '' ?>">Usuário</button>
            </a>

            <a href="?tipo=moderadores">
                <button class="<?= $tipo == 'moderadores' ? 'ativo' : '' ?>">Moderador</button>
            </a>
        </div>

        <?php
        // ✅ dados dinâmicos
        if ($tipo == 'moderadores') {
            $tituloTabela = "Moderadores";

            $usuarios = [
                ["id" => 10, "nome" => "Carlos", "data" => "05/02", "status" => "Ativo"],
                ["id" => 11, "nome" => "Ana", "data" => "06/02", "status" => "Ativo"]
            ];
        } else {
            $tituloTabela = "Usuários";

            $usuarios = [
                ["id" => 1, "nome" => "João", "data" => "01/01", "status" => "Ativo"],
                ["id" => 2, "nome" => "Maria", "data" => "02/02", "status" => "Ativo"]
            ];
        }

        // ✅ chama componente
        include './../../components/adm_component/tabela.php';
        ?>

    </div>

</body>

</html>