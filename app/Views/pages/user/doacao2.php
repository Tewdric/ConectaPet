<?php
$titulo = 'Comportamento do Animal';
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
        <span>3</span>
        <span>4</span>
        <span>5</span>
    </div>

    <h2>Comportamento do Animal</h2>

    <form class="form-animal">

        <!-- PERGUNTA 1 -->
        <div class="campo">
            <label class="form-cadastro">Como o animal interage com pessoas?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Sociável e amigável</div>
                    <div class="option">Tímido, mas se adapta</div>
                    <div class="option">Medroso ou agressivo</div>
                    <div class="option">Outro</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
            <input type="text" placeholder="Ex: Raivoso" style="display:none;" class="outroAssunto">
        </div>


        <!-- PERGUNTA 2 -->

        <div class="campo">
            <label class="form-cadastro">O animal convive bem com outros animais?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Sim, com todos</div>
                    <div class="option">Não testado/Desconhecido</div>
                    <div class="option">Não</div>
                    <div class="option">Sim, apenas com algumas espécies</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>
        <input type="text" placeholder="Ex: Coelho" style="display:none;" class="outroAssunto">

        <!-- PERGUNTA 3 -->

        <div class="campo">
            <label class="form-cadastro">O animal convive bem com crianças?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Sim, com todos</div>
                    <div class="option">Não</div>
                    <div class="option">Não testado/Desconhecido</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <!-- PERGUNTA 4 -->

        <div class="campo">
            <label class="form-cadastro">O animal está acostumado a que tipo de ambiente? </label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Casa com quintal</div>
                    <div class="option">Apartamento</div>
                    <div class="option">Chácara/Sítio</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <!-- PERGUNTA 5 -->

        <div class="campo">
            <label class="form-cadastro">O animal tem algum problema de saúde ou necessita de cuidados especiais?</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Não, está saudável</div>
                    <div class="option">Desconhecido</div>
                    
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <div class="botoes">
            <button type="button" class="btn-voltar" onclick="window.location.href='./doacao1.php'">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">Continuar 🐾</button>
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
                    const outroInput = document.querySelector(".outroAssunto");

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

    <script>
        document.querySelector(".form-animal").addEventListener("submit", function(e) {
            let valido = true;

            // remove erros antigos
            document.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));

            // pega todos os campos obrigatórios
            const campos = this.querySelectorAll("[required]");

            campos.forEach(campo => {
                if (!campo.value || campo.value.trim() === "") {

                    if (campo.type === "hidden") {
                        campo.closest(".dropdown").classList.add("erro");
                    } else {
                        campo.classList.add("erro");
                    }

                    valido = false;
                }
            });

            // valida radio (porque é diferente)
            const radios = this.querySelectorAll("input[type='radio'][required]");
            const nomes = [...new Set([...radios].map(r => r.name))];

            nomes.forEach(nome => {
                const marcado = this.querySelector(`input[name="${nome}"]:checked`);
                if (!marcado) {
                    valido = false;

                    // marca todos do grupo
                    this.querySelectorAll(`input[name="${nome}"]`).forEach(r => {
                        r.parentElement.classList.add("erro");
                    });
                }
            });

            if (!valido) {
                e.preventDefault();
                alert("Preencha todos os campos obrigatórios!");
            } else {
                e.preventDefault(); // impede envio padrão
                window.location.href = "doacao3.php";
            }
        });
    </script>


</body>