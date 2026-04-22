<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">

    <!-- LOGO -->
    <div class="sidebar-logo">
        <img src="./../../assets/img/logo.png" alt="Logo">
    </div>

    <!-- MENU -->
    <ul class="sidebar-menu">

        <li class="<?= $currentPage == 'home_adm.php' ? 'active' : '' ?>">
            <a href="./home_adm.php">
                <i class="fas fa-home"></i> Home
            </a>
        </li>

        <li class="<?= $currentPage == 'contas.php' ? 'active' : '' ?>">
            <a href="./contas.php    ">
                <i class="fas fa-users"></i> Admin. Contas
            </a>
        </li>

        <li class="<?= $currentPage == 'relatorios.php' ? 'active' : '' ?>">
            <a href="./relatorios.php">
                <i class="fas fa-chart-bar"></i> Relatórios
            </a>
        </li>

        <li class="<?= $currentPage == 'publicacoes.php' ? 'active' : '' ?>">
            <a href="./publicacoes.php">
                <i class="fas fa-file-alt"></i> Publicações
            </a>
        </li>

        <li class="<?= $currentPage == 'animais.php' ? 'active' : '' ?>">
            <a href="./animais.php">
                <i class="fas fa-paw"></i> Animais
            </a>
        </li>

        <li class="<?= $currentPage == 'perfil.php' ? 'active' : '' ?>">
            <a href="./perfil.php">
                <i class="fas fa-user"></i> Perfil
            </a>
        </li>

    </ul>

</div>