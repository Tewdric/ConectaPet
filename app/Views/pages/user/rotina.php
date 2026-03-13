<?php
$titulo = 'Rotina';
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
        <span class="active">4</span>
        <span>5</span>

    </div>

    <h2>Rotina do adotante</h2>

    <form class="form-cadastro">


        <p>Quantas horas por dia o animal ficará sozinho?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="horas_sozinho">
                Menos de 4 horas
            </label>

            <label class="opcao">
                <input type="radio" name="horas_sozinho">
                4 a 8 horas
            </label>

            <label class="opcao">
                <input type="radio" name="horas_sozinho">
                Mais de 8 horas
            </label>

        </div>

        <p>Quem será o responsável por alimentar e levar ao veterinário?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="responsavel">
                Eu
            </label>

            <label class="opcao">
                <input type="radio" name="responsavel">
                Outro membro da família
            </label>

        </div>

        <p>Você tem condições financeiras para manter alimentação, vacinas e cuidados veterinários?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="condicoes">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="condicoes">
                Não
            </label>

        </div>

    </form>

    <div class="botoes-modal">

        <a href="./expe-animais.php">
            <button class="btn-voltar">
                Voltar
            </button>
        </a>

        <a href="./termo.php">
            <button class="btn-concluir">
                Continuar 🐾
            </button>

        </a>

    </div>


    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>