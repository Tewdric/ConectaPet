<?php
$titulo = 'Residência';
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
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>

    </div>
    <h2>Sobre a residência</h2>

    <form class="form-cadastro">

        <p>Você mora em casa, apartamento ou chácara/sítio?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="moradia">
                Casa
            </label>

            <label class="opcao">
                <input type="radio" name="moradia">
                Apartamento
            </label>

            <label class="opcao">
                <input type="radio" name="moradia">
                Chácara/Sítio
            </label>

            <label class="opcao">
                <input type="radio" name="moradia">
                Outro
            </label>

        </div>


        <p>O imóvel é próprio, alugado ou cedido?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="imovel">
                Próprio
            </label>

            <label class="opcao">
                <input type="radio" name="imovel">
                Alugado
            </label>

            <label class="opcao">
                <input type="radio" name="imovel">
                Cedido
            </label>

        </div>


        <p>Se alugado, o proprietário permite animais?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="animais">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="animais">
                Não
            </label>

            <label class="opcao">
                <input type="radio" name="animais">
                Não se aplica
            </label>

        </div>


        <p>A residência tem quintal, jardim, área externa ou telas nas janelas?</p>

        <div class="radio-group">

            <label class="opcao">
                <input class="input-questionario" type="checkbox">
                Quintal
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox">
                Jardim
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox">
                Área externa
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox">
                Telas nas janelas
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox">
                Nenhum dos anteriores
            </label>

        </div>

    </form>
    <div class="botoes-modal">
        <a href="./home.php">
            <button class="btn-voltar">
                Voltar
            </button>

        </a>

        <a href="./adocao2.php"><button class="btn-concluir">
                Continuar 🐾
            </button></a>

    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>