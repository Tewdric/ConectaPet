<?php
$titulo = 'Experiência';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php ob_start(); ?>

    <div class="progress-steps">
        <span class="active">1</span>
        <span class="active">2</span>
        <span class="active">3</span>
        <span>4</span>
        <span>5</span>
    </div>

    <h2>Sobre experiência com animais</h2>

    <form class="form-cadastro" id="formExperiencia">

        <!-- TEVE ANIMAIS -->
        <p>Você já teve animais antes?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim</div>
                    <div class="option">Não</div>
                </div>

                <input type="hidden" name="teve_animais" required>
            </div>
        </div>

        <!-- POSSUI ANIMAIS -->
        <p>Atualmente possui outros animais?</p>

        <div class="campo">
            <div class="dropdown" id="dropdownAnimais">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Sim</div>
                    <div class="option">Não</div>
                </div>

                <input type="hidden" name="possui_animais" required>
            </div>
        </div>

        <!-- CAMPO DINÂMICO -->
        <div id="campo-animais" class="campo-extra" style="display:none;">
            <label>Espécies e quantidade</label>
            <input type="text" name="descricao_animais" placeholder="Ex: 2 gatos e 1 cachorro">
        </div>

        <!-- VACINAÇÃO -->
        <p>Se possui animais, eles são vacinados e castrados?</p>

        <div class="campo">
            <div class="dropdown">
                <div class="dropdown-selected">Selecione uma opção</div>

                <div class="dropdown-options">
                    <div class="option">Todos vacinados e castrados </div>
                    <div class="option">Alguns vacinados/castrados</div>
                    <div class="option">Nenhum</div>
                    <div class="option">Não se aplica</div>
                </div>

                <input type="hidden" name="vacinados" required>
            </div>
        </div>

        <!-- BOTÕES -->
        <div class="botoes-modal">
            <button type="button" class="btn-voltar" onclick="window.location.href='./adocao2.php'">
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

                    // lógica campo animais
                    if (hidden.name === "possui_animais") {
                        const campo = document.getElementById("campo-animais");

                        if (option.textContent === "Sim") {
                            campo.style.display = "flex";
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

    <!--  VALIDAÇÃO -->
    <script>
        document.getElementById("formExperiencia").addEventListener("submit", function(e) {

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

            // valida campo animais se for "Sim"
            const possui = document.querySelector("input[name='possui_animais']").value;
            const desc = document.querySelector("input[name='descricao_animais']");

            if (possui === "Sim") {
                if (!desc.value.trim()) {
                    desc.classList.add("erro");
                    valido = false;
                }
            }

            if (!valido) {
                e.preventDefault();
                alert("Preencha todas as perguntas!");
            } else {
                e.preventDefault();
                window.location.href = "./adocao4.php";
            }

        });
    </script>

</body>