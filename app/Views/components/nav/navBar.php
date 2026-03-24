<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar">
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
        <li><a href="#"><img src="https://img.icons8.com/ios/50/accessibility2.png" alt="accessibility" /></a></li>
    </ul>

    <span class="material-symbols-outlined" id="navbar-sandwich">menu</span>
</nav>