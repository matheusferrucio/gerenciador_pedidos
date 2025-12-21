<?php
    require_once(__DIR__.'/../back/config.php');
?>

<nav class="sidebar">
    <div class="logo">
        <img src="<?= BASE_URL; ?>images/logo.png" alt="logo">

        <div class="nome_sistema">
            <h1 class="titulo">Gerenciador <br>de pedidos</h1>
        </div>

        <div class="btn_sidebar">
            <i class='bx bx-chevron-right' ></i>
        </div>
    </div>
    <div class="navigation_buttons">
        <ul class="list_buttons">
            <li>
                <a href="<?= BASE_URL; ?>pages/front/home.php" class="nav_btn">
                    <i class='bx bx-home'></i>
                    <span class="texto">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL; ?>pages/front/listas/lista_pedidos.php" class="nav_btn">
                    <i class='bx bx-receipt'></i>
                    <span class="texto">Pedidos</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL; ?>pages/front/listas/lista_seguradoras.php" class="nav_btn">
                    <i class='bx bx-shield'></i>
                    <span class="texto">Seguradoras</span>
                </a>
            </li>
            <li>
                <a href="<?= BASE_URL; ?>pages/front/listas/lista_oficinas.php" class="nav_btn">
                    <i class='bx bx-cog'></i>
                    <span class="texto">Oficinas</span>
                </a>
            </li>
        </ul>

        <div class="perfil">
            <a href="<?= BASE_URL; ?>" class="nav_btn btn_perfil">
                <div class="frame_img_perfil">
                    <img src="<?= BASE_URL; ?>images/img_perfil.jpeg" alt="" class="img_perfil">
                </div>
                <div class="nome_cargo">
                    <span class="texto nome_perfil">Matheus</span>
                    <span class="texto cargo_perfil">Assistente peças</span>
                </div>
            </a>

            <a href="#" class="exit_btn">
                <i class='bx bx-exit'></i>
            </a>
        </div>
    </div>
</nav>