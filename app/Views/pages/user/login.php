<?php
$titulo = 'Login';
?>
<?php
include './../../components/head/head.php';
?>

<body>
    <!-- navbar -->
    <?php
    include './../../components/nav/navBar.php';
    ?>

    <section id="login-form">
        <!-- LADO ESQUERDO-->

        <div id="esquerda">

            <p>Olá, Usuário! 🐾
                Bem-vindo ao Conecta Pet!
                nossos amigos de quatro patas.</p>
            Entre para continuar ajudando
            <img src="./../../assets/img/grupo_cacho.png" alt="" id="lado_esquedo">

        </div>

        <!-- LADO direito -->
        <div class="direita">
            <h1>Login</h1>
            <form method="POST" action="">

                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Digite seu email " required>

                <label for="senha">Senha</label>

                <div class="campo-senha">

                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    <span class="material-icons olho" onclick="toggleSenha()">
                        visibility
                    </span>

                </div>

            </form>
            <div class="botoes">
                <a href="./cadastro.php">
                    <button type="submit" class="bt-cadastro">
                        Cadastrar-se</button>
                </a>

                <button type="button" class="bt-entrar" onclick="login()">
                    Entrar 🐾
                </button>
            </div>
            <a class="esqueceu" href="./recuperar-senha.php">Esqueceu a senha?</a>
        </div>
    </section>

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

        function login() {
            localStorage.setItem('login', 'true');
            window.location.href = "./home.php";
        }
    </script>
</body>