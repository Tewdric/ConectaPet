<?php
$titulo = 'Recuperar senha';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php
    ob_start();
    ?>

    <h2>Recuperar senha</h2>

    <form class="form-cadastro">

        <label>Nome</label>
        <input type="text" name="nome" placeholder="Digite seu nome" required>

        <label>E-mail</label>
        <input type="email" name="email" placeholder="Digite seu E-mail" required>

        <label>Telefone</label>
        <input type="text" name="telefone" placeholder="Digite seu telefone" required>

    </form>

    <div class="botoes-modal">

        <a href="login.php">
            <button class="btn-voltar">Voltar</button>
        </a>

        <a href="./codigo_veri.php">
            <button h class="btn-concluir">
                Continuar 🐾
            </button>
        </a>


    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>