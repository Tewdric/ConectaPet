<?php
$titulo = 'Termo de Responsabilidade';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php ob_start(); ?>

    <div class="progress-steps">
        <span class="active">1</span>
        <span class="active">2</span>
        <span class="active">3</span>
        <span class="active">4</span>
        <span class="active">5</span>
    </div>

    <h2>Termo de Responsabilidade – Adoção de Animais</h2>

    <form class="form-cadastro" id="formTermo">

        <p>
            Ao prosseguir com a adoção, o(a) adotante declara estar ciente e de acordo com as condições abaixo:
        </p>

        <div class="termo-texto">

            <p><b>1. Responsabilidade pelo Animal</b></p>
            <ul>
                <li>Comprometo-me a oferecer cuidados adequados ao animal adotado.</li>
            </ul>

            <p><b>2. Bem-estar do Animal</b></p>
            <ul>
                <li>Comprometo-me a tratar o animal com respeito e dignidade.</li>
            </ul>

            <p><b>3. Proibição de Abandono</b></p>
            <ul>
                <li>Estou ciente de que abandono e maus-tratos são crimes.</li>
            </ul>

            <p><b>4. Responsabilidade Legal</b></p>
            <ul>
                <li>Posso responder civil e criminalmente por maus-tratos.</li>
            </ul>

            <p><b>5. Consentimento</b></p>
            <ul>
                <li>Declaro que li e aceito este termo.</li>
            </ul>

        </div>

        <!-- CHECKBOX -->
        <div class="checkbox-termo">
            <label class="opcao" id="label-termo">
                <input class="input-questionario" type="checkbox" id="aceite">
                <span>Declaro que li e aceito os termos acima.</span>
            </label>
        </div>

        <!-- BOTÕES -->
        <div class="botoes-modal">

            <button type="button" onclick="window.location.href='./adocao4.php'" class="btn-voltar">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">
                Enviar Solicitação 🐾
            </button>

        </div>

    </form>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

    <!-- 🔥 VALIDAÇÃO -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const form = document.getElementById("formTermo");
            const checkbox = document.getElementById("aceite");
            const label = document.getElementById("label-termo");

            form.addEventListener("submit", function(e) {

                // remove erro antigo
                label.classList.remove("erro");

                if (!checkbox.checked) {
                    e.preventDefault();

                    label.classList.add("erro");

                    alert("Você precisa aceitar os termos para continuar!");
                } else {
                    e.preventDefault();
                    window.location.href = "./solicitacao.php";
                }

            });

        });
    </script>

</body>