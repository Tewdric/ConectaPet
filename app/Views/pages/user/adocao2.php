<?php
$titulo = 'Família';
include './../../components/head/head.php';
?>

<script>
    function mostrarCampoCriancas() {
        document.getElementById("campo-criancas").style.display = "block";
    }

    function esconderCampoCriancas() {
        document.getElementById("campo-criancas").style.display = "none";
    }
</script>

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
        <span>3</span>
        <span>4</span>
        <span>5</span>

    </div>


    <h2>Sobre a família</h2>

    <form class="form-cadastro">


        <p>Quantas pessoas moram na casa?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="pessoas">
                1 pessoa
            </label>

            <label class="opcao">
                <input type="radio" name="pessoas">
                2 pessoas
            </label>

            <label class="opcao">
                <input type="radio" name="pessoas">
                3 pessoas
            </label>

            <label class="opcao">
                <input type="radio" name="pessoas">
                4 ou mais pessoas
            </label>

        </div>


        <p>Há crianças? Se sim, quantas?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="criancas" value="sim" onclick="mostrarCampoCriancas()">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="criancas" value="nao" onclick="esconderCampoCriancas()">
                Não
            </label>

        </div>

        <div id="campo-criancas" class="campo-criancas">

            <label>Número de crianças</label>
            <input type="number" name="num_criancas" min="1" placeholder="Ex: 2">

        </div>


        <p>Todos os moradores concordam com a adoção?</p>

        <div class="radio-group">

            <label class="opcao">
                <input type="radio" name="concordam">
                Sim
            </label>

            <label class="opcao">
                <input type="radio" name="concordam">
                Não
            </label>

        </div>

    </form>
    <div class="botoes-modal">

        <a href="./questionario.php">
            <button class="btn-voltar">
                Voltar
            </button></a>

        <a href="./adocao3.php"><button class="btn-concluir">
                Continuar 🐾
            </button></a>
    </div>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

</body>