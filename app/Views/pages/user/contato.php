<?php
$titulo = 'Contato';
include './../../components/head/head.php';
?>

<body>

    <?php include './../../components/nav/navBar.php'; ?>

    <?php
    ob_start();
    ?>

    <h2>Como podemos ajudar?</h2>

    <div class="campo">
        <label class="form-cadastro">Assunto</label>

        <div class="dropdown">
            <div class="dropdown-selected">Selecione um assunto</div>

            <div class="dropdown-options">
                <div class="option">Adoção</div>
                <div class="option">Denúncia</div>
                <div class="option">Dúvida</div>
                <div class="option">Sugestão</div>
                <div class="option">Outro</div>
            </div>
        </div>
    </div>

    <input type="text" id="outroAssunto" placeholder="Digite o assunto" style="display:none;" class="input-padrao">
    <form class="form-cadastro">

        <label>Nome</label>
        <input type="text" name="nome" placeholder="Digite seu nome" required>

        <label>E-mail</label>
        <input type="email" name="email" placeholder="Digite seu E-mail" required>

        <label>Mensagem</label>
        <input type="text" name="Mensagem" placeholder="Digite a sua mensagem" required>

    </form>

    <div class="botoes-modal">

        <a href="home.php">
            <button class="btn-voltar">Voltar</button>
        </a>

        <a href="./agradecimento.php">
            <button h class="btn-concluir">
                Enviar Mensagem 🐾
            </button>
        </a>


    </div>

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