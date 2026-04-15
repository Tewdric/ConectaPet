<?php
$titulo = 'Residência';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php ob_start(); ?>

    <div class="progress-steps">
        <span class="active">1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
    </div>

    <h2>Sobre a residência</h2>

    <form class="form-cadastro" id="formResidencia">

        <!-- MORADIA -->
        <p>Você mora em casa, apartamento ou chácara/sítio?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione o tipo de moradia</div>

                <div class="dropdown-options">
                    <div class="option">Casa </div>
                    <div class="option">Apartamento </div>
                    <div class="option">Chácara/Sítio </div>
                    <div class="option">Outro</div>
                </div>

                <input type="hidden" name="moradia" required>
            </div>
        </div>

        <!-- IMÓVEL -->
        <p>O imóvel é próprio, alugado ou cedido?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione a situação do imóvel</div>

                <div class="dropdown-options">
                    <div class="option">Próprio</div>
                    <div class="option">Alugado</div>
                    <div class="option">Cedido</div>
                </div>

                <input type="hidden" name="imovel" required>
            </div>
        </div>

        <!-- ANIMAIS -->
        <p>Se alugado, o proprietário permite animais?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim</div>
                    <div class="option">Não </div>
                    <div class="option">Não se aplica</div>
                </div>

                <input type="hidden" name="animais" required>
            </div>
        </div>

        <!-- CHECKBOX -->
        <p>A residência tem quintal, jardim, área externa ou telas nas janelas?</p>

        <div class="radio-group" id="checkboxGroup">

            <label class="opcao">
                <input class="input-questionario" type="checkbox" name="estrutura[]">
                Quintal
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox" name="estrutura[]">
                Jardim
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox" name="estrutura[]">
                Área externa
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox" name="estrutura[]">
                Telas nas janelas
            </label>

            <label class="opcao">
                <input class="input-questionario" type="checkbox" name="estrutura[]">
                Nenhum dos anteriores
            </label>

        </div>

        <!-- BOTÕES -->
        <div class="botoes-modal">
            <button type="button" class="btn-voltar" onclick="window.location.href='./home.php'">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">
                <a href="./adocao2.php">Continuar 🐾</a>
            </button>
 
        </div>

    </form>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>

    <!-- SCRIPT DROPDOWN -->
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
                });
            });

            document.addEventListener("click", (e) => {
                if (!dropdown.contains(e.target)) {
                    dropdown.classList.remove("active");
                }
            });
        });
    </script>

    <!-- 🔥 VALIDAÇÃO -->
    <script>
        document.getElementById("formResidencia").addEventListener("submit", function(e) {

            let valido = true;

            // limpa erros antigos
            document.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));

            // valida dropdowns
            const campos = this.querySelectorAll("input[type='hidden'][required]");

            campos.forEach(campo => {
                if (!campo.value) {
                    campo.closest(".dropdown").classList.add("erro");
                    valido = false;
                }
            });

            // valida checkbox (mínimo 1)
            const checkboxes = document.querySelectorAll("input[name='estrutura[]']");
            const algumMarcado = [...checkboxes].some(c => c.checked);

            if (!algumMarcado) {
                document.getElementById("checkboxGroup").classList.add("erro");
                valido = false;
            }

            if (!valido) {
                e.preventDefault();
                alert("Preencha todas as perguntas!");
            } else {
                e.preventDefault();
                window.location.href = "./adocao2.php";
            }

        });
    </script>

</body>