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
            <form method="POST" action="" onsubmit="return validarLogin()">

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>

                <label for="senha">Senha</label>

                <div class="campo-senha">
                    <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                    <span class="material-icons olho" onclick="toggleSenha()">
                        visibility
                    </span>
                </div>

                <div class="bt-adm">
                    <button type="submit" class="bt_login_adm">
                        Entrar 🐾
                    </button>
                </div>

            </form>
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
    
    <!-- validacao dos campos email e senha  -->
    <script>
        function validarLogin() {
            const email = document.getElementById("email").value.trim();
            const senha = document.getElementById("senha").value.trim();

            if (email === "" || senha === "") {
                alert("Preencha email e senha!");
                return false; // NÃO envia o formulário
            }

            // Se estiver tudo preenchido
            localStorage.setItem('login', 'true');
            window.location.href = "./home_adm.php";

            return false; // impede envio padrão já que você redireciona manualmente
        }
    </script>


</body>