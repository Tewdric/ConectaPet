<?php
$titulo = 'Cuidados e Compromissos';
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

    <h2>Cuidados e Compromissos</h2>

    <form class="form-animal" novalidate>

        <!-- PERGUNTA 1 -->
        <div class="campo">
            <label class="form-cadastro">Quais itens você pode fornecer com o animal? (Marque todas que se aplicam)</label>

            <div class="dropdown">
                <div class="dropdown-selected">Selecione um tipo</div>

                <div class="dropdown-options">
                    <div class="option">Ração</div>
                    <div class="option">Acessórios (ex.: coleira, gaiola, caixa de areia)</div>
                    <div class="option">Carteira de vacinação</div>
                    <div class="option">Nenhum</div>
                </div>

                <!-- valor enviado -->
                <input type="hidden" name="tipoAnimal" required>
            </div>
        </div>

        <input type="text" placeholder="Especificar" style="display:none;" class="outroAssunto">

        <!-- PERGUNTA 2 -->

        <label class="form-cadastro">Você já levou o animal a um veterinário?</label>
        <div class="radio-group">
            <label><input type="radio" name="veterinario" value="Sim" required> Sim</label>
            <label><input type="radio" name="veterinario" value="Não" required> Não</label>
        </div>

        <!-- PERGUNTA 3-->

        <label class="form-cadastro">Você concorda em fornecer informações adicionais, se necessário, para facilitar a adoção?</label>
        <div class="radio-group">
            <label><input type="radio" name="infoAdicional" value="Sim" required> Sim</label>
            <label><input type="radio" name="infoAdicional" value="Não" required> Não</label>
        </div>

        <!-- PERGUNTA 4 -->
        <label class="form-cadastro">Você gostaria de receber atualizações sobre o animal após a adoção? </label>
        <div class="radio-group">
            <label><input type="radio" name="atualizacoes" value="Sim" required> Sim</label>
            <label><input type="radio" name="atualizacoes" value="Não" required> Não</label>
        </div>

        <div class="botoes">
            <button type="button" class="btn-voltar" onclick="window.location.href='./doacao3.php'">
                Voltar
            </button>
            <button type="submit" class="btn-concluir">Concluir 🐾</button>
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
            e.preventDefault();

            let valido = true;

            this.querySelectorAll(".erro").forEach(el => el.classList.remove("erro"));

            const campos = this.querySelectorAll("[required]");

            campos.forEach(campo => {
                if (!campo.value || campo.value.trim() === "") {
                    valido = false;

                    if (campo.type === "hidden") {
                        campo.closest(".dropdown").classList.add("erro");
                    } else {
                        campo.classList.add("erro");
                    }
                }
            });

            const radios = this.querySelectorAll("input[type='radio'][required]");
            const nomes = [...new Set([...radios].map(r => r.name))];

            nomes.forEach(nome => {
                const grupo = this.querySelectorAll(`input[name="${nome}"]`);
                const marcado = this.querySelector(`input[name="${nome}"]:checked`);

                if (!marcado) {
                    valido = false;

                    grupo.forEach(r => {
                        r.closest(".radio-group").classList.add("erro");
                    });
                }
            });

            if (!valido) {
                alert("Preencha todos os campos obrigatórios!");
                return;
            }

            window.location.href = "doacao5.php";
        });
    </script>

</body>