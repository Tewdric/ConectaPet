<?php
$titulo = 'Experiência';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>

    <div class="progress-steps">

        <span class="active">1</span>
        <span class="active">2</span>
        <span class="active">3</span>
        <span>4</span>
        <span>5</span>

    </div>


    <h2>Sobre experiência com animais</h2>

    <form class="form-cadastro">


        <p>Você já teve animais antes?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="teve_animais">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="teve_animais">
                Não
            </label>

        </div>



        <p>Atualmente possui outros animais?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="possui_animais" onclick="mostrarCampoAnimais()">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="possui_animais" onclick="esconderCampoAnimais()">
                Não
            </label>

        </div>


        <div id="campo-animais" class="campo-extra">

            <label>Espécies e quantidade</label>

            <input type="text" placeholder="Ex: 2 gatos e 1 cachorro">

        </div>



        <p>Se possui animais, eles são vacinados e castrados?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="vacinados">
                Sim, todos são vacinados e castrados
            </label>

            <label class="opcao">
                <input type="radio" name="vacinados">
                Alguns são vacinados e/ou castrados
            </label>

            <label class="opcao">
                <input type="radio" name="vacinados">
                Não
            </label>

            <label class="opcao">
                <input type="radio" name="vacinados">
                Não se aplica (não possuo animais)
            </label>

        </div>

    </form>
    <div class="botoes-modal">

        <a href="./adocao2.php">
            <button class="btn-voltar">
                Voltar
            </button>
        </a>

        <a href="./adocao4.php">
            <button class="btn-concluir">
                Continuar 🐾
            </button></a>

    </div>


    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

    <script>
        function mostrarCampoAnimais() {
            document.getElementById("campo-animais").style.display = "flex";
        }

        function esconderCampoAnimais() {
            document.getElementById("campo-animais").style.display = "none";
        }
    </script>

</body>