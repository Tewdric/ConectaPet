<?php
$titulo = 'Login Administrador';
?>
<?php
include './../../components/head/head.php';
?>

<body>

    <section id="login-form">
        <!-- LADO ESQUERDO-->

        <div id="esquerda">
            <p>Olá, Administrador! 🐾</p>
            <p>Bem-vindo ao <strong>Conecta Pet</strong>.</p>
            <p>Gerencie a plataforma de forma rápida e simples. ⚙️</p>
            
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

                <button type="button" class="bt_home" onclick="login()">
                    Entrar 🐾
                </button>
            </div>
            <a class="esqueceu" href="./senha_adm.php">Esqueceu a senha?</a>
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