<?php
$titulo = 'Cadastro';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>

    <h2>Dados Pessoais</h2>

    <form class="form-cadastro">

        <div class="campo">
            <label>Nome Completo</label>
            <input type="text">
        </div>

        <div class="campo">
            <label>CPF</label>
            <input type="text">
        </div>

        <div class="campo">
            <label>Telefone</label>
            <input type="text">
        </div>

        <div class="campo">
            <label>E-mail</label>
            <input type="email">
        </div>

        <div class="senha-group">

            <div class="input-box">
                <label>Senha</label>
                <input type="password">
            </div>

            <div class="input-box">
                <label>Confirmar Senha</label>
                <input type="password">
            </div>

        </div>


        <div class="upload-area">

            <div class="upload-icon">
                <img src="../../assets/img/icon-foto.png" alt="">
            </div>

            <p>
                Selecione uma imagem para foto de perfil
            </p>

            <input type="file" name="foto">

        </div>


        <div class="botoes">

            <button type="submit" class="btn-voltar">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">
                Concluir 🐾
            </button>

        </div>



    </form>
    <?php
    $modalConteudo = ob_get_clean();

    include './../../components/modal/modal.php';
    ?>

</body>