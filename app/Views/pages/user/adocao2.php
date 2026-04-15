<?php
$titulo = 'Família';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php ob_start(); ?>

    <div class="progress-steps">
        <span class="active">1</span>
        <span class="active">2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
    </div>

    <h2>Sobre a família</h2>

    <form class="form-cadastro" id="formFamilia">

        <!-- PESSOAS -->
        <p>Quantas pessoas moram na casa?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione a quantidade</div>

                <div class="dropdown-options">
                    <div class="option">1 pessoa</div>
                    <div class="option">2 pessoas</div>
                    <div class="option">3 pessoas</div>
                    <div class="option">4 ou mais pessoas</div>
                </div>

                <input type="hidden" name="pessoas" required>
            </div>
        </div>

        <!-- CRIANÇAS -->
        <p>Há crianças na residência?</p>

        <div class="campo">
            <div class="dropdown" id="dropdownCriancas">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim</div>
                    <div class="option">Não</div>
                </div>

                <input type="hidden" name="criancas" required>
            </div>
        </div>

        <!-- CAMPO DINÂMICO -->
        <div id="campo-criancas" class="campo-criancas" style="display:none;">
            <label>Número de crianças</label>
            <input type="number" name="num_criancas" min="1" placeholder="Ex: 2">
        </div>

        <!-- CONCORDAM -->
        <p>Todos os moradores concordam com a adoção?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim </div>
                    <div class="option">Não </div>
                </div>

                <input type="hidden" name="concordam" required>
            </div>
        </div>

        <!-- BOTÕES -->
        <div class="botoes-modal">
            <button type="button" class="btn-voltar" onclick="window.location.href='./questionario.php'">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">
                Continuar 🐾
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

                    // lógica crianças
                    if (hidden.name === "criancas") {
                        const campo = document.getElementById("campo-criancas");

                        if (option.textContent === "Sim") {
                            campo.style.display = "block";
                        } else {
                            campo.style.display = "none";
                        }
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

    <!-- 🔥 VALIDAÇÃO -->
    <script>
        document.getElementById("formFamilia").addEventListener("submit", function(e) {

            let valido = true;

            document.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));

            // valida dropdowns
            const campos = this.querySelectorAll("input[type='hidden'][required]");

            campos.forEach(campo => {
                if (!campo.value) {
                    campo.closest(".dropdown").classList.add("erro");
                    valido = false;
                }
            });

            // valida campo crianças se for "Sim"
            const criancas = document.querySelector("input[name='criancas']").value;
            const num = document.querySelector("input[name='num_criancas']");

            if (criancas === "Sim") {
                if (!num.value || num.value <= 0) {
                    num.classList.add("erro");
                    valido = false;
                }
            }

            if (!valido) {
                e.preventDefault();
                alert("Preencha todas as perguntas!");
            } else {
                e.preventDefault();
                window.location.href = "./adocao3.php";
            }

        });
    </script>

</body>