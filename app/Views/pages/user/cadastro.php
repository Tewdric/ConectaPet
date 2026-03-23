<?php
$titulo = 'Cadastro';
include './../../components/head/head.php';
?>

<body>

    <?php
    include './../../components/nav/navBar.php';
    ?>

    <?php
    ob_start();
    ?>

    <h2>Dados Pessoais</h2>

    <form class="form-cadastro">

        <div class="campo">
            <label>Nome Completo</label>
            <input type="text" placeholder="Digite seu nome" required>
        </div>

        <div class="campo">
            <label>CPF</label>
            <input type="text" placeholder="Digite seu CPF">
        </div>

        <div class="campo">
            <label>Telefone</label>
            <input type="text" placeholder="Digite seu telefone">
        </div>

        <div class="campo">
            <label>E-mail</label>
            <input type="email" placeholder="Digite seu email" required>
        </div>

        <label for="senha">Senha</label>

        <div class="senha-group">

            <div class="campo-senha">

                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <span class="material-icons olho" onclick="toggleSenha()">
                    visibility
                </span>

            </div>
        </div>

        <label for="senha">Confirmar Senha</label>

        <div class="senha-group">

            <div class="campo-senha">

                <input type="password" id="senha" name="senha" placeholder="Confirme sua senha" required>
                <span class="material-icons olho" onclick="toggleSenha()">
                    visibility
                </span>

            </div>
        </div>


        <div class="upload-area">
            <label class="upload-foto">
                <input type="file" name="foto">
            </label>

            <p>
                Selecione uma imagem para foto de perfil
            </p>

        </div>


        <div class="botoes">

            <button type="submit" class="btn-voltar">
                Voltar
            </button>

            <button type="submit" class="btn-concluir">
                Concluir 🐾
            </button>

        </div>



    </form>
    <?php
    $modalConteudo = ob_get_clean();

    include './../../components/modal/modal.php';
    ?>

    <script>
        function toggleSenha() {

            const senha = document.getElementById("senha");
            const icone = document.querySelector(".olho");

            if (senha.type === "password") {
                senha.type = "text";
                icone.textContent = "visibility_off";
            } else {
                senha.type = "password";
                icone.textContent = "visibility";
            }

        }
    </script>
</body>