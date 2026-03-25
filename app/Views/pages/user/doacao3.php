<?php
$titulo = 'Historido do Animal';
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

    <h2>Histórico do Animal</h2>

    <form class="form-animal">

        <!-- PERGUNTA 1 -->
        <div class="campo">
            <label class="form-cadastro">Como você adquiriu o animal?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Adoção</div>
                    <div class="option">Compra</div>
                    <div class="option">Nascido em casa</div>
                    <div class="option">Resgate da rua</div>
                    <div class="option">Outro</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <input type="text" placeholder="Especificar" style="display:none;" class="outroAssunto">

        <!-- PERGUNTA 2 -->

        <div class="campo">
            <label class="form-cadastro">Há quanto tempo o animal está com você?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Menos de 6 meses</div>
                    <div class="option">6 meses a 1 ano</div>
                    <div class="option">1 a 3 anos</div>
                    <div class="option">Mais de 3 anos</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <!-- PERGUNTA 3 -->

        <div class="campo">
            <label class="form-cadastro">Por que você está doando o animal?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Mudança de residência</div>
                    <div class="option">Falta de condições financeiras</div>
                    <div class="option">Falta de tempo para cuidar</div>
                    <div class="option">Problemas de saúde do tutor</div>
                    <div class="option">Incompatibilidade com outros animais ou pessoas</div>
                    <div class="option">Outro</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>
        <input type="text" placeholder="Descrever o motivo" style="display:none;" class="outroAssunto">

        <div class="botoes">
            <a href="./doacao2.php">
                <button type="button" class="btn-voltar">Voltar</button>

            </a>
            <a href="./doacao4.php">
                <button type="submit" class="btn-concluir">Continuar 🐾</button>
            </a>
        </div>
    </form>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

    <script>
        const dropdowns = document.querySelectorAll(".dropdown");

        dropdowns.forEach(dropdown => {
            const selected = dropdown.querySelector(".dropdown-selected");
            const options = dropdown.querySelectorAll(".option");
            const hidden = dropdown.querySelector("input[type='hidden']");

            selected.addEventListener("click", () => {
                dropdown.classList.toggle("active");
            });

            options.forEach(option => {
                option.addEventListener("click", () => {
                    selected.textContent = option.textContent;
                    dropdown.classList.remove("active");

                    if (hidden) hidden.value = option.textContent;

                    // campo "Outro"
                    const campo = dropdown.closest(".campo");
                    const outroInput = campo.nextElementSibling;

                    if (option.textContent === "Outro" && outroInput) {
                        outroInput.style.display = "block";
                        outroInput.required = true;
                    } else if (outroInput) {
                        outroInput.style.display = "none";
                        outroInput.required = false;
                    }
                });
            });

            document.addEventListener("click", (e) => {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove("active");
                }
            });
        });
    </script>


</body>