<?php
$titulo = 'Envio de codigo para recuperar senha';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>

    <h2>Confirme seu acesso 🐾</h2>

    <div class="confirmacao-box">

        <p>
            Você irá receber um código de verificação no e-mail usua*****@gmail.com
        </p>

    </div>

    <h4>Digite o codigo</h4>
    
    <div class="codigo-container">


        <div class="codigo">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
            <input type="text" maxlength="1">
        </div>

    </div>


    <div class="botoes">

        <button type="submit" class="btn-voltar">
            Voltar
        </button>

        <button type="submit" class="btn-concluir">
            Concluir 🐾
        </button>

    </div>

    <a class="reenvio" href="">Reenviar código</a>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

    <script>
        const inputs = document.querySelectorAll(".codigo input");

        inputs.forEach((input, index) => {
            input.addEventListener("input", () => {
                if (input.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener("keydown", (e) => {
                if (e.key === "Backspace" && input.value === "" && index > 0) {
                    inputs[index - 1].focus();
                }
            });
        });
    </script>

</body>