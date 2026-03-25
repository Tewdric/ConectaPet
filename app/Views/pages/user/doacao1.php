<?php
$titulo = 'Doação';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

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
            <input type="text">

            <label class="form-cadastro">Raça do pet (se houver)</label>
            <input type="text">

            <label class="form-cadastro">Idade aproximada</label>
            <input type="date">

            <div class="campo">
                <label class="form-cadastro">Tipo do Animal</label>

                <div class="dropdown">
                    <div class="dropdown-selected">Selecione um Tipo</div>

                    <div class="dropdown-options">
                        <div class="option">Cachorro</div>
                        <div class="option">Gato</div>
                        <div class="option">Aves</div>
                        <div class="option">Outro</div>
                    </div>
                </div>
            </div>
            <input type="text" id="outroAssunto" placeholder="Digite o tipo do animal" style="display:none;" class="input-padrao">

            <label class="form-cadastro">Gênero</label>
            <div class="radio-group">
                <label><input type="radio" name="genero"> Macho</label>
                <label><input type="radio" name="genero"> Fêmea</label>
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
                        <div class="option">Sim, mas vacinas desatualizadas</div>
                        <div class="option">Não</div>
                        <div class="option">Desconhecido</div>
                    </div>
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
                        <div class="option">+45</div>
                    </div>
                </div>
            </div>
            <input type="text" id="outroAssunto" placeholder="Digite o tipo do animal" style="display:none;" class="input-padrao">

            <label class="form-cadastro">Gênero</label>
            <div class="radio-group">
                <label><input type="radio" name="genero"> Macho</label>
                <label><input type="radio" name="genero"> Fêmea</label>
            </div>
        </fieldset>

        <!-- CONTATO -->
        <fieldset>
            <legend>Contato e localização</legend>

            <label>E-mail</label>
            <input type="email">

            <label>Telefone</label>
            <input type="text">

            <label>Localização</label>
            <input type="text" placeholder="Ex: Rua das flores, N.0, ">
        </fieldset>

        <!-- SOBRE -->
        <fieldset>
            <legend>Sobre o pet</legend>

            <label>Foto</label>
            <input type="file">

            <label>Descrição</label>
            <textarea></textarea>
        </fieldset>

        <div class="botoes">
            <button class="btn-voltar">Voltar</button>
            <button class="btn-concluir">Continuar 🐾</button>
        </div>

    </form>

    <?php
    $modalConteudo = ob_get_clean();
    include './../../components/modal/modal.php';
    ?>


    <script>
        const dropdown = document.querySelector(".dropdown");
        const selected = document.querySelector(".dropdown-selected");
        const options = document.querySelectorAll(".option");
        const outroInput = document.getElementById("outroAssunto");

        selected.addEventListener("click", () => {
            dropdown.classList.toggle("active");
        });

        options.forEach(option => {
            option.addEventListener("click", () => {
                selected.textContent = option.textContent;
                dropdown.classList.remove("active");

                // MOSTRAR input se for "Outro"
                if (option.textContent === "Outro") {
                    outroInput.style.display = "block";
                } else {
                    outroInput.style.display = "none";
                }
            });
        });

        /* fechar ao clicar fora */
        document.addEventListener("click", (e) => {
            if (!dropdown.contains(e.target)) {
                dropdown.classList.remove("active");
            }
        });
    </script>
</body>