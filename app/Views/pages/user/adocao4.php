<?php
$titulo = 'Rotina';
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
        <span>5</span>
    </div>

    <h2>Rotina do adotante</h2>

    <form class="form-cadastro" id="formRotina">

        <!-- TEMPO SOZINHO -->
        <p>Quantas horas por dia o animal ficará sozinho?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione o tempo</div>

                <div class="dropdown-options">
                    <div class="option">Menos de 4 horas</div>
                    <div class="option">4 a 8 horas</div>
                    <div class="option">Mais de 8 horas</div>
                </div>

                <input type="hidden" name="horas_sozinho" required>
            </div>
        </div>

        <!-- RESPONSÁVEL -->
        <p>Quem será o responsável pelos cuidados do animal?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Eu</div>
                    <div class="option">Outro membro da família</div>
                </div>

                <input type="hidden" name="responsavel" required>
            </div>
        </div>

        <!-- CONDIÇÕES -->
        <p>Você tem condições financeiras para manter alimentação, vacinas e cuidados veterinários?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim </div>
                    <div class="option">Não </div>
                </div>

                <input type="hidden" name="condicoes" required>
            </div>
        </div>

        <!-- BOTÕES -->
        <div class="botoes-modal">
            <button type="button" class="btn-voltar" onclick="window.location.href='./adocao3.php'">
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
        document.getElementById("formRotina").addEventListener("submit", function(e) {

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

            if (!valido) {
                e.preventDefault();
                alert("Preencha todas as perguntas!");
            } else {
                e.preventDefault();
                window.location.href = "./adocao5.php";
            }

        });
    </script>

</body>