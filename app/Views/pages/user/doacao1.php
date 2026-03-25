<?php
$titulo = 'Doação';
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
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>5</span>
    </div>

    <h2>Apresente seu Aumigo 🐾</h2>

    <form class="form-animal">

        <!-- INFORMAÇÕES BÁSICAS -->
        <fieldset>
            <legend>Informações básicas</legend>

            <label class="form-cadastro">Nome do pet</label>
            <input type="text" placeholder="Ex: Thor" required>

            <label class="form-cadastro">Raça do pet (se houver)</label>
            <input type="text" placeholder="Ex: Vira-lata">

            <label class="form-cadastro">Idade aproximada</label>
            <input type="date" required>

            <div class="campo">
                <label class="form-cadastro">Tipo do Animal</label>

                <div class="dropdown">
                    <div class="dropdown-selected">Selecione um tipo</div>

                    <div class="dropdown-options">
                        <div class="option">Cachorro</div>
                        <div class="option">Gato</div>
                        <div class="option">Aves</div>
                        <div class="option">Outro</div>
                    </div>

                    <!-- valor enviado -->
                    <input type="hidden" name="tipoAnimal" required>
                </div>
            </div>

            <input type="text" placeholder="Ex: Coelho" style="display:none;" class="outroAssunto">

            <label class="form-cadastro">Gênero</label>
            <div class="radio-group">
                <label><input type="radio" name="genero" value="Macho" required> Macho</label>
                <label><input type="radio" name="genero" value="Fêmea" required> Fêmea</label>
            </div>
        </fieldset>

        <!-- SAÚDE -->
        <fieldset>
            <legend>Saúde e cuidados</legend>

            <div class="campo">
                <label class="form-cadastro">O animal está vacinado?</label>

                <div class="dropdown">
                    <div class="dropdown-selected">Selecione</div>

                    <div class="dropdown-options">
                        <div class="option">Sim, vacinas em dia</div>
                        <div class="option">Sim, desatualizadas</div>
                        <div class="option">Não</div>
                        <div class="option">Desconhecido</div>
                    </div>

                    <input type="hidden" name="vacinado" required>
                </div>
            </div>

            <div class="campo">
                <label class="form-cadastro">Peso</label>

                <div class="dropdown">
                    <div class="dropdown-selected">Selecione o peso</div>

                    <div class="dropdown-options">
                        <div class="option">0-11 kg</div>
                        <div class="option">11-23 kg</div>
                        <div class="option">23-45 kg</div>
                        <div class="option">+45 kg</div>
                    </div>

                    <input type="hidden" name="peso" required>
                </div>
            </div>

            <label class="form-cadastro">Castrado</label>
            <div class="radio-group">
                <label><input type="radio" name="castrado" value="Sim" required> Sim</label>
                <label><input type="radio" name="castrado" value="Não" required> Não</label>
            </div>
        </fieldset>

        <!-- CONTATO -->
        <fieldset>
            <legend>Contato e localização</legend>

            <label class="form-cadastro">E-mail</label>
            <input type="email" placeholder="Ex: seuemail@gmail.com" required>

            <label class="form-cadastro">Telefone</label>
            <input type="text" placeholder="Ex: (67) 99999-9999" required>

            <label class="form-cadastro">Localização</label>
            <input type="text" placeholder="Ex: Rua das Flores, 123" required>
        </fieldset>

        <!-- SOBRE -->
        <fieldset>
            <legend>Sobre o pet</legend>

            <label class="form-cadastro">Foto</label>
            <input type="file" required>

            <label class="form-cadastro">Descrição</label>
            <textarea placeholder="Ex: Muito dócil, gosta de brincar..." required></textarea>
        </fieldset>

        <div class="botoes">
            <a href="">
                <button type="button" class="btn-voltar">Voltar</button>

            </a>
            <a href="./doacao2.php">
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