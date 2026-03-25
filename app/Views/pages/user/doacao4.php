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
        <span class="active">4</span>
        <span>5</span>
    </div>

    <h2>Cuidados e Compromissos</h2>

    <form class="form-animal">

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
            <label><input type="radio" name="castrado" value="Sim" required> Sim</label>
            <label><input type="radio" name="castrado" value="Não" required> Não</label>
        </div>

        <!-- PERGUNTA 3-->

        <label class="form-cadastro">Você concorda em fornecer informações adicionais, se necessário, para facilitar a adoção?</label>
        <div class="radio-group">
            <label><input type="radio" name="castrado" value="Sim" required> Sim</label>
            <label><input type="radio" name="castrado" value="Não" required> Não</label>
        </div>


        <div class="botoes">
            <a href="./doacao.php">
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