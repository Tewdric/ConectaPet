<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar" id="navbar-deslogado">
    <div class="navbar-logo">
        <img src="./../../assets/img/logo.png" alt="Logo">
    </div>

    <ul class="navbar-menu">
        <li><a href="./../../pages/user/home.php">Home</a></li>

        <?php if ($currentPage !== 'login.php') : ?>
            <li><a href="sobre.php">Sobre</a></li>
        <?php endif; ?>

        <li><a href="animais.php">Animais</a></li>

        <?php if ($currentPage !== 'login.php') : ?>
            <li><a href="./../../pages/user/contato.php">Contato</a></li>
            <li><a href="./../../pages/user/login.php">Login</a></li>
        <?php endif; ?>


    </ul>

    <ul class="navbar-social">
        <li><a href="#"><img src="https://img.icons8.com/ios/50/facebook-f.png" alt="facebook-f" /></a></li>
        <li><a href="#"><img src="https://img.icons8.com/ios/50/tiktok--v1.png" alt="tiktok" /></a></li>
        <li><a href="#"><img src="https://img.icons8.com/ios/50/instagram-new--v1.png" alt="instagram" /></a></li>
        <li>
            <a href="#"
               id="acc-trigger"
               aria-label="Abrir painel de acessibilidade"
               aria-expanded="false"
               aria-controls="acc-panel">
                <img src="https://img.icons8.com/ios/50/accessibility2.png" alt="accessibility" />
            </a>
        </li>
    </ul>

    <span class="material-symbols-outlined" id="navbar-sandwich">menu</span>
</nav>

<nav class="navbar" id="navbar-logado" style="display: none;">

    <div class="navbar-menu">
        <img src="../../assets/img/logo.png" class="logo">

        <li><a href="./../../pages/user/home.php">Home</a></li>
        <li><a href="sobre.php">Sobre</a></li>
        <li><a href="./../../pages/user/favoritos.php">Favoritos</a></li>
        <li><a href="./../../pages/user/contato.php">Contato</a></li>
        <li><a href="./../../pages/user/login.php">Login</a></li>

    </div>

    <div class="navbar-social">
         <a href="./perfil_usuario.php">
            <img src="../../assets/img/user.png" class="nav-icon">
        </a>
                <li>
            <a href="#"
               id="acc-trigger"
               aria-label="Abrir painel de acessibilidade"
               aria-expanded="false"
               aria-controls="acc-panel">
                <img src="https://img.icons8.com/ios/50/accessibility2.png" alt="accessibility" />
            </a>
        </li>
        <button onclick="logout()">Sair</button>
        
    </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const acess = document.getElementById('acc-trigger');
        const modal_acess = document.getElementById('modal-acessibilidade');
        const logado = localStorage.getItem("login");

        const navDeslogado = document.getElementById("navbar-deslogado");
        const navLogado = document.getElementById("navbar-logado");

        if(acess){
            acess.addEventListener('click', () =>{
                modal_acess.showModal();
            })
        }
            
        if (logado === "true") {
            navDeslogado.style.display = "none";
            navLogado.style.display = "flex";
        } else {
            navDeslogado.style.display = "flex";
            navLogado.style.display = "none";
        }
    });

    function logout() {
        localStorage.removeItem('login');
         window.location.href = "./home.php";
    }


</script>