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
            <img src="./../../assets/img/grupo_cacho.png" alt="" id="lado_esquedo">

            <p>Olá, Usuário! 🐾
                Bem-vindo ao Conecta Pet!
                Entre para continuar ajudando
                nossos amigos de quatro patas.</p>
        </div>

        <!-- LADO direito -->
        <div class="direita">
            <h1>Login</h1>
            <form method="POST" action="">

                <label for="email">E-mail</label>
                <input type="email" name="email">

                <label for="senha">Senha</label>
                <input type="password" name="senha">


            </form>
            <a href="#">Esqueceu a senha?</a>
            <div class="botoes">
                <a href="./cadastro.php">
                    <button type="submit" class="bt-cadastro">
                        Cadastrar-se</button>
                </a>

                <button type="submit" class="bt-entrar">
                    Entrar 🐾
                </button>
            </div>
        </div>
    </section>
</body>